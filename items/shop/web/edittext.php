<h2><?= lan("Új Termék")?></h2>
<a href="<?= homeurl.'/shop/lista'; ?>">Vissza</a>

<?php
//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);
//action="<?php echo $kezdooldal.$separator.$getparams[0]."/savetext/".base64_encode ($elem["id"]);>"

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
        $Form_Class->selectbox2("vat", $ShopClass->vat(), array('value' => 'id', 'name' => 'nev'), $adat["vat"], lan("Áfa")); ?>
        <?php $Form_Class->kcebox("leadtext", $Text_Class->htmlfromchars($adat["leadtext"]),lan("Leiras")); ?>
        <?php 
        if ($adat["status"]<1)$adat["status"]=2;
        $Form_Class->selectboxeasy("status", $ShopClass->status(),  $adat["status"], lan("status"));?>
        <?php $Form_Class->textbox("storage", $adat["storage"],lan("raktárkészlet")) ?>
        <?php $Form_Class->textbox("storagemin", $adat["storagemin"],lan("storagemin")) ?>
        <?php 
                if ($adat["storage_status"]<1)$adat["storage_status"]=1;

        $Form_Class->selectbox2("storage_status", $ShopClass->storage_status(), array('value' => 'id', 'name' => 'nev'),  $adat["storage_status"], lan("storage_status"));?>
        <?php $Form_Class->textbox("barcode", $Text_Class->htmlfromchars($adat["barcode"]),lan("barcode")) ?>
           <barcode>*<?php echo $adat["barcode"];?>*</barcode>
        Megrendelés idő: <?php $Form_Class->textbox("ordertime",$adat["ordertime"],"ordertime",$req="n",lan("ordertime"))?> (nap)
        <?php 
        if ($adat["sorrend"]<1)$adat["sorrend"]=5;
        $Form_Class->selectboxeasy("sorrend", $ShopClass->sorrend(),  $adat["sorrend"], lan("sorrend"));?>
			<input type="submit" value="<?= lan('save')?>" class="btn btn-success">
		</form>
<?php
if ($adat["id"]>0){
	$getparams[2]=$adat["id"];
	include_once("./items/files/web/list2.php");
}
?>     
<a href="<?= homeurl.'/shop/lista'; ?>">Vissza</a>
