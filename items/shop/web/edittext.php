<?php 
//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);
//action="<?php echo $kezdooldal.$separator.$getparams[0]."/savetext/".base64_encode ($elem["id"]);>"

//arraylist($auser);
if (!isset($menustart)) $menustart = '0';
/*$filtersm["modul"]="hirek";*/
$filtersm["jog"] = "5";

$menuk = $MenuClass->menu_selectboxfilter($menustart, array("modul" => "shop"), $filtersm, $order = '', $page = 'all');

?>
	<form method="post">
<?php
$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>
<br />
     <input name="id" id="id" type="hidden" value="<?php echo ($adat["id"]); ?>" />
        <?php $Form_Class->textbox("title", $Text_Class->htmlfromchars($adat["title"]),"Név") ?>
        <?php $Form_Class->textbox('priece_old',$adat["priece_old"],'Régiár'); ?>
        <?php $Form_Class->textbox('priece',$adat["priece"],'ár'); ?>
        <?php
        $Form_Class->selectbox2("vat", $ShopClass->vat(), array('value' => 'id', 'name' => 'nev'), $adat["vat"], "Áfa"); ?>
        <?php $Form_Class->kcebox("leadtext", $Text_Class->htmlfromchars($adat["leadtext"]),"Leiras") ?>
        <?php $Form_Class->selectboxeasy("status", $ShopClass->status(),  $adat["status"], "status");?>
        <?php $Form_Class->textbox("storage", $adat["storage"],"storage") ?>
        <?php $Form_Class->selectbox2("storage_status", $ShopClass->storage_status(), array('value' => 'id', 'name' => 'nev'),  $adat["storage_status"], "storage_status");?>
        <?php $Form_Class->textbox("barcode", $Text_Class->htmlfromchars($adat["barcode"]),"barcode") ?>
           <barcode>*<?php echo $adat["barcode"];?>*</barcode>
        Megrendelés idő: <?php $Form_Class->textbox("ordertime",$adat["ordertime"],"ordertime",$req="n","ordertime")?> (nap)
        <?php $Form_Class->selectboxeasy("sorrend", $ShopClass->sorrend(),  $adat["sorrend"], "sorrend");?>
			<input type="submit" value="<?= lan('save')?>" class="btn btn-success">
		</form>
<?php
if ($adat["id"]>0){
	$getparams[2]=$adat["id"];
	include_once("./items/files/web/list2.php");
}
?>     