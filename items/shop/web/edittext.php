<?php 
//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);
//action="<?php echo $kezdooldal.$separator.$getparams[0]."/savetext/".base64_encode ($elem["id"]);>" 
?>
	<form method="post">
<?php
$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>
<br />
     <input name="id" id="id" type="hidden" value="<?php echo ($adat["id"]); ?>" />
        <?php $Form_Class->textbox("cim", $Text_Class->htmlfromchars($adat["cim"]),"Név") ?>
        <?php $Form_Class->textbox('ar_old',$adat["ar_old"],'Régiár'); ?>
        <?php $Form_Class->textbox('ar',$adat["ar"],'ár'); ?>
        <?php $Form_Class->selectbox2("vat", $shop_class->vat(), array('value' => 'id', 'name' => 'nev'), $adat["vat"], "Áfa"); ?>
        <?php $Form_Class->kcebox("hir", $Text_Class->htmlfromchars($adat["hir"]),"Leiras") ?>
        <?php $Form_Class->selectboxeasy("status", $shop_class->status(),  $adat["status"], "status");?>
        <?php $Form_Class->selectbox2("storage_status", $shop_class->storage_status(), array('value' => 'id', 'name' => 'nev'),  $adat["storage_status"], "storage_status");?>
        <?php $Form_Class->textbox("barcode", $Text_Class->htmlfromchars($adat["barcode"]),"barcode") ?>
           <barcode>*<?php echo $adat["barcode"];?>*</barcode>
        Megrendelés idő: <?php $Form_Class->textbox("ordertime",$adat["ordertime"],"ordertime",$req="n","ordertime")?> (nap)
        <?php $Form_Class->selectboxeasy("sorrend", $shop_class->sorrend(),  $adat["sorrend"], "sorrend");?>
			<input type="submit" value="Submit" />
		</form>
<?php
if ($adat["id"]>0){
	$getparams[2]=$adat["id"];
	include_once("./items/files/web/list.php");	
}
?>     