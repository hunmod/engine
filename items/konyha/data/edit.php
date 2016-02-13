<?php
$extrascript[]= ' 
	<script src="'.$homeurl.'scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="'.$homeurl.'scripts/jquery.ui.timepicker.css" />
	<script src="'.$homeurl.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	';

//arraylist($_SESSION["receptek"]['']);

/* kapott adat feldolgozása*/
$data_folderpage2="./uploads/".$folders["uploads"].$getparams[0]."/".$getparams[2];
$recipe_images=imglist($data_folderpage2);

$menusb=$MenuClass->menu_selectbox(69,array(),$filtersm,$order='',$page='all');
//menupontselectbox(69,'','','konyha','');
//arraylist($menusb);

$nehezseg=$rec_class->nehezseg();	
$elkeszees_ido=$rec_class->elkeszees_ido();	


if (count($recipe_images)>0){
	foreach($recipe_images as $source_image)
	{
		$source_image="./uploads/".$folders["uploads"].$getparams[0]."/".$getparams[2]."/".$source_image;
		//resize_image($source_image, $source_image, 800, 600, 70, $crop = true);
	}
}
if ($_POST["receptpost"]==1)
{
	//mentés
	if ($_POST["uid"]<1) {$_POST["uid"]=$auser['id'];}
	$kapott=$_POST;
/*	$kapott=recept_text_form($_POST);	
	$kapott=gen_form_save($kapott,"recept",$_POST);
*/	

if ($_POST['diab']==''){$_POST['diab']='0';}
if ($_POST['gluten']==''){$_POST['gluten']='0';}
if ($_POST['lactose']==''){$_POST['lactose']='0';}


	$recid=$rec_class->save($_POST);
	if 	($kapott["id"]<1)$kapott["id"]=$recid;	
	//var_dump ($kapott);
		//arraylist($kapott);
	if ($kapott["id"]>1 && count($_SESSION["receptek"][''])>0){
		$menteniarray=$_SESSION["receptek"][''];
		//arraylist($menteniarray);
			if (($menteniarray) ){
			foreach($menteniarray as $mysessiondata){
				$mysessiondata["recept_id"]=$recid;
				$kapott2=$rec_class->save_recept_alapanyag($mysessiondata);	
			}}
			$_SESSION["receptek"]['']=array();
		
	}
  	header("Location:".$homeurl.$separator.$getparams[0]."/".$getparams[1]."/".$recid);	
	//arraylist($kapott);
}
/* kapott adat feldolgozása*/
else{
/* lekérdezés*/
	
	if($getparams[2]>0)$egyelem=$rec_class->get(array('id'=>$getparams[2],'status'=>'all'),'',0);
	
	//arraylist($egyelem);
	$dbadat=$egyelem['datas'][0];
	
	if ($dbadat["sorrend"]<1){
		$dbadat["sorrend"]=10;
	}
	if ($dbadat["status"]<1){
		$dbadat["status"]=2;
	}

/* lekérdezés*/
	//$formelements=recept_text_form($dbadat);
}
$typ["value"]="id";
$typ["name"]="nev";
$elem["typ"];


if ($_GET['loadcalc']==1){
$_SESSION['receptek']['']=$_SESSION['receptek']['mycalc'];
}
	
?>