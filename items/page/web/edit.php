<?php
/* kapott adat feldolgozása*/
if (count($_POST))
{
	$kapott=$_POST;
$kapott=hir_editform_form($_POST);	
gen_form_save($kapott,"hir",$_POST);

}
/* kapott adat feldolgozása*/


/* lekérdezés*/
$qlekerdez="
SELECT * 
FROM  ".$tbl['hir']." WHERE id=".$getparams[2]."
";
$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$dbadat=$egyelem[0];
/* lekérdezés*/


$formelements=hir_editform_form($dbadat);
//arraylist($formelements);
?>


<div class="container">


<form id="edit_form" method="post">
<?php
//arraylist($egyelem[0]);
foreach ($formelements as $felem){
	formelement_of_tipe($felem);
	echo "<br>";
}
?>
<input name="smbt" type="submit" value="Ment" />
</form>
<div>
<div>
X=<input id="x" type="text"  size="3"/>px ; Y=<input id="y" type="text" size="3" />px
</div>
<?php
hiddenbox("mceid","hir");
if ($dbadat["id"]>0){
	$getparams[2]=encode($dbadat["id"]);
	$images=folderlist($getparams,'100','100');
//include_once("./items/files/web/list.php");	
}
if (count ($images)>0){
foreach ($images as $kep){
echo '<img src="uploads/picture.php?picture='.encode($kep["filepath"]).'&x=100&y=100"  onclick="Insertigtokce(\'hir\',\''.encode($kep["filepath"]).'\');" /> ';	
	
}
}
?>
<?php
if ($dbadat["id"]>0){
	$getparams[2]=$dbadat["id"];
include_once("./items/files/web/list.php");	
}
?>
</div>     

</div>   
     