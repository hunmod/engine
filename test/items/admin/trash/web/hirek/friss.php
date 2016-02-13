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

$q="SELECT * FROM ".$tbl['hir']." WHERE `status` =3  ORDER BY `id` DESC";
$hirek=db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
?>
<h2>Beküldött hírek</h2>

<?php 
if (count($hirek)>0){
  foreach ($hirek as $hir){?>
<div class="egyelem">
	<?php echo mediatcserel(ekezeteketvissza($hir["cim"]));?>
    <?php echo mediatcserel(ekezeteketvissza($hir["hir"]));?>
	<div class="tblbg3">
		<?php if (($auser["jogid"]>=3) || ($auser["id"]==$hir["uid"])){?>
        <a href="<?php echo $kezdooldal.$separator."hirek/edittext/".base64_encode($hir["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
		<?php }?>
        <?php if (($auser["jogid"]>=3) || ($auser["id"]==$hir["uid"])){?> 
        | <a href="<?php echo $separator."admin/hirek/friss/aktival/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Aktivál')" onmouseout="hideddrivetip()"><?php echo $buttons["refresh"];?></a>
         | <a href="<?php echo $separator."admin/hirek/friss/delete/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Töröl')" onmouseout="hideddrivetip()"><?php echo $buttons["del"];?></a>
		  | <a href="<?php echo $separator."admin/hirek/friss/deletef/".base64_encode($hir["id"]); ?>" onmouseover="ddrivetip('Végleg Töröl')" onmouseout="hideddrivetip()"><?php echo $buttons["trash"];?></a>
		  <?php }?>                
	</div>
</div>
<?php 
	}
}
?>