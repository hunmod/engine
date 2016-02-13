<script language="javascript" type="text/javascript">
function recept_ac1(){
//alert("sss");	
showdiv('ac_recept');
postform('ac_recept','service'
,"recepthez",'?q=konyha/hozzavalo_ac');
}

function recepthozzavalok_save(form,id)
{
	if (($('#menny').val()>0 && form=='recepthez')||form!='recepthez'){
		postform('raceptalapanyag','includeajax'
		,form,'?q=konyha/recept_alapanyag/'+id);	
	}
}

function recept_ac1sel(id,name,mertek){
$('#alapanyag_id').val(id);
$('#alapanyag_ac').val(name);
$('#nertekem').text(mertek);
hidediv('ac_recept');
}

function hozzavaloinfo(hvid){
	phpopenf3('service','q=konyha/alapanyag/'+hvid);
}

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

<style>
#ac_recept {
position:absolute;
width:400px;
max-height:400px;
overflow:auto;
background:#FFF;
border:1px #999 solid;	
display:none;
z-index:99;
}
.tblrow {
display:table-row-group;	
}
.tblrow:hover,.tblrow:hover input,.tblrow:hover span {
background:#999;
}

.tblrow span{
display:table-cell;	
}
.cim ,.osszegzes {
	background:#FC9;
}
.cim span,.osszegzes span{
font-weight:bold;
border-bottom:#F90 2px solid !important;	
border-top:#F90 2px solid !important;	
}

#ac_recept table tr:hover,#ac_recept table tr:hover td{
background:#999;	
}

.alapanyagnev{
text-align:left;	
position:relative;
}
</style>

<div id="raceptalapanyag">
<?php
//hozzávaló törlése
if (($_GET["del"]>0)&&($getparams[2]>0)){
	$rec_class->del_receptalapanyag($getparams[2],$_GET["del"]);
}
//hozzávalók mentése a kalkulátorból
if (($_GET["loadcalc"])&&(isset($_SESSION["receptek"][$_GET["loadcalc"]]))){
	if (count($_SESSION["receptek"][$_GET["loadcalc"]])){
		$menteniarray=$_SESSION["receptek"][$_GET["loadcalc"]];
			if (($menteniarray) ){
			foreach($menteniarray as $mysessiondata){
				$mysessiondata["recept_id"]=$getparams[2];
				$rec_class->save_recept_alapanyag($mysessiondata);
			}}
	}
}
//alapanyag hozzáadás,módosítás
if (count($_POST)&&($_POST["alapanyag_id"]>0))
{
$kapott=$_POST;
//arraylist($kapott);
	if ($kapott["mertek"]>1){
		$kapott["menny"]=$kapott["menny"]*$kapott["mertek"];
	}
	$rec_class->save_recept_alapanyag($kapott);
}

$filterreac['recept_id']=$getparams[2];
$alapanyagoklist=$rec_class->get_receptalapanyag($filterreac,$order='',$page='all');
$egyelem=$alapanyagoklist['datas'];
//arraylist($egyelem);
?>
<section class="pagefull" >
<h3><?php echo $lan["alapanyag"]; ?></h3>
<form id="recepthez" method="post">
<input name="alapanyag_ac" id="alapanyag_ac" type="text" onkeyup="recept_ac1();" onclick="showdiv('ac_recept');" autocomplete="off" placeholder="<?php echo $lan["alapanyag"]; ?>" />
<div id="ac_recept" onclick="hidediv('ac_recept');">
</div>
<?php $Form_Class->hiddenbox('recept_id',$getparams[2]); ?>
<?php $Form_Class->hiddenbox('alapanyag_id',$elem["alapanyag_id"]); ?>
<?php $Form_Class->numbox('menny',$elem["menny"],$lan["menny"]); ?>
<?php $Form_Class->selectbox("mertek",$mertekegysegek,array('value'=>'id','name'=>'nev'),$elem['mertek']);?>
<?php $Form_Class->hiddenbox('status',"1"); ?>

