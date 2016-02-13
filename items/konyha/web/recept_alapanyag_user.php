<div id="raceptalapanyag">
<script language="javascript" type="text/javascript">
function recept_ac1(){
	showdiv('ac_recept');
	postform('ac_recept','service'
	,"recepthez",'?q=konyha/hozzavalo_ac');
}
function recepthozzavalok_save(form,id)
{ 
	if (($('#menny').val()>0 && form=='recepthez')||form!='recepthez'){
		postform('raceptalapanyag','service'
		,form,'?q=konyha/recept_alapanyag_user/'+id);	
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
max-width:600px;
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
background:#CCC;
}

.tblrow span{
display:table-cell;	
}

.cim span,.osszegzes span{
font-weight:bold;
border-bottom:#F90 2px solid !important;	
border-top:#F90 2px solid !important;	
}

#ac_recept table tr:hover,#ac_recept table tr:hover td{
background:#ccc;	
}
</style>

<?php
if (($_POST["summa_g"]>0)&&($getparams[2]>0)){
	$_SESSION["recepteksulya"][$getparams[2]]=$_POST["summa_g"];	
}

if (($_GET["del"]>0)&&($getparams[2]>0)){
	$rid=$getparams[2];
	$id=$_GET["del"];
	$ideglenes=$_SESSION["receptek"][$getparams[2]];
	for ($c=0;$c<=count($ideglenes);$c++){
		if (($ideglenes[$c]["recept_id"]==$rid)&&($ideglenes[$c]["alapanyag_id"]==$id))	
		{
		$_SESSION["receptek"][$getparams[2]][$c]["menny"]=0;
		unset($_SESSION["recepteksulya"][$getparams[2]]);
		}
	}
}

if (($_GET["loadcalc"])){
		$_SESSION["receptek"][$getparams[2]]=$_SESSION["receptek"][$_GET["loadcalc"]];
	}



	if (count($_POST)&&($_POST["alapanyag_id"]>0))
	{
	unset($_SESSION["recepteksulya"][$getparams[2]]);

	$kapott=$_POST;
	$_POST["menny"]=$_POST["menny"]*$_POST["mertek"];
		if ($kapott["hozzavalo_modosit"]==1)
		{
			//echo $updateq;	
			$ideglenes=$_SESSION["receptek"][$getparams[2]];
			for ($c=0;$c<=count($ideglenes);$c++){
				if (($ideglenes[$c]["recept_id"]==$kapott["recept_id"])&&($ideglenes[$c]["alapanyag_id"]==$kapott["alapanyag_id"]))	
				$_SESSION["receptek"][$getparams[2]][$c]["menny"]=$kapott["menny"]	;
				
			}
		}
		else
		{
			//hozzáadás
			$_SESSION["receptek"][$getparams[2]][]=$_POST;
		}
	}

$ideglenes=array();
if (isset($_SESSION["receptek"][$getparams[2]][0])){

	foreach ($_SESSION["receptek"][$getparams[2]] as $elemx){
		if ($elemx["menny"]>0){
			$ideglenes[]=$elemx;
		}
	}
	$_SESSION["receptek"][$getparams[2]]=$ideglenes;
}

if (isset($_GET["reset"])){
	unset($_SESSION["recepteksulya"][$getparams[2]]);
	unset($_SESSION["receptek"][$getparams[2]]);
}
	//$recept_alapanyag_adat["recept_id"]=$getparams[2];
	//$formelements2=recept_alapanyag_form($recept_alapanyag_adat);
	
	if (!isset($_SESSION["receptek"][$getparams[2]]))
	{
		$qlekerdez="
		SELECT * 
		FROM  ".$tbl['recept_alapanyag']." WHERE recept_id=".$getparams[2]."
		";
		$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
		$_SESSION["receptek"][$getparams[2]]=$egyelem;
	}
//arraylist($_SESSION["receptek"]);
?>
<section>
<h3 class="bgcolor4"><?php echo $lan["alapanyag"]; ?></h3>
<form id="recepthez" method="post">
<?php echo $lan["alapanyag"]; ?>:<input name="alapanyag_ac" id="alapanyag_ac" type="text" onkeyup="recept_ac1();" onclick="showdiv('ac_recept');" />
<div id="ac_recept" onclick="hidediv('ac_recept');">
</div>
<?php $Form_Class->hiddenbox('recept_id',$getparams[2]); ?>
<?php $Form_Class->hiddenbox('alapanyag_id',$elem["alapanyag_id"]); ?>
<?php echo $lan["menny"]; ?>:<?php $Form_Class->numbox('menny',$elem["menny"]); ?>
<?php $Form_Class->selectbox("mertek",$mertekegysegek,array('value'=>'id','name'=>'nev'),$elem['mertek'],' ');?>
<?php $Form_Class->hiddenbox('status',"1"); ?>

