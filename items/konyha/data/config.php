<?php


/* Adatbázis */
$tblmodul='alapanyag';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."alapanyag3";
$tblmodul='alapanyag_csoport';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."alapanyag_csoport";
$tblmodul='alapanyag_bolt';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."alapanyag_bolt";

$tblmodul='recept';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."recept";
$tblmodul='recept_alapanyag';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."recept_alapanyag";
$tblmodul='recept_fbpost';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."recept_fbpost";



/* Menühöz felépítés */
$file_structuct=array();
$file_structuct["modules"]="konyha";

$file_structuct["name"]="Konyha admin";
$file_structuct["file"]="konyha_admin";
$adminmenu[]=$file_structuct;

/*
$file_structuct["name"]="Egy alapanyag";
$file_structuct["file"]="alapanyag";
$modules[]=$file_structuct;
*/
$file_structuct["name"]="Alapanyagok";
$file_structuct["file"]="alapanyag_list";
$modules[]=$file_structuct;

$file_structuct["name"]="Receptek";
$file_structuct["file"]="list";
$modules[]=$file_structuct;

$file_structuct["name"]="Egy recept";
$file_structuct["file"]="recept";
$modules[]=$file_structuct;


$file_structuct["name"]="Kalkulátor (kell item-et megadni!)";
$file_structuct["file"]="calc";
$modules[]=$file_structuct;



//menu config
$file_structuct["name"]="Saját receptek";
$file_structuct["file"]="list/user";
$file_structuct["id"]="";
$file_structuct["param"]=$separator2."user=".$_SESSION["uid"];
$usermenu[]=$file_structuct;

include('recept.class.php');
$rec_class=new recept();


/* beégetett változók/listák */

$sorrendarray=array();
for ($i = 1; $i <= 20; $i++) {
	$sorrendarray[$i]["id"]=$i;
	$sorrendarray[$i]["nev"]=$i;	
}


$boltok=array();
$i=1;
	$boltok[$i]["id"]=$i;
	$boltok[$i]["nev"]="DiétAbc";
	$boltok[$i]["logo"]="http://dietabc.hu/wp-content/themes/dietabc/images/dietabc-logo.png";
$i=0;
	$boltok[$i]["id"]=$i;
	$boltok[$i]["nev"]="Egyéb";
	$boltok[$i]["logo"]=$defaultimg;


$nehezseg=array();
$i=1;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]="Könnyű";
$i=2;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]="Haladó";
$i=3;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]="Háziasszony";	
$i=4;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]="Nehéz";	
$i=5;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]="Mester szakács";	
	
	
$elkeszees_ido=array();
$i=1;
	$elkeszees_ido[$i]["id"]="10";
	$elkeszees_ido[$i]["nev"]="10 Perc";
$i++;	
	$elkeszees_ido[$i]["id"]="15";
	$elkeszees_ido[$i]["nev"]="Negyedóra";
$i++;	
	$elkeszees_ido[$i]["id"]="20";
	$elkeszees_ido[$i]["nev"]="20 Perc";	
$i++;
	$elkeszees_ido[$i]["id"]="30";
	$elkeszees_ido[$i]["nev"]="Félóra";
$i++;	
	$elkeszees_ido[$i]["id"]="45";
	$elkeszees_ido[$i]["nev"]="Háromnegyedóra";			
$i++;
	$elkeszees_ido[$i]["id"]="60";
	$elkeszees_ido[$i]["nev"]="Óra";		
$i++;
	$elkeszees_ido[$i]["id"]="90";
	$elkeszees_ido[$i]["nev"]="Másfélóra";	
$i++;
	$elkeszees_ido[$i]["id"]="120";
	$elkeszees_ido[$i]["nev"]="2 Óra";			
$i++;
	$elkeszees_ido[$i]["id"]="180";
	$elkeszees_ido[$i]["nev"]="2.5 Óra";
$i++;
	$elkeszees_ido[$i]["id"]="240";
	$elkeszees_ido[$i]["nev"]="4 Óra";	
$i++;
	$elkeszees_ido[$i]["id"]="300";
	$elkeszees_ido[$i]["nev"]="5 Óra";
$i++;
	$elkeszees_ido[$i]["id"]="600";
	$elkeszees_ido[$i]["nev"]="10 Óra";
	
$mertekegysegek=array();
$i=1;
	$mertekegysegek[$i]["id"]=1;
	$mertekegysegek[$i]["nev"]="g/ml";
$i=2;
	$mertekegysegek[$i]["id"]=10;
	$mertekegysegek[$i]["nev"]="dkg/cl";
$i=3;
	$mertekegysegek[$i]["id"]=100;
	$mertekegysegek[$i]["nev"]="dkg/dl";
$i=4;
	$mertekegysegek[$i]["id"]=1000;
	$mertekegysegek[$i]["nev"]="kg/l";	
$i=5;
	$mertekegysegek[$i]["id"]=0.3;
	$mertekegysegek[$i]["nev"]="késhegy";	
$i=6;
	$mertekegysegek[$i]["id"]=3;
	$mertekegysegek[$i]["nev"]="kiskanál";	
