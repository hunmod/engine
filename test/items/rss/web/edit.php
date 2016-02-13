<?php
/* kapott adat feldolgozása*/
if (count($_POST))
{
$kapott=$_POST;
$kapott=rssdata_form($_POST);	

}
/* kapott adat feldolgozása*/


/* lekérdezés*/
$qlekerdez="
SELECT * 
FROM  ".$tbl['rssdata']." WHERE id=".$getparams[2]."
";
$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$dbadat=$egyelem[0];
/* lekérdezés*/


$formelements=rssdata_form($dbadat);
//arraylist($formelements);


$typ["value"]="id";
$typ["name"]="nev";
$elem["typ"];


?>
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