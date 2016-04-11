<?php 
if ($auser["jog"]<3){
	  	header("Location:".$homeurl);

}
?>

<script>
function selecttag(id,tag){
	$("#blogtagsl").hide();
	$("#blogtag").val("");
	if (id>0){
		$("#blog_tagsshow").append('<div id="s'+id+'" class="ms-sel-item ">'+tag+'<span class="ms-close-btn" onclick="deltag('+"'"+id+"'"+')"></span></div>');
		$("#blog_tags").val($("#blog_tags").val()+','+id);
	}
	
}


function print_taglist(val){
	$("#blogtagsl").show();
	$("#blogtagsl").append('<span onclick="selecttag('+val.id+','+"'"+val.name+"'"+')">'+val.name+'</span>');
}

function saveblogajax(){
          $.getJSON(''+serverurl+'service.php?q=hirek/ajax_taglist&tag='+$("#blogtag").val()+'&save=1', function(data) {
			if(data.length > 5) {
				//$('#tagsave').attr("disabled", "disabled");
				
			}
			else{
				//$('#tagsave').removeAttr("disabled");
			}			
			if ($("#blogtag").val()!=''){
			$("#blogtagsl").empty();
			$.each( data, function( key, val ) {
				selecttag(val.id,val.name)
				//print_taglist(val);
			});
			}
	});

}	

function loadblogajax(){
          $.getJSON(''+serverurl+'service.php?q=hirek/ajax_taglist&tag='+$("#blogtag").val()+'', function(data) {
			$("#blogtagsl").empty();
			if(data.length > 0) {
				//$('#tagsave').attr("disabled", "disabled");
			}
			else{
			//	$('#tagsave').removeAttr("disabled");
			}
			$.each( data, function( key, val ) {
				print_taglist(val);
			});
	});

}	
function posbtag(){
		    var pos1 = jQuery("#blogtag").position();
			$("#blogtagsl").css('left', pos1.left + "px");
			$("#blogtagsl").css('top', $( "#blogtag" ).height() + "px");
			$("#blogtagsl").css('display',  "block");
	
}

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

<script>
var savecomplete=0;
function deltag(id){
	var res = $("#blog_tags").val().split(",");
	$("#blog_tags").val("");
	res.forEach(function(entry) {
	if (entry !=id && entry !=''){
    	$("#blog_tags").val( $("#blog_tags").val()+','+entry );
	}
	$( "#s"+id ).remove();
});
	
}


$( document ).ready(function() {

	$('#blogtag').on('mouseover', function() {
		savecomplete=0;
	});	
	/*$('#blogtag').on('mousemove', function() {
		savecomplete=0;
	});	*/
	$('#blogtag').on('focusin', function() {
		savecomplete=0;
	});
	
		$('#blogtag').on('keyup', function() {
		savecomplete=0;
		posbtag();
		loadblogajax()
	});		
	$('#blogtag').on('click', function() {
		savecomplete=0;
		posbtag();
		loadblogajax();

	});
	$("#blogtag").keypress(function(e) {
		if(e.which == 13) {
			$("#blogtagsl").hide();
				saveblogajax();
					return false;
	
		}
	});	



/*	$('#blogtag').on('focusout', function() {
		$("#blogtagsl").hide();
		window.setTimeout(tagsave,5000);
		if (savecomplete==1){
			saveblogajax();
		}		
	});	*/
		
	$("#blogtag").mouseleave(function(){
		$(this).hide();
		//onclick="selecttag(27,'alkalmazkodóképesség')"		


	});
	

});

//AdAddForm			
//savebtn	
/*	$('#savebtn').on('click', function() {
		  var myForm = $('#AdAddForm');
        if (!$myForm.checkValidity()) 
          {                
            $(myForm).submit();              
          }
		//$('#AdAddForm').submit();
	});	
	*/
	
	
	
function tagsave()
{

}
</script>
<style>
#blog_tagsshow span{
	padding:0 5px;
	margin-right:5px;
	background:#CCC;
	cursor:pointer;

}
.lerningfield{
position:relative;
}
.lerningfield div{
	position:absolute;
	background-color:#FFF;
	border:solid 1px #000000;
	padding-top:10px;
}
.lerningfield div span{
	display:block;
	cursor:pointer;
}
.lerningfield div span:hover{
	background-color:#CCC;
}
.jobform .col1 .inner, .jobform .col2 .inner,.jobform .col2 {
 overflow: visible;
}
#blogtag{
	margin-left: 10px;
	width: 65%;	
}
#blogtagsl{
	margin-top:10px;
	max-height:200px;
	overflow:auto;
	display:none;
	padding:10px;
	min-width:250px;
	padding: 3px 10px 5px 10px;
	height: auto;
	line-height: 30px;
	font-size: 18px;
	color: #7c7c7c;
	font-family: 'robotolight';	
}

.aclist{
display:block;
position:absolute;
background:#FFF;
box-shadow: 3px 3px 3px rgba(0,0,0,0.7);
width:150px;
}
.aclist span{
display:block;
}
.aclist span:hover{
cursor:pointer;
background:#CCC;
}
</style>
<div class="container">
<div class="col-sm-12">
<?php 
$form=new formobjects();
$status=$hir_class->status();
$sorrend=$hir_class->sorrend();
$form=new formobjects();

