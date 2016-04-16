<?php 
class rss{
	
public function status(){
	$status[1]='Active';
	$status[2]='Edited';
	$status[3]='Suspended';
	$status[4]='Deleted';
	return $status;
}
/* rss datas*/
	public function table($data=array()){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table=$tbl['rssdata'];

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();


	$mezo=array();		
	$mezo["id"]='chanelid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="csatorna";
	$mezo["display"]=1;
				$typ["value"]="id";
				$typ["name"]="url";	
	$mezo["param"]="rsschanel";		
	$mezo["type"]='selectbox';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();			
		
	$mezo["id"]='title';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Title";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='description';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Oldal";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='content';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="content";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='category';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="category";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		

	$mezo["id"]='group';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="group";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
		
	$mezo["id"]='link';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="link";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
		
	$mezo["id"]='guid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="guid";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
		
	$mezo["id"]='comments';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="comments";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='pubDate2';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="pubDate2";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();			
//		

	$datas['table']=$table;
	$datas['mezok']=$mezok;
	
	return $datas;	
}



public function table_fields(){
	global $adatbazis,$tbl;

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	$mdata=$this->table();
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
	$datas['mezok']=$mezok;
	
	return $datas;	
}
	
	
	

public function get($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl;
	$Sys_Class=new sys();

if ($filters['maxegyoldalon']>0){
	$maxegyoldalon=$filters['maxegyoldalon'];
	}else{
	$maxegyoldalon=20;
}
	
	
	$SD=$this->table();	
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
	}

	//a tábla saját mezői
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);	
		$mezok.=$mezoe['table'];	
	}
	//Táblázatok
	$tables=$SD["table"];

	//másik tábla mezői hozzáadása
		//$mezok.='tabla.mezo'
		//tábla kapcsolat
		//$where.=$SD["table"].".mezo=tabla.mezo";

//ez kell az összes találat megszámolásához	
	$mezokc.='count('.$SD["table"].'.id) as count';


/*
//menu kapcsolat
	$mezok.=$Sys_Class->comasupport($mezok);	
	$mezok.="menu.nev as menu_name";	
	$tables.=',menu';
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].".mid=menu.id";
*/
//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}

$fmezonev='chanelid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`".$fmezonev."` in(".$filters[$fmezonev].") ";
}

$fmezonev='notid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`id` not in(".$filters['notid'].") ";
}


