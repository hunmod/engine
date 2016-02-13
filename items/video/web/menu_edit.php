<div>
<a href="<?php echo $homeurl.$separator;?>video/lista"  class="btn">back</a>
</div>
<h1>Video categorie</h1>
<?php
$menupontselectbox=menupontselectbox(0,$onearray,'','','');
$mstatus=$MenuClass->status();
/* kapott adat feldolgozása*/
if (count($_POST))
{
	//$kapott=$_POST;
	if ($_POST["formname"]=="menuedit")
	{
		$kapott=menu_editform_form($_POST);	
		$mid=$MenuClass->save($_POST);

		$target=$Upload_Class->uploadimg('img',$menuimg_folder,'m'.$mid,530,300,true,true,true);


	}

}
/* kapott adat feldolgozása*/


/* lekérdezés*/
$qlekerdez="
SELECT * 
FROM  ".$tbl['menu']." WHERE id=".$getparams[2]."
";
$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$dbadat=$egyelem[0];
/* lekérdezés*/


$formelements=menu_editform_form($dbadat);
//arraylist($formelements);
?>
          

<div>
  
  
<form id="edit_formd" method="post" enctype="multipart/form-data">

<input type="hidden" name="formname" id="formname" value="menuedit">
<input type="hidden" name="id" id="id" value="<?php echo $dbadat['id']?>">
<input type="hidden" name="mid" id="mid" value="19">
<input type="hidden" name="jogid" id="jogid" value="0">
<input type="hidden" name="modul" id="modul" value="video">
<input type="hidden" name="file" id="file" value="list">

<div>
<label class="nev">Name</label><input type="text" name="nev" id="nev" value="<?php echo $dbadat['nev']?>" placeholder="Name">
</div>


<div>
<label class="status">status</label>
				<?php $Form_Class->selectboxeasy2('status',$mstatus,$dbadat["status"],'Status');?>					

</div>
<div>
<label class="sorrend">Order</label>
					<?php $Form_Class->selectbox('sorrend',$sorrendarray,array('value'=>'id','name'=>'nev'),$dbadat["sorrend"],'Order');?>

  </div>
<div class="clear"></div>
   
<br>
<input name="" class="btn btn-lg btn-success" type="submit" value="Save" />

    </form>

<br /><br /><br />
<div class="clear"></div>
