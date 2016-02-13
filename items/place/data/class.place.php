<?php
class place{
	
public function status(){
	global $lan;
	$status[1]= $lan['status1'];
	$status[2]=$lan['status2'];
	$status[3]=$lan['status3'];
	$status[4]=$lan['status4'];
	return $status;
}

public function tipus(){
	global $lan;
	$status[0]= 'Mind';
	$status[1]= 'Étterem';
	$status[2]= 'Cukrázda';
	$status[3]= 'Szállás';
	$status[4]= 'Bolt';
	$status[5]= 'Deitetikus';

	return $status;
}

public function table($data=array()){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table='place';

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


	$mezo["id"]='varos';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="varos";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='nev';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='cim';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="cim";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='hsz';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="cim";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='tel';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Telefon";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='tel2';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Telefon 2";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='email';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="url";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='web';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="url";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='web2';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="url";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
				
	$mezo["id"]='leiras';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="leirás";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='gluten';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="gluten";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='diab';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="diab";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='lactose';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="lactose";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();			

		
	$mezo["id"]='good';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="good";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();					
		
	$mezo["id"]='bad';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="bad";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	


	$mezo["id"]='tipus';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="varos";
	$mezo["display"]=1;
	$mezo["type"]='num';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	
	$mezo["id"]='uid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Felhasználó azonosító";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Állapot";
	$mezo["display"]=1;
	$mezo["type"]='array';
	$mezo["displaylist"]=1;
	$mezo["values"]=$this->status();
	$mezo["values_type"]='0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
	$mezo["value"]=$mezo["values"][$data[$mezo["id"]]];
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
	global $adatbazis,$tbl,$prefix;
	$Sys_Class=new sys();

if ($filters['maxegyoldalon']>0){
	$maxegyoldalon=$filters['maxegyoldalon'];
	}else{
	$maxegyoldalon=8;
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
	$tables=$SD["table"].',location_citys_data';
	$mezok.=',location_citys_data.city_name as varos_nev ';
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].'.varos=location_citys_data.city_id';
	//másik tábla mezői hozzáadása
		//$mezok.='tabla.mezo'
		//tábla kapcsolat
		//$where.=$SD["table"].".mezo=tabla.mezo";

//ez kell az összes találat megszámolásához	
	$mezokc.='count('.$SD["table"].'.id) as count';




//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}

$fmezonev='tipus';
if ($filters[$fmezonev]>'0'){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}

$fmezonev='uid';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='varos';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

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


//szöveges feltételek	
$fmezonev='cim';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}

$fmezonev='s';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.="(".$SD["table"].".`cim`LIKE'%".$filters[$fmezonev]."%'";
		$where.=" OR ".$SD["table"].".`nev`LIKE'%".$filters[$fmezonev]."%'";		
		$where.=" OR ".$SD["table"].".`leiras`LIKE'%".$filters[$fmezonev]."%')";				
}



//ha van feltétel elé csapjuk hogy WHERE	
if ($where!=''){
	$where=" WHERE ".$where;	
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
	global $adatbazis;
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
			$datasb.="'".($datas[$mezoe['id']])."'";
		}
		$query="INSERT INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
	//	echo $query.'<br>';
	//	echo $error;		
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

