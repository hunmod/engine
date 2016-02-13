<?php
$qbannerek="SELECT * FROM ".$tbl["bannertlatak"];
$bannerek=db_Query($qbannerek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
/*
$egybanner["url"]="http://diabkonyha.fw.hu";
$egybanner["kep"]="../../../../../diab2/uploads/banners/diabbanner1000x.jpg";
$bannerek[]=$egybanner;*/
foreach ($bannerek as $egybanner){
?>
<a href="<?php echo './banner.php?link='.base64_encode($egybanner["url"])?>" target="_blank"><img src="<?php echo $egybanner["kep"];?>" width="920" alt="<?php echo $egybanner["url"];?>" title="<?php echo $egybanner["url"];?>" /></a>
<?php }?>
