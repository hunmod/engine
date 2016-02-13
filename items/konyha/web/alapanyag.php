<?php

/* Bolt litája*/
$KAPOTTID=decode($getparams[2]);
if ($KAPOTTID>0){
$wherebesz=" WHERE alap_id=".$KAPOTTID;
$qbeszerzes="
SELECT * FROM  ".$tbl['alapanyag_bolt']." ".$wherebesz."";
$beszerzes=db_Query($qbeszerzes, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
}



/* lekérdezés*/
$qlekerdez="
SELECT * 
FROM  ".$tbl['alapanyag']." WHERE id=".$KAPOTTID."
";
$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$dbadat=$egyelem[0];
/* lekérdezés*/
?>
<div>
<div>
<h1><?php echo $dbadat["nev"];?></h1>
<?php 
if (($dbadat["hir_id"]!='')&&($dbadat["hir_id"]!='0')){?>
<div class="text"><?php echo $dbadat["hir_id"];?></div>
<?php }?>
<table width="100%">

<tr>
    <td class="energia"><?php echo "energia";?></td>
    <td class="kaloria"><?php echo "kaloria";?></td>
    <td class="szenhidrat"><?php echo "szenhidrat";?></td>
    <td class="feherje"><?php echo "feherje";?></td>
    <td class="zsir"><?php echo "zsir";?></td>
    <td class="rost"><?php echo "rost";?></td>
  </tr>
<tr>
    <td class="energia"><?php echo $dbadat["energia"];?></td>
    <td class="kaloria"><?php echo $dbadat["kaloria"];?></td>
    <td class="szenhidrat"><?php echo $dbadat["szenhidrat"];?></td>
    <td class="feherje"><?php echo $dbadat["feherje"];?></td>
    <td class="zsir"><?php echo $dbadat["zsir"];?></td>
    <td class="rost"><?php echo $dbadat["rost"];?></td>
    </tr>
</table>
</div>
<?php
//arraylist($dbadat);
$typ["value"]="id";
$typ["name"]="nev";
$elem["typ"];

if (count($beszerzes)>0){
?>

<h2>kapható:</h2>
<style>
.bolt{
display:inline-block;
position:relative;
width:150px;	
}
</style>
<?php 
foreach ($beszerzes as $egy){
	$bolt=find_boltok_array($egy["bolt"]);
	//echo $bolt["nev"];
	//echo $bolt["logo"];

?>
<div class="bolt">
<a href="<?php echo $egy["link"];?>" target="_new">
<img src=" <?php echo $bolt["logo"];?>" width="100px;" alt="<?php echo $bolt["nev"];?>"/><br />
</a>
</div>
<?php
}
}
?>
</div>