$fmezonev='pubDate2';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`<='".$filters[$fmezonev]."'";
}
/*
$fmezonev='status';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
else 
	if ($filters[$fmezonev]!='all'){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='2'";
	}
*/


//szöveges feltételek	
$fmezonev='title';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}

$fmezonev='s';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.="(".$SD["table"].".`cim`LIKE'%".$filters[$fmezonev]."%'";
		$where.=" OR ".$SD["table"].".`description`LIKE'%".$filters[$fmezonev]."%'";		
		$where.=" OR ".$SD["table"].".`hir2`LIKE'%".$filters[$fmezonev]."%')";				
}
if ($where!=''){
$where=' WHERE '.$where;
}
//összes elem lekérdezése
	$queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
	$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	//echo $queryc;
	//arraylist ($resultc);
	$result['count']=$resultc[0]['count'];
	
//oldalazó	
if ($page!='all'){
//$maxegyoldalon=page_settings("max_service_perpage");

$oldalakszama=ceil ($result['count']/$maxegyoldalon);
if ($maxegyoldalon>0)
{
	if (($page=="") || ($page<=0)){
		$oldal=0;
	}
	else {
		$oldal=$page;
	}	
		

	if ($page>=$oldalakszama){
		$page=$oldalakszama-1;
	}
	//oldalak kiszámolása
	
	if ($oldalakszama!=""){
		$limit= " LIMIT ".($page*$maxegyoldalon).",".$maxegyoldalon;
	}
		
}
}
	$query = "SELECT ".$mezok." FROM ".$tables.$where.' '.$order.$limit;
//echo $query ;


	$result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	$result['query']=$query ;
	$result['error']=$error ;
	return $result;
}


public function save($datas) 
{
	global $adatbazis,$Text_Class;
	$Sys_Class=new sys();
	//tábla adatai
	$SD=$this->table_fields();	
	$mtbl=$this->table();	
	
//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
	if ($datas["id"]<1)
	{
		//insert		
		foreach ($mtbl["mezok"] as $mezoe)
		{
			$mezok.=$Sys_Class->comasupport($mezok);	
			$mezok.=$mezoe['table'];	
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="'".($Text_Class->htmltochars($datas[$mezoe['id']]))."'";
		}
		$query="INSERT INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
		/*echo $query.'<br>';
		echo $error;*/		
		$res=mysql_insert_id();
	}
	else
	{
		$res=$datas["id"];
		//update		
		foreach ($mtbl["mezok"] as $mezoe)
		{
			if (isset($datas[$mezoe['id']])){
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="".$mezoe['table']." =  '".($datas[$mezoe['id']])."'";
			}
		}
		$query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
		/*echo $query;
		echo $error;*/

	}
return($res);//csak id-t ad vissza
}


//rss chanel


public function chanel_table($data=array()){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table=$tbl['rsschanel'];

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo=array();		
	$mezo["id"]='mid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="mid";
	$mezo["display"]=1;
/*				$typ["value"]="id";
				$typ["name"]="url";	
	$mezo["param"]="rsschanel";		
	$mezo["type"]='selectbox';*/
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
		
	$mezo["id"]='url';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="url";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		

	$mezo["id"]='period';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="frissites(h)";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='num';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		

	$mezo["id"]='ido';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ido";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="status";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='num';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
		


//		

	$datas['table']=$table;
	$datas['mezok']=$mezok;
	
	return $datas;	
}



public function chanel_fields(){
	global $adatbazis,$tbl;

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	$mdata=$this->chanel_table();
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
	$datas['mezok']=$mezok;
	
	return $datas;	
}



public function chanel_save($datas) 
{
	global $adatbazis;
	$Sys_Class=new sys();
	//tábla adatai
	$SD=$this->chanel_fields();	
	$mtbl=$this->chanel_table();	
	
//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
	if ($datas["id"]<1)
	{
		//insert		
		foreach ($mtbl["mezok"] as $mezoe)
		{
			$mezok.=$Sys_Class->comasupport($mezok);	
			$mezok.=$mezoe['table'];	
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="'".($datas[$mezoe['id']])."'";
		}
		$query="INSERT INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
		echo $query.'<br>';
		echo $error;		
		$res=mysql_insert_id();
	}
	else
	{
		$res=$datas["id"];
		//update		
		foreach ($mtbl["mezok"] as $mezoe)
		{
			if (isset($datas[$mezoe['id']])){
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="".$mezoe['table']." =  '".($datas[$mezoe['id']])."'";
			}
		}
		$query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
		/*echo $query;
		echo $error;
*/
	}
return($res);//csak id-t ad vissza
}

public function chanel_get($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl;
	$Sys_Class=new sys();

if ($filters['maxegyoldalon']>0){
	$maxegyoldalon=$filters['maxegyoldalon'];
	}else{
	$maxegyoldalon=20;
}
	
	
	$SD=$this->chanel_table();	
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
	}

	//a tábla saját mezői
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);	
		$mezok.=$mezoe['table'];	
	}
	//Táblázatok
	$tables=$SD["table"];

	//másik tábla mezői hozzáadása
		//$mezok.='tabla.mezo'
		//tábla kapcsolat
		//$where.=$SD["table"].".mezo=tabla.mezo";

//ez kell az összes találat megszámolásához	
	$mezokc.='count('.$SD["table"].'.id) as count';

/*
//menu kapcsolat
	$mezok.=$Sys_Class->comasupport($mezok);	
	$mezok.="menu.nev as menu_name";	
	$tables.=',menu';
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].".mid=menu.id";
*/
//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}

$fmezonev='mid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`".$fmezonev."` in(".$filters[$fmezonev].") ";
}

$fmezonev='notmid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`mid` not in(".$filters['notid'].") ";
}

$fmezonev='notid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`id` not in(".$filters['notid'].") ";
}


$fmezonev='ido';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`<='".$filters[$fmezonev]."'";
}




$fmezonev='status';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
else 
	if ($filters[$fmezonev]!='all'){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='1'";
	}



//szöveges feltételek	
$fmezonev='url';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}


if ($where!=''){
$where=' WHERE '.$where;
}
//összes elem lekérdezése
	$queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
	$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	//echo $queryc;
	//arraylist ($resultc);
	$result['count']=$resultc[0]['count'];
	
//oldalazó	
if ($page!='all'){
//$maxegyoldalon=page_settings("max_service_perpage");

$oldalakszama=ceil ($result['count']/$maxegyoldalon);
if ($maxegyoldalon>0)
{
	if (($page=="") || ($page<=0)){
		$oldal=0;
	}
	else {
		$oldal=$page;
	}	
		

	if ($page>=$oldalakszama){
		$page=$oldalakszama-1;
	}
	//oldalak kiszámolása
	
	if ($oldalakszama!=""){
		$limit= " LIMIT ".($page*$maxegyoldalon).",".$maxegyoldalon;
	}
		
}
}
	$query = "SELECT ".$mezok." FROM ".$tables.$where.' '.$order.$limit;
//echo $query ;


	$result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	$result['query']=$query ;
	$result['error']=$error ;
	return $result;
}
	
	
}
?>