<?php
/*
Users class

*/
class user{
	

public function errormessages(){
	$status['foglaltemail']='Foglalt email cím';
	$status['foglaltuname']='Foglalt felhasználóinév';	
	$status['hibasjelszo']='Hibás jelszó';		
	$status['nemegyezik']='Nem egyezik a két jelszó';
	$status['regok']='Sikeres regisztráció';
	return $status;
}



public function status(){
	$status[1]='Regisztrált';
	$status[2]='Aktív';
	$status[3]='Felfüggesztve';
	$status[4]='Törölve';
	return $status;
}

public function jog(){
	$status[1]='User';
	$status[2]='Regisztrált';
	$status[3]='Moderátor';
	$status[4]='Admin';
	$status[4]='super Admin';	
	return $status;
}


public function table(){
	global $adatbazis,$tbl;
	$table=$tbl['user'];
		$mezo=array();
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='unev';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Felhasználói név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=1;	
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='nev';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=0;	
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='pass';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Jelszó";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=1;	
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='email';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Email";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=1;	
		$mezok[]=$mezo;
		$mezo=array();



	$mezo["id"]='fbid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Facebookid";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='100';
	$mezo["requied"]=1;	
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='hirlevel';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="hirlevel";
	$mezo["type"]='int';
	$mezo["length"]='1';
	$mezo["requied"]=1;	
	$mezo["display"]=1;
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='jogid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Jogosultság";
	$mezo["display"]=1;
	$mezo["type"]='array';
	$mezo["values"]=$this->jog();
	$mezo["values_type"]='0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
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

//id alapján a user adatait adja vissza
public function get_userid($uid) 
{
	$filters['id']=$uid;
	$users=$this->get_users($filters,'','all');
	$user=$users["datas"][0];;
	//
	$user['jog']=$user['jogid'];
	return $user;
}

//belépéshez szükséges cuccok lekérdezése
public function userlogin($email,$pass) 
{
	$filters['login']=$email;
	$filters['pass']=$pass;
	$users=$this->get_users($filters,'','all');
	return $users["datas"][0];
}
//facebookos belépés
public function userlogin_fb($fbid) 
{
	$filters['fbid']=$fbid;
	$users=$this->get_users($filters,'','all');
	return $users["datas"][0];
}

public function user_by_email($email) 
{
	$filters['email']=$email;
	$users=$this->get_users($filters,'','all');
	return $users["datas"][0];
}


public function reg_users($datas) 
{
//ha nincs megadva userid akkor mentem
if ($datas['id']<1){
//ellenőrzöm hogy létezik e a user
	$emsg=$this->errormessages();
	$filters['email']=$datas['email'];
	$users=$this->get_users($filters,'','all');
	if ($users["count"]>0){
		$session["form_error"]=$emsg['foglaltemail'];
	}
	$filters['unev']=$datas['unev'];
	$users=$this->get_users($filters,'','all');
	if ($users["count"]>0){
		$session["form_error"]=$emsg['foglaltuname'];
	}	
	if (!$session["form_error"])
	{
		$datas['status']='1';	
		$datas['jogid']='1';	

		save($datas);
		$session["form_ok"]=$emsg['regok'];		
	}
}

}


//user lekérdezése
public function get_users($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl;

	$maxegyoldalon=20;
	$SD=$this->table_fields();	
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}

	//a tábla saját mezői
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=comasupport($mezok);	
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
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
$fmezonev='jogid';
if ($filters[$fmezonev]>0){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='status';
if ($filters[$fmezonev]>0){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='hirlevel';
if ($filters[$fmezonev]>0){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
//szöveges feltételek	
$fmezonev='nev';
if ($filters[$fmezonev]!=''){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}
$fmezonev='unev';
if ($filters[$fmezonev]!=''){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'".$filters[$fmezonev]."'";
}
$fmezonev='pass';
if ($filters[$fmezonev]!=''){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'".$filters[$fmezonev]."'";
}
$fmezonev='email';
if ($filters[$fmezonev]!=''){
		$where.=andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'".$filters[$fmezonev]."'";
}
$fmezonev='login';
if ($filters[$fmezonev]!=''){
		$where.=andsupport($where);
		$where.='('.$SD["table"].".`email`LIKE'".$filters[$fmezonev]."'";
		$where.=' OR '.$SD["table"].".`unev`LIKE'".$filters[$fmezonev]."')";

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
	global $adatbazis;
	
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
			$mezok.=comasupport($mezok);	
			$mezok.=$mezoe;	
			$datasb.=comasupport($datasb);	
			$datasb.="'".$datas[$mezoe]."'";
		}
		$query="INSERT INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
		//echo $query.'<br>';
		//echo $error;		
		$res=mysql_insert_id();
	}
	else
	{
		$res=$datas["id"];
		//update		
		foreach ($SD["mezok"] as $mezoe)
		{
			if (isset($datas[$mezoe])){
			$datasb.=comasupport($datasb);	
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
  `unev` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL default '',
  `jogid` mediumint(9) NOT NULL default '1',
  `nev` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `fbid` varchar(50) default NULL,
  `avatar` varchar(200) NOT NULL,
  `hirlevel` int(1) NOT NULL default '1',
  `status` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`)
)DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");	
		//echo $q.'<br>';
		//echo $error;			
}


}


?>