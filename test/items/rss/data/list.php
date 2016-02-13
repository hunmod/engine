<?php 
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/ads/web/widget_side1.php";       


include_once "class.AbsRssReader20.php";
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$dfilters=array();
$dfilters["maxegyoldalon"]=20;
$dfilters["mid"]=($getparams[2]);
$dfilters["status"]=$_GET['status'];

	$menualatta=$MenuClass->get_menus_down($dfilters["mid"],array());

if (count($menualatta))
{
	foreach($menualatta as $mea)
	{
		$dfilters["mid"].=$Sys_Class->comasupport($dfilters["mid"]);
		$dfilters["mid"].=$mea["id"];
	}
}



$qeszkoztipus=$rss_class->chanel_get($dfilters,$order='',$page='all');
//arraylist($qeszkoztipus);
$eszkozok=$qeszkoztipus['datas'];
	// $eszkozok=$output["valasztomb"];
	//arraylist($eszkozok);
	
$chanelsid="";
foreach ($eszkozok as $egyeszkoz){
	if ($chanelsid!=""){$chanelsid.=",";}
	$chanelsid.=$egyeszkoz["id"];

//csatornák letöltése
	$ido_plus_period = date("Y-m-d H:i:s",strtotime(dateprint($egyeszkoz["ido"])." +".$egyeszkoz["period"]." hour"));
/*	echo dateprint($date)."<br>";
	echo ($egyeszkoz["id"]);
	echo " | ";
	echo dateprint($egyeszkoz["ido"]);
	echo "=";
	echo dateprint($ido_plus_period);
	echo " X ";
	echo $egyeszkoz["period"];
	echo "<br /> ";
exit;*/
	if (datedata($date)>=datedata($ido_plus_period)){	

//csatorna utolsoido frissítése
		$egyeszkozid=$egyeszkoz;
		$egyeszkozid["id"]=$egyeszkoz["id"];
		$egyeszkozid["ido"]=dateprint($date);
		$egyeszkozid["id"]=$rss_class->chanel_save($egyeszkozid);
		
	//$kid=rsschanel_struckt($egyeszkozid);	
	//gen_form_save($kid,"rsschanel",$egyeszkozid);


	/*     Csatorna bedolgozása    */
	//arraylist($egyeszkoz);
	//rss csatornák kiolvasása
	$xml = new AbsRssReader20();
	$xml->Load($egyeszkoz["url"]);
	//arraylist($xml);

	// Get Items
	$chItems = $xml->GetItems();
	if (is_array($chItems) and count($chItems)>0)
	{?>
        <?php  //echo print_r($chItems);
		foreach ($chItems as $chItem) {
			if ($chItem["description"]!=""){
				//arraylist($chItem);
				//szovegfeldolgoz_array_walk($chItem["description"]);
				//$chItem["description"]=($chItem["description"]);
				$chItem["pubDate2"]=dateprint($chItem["pubDate"]);
				$chItem["chanelid"]=($egyeszkoz["id"]);
				if ($chItem["content:encoded"]){
					$chItem["content"]=$chItem["content:encoded"];
				}
				
				
				$chItem['id']=$rss_class->save($chItem);
				//$rssarray[]=$chItem;
				//$kapott=rssdata_form($chItem);	
				//gen_form_save($chItem,"rssdata",$chItem);	
			}
		}
	}
//rss csatornák kiolvasása
	//arraylist($rssarray);
	
/*     Csatorna bedolgozása    */	
	
	
	
	//arraylist($egyeszkozid);
}

}


//a lista lekérése
$dfilters=array();
$maxegyoldalon=$dfilters["maxegyoldalon"]=12;
$dfilters["chanelid"]=$chanelsid;
$rssdatasq=$rss_class->get($dfilters,$order='',$page=$_REQUEST['page']);
//var_dump($rssdatasq);
$rssdatas=$rssdatasq['datas'];


if (($_GET["page"]=="") || ($_GET["page"]<=0)){
	$oldal='0';
}
else {
	$oldal=$_GET["page"];
}

$hszlistacount=$rssdatasq['count'];
$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);


	$maxoldalazonum=10;
if ($oldalakszama>$maxoldalazonum){
	
	$start=$oldal-round($maxoldalazonum/2);
	if ($start<1){
		$start=0;
		$end=$maxoldalazonum;	
	}
	else{
		
		$end=$start+$maxoldalazonum;
		if ($end>$oldalakszama)
		{
		$end=$oldalakszama;
		$start=$oldalakszama-$maxoldalazonum;
		}
		
	}
}
else
{
	$start=0;
	$end=$oldalakszama-1;
}





/*
if ($chanelsid!=''){
$WHERE=" WHERE chanelid in (".$chanelsid.") ";	
}
$qeszkoztipus="
SELECT * 
FROM  ".$tbl['rssdata'].$WHERE." ORDER BY `pubDate2` DESC LIMIT 21
";
$rssdatas=db_Query($qeszkoztipus, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
*/

 $thmenu= ($MenuClass->get_one_menu($getparams[2])) ;
$page_keywords="";
$page_ogimage="";
$page_description="";
$pagetitle=$thmenu["nev"];


$n=0;
if (count($rssdatas)>0)foreach($rssdatas as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$rssdatas[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);
	}
	//kép
//kulcsszavak
if ($page_keywords!=""){$page_keywords.=',';}
$page_keywords.=$Text_Class->htmlfromchars($egy["title"]);
$page_description.=$Text_Class->levag($Text_Class->tageketcsupaszit($egy["description"]),200);
	
$n++;	
}


   // $eszkozok=$output["valasztomb"];
	//arraylist($eszkozok);
	
?>