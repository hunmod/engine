<?php
class termekek{
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
	$table=$tbl['termek'];

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"].'` bigint(20) NOT NULL auto_increment';
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='kat';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="kat";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` bigint(20) NOT NULL default '0'";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='raktaron';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="raktaron";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` bigint(20) NOT NULL default '0'";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='kod';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="kod";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` varchar(200) NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='kvn_kod';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="kvn_kod";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` varchar(200) NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='kvn_teszor';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="kvn_teszor";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` varchar(200) NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='nev';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="nev";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` varchar(200) NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='leiras';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="leiras";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` text NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='suly';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="suly";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` double  NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='ar';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ar";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` double NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;	
	$mezo=array();
	$mezo["id"]='ar_vat';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ar_vat";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` double NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;	
	$mezo=array();
	$mezo["id"]='ar_beszerzes';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ar_beszerzes";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` double NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='vat';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="vat";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` double NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='barcode';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="barcode";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` varchar(16) NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	$mezo["id"]='storage_status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="storage_status";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` int NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();
	
	$mezo["id"]='ordertime';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ordertime";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` smallint(6) NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo["id"]='status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="status";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` int NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo["id"]='sorrend';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="sorrend";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["sqlcreate"]='`'.$mezo["id"]."` int NOT NULL";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
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
		echo $error;*/

	}
return($res);//csak id-t ad vissza
}	
	


public function get($filters,$order,$page)
{ global $tbl,$adatbazis,$auser;
$status="=1";
if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){$status="!=4";}

	if ($mid==""){
		$mid="0";
	}
	if ($limit==""){
		/*$mid="100";*/
	}
	if ($order==""){
		$order=" ORDER BY  `sorrend` ASC, `id` DESC";
	}else if ($order!="all"){
		$order=" ORDER BY ".$order;
	}
	/*
	if ($limit){
		$limit= "LIMIT ".$limit;	
	}*/
	
	$qelemek="SELECT * FROM  ".$tbl['termek'].$order." ".$limit;
	$elemek=db_Query($qelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
	//echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>".$qelemek;
	return $elemek;
}	
public function create_tbl(){	
global $tblexists,$tbl,$adatbazis;
if ($tblexists[$tbl["termek"]]!=1)
{
$qreatetbl="CREATE TABLE IF NOT EXISTS ".$tbl['termek']." (
  `id` bigint(20) NOT NULL auto_increment,
  `kat` bigint(20) NOT NULL default '0',
  `raktaron` bigint(20) NOT NULL default '0',
  `kod` varchar(200) NOT NULL,
  `kvn_kod` varchar(200) NOT NULL,
  `kvn_teszor` varchar(200) NOT NULL,
  `nev` varchar(200) NOT NULL,
  `leiras` text NOT NULL,
  `suly` double NOT NULL,
  `ar` double NOT NULL,
  `ar_vat` double NOT NULL,
  `ar_beszerzes` double NOT NULL,
  `vat` double default '0',
  `barcode` varchar(16) default NULL,
  `ido` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `storage_status` smallint(6) default '1',
  `ordertime` smallint(6) default '0',  
  `status` smallint(6) default '1',
  `sorrend` int(11) NOT NULL default '10',
  `other_param` text  NULL,
  `uid` bigint(20) NOT NULL default '0',
 
  PRIMARY KEY  (`id`)
)  CHARSET=utf8 AUTO_INCREMENT=1;";
//echo $qreatetbl ;
$returnquery=db_Query($qreatetbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
}	
}
}
$class_termekek=new termekek();

?>