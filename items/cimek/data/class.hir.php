<?php
class cimek extends sys{
	
public function status(){
	global $lan;
	$status[1]= $lan['status1'];
	$status[2]=$lan['status2'];
	$status[3]=$lan['status3'];
	$status[4]=$lan['status4'];
	return $status;
}

public function sorrend(){
	for ($i = 1; $i <= 10; $i++) 
	{
	$status[$i]=$i;	}

	return $status;
}

public function table($data=array()){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table=$tbl['cimek'];

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
		


	$mezo["id"]='nev';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
		
		$mezo["id"]='tel';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="tel";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
				
				$mezo["id"]='mikor';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="mikor";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='cim';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Oldal";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='szar';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Oldal";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
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

	$datas['table']=$table;
	$datas['mezok']=$mezok;
	return $datas;
}



public function table_fields(){
	global $adatbazis,$tbl;
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
}	$SD=$this->table();
	
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



//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}

$fmezonev='notid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`id` not in(".$filters['notid'].") ";
}

$fmezonev='uid';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}



$fmezonev='status';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
/*else 
	if ($filters[$fmezonev]!='all'){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='2'";
	}*/



//szöveges feltételek	
$fmezonev='nev';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}//szöveges feltételek	
$fmezonev='cim';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}

$fmezonev='s';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.="(".$SD["table"].".`nev`LIKE'%".$filters[$fmezonev]."%'";
		$where.=" OR ".$SD["table"].".`cim`LIKE'%".$filters[$fmezonev]."%'";		
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
	if ($datas["nev"]!='')
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
		//echo($query);
		//echo '<br>'.'<br>'.'<br>'.'<br>'.'<br>'.$query.'<br>';
		//echo $error;		
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
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nev` bigint(20) NOT NULL DEFAULT '0',
  `cim` varchar(200) NOT NULL,
  `szar` text NOT NULL,
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `status` smallint(6) DEFAULT '1',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
	";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");	
		//echo $q.'<br>';
		//echo $error;			
}
public function getimg($id,$x=369,$y=247){
	global $adatbazis,$folders,$defaultimg,$hirimg_loc,$homeurl;
	
	$img=$hirimg_loc.''.$id.'/'.$id.'.jpg';
	//$img=randomimgtofldr($mappa);
	//echo $img;
if (is_file($img)){
	$img=$img;
}
else{
	$img="uploads/".$defaultimg;
}	
$img=$homeurl."/picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";

/*
	if ($img!="none"){
					//echo $mappa."/".$img;

		$img="picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";
			//echo $mappa;

	}
	else{
		$img="uploads/".$defaultimg;
	}*/
	return($img);
}

public function createurl($hir){
global $Text_Class,$homeurl,$separator;
	return $homeurl.$separator."hir/".$Text_Class->to_link($hir["cim"])."/".($hir["id"]);
}




}

?>