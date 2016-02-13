<?php
class video{
public function status(){
	$status[2]='Active';
	$status[4]='Deleted';
	return $status;
}	

public function table(){
	global $adatbazis,$tbl;
	$table='video';
		$mezo=array();
		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='mid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();                
                
	$mezo["id"]='name';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="title";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=1;	
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='url';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="title";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=1;	
		$mezok[]=$mezo;
		$mezo=array();

	/*$mezo["id"]='category';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="category";
	$mezo["display"]=1;
	$mezo["type"]='array';
	$mezo["values"]=$this->category();
	$mezo["values_type"]='0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
		$mezok[]=$mezo;
		$mezo=array();*/
	


	$mezo["id"]='description';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="title";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["requied"]=0;	
		$mezok[]=$mezo;
		$mezo=array();

		
	$mezo["id"]='uid';
	$mezo["table"]=$table.'.'.'`'.$mezo["uid"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();

		
	$mezo["id"]='status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Állapot";
	$mezo["display"]=1;
	$mezo["type"]='array';
	$mezo["values"]=$this->status();
	$mezo["values_type"]='0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
		$mezok[]=$mezo;
		$mezo=array();

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
	global $adatbazis,$tbl,$Sys_Class;

	$maxegyoldalon=8;
	$SD=$this->table_fields();	
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}

	//a tábla saját mezői
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);	
		$mezok.=$mezoe;	
	}
	//Táblázatok
	$tables=$SD["table"];

	//másik tábla mezői hozzáadása
		//$mezok.='tabla.mezo'
		//tábla kapcsolat
		//$where.=$SD["table"].".mezo=tabla.mezo";

//ez kell az összes találat megszámolásához	
	$mezokc.='count('.$SD["table"].'.id) as count';


//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
$fmezonev='mid';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='status';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}elseif ($filters[$fmezonev]!='all'){
    		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='2'";
    
}


//szöveges feltételek	
$fmezonev='name';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}


//ha van feltétel elé csapjuk hogy WHERE	
if ($where!=''){
	$where=" WHERE ".$where;	
}

//összes elem lekérdezése
	$queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
	$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
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
	return $result;
}

public function save($datas) 
{
	global $adatbazis,$Sys_Class;
	
	//tábla adatai
	$SD=$this->table_fields();	
	
//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
	if ($datas["id"]<1)
	{
		//insert		
		foreach ($SD["mezok"] as $mezoe)
		{
			$mezok.=$Sys_Class->comasupport($mezok);	
			$mezok.=$mezoe;	
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="'".$datas[$mezoe]."'";
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
		foreach ($SD["mezok"] as $mezoe)
		{
			if (isset($datas[$mezoe])){
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="".$mezoe." =  '".$datas[$mezoe]."'";
			}
		}
		$query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
		//echo $query;
		//echo $error;
	}
return($res);//csak id-t ad vissza
}


public function create_table(){
	global $adatbazis;
	$SD=$this->table_fields();	
	$q="
	CREATE TABLE IF NOT EXISTS ".$SD["table"]." (
  `id` bigint(20) NOT NULL auto_increment,
  `mid` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) default NULL,
  `uid` int(11) default NULL,
  `status` int(11) NOT NULL default '1',
  `created` datetime NOT NULL,
  `changed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `status` (`status`),
  KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");	
		//echo $q.'<br>';
		//echo $error;			
}

public function sqlwhereand($where)
{
	//echo $where;
	if($where==""){
	$whereb=' WHERE ';
	}
	else
	{
	$whereb.=' AND ';
	}
	return $whereb;
	
}

	
	
}
?>