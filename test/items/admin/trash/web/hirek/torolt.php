<?php
//
if (($getparams[3]=="aktival") && ($getparams[4]!="")){
	$aktival=$getparams[4];
	include_once("items/fnct/hirek/aktival.php");
}
if (($getparams[3]=="delete") && ($getparams[4]!="")){
	$delete=$getparams[4];
	include_once("items/fnct/hirek/delete.php");
}
if (($getparams[3]=="deletef") && ($getparams[4]!="")){
	$delete=$getparams[4];
	include_once("items/fnct/hirek/deletef.php");
}

//

$q="SELECT * FROM ".$tbl['hir']." WHERE `status` =4  ORDER BY `id` DESC";
$hirek=db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
?>
<h2>Törölt hírek</h2>

<?php 
if (count($hirek)>0){
  foreach ($hirek as $hir){?>
<div class="egyelem">
	<?php echo szovegvisszaalakit($hir["cim"]);?>
	<div class="tblbg3">
		<?php if (($auser["jogid"]>=3) || ($auser["id"]==$hir["uid"])){?>
        <a href="<?php echo $kezdooldal.$separator."hirek/edittext/".base64_encode($hir["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
		| <a href="<?php echo $separator."admin/hirek/torolt/aktival/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Aktivál')" onmouseout="hideddrivetip()"><?php echo $buttons["refresh"];?></a>
		| <a href="<?php echo $separator."admin/hirek/torolt/deletef/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Végleg Töröl')" onmouseout="hideddrivetip()"><?php echo $buttons["trash"];?></a>
		<?php }?>                
	</div>
</div>
<?php 
	}
}
?>