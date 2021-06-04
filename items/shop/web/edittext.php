<h2><?= lan("Új Termék")?></h2>
<a href="<?= homeurl.'/shop/lista'; ?>" class="btn btn-primary">Vissza</a>

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
   <label><?= lan("Menu");?></label>
<?php
$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>
     <input name="id" id="id" type="hidden" value="<?php echo ($adat["id"]); ?>" />
     <label><?= lan("name");?></label>
        <?php $Form_Class->textbox("title", $Text_Class->htmlfromchars($adat["title"]),"Név") ?>
        <label><?= lan("priece_old");?></label>
        <?php $Form_Class->textbox('priece_old',$adat["priece_old"],'Régiár'); ?>
        <label><?= lan("priece");?></label>
        <?php $Form_Class->textbox('priece',$adat["priece"],'ár'); ?>
        <label><?= lan("vat");?></label>
        <?php
        $Form_Class->selectbox2("vat", $ShopClass->vat(), array('value' => 'id', 'name' => 'nev'), $adat["vat"], lan("Áfa")); ?>
        <?php $Form_Class->kcebox("leadtext", $Text_Class->htmlfromchars($adat["leadtext"]),lan("Leiras")); ?>
       
        <label><?= lan("mértékegység");?></label>
        <?php $Form_Class->textbox('measure',$adat["measure"],'db'); ?>
        <div class="col-xs-12">
        <label><?= lan("csomagmerete");?></label>
        <br>
        <div class="col-xs-4">
        <label><?= lan("width");?></label>
        <?php $Form_Class->textbox('width',$adat["width"],lan("width").' (cm)'); ?>
        </div>
        <div class="col-xs-4">
        <label><?= lan("height");?></label>
        <?php $Form_Class->textbox('height',$adat["height"],lan("height").' (cm)'); ?>
        </div>
        <div class="col-xs-4">
        <label><?= lan("weight");?></label>
        <?php $Form_Class->textbox('weight',$adat["weight"],lan("weight").' (g)'); ?>
        </div>
        </div>
        <?php 
        if ($adat["status"]<1)$adat["status"]=2;
        $Form_Class->selectboxeasy("status", $ShopClass->status(),  $adat["status"], lan("status"));?>
        <label><?= lan("raktárkészlet");?></label>
        <?php $Form_Class->textbox("storage", $adat["storage"],lan("raktárkészlet")) ?>
        <label><?= lan("storagemin");?></label>
        <?php $Form_Class->textbox("storagemin", $adat["storagemin"],lan("storagemin")) ?>
        <label><?= lan("storage_status");?></label>
        <?php 
                if ($adat["storage_status"]<1)$adat["storage_status"]=1;

        $Form_Class->selectbox2("storage_status", $ShopClass->storage_status(), array('value' => 'id', 'name' => 'nev'),  $adat["storage_status"], lan("storage_status"));?>
        <label><?= lan("barcode");?></label>
        <?php $Form_Class->textbox("barcode", $Text_Class->htmlfromchars($adat["barcode"]),lan("barcode")) ?>
           <barcode>*<?php echo $adat["barcode"];?>*</barcode>
           <label>Megrendelés idő:  (nap)</label>
        <?php $Form_Class->textbox("ordertime",$adat["ordertime"],"ordertime",$req="n",lan("ordertime"))?> 
        <?php 
        if ($adat["sorrend"]<1)$adat["sorrend"]=5;
        $Form_Class->selectboxeasy("sorrend", $ShopClass->sorrend(),  $adat["sorrend"], lan("sorrend"));?>
      <label>Beszerzési (URL)</label>
      <?php 
   $adatx=json_decode(str_replace('\r\n','',$adat["jsondatas"]),true);
 // arraylist($adatx);
      $adat["buyingurl0"]=$adatx["buyingurl"][0];
      $adat["buyingurl1"]=$adatx["buyingurl"][1];
      $adat["buyingurl2"]=$adatx["buyingurl"][2];
      
      $Form_Class->textbox("buyingurl0", $adat["buyingurl0"],lan("http://")); ?>
      <?php $Form_Class->textbox("buyingurl1", $adat["buyingurl1"],lan("http://")); ?>
      <?php $Form_Class->textbox("buyingurl2", $adat["buyingurl2"],lan("http://")); ?>
			<input type="submit" value="<?= lan('save')?>" class="btn btn-success">
		</form>





<?php
if ($adat["id"]>0){
	$getparams[2]=$adat["id"];
	include_once("./items/files/web/list2.php");
}
?>     
<a href="<?= homeurl.'/shop/lista'; ?>" class="btn btn-primary">Vissza</a>