public function create_table(){
	global $adatbazis;
	$SD=$this->table_fields();	
	$q="
	CREATE TABLE IF NOT EXISTS ".$SD["table"]." (
 `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `nev` VARCHAR( 500 ) NOT NULL ,
 `varos` INT NOT NULL ,
 `cim` VARCHAR( 500 ) NOT NULL ,
 `hsz` VARCHAR( 50 ) NOT NULL ,
 `tel` VARCHAR( 20 ) NOT NULL ,
 `tel2` VARCHAR( 20 ) NOT NULL ,
 `email` VARCHAR( 200 ) NOT NULL ,
 `web` VARCHAR( 500 ) NOT NULL ,
 `web2` VARCHAR( 500 ) NOT NULL ,
 `gluten` TINYINT NOT NULL ,
 `diab` TINYINT NOT NULL ,
 `lactose` TINYINT NOT NULL ,
 `good` INT NOT NULL DEFAULT  '0',
 `bad` INT NOT NULL DEFAULT  '0',
 `status` TINYINT NOT NULL ,
 `tipus` INT NOT NULL ,
 `leiras` TEXT NOT NULL ,
 `uid` INT NOT NULL , 
INDEX (  `gluten` ,  `diab` ,  `status` )
) ENGINE = MYISAM ;
	";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");	
		//echo $q.'<br>';
		//echo $error;			
}

public function createurl($hir){
global $Text_Class,$homeurl,$separator;
	return $homeurl.$separator."place/".$Text_Class->to_link($hir["nev"])."/".($hir["id"]);
}


//like
public function create_like_table(){
	
	
$q=
"
CREATE TABLE IF NOT EXISTS `user_like_place` (
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`ad_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";	
}

//fav
public function create_fav_table(){
	
	
$q=
"
CREATE TABLE IF NOT EXISTS `user_favorite_place` (
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`ad_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";	
}



//good, bad
public function user_like_ads($uid,$adid,$status=1)
{
	global $adatbazis;
	$q="REPLACE INTO  `user_like_hir` (`user_id` ,`ad_id` ,`status`)VALUES ('".$uid."',  '".$adid."',  '".$status."'
);";
	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
	
}
public function get_user_action_ads($table,$filters,$order=''){
	global $adatbazis;
	//table= user_like_ads
if ($order!='')	{
	$order=' ORDER BY '.$order;
}
	$where=" WHERE ";
	$where.="".$table.".status='1'";
	$mezok=$table.'.user_id';
	$mezok.=','.$table.'.ad_id';	
	$mezok.=','.$table.'.status';	
	$mezok.=','.$table.'.created';	

	$tables=''.$table.'';
	

		$mezok.=',user.nev';	
		$mezok.=',user.unev';		
		$tables.=',user';
		$where.=" AND ".$table.".user_id=user.id";	

	/*	$mezok.=',recipe.name';	
		$tables.=',recipe';
		$where.=" AND ".$table.".ad_id=recipe.id";	*/


if ($filters["count_ad"]!=''){
		$mezok.=',count('.$table.'.ad_id) as count';	
		$group=' GROUP BY ad_id';
}

if ($filters["count_user"]!=''){
		$mezok.=',count('.$table.'.user_id) as count';	
		$group=' GROUP BY user_id';
}

/*
if ($filters["job"]!=''){
		$where.=" AND recipe.name LIKE'%".$filters["job"]."%'";
}
*/
if ($filters["user"]!=''){
		$mezok.=',count('.$table.'.ad_id) as count';	
		$where.=" AND user.nev LIKE'%".$filters["user"]."%'";
		$where.=" AND user.unev LIKE'%".$filters["user"]."%'";
}
if ($filters["tol"]>0){
		$where.=" AND ".$table.".created>'".date("Y-m-d H:i:s",strtotime($filters["tol"]))."'";
}
if ($filters["ig"]>0){
		$where.=" AND ".$table.".created<'".date("Y-m-d H:i:s",strtotime($filters["ig"]))."'";
}
if ($filters["user_id"]>0){
		$where.=" AND ".$table.".user_id='".$filters["user_id"]."'";
}
if ($filters["ad_id"]>0){
		$where.=" AND ".$table.".ad_id='".$filters["ad_id"]."'";
}
	$query = "SELECT ".$mezok." FROM ".$tables.$where.' '.$group.$order;
	//echo $query ;
if (count($filters)>0)
	$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	return $result;
}



public function get_user_like_ads($filters,$order=''){
	$result=$this->get_user_action_ads('user_like_hir',$filters,$order);
	return $result;
}
public function user_favorite_ads($uid,$adid,$status=1)
{
		global $adatbazis;

		$q="REPLACE INTO  `user_favorite_hir` (`user_id` ,`ad_id` ,`status`)VALUES ('".$uid."',  '".$adid."',  '".$status."'
);";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
	
}

public function get_user_favorite_ads($filters){
	$result=$this->get_user_action_ads('user_favorite_hir',$filters,$order);
	return $result;
}

public function get_user_action_ads_array_fromad($array){
	if (count($array)&&$array!=false)foreach ($array as $elem){
		$ret[$elem['ad_id']]=$elem['user_id'];
	}
	return $ret;
}

public function get_user_action_ads_coma_fromad($array){
$ret='';
	if (count($array)&&$array!=false)foreach ($array as $elem){
		if ($ret!='')$ret.=',';
		$ret.=$elem['ad_id'];
	}
	return $ret;
}
///
//a kedvelések, reportok számát írja felül
public function update_job_count($data){
global $adatbazis;
if ($data["id"]){
$query="UPDATE  `web_hir` SET ";
//if (isset($data["report_count"]))$query.="`report_count` =  '".$data["report_count"]."'";
if (isset($data["like_count"]))$query.="`like_count` =  '".$data["like_count"]."'";
//if (isset($data["myjob_count"]))$query.="`myjob_count` =  '".$data["myjob_count"]."'";
if (isset($data["favorite_count"]))$query.="`favorite_count` =  '".$data["favorite_count"]."'";

$query.=" WHERE  `web_hir`.`id` =".$data["id"]." LIMIT 1 ;";
 	$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "update");
	//echo $query ;
}
}
//

}

?>