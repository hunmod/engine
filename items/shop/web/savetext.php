<?php 
if ($_POST["id"]>0){
//felülír	
/*
$qadatok= "
SELECT id FROM ".$tbl['shop']." WHERE id='".$_POST["id"]."'";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
if ($adatok[0]["id"]>0){

	$qadatok= "UPDATE  ".$tbl['shop']." SET  `hir` =  '".htmltochars($_POST["hir"])."',`ar` =  '".htmltochars($_POST["ar"])."',`cim` =  '".htmltochars($_POST["cim"])."',`mid` =  '".$_POST["mid"]."',`sorrend` =  '".$_POST["sorrend"]."',`status` =  '".$_POST["status"]."'
	 WHERE  `id` =".$_POST["id"]." LIMIT 1 ;";
	$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
	//echo "<hr>".$qadatok;
	$hirid=$_POST["id"];
}else{
	$qadatok="INSERT INTO ".$tbl['shop']." (`id`, `cim`, `hir`,`ar`,`mid`,`uid`, `status`,sorrend) 
VALUES ('".htmltochars($_POST["id"])."', '".htmltochars($_POST["cim"])."', '".htmltochars($_POST["hir"])."','".htmltochars($_POST["ar"])."','".$_POST["mid"]."', '".$auser["id"]."', '".$_POST["status"]."', '".$_POST["sorrend"]."');";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");

}
$hirid=$_POST["id"];
}
else{
//új	
$qadatok="INSERT INTO ".$tbl['shop']." (`id`, `cim`, `hir`,`ar`,`mid`,`uid`, `status`,sorrend) 
VALUES (NULL, '".htmltochars($_POST["cim"])."', '".htmltochars($_POST["hir"])."','".htmltochars($_POST["ar"])."','".$_POST["mid"]."', '".$auser["id"]."', '".$_POST["status"]."', '".$_POST["sorrend"]."');";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
//echo $qadatok;

$qadatok= "
SELECT id FROM ".$tbl['shop']." WHERE  `hir` =  '".htmltochars($_POST["hir"])."' AND `ar` =  '".htmltochars($_POST["ar"])."' AND `cim` =  '".htmltochars($_POST["cim"])."' AND `mid` =  '".$_POST["mid"]."' AND `status` =  '".$_POST["status"]."' ORDER BY `sorrend` ASC ";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
echo "<hr>".$qadatok;

$hirid=$adatok[0]["id"];
*/

	$kapott=shop_editform_form($_POST);	
	$back=gen_form_save($kapott,"shop",$_POST);
	if ($back["id"]>0){
	$hirid=$back["id"];
}
}


$kepkezeles=$separator.$getparams[0]."/edittext/".encode ($hirid);
echo $kepkezeles;
?>
<script>
redirect('<?php echo $kepkezeles;?>');
</script>