<span id="nertekem"></span>
<span onclick="recepthozzavalok_save('recepthez',<?php echo $getparams[2];?>);"  class="btn button  btn-success"><?php echo $lan["add"]; ?></span>
</form>
<div style="display:table;width:100%;">
    <div class="tblrow cim">
        <span><?php echo $lan["nev"]; ?></span>
        <span><?php echo $lan["menny"]; ?></span>
        <span class="energia"><?php echo $lan["energia"]; ?></span>
        <span class="kaloria"><?php echo $lan["kaloria"]; ?></span>
        <span class="szenhidrat"><?php echo $lan["szenhidrat"]; ?></span>
        <span class="feherje"><?php echo $lan["feherje"]; ?></span>
        <span class="zsir"><?php echo $lan["zsir"]; ?></span>
        <span class="rost"><?php echo $lan["rost"]; ?></span>
        <span class="koleszterin"><?php echo $lan["koleszterin"]; ?></span>
    </div>

<?php 
$summa=array();
foreach ($egyelem as $elem){
	$hozzavaloadatai=$rec_class->egy_hozzavalo($elem["alapanyag_id"]);
	?>
<form id="alapa_<?php echo $elem["alapanyag_id"]; ?>" class="tblrow" method="post">
    <span class="alapanyagnev">
	<?php
		if ($_SESSION['lang']=='de'){
		$nevadd='_de';
		if($hozzavaloadatai["nev".$nevadd]=='')$nevadd='';	
	}
	if ($_SESSION['lang']=='en'){
		$nevadd='_en';
		if($hozzavaloadatai["nev".$nevadd]=='')$nevadd='';	
	}	
	
    echo $hozzavaloadatai["nev".$nevadd];
    $Form_Class->hiddenbox('hozzavalo_modosit','1');
	$Form_Class-> hiddenbox('recept_id',$getparams[2]);
    $Form_Class->hiddenbox('alapanyag_id',$elem["alapanyag_id"]); 
    $Form_Class->hiddenbox('status',"1");
	if ($hozzavaloadatai["menny"]>0){ 
    $szorzo=$elem["menny"]/$hozzavaloadatai["menny"];
	}
	else $szorzo=1;
    ?>
<a onclick="phpopenf('raceptalapanyag','includeajax','q=konyha/recept_alapanyag/<?php echo $getparams[2]; ?>&del=<?php echo $hozzavaloadatai["id"]; ?>');" class="button minidel">
del
</a>
<?php if (($auser["id"]>0)&&($auser["jogid"]>2)){ ?>
<a href="?q=konyha/alapanyag_edit/<?php echo encode($elem["alapanyag_id"]);?>" class="button miniedit">szerkeszt</a>
<?php } ?>
<?php if (($hozzavaloadatai["hir_id"]!='')&&($hozzavaloadatai["hir_id"]!='0')){?>
<a onclick="javascript:hozzavaloinfo('<?php echo encode($elem["alapanyag_id"]);?>');" class="button miniinfo"> Adatlap</a>
<?php } ?>    
    </span>
    <span >
    <input name="menny" id="menny_<?php echo $elem["alapanyag_id"];?>" type="number" onKeyUp="numericFilter('menny_<?php echo $elem["alapanyag_id"];?>');" onchange="recepthozzavalok_save('alapa_<?php echo $elem["alapanyag_id"] ?>',<?php echo $getparams[2];?>);" value="<?php echo $elem["menny"]?>" />
 <?php $summa["menny"]+=$elem["menny"]; ?>
<?php echo $hozzavaloadatai["mertekegyseg"]; ?>
<a "#menny_<?php echo $elem["alapanyag_id"];?>" class="button minirefresh"  onclick="recepthozzavalok_save('alapa_<?php echo $elem["alapanyag_id"] ?>','<?php echo $getparams[2];?>');">
Frissit
</a></span>
    <span class="energia"><?php echo $Sys_Class->mround( $hozzavaloadatai["energia"]*$szorzo, 2);$summa["energia"]+=$hozzavaloadatai["energia"]*$szorzo; ?></span>
    <span class="kaloria"><?php echo $Sys_Class->mround( $hozzavaloadatai["kaloria"]*$szorzo, 2);$summa["kaloria"]+=$hozzavaloadatai["kaloria"]*$szorzo; ?></span>
    <span class="szenhidrat"><?php echo $Sys_Class->mround( $hozzavaloadatai["szenhidrat"]*$szorzo, 2);$summa["szenhidrat"]+=$hozzavaloadatai["szenhidrat"]*$szorzo; ?></span>
    <span class="feherje"><?php echo $Sys_Class->mround( $hozzavaloadatai["feherje"]*$szorzo, 2);$summa["feherje"]+=$hozzavaloadatai["feherje"]*$szorzo; ?></span>
    <span class="zsir"><?php echo $Sys_Class->mround( $hozzavaloadatai["zsir"]*$szorzo, 2);$summa["zsir"]+=$hozzavaloadatai["zsir"]*$szorzo; ?></span>
    <span class="rost"><?php echo $Sys_Class->mround( $hozzavaloadatai["rost"]*$szorzo, 2);$summa["rost"]+=$hozzavaloadatai["rost"]*$szorzo; ?></span>
    <span class="koleszterin"><?php echo $Sys_Class->mround( $hozzavaloadatai["koleszterin"]*$szorzo, 2);$summa["koleszterin"]+=$hozzavaloadatai["koleszterin"]*$szorzo; ?></span>
</form>
 <?php }
 if ($summa["menny"]>0){
   $szazalek=100/$summa["menny"];
 } else $szazalek=1;
 ?>
   <div class="tblrow osszegzes">
        <span><?php echo $lan["sum"]; ?>:</span>
        <span style="text-align:right;">~<?php echo $Sys_Class->mround( $summa["menny"], 2);?> g</span>
        <span class="energia"><?php echo $Sys_Class->mround($summa["energia"], 2);?></span>
        <span class="kaloria"><?php echo $Sys_Class->mround($summa["kaloria"], 2);?></span>
        <span class="szenhidrat"><?php echo $Sys_Class->mround($summa["szenhidrat"], 2);?></span>
        <span class="feherje"><?php echo $Sys_Class->mround($summa["feherje"], 2);?></span>
        <span class="zsir"><?php echo $Sys_Class->mround($summa["zsir"], 2);?></span>
        <span class="rost"><?php echo $Sys_Class->mround($summa["rost"], 2);?></span>
        <span class="koleszterin"><?php echo $Sys_Class->mround($summa["koleszterin"], 2);?></span>
    </div>
   <div class="tblrow osszegzes bgcolor1">
        <span>&nbsp;</span>
        <span style="text-align:right;"><?php echo $Sys_Class->mround($summa["menny"]*$szazalek, 2);?> g</span>
        <span class="energia"><?php echo $Sys_Class->mround($summa["energia"]*$szazalek, 2);?></span>
        <span class="kaloria"><?php echo $Sys_Class->mround($summa["kaloria"]*$szazalek, 2);?></span>
        <span class="szenhidrat"><?php echo $Sys_Class->mround($summa["szenhidrat"]*$szazalek, 2);?></span>
        <span class="feherje"><?php echo $Sys_Class->mround($summa["feherje"]*$szazalek, 2);?></span>
        <span class="zsir"><?php echo $Sys_Class->mround($summa["zsir"]*$szazalek, 2);?></span>
        <span class="rost"><?php echo $Sys_Class->mround($summa["rost"]*$szazalek, 2);?></span>
        <span class="koleszterin"><?php echo $Sys_Class->mround($summa["koleszterin"]*$szazalek, 2);?></span>
    </div>       
    
    
 </div>
