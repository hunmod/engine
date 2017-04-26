<?php



$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/ads/web/widget_side1.php";
$widgets[]="items/konyha/web/widget_submenu.php";
/*
$widgets[]="./items/fnct/web/widget_qr.php";
*/

/* https://support.google.com/webmasters/answer/173379  REcept formátumok
http://www.google.com/webmasters/tools/richsnippets?q=http%3A%2F%2Fabrakahasba.hu teszt
*/

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];
/* lekérdezés*/
/*$qlekerdez="
SELECT * 
FROM  ".$tbl['recept']." WHERE id=".$getparams[2]."
";
$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");*/
$filters["id"]=$getparams[2];
$egyelem=$rec_class->get($filters,$order='',$page='all');
$recept_data=$egyelem['datas'][0];
if(count($recept_data))foreach ($recept_data as $megegyname=>$megegy)
{
	$recept_data[$megegyname]=$Text_Class->htmlfromchars($megegy);
}	
$recept_data["image"]=$rec_class->recipe_img($filters["id"],400,300);

$recept_owner=$User_Class->get_userid($recept_data["uid"]);
$recept_owner['img']=$User_Class->profielimg2($recept_owner,50,50);

$page_keywords="recept";
$page_description="#recept ";

		if ($recept_data["gluten"]){
			$page_keywords.=",Gluténmentes";
			$page_description.="#Gluténmentes ";
			}
		if ($recept_data["diab"]){
			$page_keywords.=",Cukormentes";
			$page_description.="#Cukormentes ";
			}
		if ($recept_data["lactose"]){
			$page_keywords.=",Laktózmentes";
			$page_description.="#Laktózmentes ";
			}



$page_ogimage=$rec_class->recipe_img($filters["id"],600,300);
$page_keywords.=$Text_Class->tageketcsupaszit($recept_data["nev"]).",".$Text_Class->tageketcsupaszit($recept_data["bevezeto"]);

$pagetitle.="".$Text_Class->htmltochars($recept_data["nev"])." recept";
//$pagekeywords.=$Text_Class->htmltochars($recept_data["leiras"]);
$page_description.=$pagedescription=$Text_Class->levag($Text_Class->tageketcsupaszit($recept_data["bevezeto"]),350);




/* lekérdezés*/
/*
$formelements=recept_text_form($dbadat);

$typ["value"]="id";
$typ["name"]="nev";
$recept_data["typ"];


$qfbpost="SELECT * FROM  ".$tbl['recept_fbpost']." WHERE id=".$getparams[2]."";
$fbposts=db_Query($qfbpost, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$fbpost=$fbposts[0]["post"];

$pagekeywords=""; 

*/



//arraylist($recept_owner);
//echo $pagekeywords;

?>
