<?php
//
if (($getparams[3]=="aktival") && ($getparams[4]!="")){
	$aktival=$getparams[4];
	include_once("items/fnct/linkek/aktival.php");
}
if (($getparams[3]=="delete") && ($getparams[4]!="")){
	$delete=$getparams[4];
	include_once("items/fnct/linkek/delete.php");
}
if (($getparams[3]=="deletef") && ($getparams[4]!="")){
	$delete=$getparams[4];
	include_once("items/fnct/linkek/deletef.php");
}

//

$q="SELECT * FROM ".$tbl['link']." WHERE `status` =4  ORDER BY `id` DESC";
$hirek=db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
?>
<h2>Törölt Linek</h2>

<?php 
if (count($hirek)>0){
  foreach ($hirek as $hir){?>
<div class="egyelem">
	<?php echo szovegvisszaalakit($hir["cim"]);?><br />
  <a href="<?php echo $hir["link"];?>" target="_blank"><?php echo $hir["link"];?></a>
  <div class="tblbg3">
		<?php if (($auser["jogid"]>=3) || ($auser["id"]==$hir["uid"])){?>
        <a href="<?php echo $kezdooldal.$separator."linkek/edittext/".base64_encode($hir["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
		| <a href="<?php echo $separator."admin/linkek/torolt/aktival/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Aktivál')" onmouseout="hideddrivetip()"><?php echo $buttons["refresh"];?></a>
		| <a href="<?php echo $separator."admin/linkek/torolt/deletef/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Végleg Töröl')" onmouseout="hideddrivetip()"><?php echo $buttons["trash"];?></a>
		<?php }?>                
	</div>
</div>
<?php 
	}
}
?>