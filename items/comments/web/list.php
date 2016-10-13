<script>
function postformdata(location,file,formid,get)  {
   $.ajax({
	   type: "POST",
	   url: server_url+file+".php"+get,
	   data: $('#'+formid).serialize(),
	   success: function(data)
	   {
		   $('#'+location).html(data);
		   //alert(data); // show response from the php script.
	   }
	 });
}
</script>

<?php
//comment v1.0
$filters=array();


if ($_POST["sendmsg"]==1){
$datas=$_POST;
$datas['msg']=$Text_Class->htmltochars($datas['msg']);
$datas['uid']=$auser['id'];
$datas['ido']=$date;
$datas['status']=2;//1, jóváhagyásra vár,2,látszik, 3 szerkesztés alatt, 4 törölve.

$comment_class->save($datas);	
$datas=array();
}

if ($_REQUEST["createtopic"]==1){
$filters["module"]=$_REQUEST["module"];
$filters["mid"]=$_REQUEST["mid"];
$commentsarray=$comment_class->get($filters);

$comments=$commentsarray["datas"];
$datas["module"]=$filters["module"];
$datas["mid"]=$filters["mid"];	
$datas["uid"]=	$auser['id'];
$datas["msg"]=	$datas["module"];
$datas["status"]=2;//1, jóváhagyásra vár,2,látszik, 3 szerkesztés alatt, 4 törölve.
$datas['ido']=$date;
if ($comments[0]['id']>0){
	//módosít
$datas["id"]=	$comments[0]['id'];
}	

	$comment_class->save($datas);
}

$filters["module"]=$getparams[0].'/'.$getparams[1];
$filters["mid"]=$getparams[2];
$commentsrootarray=$comment_class->get($filters);
$commentsroot=$commentsrootarray["datas"];
	//var_dump(($commentsrootarray));

if (count($commentsroot)>0){
	//van commentroot.
	$filterr=array();
	$filterr['rep']=$msgroot=$commentsroot[0]['id'];
	//lekérdezem a kommenteket, ez alatt 1 szint lehet még.
	$commentsarray=$comment_class->get($filterr);	
	if($commentsarray['datas']){
	//
?>
<comment>
<h1 class="titlered">Hozzászólások</h1>
<?php	include('sendmsgform.php');?>

		<ul class="comment-list">
<?php	
	
		foreach ($commentsarray['datas'] as $comment){
				include('commentshow.php');
			
		}
		?>
		</ul>
</comment>
		
		<?php
	}
}
//új létrehozása
else{
	?>
	<a href="?createtopic=1&module=<?= $filters["module"]?>&mid=<?= $filters["mid"]?>">Hozzászólások engedélyezése</a>
	<?php
}

//arraylist($commentsarray);
?>