$UploadClass=new file_upload();
$hir_class=new hir();

if ($_POST['hirsave']=='1'){
$hirid=$hir_class->save($_POST); 
$_POST["id"]=$hirid;
//$hir_class->save_ad_tags_field($_POST);
//echo $hirid;
$target=$UploadClass->uploadimg('photo',$hirimg_loc.'/'.$hirid,''.$hirid,800,600,true,true,true);

//header("Location:".$homeurl."/hirek/edittext/".encode($hirid));

}


if (base64_decode($getparams[2])>0){$hirid=base64_decode($getparams[2]);}
if ($hirid>0){
	$filters['id']=$hirid;
	$filters['status']="all";
	$news=$hir_class->get($filters,$order='',$page='all');
	$adat=$news['datas'][0];
	$nimg=$hir_class->getimg($adat['id']);
	$tags=$hir_class->get_ad_tag(array("ad"=>$filters["id"],"active"=>'all'));
	
	//var_dump($nimg);

/*
if ($getparams[2]!=''){
$qadatok="SELECT * FROM  ".$tbl['hir']." WHERE id='".base64_decode($getparams[2])."'";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$adat=$adatok[0];*/
}

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);

?>


	<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
     <?php $Form_Class->hiddenbox('hirsave','1')?>
 <?php echo $lan['menu'];
 
//arraylist($auser);
if (!isset($menustart))$menustart='0';
/*$filtersm["modul"]="hirek";*/
$filtersm["jog"]="5";

$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"hirek"),$filtersm,$order='',$page='all');
 
 ?>:
 
<?php $Form_Class->selectbox2("mid",$menuk,array('value'=>'id','name'=>'nev'),$adat["mid"],"Menu");?>                  


<?php 


for ($i = 1; $i <= 20; $i++) {
	$sorrendarray[$i]["id"]=$i;
	$sorrendarray[$i]["nev"]=$i;	
}

?>
  
<br />

    
    <input name="id" id="id" type="hidden" value="<?php echo base64_decode($getparams[2]); ?>" />
	<?php echo $lan['cim'];?>:
	<input name="cim" id="cim"  type="text" value="<?php echo $Text_Class->htmlfromchars($adat["cim"]); ?>"  maxlength="200" style="  width: 217px;" /><br />
	<?php echo $lan['innertext'];?>:
    <?php  $form->kcebox("hir",$Text_Class->htmlfromchars($adat["hir"])) ?>
        <br />
    <?php echo $lan['outertext'];?>:    <?php  $form->kcebox("hir2",$Text_Class->htmlfromchars($adat["hir2"])) ?>
        <br />
				<?php echo $lan['status'];?>:<?php 
				 $form->selectboxeasy2("status",$status,$adat["status"],"status");									
?>
<br />
				<?php echo $lan['sorrend'];?>:<?php 
				 $form->selectboxeasy2("sorrend",$sorrend,$adat["sorrend"],"sorrend");									
?>
<br />


	<img src="<?php echo ($homeurl.'/'.$nimg);?>">
<br />
<input id="photo" name="photo" type="file" >



<br />
<?php echo $lan['publicdate'];?>:
<input size="16" type="text" value="<?php echo ($adat["ido"]); ?>" readonly class="form_datetime" name="ido" id="ido">
 

                    <fieldset>
                   
			<label for="AdContactinfo">Tags</label>
                               
                <div class="lerningfield input" >    
                  <input name="blogtag" id="blogtag" type="text" onkeyup="loadblogajax()" autocomplete="off" placeholder="Tags" />
                  <div id="blogtagsl" name="blogtagsl" onclick="selecttag(0,0)"></div>
                </div>
	<?php if (($tags))foreach($tags as $tag){
		$tagst.= ','.$tag["tag_id"];
		} ?>

                  <input name="blog_tags" id="blog_tags" type="hidden" value="<?php echo $tagst; ?>" />
                  <div id="blog_tagsshow" class="ms-sel-ctn">
                  <?php if (($tags))foreach($tags as $tag){?>
                  <div id="s<?php echo $tag["tag_id"]; ?>" class="ms-sel-item"><?php echo $tag["name"]; ?><span class="ms-close-btn" onclick="deltag(<?php echo $tag["tag_id"]; ?>)"></span></div>
                  <?php } ?>
                  </div>    
                  
                                  
                    </fieldset>

<p>
                        <button type="submit" class="button enterButton"><?php echo $lan['save'];?> <i class="fa fa-arrow-right"></i></button>
</p>
</form>
 
 
     <?php
 if ($hirid>0){
	 $getparams[2]=$hirid;
include('items/files/web/list.php');

?>                          
                <a href="<?php echo str_replace('admin.', "", $homeurl)."hirek/hir/".$hirid."?forcelook=1"; ?>" target="_blank">            <div class="col-sm-4">
                Page preview </div></a>

<?php } ?> 
 
</div>
	<!--section class="col-md-3 col-sm-4" >
<?php //include("items/user/web/widget_user_menu.php"); ?>
  </section-->
</div>