<?php
if (!count($egyelem)&&(isset($_SESSION["receptek"]["mycalc"]))){
	?>
   <a onclick="phpopenf('raceptalapanyag','includeajax','q=konyha/recept_alapanyag/<?php echo $getparams[2]; ?>&loadcalc=mycalc');" class="btn button btn-success"><?php echo $lan["kalkulatorload"]; ?></a>
    <?php
}
?><?php
$updtrecords=" energia='".$Sys_Class->mround($summa["energia"]*$szazalek, 2)."',";
$updtrecords.=" kaloria='".$Sys_Class->mround($summa["kaloria"]*$szazalek, 2)."',";
$updtrecords.=" szenhidrat='".$Sys_Class->mround($summa["szenhidrat"]*$szazalek, 2)."',";
$updtrecords.=" feherje='".$Sys_Class->mround($summa["feherje"]*$szazalek, 2)."',";
$updtrecords.=" zsir='".$Sys_Class->mround($summa["zsir"]*$szazalek, 2)."',";
$updtrecords.=" rost='".$Sys_Class->mround($summa["rost"]*$szazalek, 2)."',";
$updtrecords.=" koleszterin='".$Sys_Class->mround($summa["koleszterin"]*$szazalek, 2)."'";


$updateq="UPDATE  ".$tbl["recept"]." SET  ".$updtrecords." WHERE  `id` =".$getparams[2]."  LIMIT 1";
		db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
 
 ?>

</section>

<div class="clear" ></div>
</div>