<span id="nertekem"></span>
<span onclick="recepthozzavalok_save('recepthez','<?php echo $getparams[2];?>');" class="button btn btn-success" style="cursor:pointer;"><?php echo $lan["add"]; ?></span>
</form>
<div class="recipeingrdient" itemprop="nutrition"
    itemscope itemtype="http://schema.org/NutritionInformation">
    <div class="tblrow cim bgcolor1">
        <span itemprop="name"><?php echo $lan["nev"]; ?></span>
        <span itemprop="servingSize" ><?php echo $lan["menny"]; ?></span>
        <span class="energia"><?php echo $lan["energia"]; ?></span>
        <span class="kaloria"  itemprop="calories"><?php echo $lan["kaloria"]; ?></span>
        <span class="szenhidrat"  itemprop="carbohydrateContent"><?php echo $lan["szenhidrat"]; ?></span>
        <span class="feherje" itemprop="proteinContent"><?php echo $lan["feherje"]; ?></span>
        <span class="zsir" itemprop="fatContent"><?php echo $lan["zsir"]; ?></span>
        <span class="rost" itemprop="fiberContent"><?php echo $lan["rost"]; ?></span>
        <span class="koleszterin" itemprop="cholesterolContent"><?php echo $lan["koleszterin"]; ?></span>
    </div>

<?php 
$summa=array();
if (isset($_SESSION["receptek"][$getparams[2]][0])){
foreach ($_SESSION["receptek"][$getparams[2]] as $elem){
	$hozzavaloadatai=$rec_class->egy_hozzavalo($elem["alapanyag_id"]);
	?>
    <form id="alapa_<?php echo $elem["alapanyag_id"]; ?>" class="tblrow bgcolor0" method="post">
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
    $Form_Class->hiddenbox('recept_id',$getparams[2]);
    $Form_Class->hiddenbox('alapanyag_id',$elem["alapanyag_id"]); 
    $Form_Class->hiddenbox('status',"1"); 
	if ($hozzavaloadatai["menny"]<1){$hozzavaloadatai["menny"]=1;}
    $szorzo=$elem["menny"]/$hozzavaloadatai["menny"];
    ?>
	<?php if (($auser["id"]>0)&&($auser["jogid"]>2)){ ?>
		<a href="<?php echo $homeurl.$separator;?>konyha/alapanyag_edit/<?php echo encode($elem["alapanyag_id"]);?>" class="button miniedit" ><?php echo $lan["edit"]; ?></a>
    <?php } ?>    
    <?php if (($hozzavaloadatai["hir_id"]!='')&&($hozzavaloadatai["hir_id"]!='0')){?>
    	<a onclick="hozzavaloinfo('<?php echo encode($elem["alapanyag_id"]);?>');" class="button miniinfo" > <?php echo $lan["adatlap"]; ?></a>
    <?php } ?> 
    
    </span>
    <span>
    <input name="menny" id="menny_<?php echo $elem["alapanyag_id"];?>" type="number" onKeyUp="numericFilter('menny_<?php echo $elem["alapanyag_id"];?>');" onchange="recepthozzavalok_save('alapa_<?php echo $elem["alapanyag_id"] ?>','<?php echo $getparams[2];?>');" value="<?php echo $elem["menny"]?>" />
 <?php $summa["menny"]+=$elem["menny"]; ?>
 <?php echo $hozzavaloadatai["mertekegyseg"]; ?>
 <a "#menny_<?php echo $elem["alapanyag_id"];?>" class="button minirefresh"  onclick="recepthozzavalok_save('alapa_<?php echo $elem["alapanyag_id"] ?>','<?php echo $getparams[2];?>');">
<?php echo $lan["refresh"]; ?>
</a>
 </span>
    <span class="energia" ><?php echo $Sys_Class->mround( $hozzavaloadatai["energia"]*$szorzo, 2);$summa["energia"]+=$hozzavaloadatai["energia"]*$szorzo; ?></span>
    <span class="kaloria" ><?php echo $Sys_Class->mround( $hozzavaloadatai["kaloria"]*$szorzo, 2);$summa["kaloria"]+=$hozzavaloadatai["kaloria"]*$szorzo; ?></span>
    <span class="szenhidrat" ><?php echo $Sys_Class->mround( $hozzavaloadatai["szenhidrat"]*$szorzo, 2);$summa["szenhidrat"]+=$hozzavaloadatai["szenhidrat"]*$szorzo; ?></span>
    <span class="feherje" ><?php echo $Sys_Class->mround( $hozzavaloadatai["feherje"]*$szorzo, 2);$summa["feherje"]+=$hozzavaloadatai["feherje"]*$szorzo; ?></span>
    <span class="zsir" ><?php echo $Sys_Class->mround( $hozzavaloadatai["zsir"]*$szorzo, 2);$summa["zsir"]+=$hozzavaloadatai["zsir"]*$szorzo; ?></span>
    <span class="rost" ><?php echo $Sys_Class->mround( $hozzavaloadatai["rost"]*$szorzo, 2);$summa["rost"]+=$hozzavaloadatai["rost"]*$szorzo; ?></span>
    <span class="koleszterin" ><?php echo $Sys_Class->mround( $hozzavaloadatai["koleszterin"]*$szorzo, 2);$summa["koleszterin"]+=$hozzavaloadatai["koleszterin"]*$szorzo; ?></span>


    </form>
 <?php } 
}
 ?>
 
    <?php
   
   if ($_SESSION["recepteksulya"][$getparams[2]]>0){
	   $summa["menny"]=$_SESSION["recepteksulya"][$getparams[2]];
	   }