$i=7;
	$mertekegysegek[$i]["id"]=8;
	$mertekegysegek[$i]["nev"]="evőkanál";	
$i=8;
	$mertekegysegek[$i]["id"]=20;
	$mertekegysegek[$i]["nev"]="pohár";	
$i=9;
	$mertekegysegek[$i]["id"]=25;
	$mertekegysegek[$i]["nev"]="bögre";						

/*
for ($i = 1; $i <= 10; $i++) {
	$elkeszees_ido[$i]["id"]=$i;
	$elkeszees_ido[$i]["nev"]=$i;	
}
*/

function find_boltok_array($id)
{
global $boltok;
$retvalue=array();
foreach ($boltok as $bolt){
	if ($bolt["id"]==$id){
		$retvalue=$bolt;
	}
}
return $retvalue;
}

/* adatstruktúrák */
/*
function recept_alapanyag_form($ertek=array()){
			global $menupontselectbox,$status,$sorrendarray;

		$elem=array();
		$elem["name"]="recept_id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="recept_id";	
		//$elem["tipe"]="hidden";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="alapanyag_id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="alapanyag_id";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;		

		$elem=array();
		$elem["name"]="menny";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="menny";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;		

		$elem=array();
		$elem["name"]="status";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="status";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$status;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectboxa";		
		$formelements[]=$elem;		

return $formelements;
		
}
*/
/*
function recept_text_form($ertek=array()){
		global $menupontselectbox,$status,$sorrendarray,$auser,$elkeszees_ido,$nehezseg ;
		$menupontselectbox=menupontselectbox(69,$onearray,'','','');
		$elem=array();
		$elem["name"]="id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="id";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="mid";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Kategória";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$menupontselectbox;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectboxa";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="nev";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Név";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
		
		
		
		$elem=array();
		$elem["name"]="bevezeto";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Bevezeto";	
		$elem["tipe"]="textaera";		
		$formelements[]=$elem;		


		$elem=array();
		$elem["name"]="leiras";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Leirás";	
		$elem["tipe"]="long_text";		
		$formelements[]=$elem;	
		
		$elem=array();
		$elem["name"]="adag";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="adag";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="nehezseg";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="nehézség";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$nehezseg;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectbox_roll";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="elkeszites_ido";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="elkeszitesi idő";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$elkeszees_ido;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectbox_roll";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="status";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="status";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$status;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectbox_roll";		
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="sorrend";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="sorrend";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$sorrendarray;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="hidden";	
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="uid";	
		if ($ertek[$elem["name"]]<1)
		{
			$ertek[$elem["name"]]=$auser["id"];
		}
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="sorrend";	
		$elem["tipe"]="hidden";	
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="diab";	
		$elem["value"]=$ertek[$elem["name"]];	
		$elem["title"]="diab";	
		$elem["tipe"]="checkbox";	
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="gluten";	
		$elem["value"]=$ertek[$elem["name"]];	
		$elem["title"]="gluten";	
		$elem["tipe"]="checkbox";	
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="lactose";	
		$elem["value"]=$ertek[$elem["name"]];	
		$elem["title"]="lactose";	
		$elem["tipe"]="checkbox";	
		$formelements[]=$elem;	
	*/	
	/*	
		$elem=array();
		$elem["name"]="energia";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="E";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="kaloria";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="K";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="szenhidrat";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Ch";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="feherje";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="feherje";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="zsir";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="zsir";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="rost";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="rost";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="koleszterin";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="koleszterin";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;*/
/*return $formelements;
		
}
*/

function alapanyag_keres_form($ertek=array()){
		$elem=array();
		$elem["name"]="id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="id";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;
/*		
		$elem=array();
		$elem["name"]="mid";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="csoport";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]="alapanyag_csoport";		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectbox";		
		$formelements[]=$elem;
*/	
		$elem=array();
		$elem["name"]="nev";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Név";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
/*		
		$elem=array();
		$elem["name"]="energia";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="E";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="kaloria";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="K";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="szenhidrat";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Ch";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="feherje";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="feherje";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="zsir";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="zsir";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="rost";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="rost";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="koleszterin";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="koleszterin";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		*/					
return $formelements;
		
}




function alapanyag_editform_form($ertek=array()){
		global $status,$sorrendarray;

		$elem=array();
		$elem["name"]="id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="id";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="mid";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="csoport";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]="alapanyag_csoport";		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectbox";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="menny";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="menny.";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="mertekegyseg";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="mértéke.";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="nev";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="nev";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="energia";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="E";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="kaloria";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="K";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="szenhidrat";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Ch";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="feherje";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="feherje";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="zsir";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="zsir";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="rost";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="rost";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		$elem=array();
		$elem["name"]="koleszterin";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="koleszterin";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;
		
		$elem["name"]="hir_id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="leiras";	
		$elem["tipe"]="long_text";		
		$formelements[]=$elem;		


		$elem=array();
		$elem["name"]="status";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="status";	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$status;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectboxa";		
		$formelements[]=$elem;
				
return $formelements;
}


function alapanyag_csop_struckt($ertek=array()){
		$elem=array();
		$elem["name"]="id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="id";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="nev";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="nev";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
return $formelements;
}


?>