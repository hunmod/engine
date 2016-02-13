<?php
$KAPOTTID=decode($getparams[2]);

$acsopq=$Sys_Class->get_list('alapanyag_csoport',array('status=2'));

///1 kJ = 0.24 kcal

/* kapott adat feldolgozása*/
if ((count($_POST))&&($_POST["nev"]!=""))
{
 if ($_POST["energia"]>$_POST["kaloria"]){
	// $_POST["nev"]=(strtolower($_POST["nev"]));
$_POST["kaloria"]=$_POST["energia"]*0.23;
 }
 else{
	 $_POST["energia"]=$_POST["kaloria"]/0.23;
 }
 
	
	$kapott=$_POST;
	
/*	
	$kapott=alapanyag_editform_form($_POST);	
	$back=gen_form_save($kapott,"alapanyag",$_POST);
	
*/	
	if ($back["id"]>0){
	$KAPOTTID=$back["id"];
?>
<script language="javascript" type="text/javascript">
   // redirect('<?php echo $kezdooldal.$separator.$getparams[0]."/".$getparams[1]."/".$getparams[2];?>');
    </script>
<?php 
}
}

/* kapott adat feldolgozása*/


/* Bolt hozzáadása*/
if ((count($_POST))&&($_POST["orig_id"]!=""))
{
	if (($_POST["link"]=="")&&($_POST["orig_id"]!=""))
	{
		$_POST["link"]="http://webaruhaz.dietabc.hu/?modul=applPGeri&tab=products&prodID=".$_POST["orig_id"];
	}
$qbolt="INSERT INTO ".$tbl['alapanyag_bolt']." (`id`, `bolt`, `link`, `alap_id`, `orig_id`, `status`) 
VALUES (NULL, '".$_POST["bolt"]."', '".$_POST["link"]."', '".$_POST["alap_id"]."', '".$_POST["orig_id"]."', '".$_POST["status"]."');";
db_Query($qbolt, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
echo $qbolt;
}
/* Bolt hozzáadása*/
if ($KAPOTTID>0){
$wherebesz=" WHERE alap_id=".$KAPOTTID;
$qbeszerzes="
SELECT * FROM  ".$tbl['alapanyag_bolt']." ".$wherebesz."";
$beszerzes=db_Query($qbeszerzes, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
}



/* lekérdezés*/
$qlekerdez="
SELECT * 
FROM  ".$tbl['alapanyag']." WHERE id=".$KAPOTTID."
";
$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$dbadat=$egyelem[0];
/* lekérdezés*/


$formelements=alapanyag_editform_form($dbadat);
//arraylist($formelements);


$typ["value"]="id";
$typ["name"]="nev";
$elem["typ"];


?>

<form id="edit_form" method="post">
  <?php
//arraylist($egyelem[0]);
//preg_match('@^(?:http://)?([^/]+)@i',"http://www.php.net/index.html", $matches);

	/*$pattern = '/(?P<name>\w+): (.*)kJ/';
	$matches=array();
	preg_match($pattern, str_replace(",", ".", $formelements[12]["value"]), $matches);
	$energiaval=$matches["digit"];*/
	$matches=array();
	$mytext=str_replace(",", ".", ($formelements[12]["value"]));
	$mytext=str_replace($Text_Class->htmltochars("Fehérje"), "feherje", $mytext);
	$mytext=str_replace($Text_Class->htmltochars("Szénhidrát"), "Szenhidrat", $mytext);
	$mytext=str_replace($Text_Class->htmltochars("Zsír"), "zsir", $mytext);
	
	//echo $mytext;


	$pattern = "/Energia:(.*)kJ/";
	preg_match_all($pattern, $mytext, $matches);	
		if ($matches[1][0]>0){
		$energiaval=$matches[1][0];
		$formelements[5]["value"]=str_replace(" ", "", $energiaval);
		}

	$pattern = "/feherje:(.*)g/";
	preg_match_all($pattern, $mytext, $matches);	
		if ($matches[1][0]>0){
		$feherjeval=$matches[1][0];
		$formelements[8]["value"]=str_replace(" ", "",$feherjeval);

		}
		
	$pattern = "/Szenhidrat:(.*)g/";
	preg_match_all($pattern, $mytext, $matches);	
		if ($matches[1][0]>0){
		$Szenhidratval=$matches[1][0];
		$formelements[7]["value"]=str_replace(" ", "",$Szenhidratval);
		}		
	$pattern = "/zsir:(.*)g/";
	preg_match_all($pattern, $mytext, $matches);	
		if ($matches[1][0]>0){
		$zsirval=$matches[1][0];
		$formelements[9]["value"]=str_replace(" ", "",$zsirval);
		}	
	$pattern = "/Rost:(.*)g/";
	preg_match_all($pattern, $mytext, $matches);	
		//arraylist($matches);
		if ($matches[1][0]>0){
		$Rostval=$matches[1][0];
		$formelements[10]["value"]=str_replace(" ", "",$Rostval);
		}	
	$pattern = "/rost:(.*)g/";
	preg_match_all($pattern, $mytext, $matches);	
		//arraylist($matches);
		if ($matches[1][0]>0){
		$Rostval=$matches[1][0];
		$formelements[10]["value"]=str_replace(" ", "",$Rostval);
		}			

	$pattern = "/Koleszterin:(.*)g/";
	preg_match_all($pattern, $mytext, $matches);	
		//arraylist($matches);
		if ($matches[1][0]>0){
		$kolval=$matches[1][0];
		$formelements[11]["value"]=str_replace(" ", "",$kolval);
		}	
		
	/*	
echo "<br>energia=".$energiaval;
echo "<br>feherje=".$feherjeval;
echo "<br>Szénhidrát=".$Szenhidratval;
echo "<br>zsir=".$zsirval;
echo "<br>Rostval=".$Rostval;
*/
  $host = $matches[1];
//arraylist($formelements);
foreach ($formelements as $felem){
	//formelement_of_tipe($felem);
//	echo "<br>";
}
?>

<?php 	$Form_Class->hiddenbox('id',$dbadat['id']); ?>
<?php
?>
<?php $Form_Class->selectbox("mid",$acsopq,array('value'=>'id','name'=>'name'),$dbadat['mid'],"Alapanyagcsoport");?> 
<?php $Form_Class->textbox('nev',$dbadat['nev'],"nev",null,null);?>  
   <?php $Form_Class->numbox('menny',$dbadat["menny"],'mennyiség'); ?>
<?php $Form_Class->textbox('mertekegyseg',$dbadat["mertekegyseg"],'Mértekegyseg'); ?>
<?php $Form_Class->textbox('energia',$dbadat['energia'],"energia",null,null);?> 
<?php $Form_Class->textbox('kaloria',$dbadat['kaloria'],"kaloria",null,null);?> 
<?php $Form_Class->textbox('szenhidrat',$dbadat['szenhidrat'],"szenhidrat",null,null);?> 
<?php $Form_Class->textbox('feherje',$dbadat['feherje'],"feherje",null,null);?> 
<?php $Form_Class->textbox('zsir',$dbadat['zsir'],"zsir",null,null);?>  

<?php $Form_Class->textbox('rost',$dbadat['rost'],"rost",null,null);?>  
<?php $Form_Class->textbox('koleszterin',$dbadat['koleszterin'],"koleszterin",null,null);?>  
<?php $Form_Class->numbox('oid',$dbadat['oid'],"originalid");?>  
<?php $Form_Class->textbox('source',$dbadat['source'],"source",null,null);?>  

	<?php $Form_Class->kcebox('hir_id',$dbadat['hir_id'],"hir_id","minimal");?> 
	<?php $Form_Class->textbox('uid',$dbadat['uid'],"uid");?>  

  <input name="smbt" type="submit" value="Ment" />
</form>
<h1>Képek</h1>
<?php
if ($KAPOTTID>0) {
	$userpuffer=$auser["jogid"];
	$auser["jogid"]=3;
	//if ($adat["id"]>0){
	//$KAPOTTID=decode($KAPOTTID);

include_once("./items/files/web/list.php");
	$auser["jogid"]=$userpuffer ;
	$KAPOTTID=($KAPOTTID);	
//}
 ?>
<h1>Boltok</h1>
<form action="" method="post">
  <?php $Form_Class->selectbox("bolt",$boltok,$typ,"1") ?>
  <?php $Form_Class-> hiddenbox("alap_id",$KAPOTTID) ?>
  <?php $Form_Class->hiddenbox("status","1") ?>
  URL:
  <?php $Form_Class->textbox("link","") ?>
  Saját azonosító
  <?php $Form_Class->textbox("orig_id","") ?>
  <input name="" type="submit" value="hozzáad" />
</form>
<?php 
foreach ($beszerzes as $egy){
?>
<?php echo $egy["id"];?>,bolt<?php echo $egy["bolt"];?>,link<?php echo $egy["link"];?>,alap_id<?php echo $egy["alap_id"];?>,orig_id<?php echo $egy["orig_id"];?>,status<?php echo $egy["status"];?><br />
<?php
}
?>
<?php }?>