if ($summa["menny"]>0){
   $szazalek=100/$summa["menny"];
   }
   else $summa["menny"]=1;
   
   ?>
 <span itemprop="recipeYield" style="display:none"><?php echo $summa["menny"];?>g</span>
   <div class="tblrow osszegzes bgcolor1">
        <span><?php echo $lan["sum"]; ?>:</span>
        <span >
        <form id="summaz" method="post">
        <input name="summa_g" id="summa_g" type="number" onkeyup="numericFilter('summa_g');" onchange="recepthozzavalok_save('summaz','<?php echo $getparams[2];?>');" value="<?php echo $summa["menny"];?>"> g
                <span id="nertekem"></span> 

        </form></span>
        <span class="energia" ><?php echo $Sys_Class->mround($summa["energia"], 2);?></span>
        <span class="kaloria" ><?php echo $Sys_Class->mround($summa["kaloria"], 2);?></span>
        <span class="szenhidrat" ><?php echo $Sys_Class->mround($summa["szenhidrat"], 2);?></span>
        <span class="feherje" ><?php echo $Sys_Class->mround($summa["feherje"], 2);?></span>
        <span class="zsir" ><?php echo $Sys_Class->mround($summa["zsir"], 2);?></span>
        <span class="rost" ><?php echo $Sys_Class->mround($summa["rost"], 2);?></span>
        <span class="koleszterin" ><?php echo $Sys_Class->mround($summa["koleszterin"], 2);?></span>
    </div>
   <div class="tblrow osszegzes bgcolor1" itemprop="nutrition"
    itemscope itemtype="http://schema.org/NutritionInformation" >

        <span>&nbsp;</span>
        <span style="text-align:right;" itemprop="servingSize"><?php echo $Sys_Class->mround($summa["menny"]*$szazalek, 2);?> g</span>
        <span class="energia" itemprop="calories"><?php echo $Sys_Class->mround($summa["energia"]*$szazalek, 2);?></span>
        <span class="kaloria" itemprop=""><?php echo $Sys_Class->mround($summa["kaloria"]*$szazalek, 2);?></span>
        <span class="szenhidrat" itemprop="carbohydrateContent"><?php echo $Sys_Class->mround($summa["szenhidrat"]*$szazalek, 2);?></span>
		<span class="feherje" itemprop="proteinContent"><?php echo $Sys_Class->mround($summa["feherje"]*$szazalek, 2);?></span>
        <span class="zsir" itemprop="fatContent"><?php echo $Sys_Class->mround($summa["zsir"]*$szazalek, 2);?></span>
        <span class="rost" itemprop="fiberContent"><?php echo $Sys_Class->mround($summa["rost"]*$szazalek, 2);?></span>
        <span class="koleszterin" itemprop="cholesterolContent"><?php echo $Sys_Class->mround($summa["koleszterin"]*$szazalek, 2);?></span>
    </div> 
 </div>
 <?php
/*$updtrecords=" energia='".$summa["energia"]."',";
$updtrecords.=" kaloria='".$summa["kaloria"]."',";
$updtrecords.=" szenhidrat='".$summa["szenhidrat"]."',";
$updtrecords.=" feherje='".$summa["feherje"]."',";
$updtrecords.=" zsir='".$summa["zsir"]."',";
$updtrecords.=" rost='".$summa["rost"]."',";
$updtrecords.=" koleszterin='".$summa["koleszterin"]."'";


$updateq="UPDATE  ".$tbl["recept"]." SET  ".$updtrecords." WHERE  `id` =".$getparams[2]."  LIMIT 1";
		db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");*/
 
 ?>
</section>
<div class="clear"></div>
<div style="float:left;display:block;">
<span onclick="phpopenf('raceptalapanyag','includeajax','q=konyha/recept_alapanyag_user/<?php echo $getparams[2]; ?>&reset=<?php echo $hozzavaloadatai["id"]; ?>');" class="btn button resetbtn btn-success">
<?php echo $lan["reset"]; ?>
</span>

<?php
 if ($auser["id"]>0){ ?>
<?php  if (isset($_SESSION["receptek"][$getparams[2]])){ ?>
<a href="<?php echo $homeurl.$separator.$getparams[0]."/edit?loadcalc=".$getparams[2];?>" class="btn button newrecbtn btn-success"> <?php echo $lan["new"]; ?> <?php echo $lan["recipe"]; ?></a>
<?php }?><?php }
else
{
?>
    <span class="btn button btn-success" onclick="login();"><?php echo $lan["login"]; ?></span> 
<?php
}
?>
  </div>  </div>

<div class="clear"></div>
