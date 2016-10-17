<?php
class recept{

public function status(){
	global $lan;
	$status[1]=$lan['rec_status_2'];
	$status[2]=$lan['rec_status_1'];
	$status[3]=$lan['rec_status_3'];
	$status[4]=$lan['rec_status_4'];
	return $status;
}
public function nehezseg(){
	global $lan;
$nehezseg=array();
$i=1;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]=$lan['rec_neh_'.$i];
$i=2;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]=$lan['rec_neh_'.$i];
$i=3;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]=$lan['rec_neh_'.$i];
$i=4;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]=$lan['rec_neh_'.$i];
$i=5;
	$nehezseg[$i]["id"]=$i;
	$nehezseg[$i]["nev"]=$lan['rec_neh_'.$i];
	return $nehezseg;
}
public function elkeszees_ido(){
	global $lan;
$i=1;
	$elkeszees_ido[$i]["id"]="10";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;	
	$elkeszees_ido[$i]["id"]="15";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;	
	$elkeszees_ido[$i]["id"]="20";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="30";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;	
	$elkeszees_ido[$i]["id"]="45";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="60";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="90";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="120";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="180";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="240";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="300";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
$i++;
	$elkeszees_ido[$i]["id"]="600";
	$elkeszees_ido[$i]["nev"]=$lan['rec_ido_'.$i];
	return $elkeszees_ido;
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
	$table=$tbl['recept'];

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
		
	$mezo["id"]='bevezeto';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Oldal";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='leiras';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Oldal";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
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
		
		
	$mezo["id"]='sorrend';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="sorrend";
	$mezo["display"]=1;
	$mezo["type"]='array';
	$mezo["displaylist"]=1;
	$mezo["values"]=$this->sorrend();
	$mezo["values_type"]='0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
	$mezo["value"]=$mezo["values"][$data[$mezo["id"]]];	
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

	$mezo["id"]='ido';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ido";
	$mezo["display"]=0;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='diab';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="like_count";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='gluten';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="like_count";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='lactose';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="like_count";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='energy';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="favorite_count azonosító";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='adag';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="favorite_count azonosító";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='nehezseg';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="nehezseg";
	$mezo["display"]=1;
	$mezo["type"]='array';
	$mezo["displaylist"]=1;
	$mezo["values"]=$this->sorrend();
	$mezo["values_type"]='0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
	$mezo["value"]=$mezo["values"][$data[$mezo["id"]]];	
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='elkeszites_ido';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="elkeszites_ido";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='energia';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="energia";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='kaloria';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="kaloria";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='szenhidrat';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="szenhidrat";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
				
	$mezo["id"]='feherje';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="feherje";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
				
	$mezo["id"]='zsir';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="zsir";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
				
	$mezo["id"]='rost';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="rost";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
				
	$mezo["id"]='koleszterin';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="koleszterin";
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

public function table_alapanyag($data=array()){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table=$tbl['alapanyag'];

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
		
	$mezo["id"]='nev_de';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='nev_en';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

	$mezo["id"]='menny';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="mennyiseg";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		

	$mezo["id"]='mertekegyseg';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="mertekegyseg";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

		
	$mezo["id"]='source';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="source";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='hir_id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Leírás";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
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
		


	$mezo["id"]='uid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Felhasználó azonosító";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='ido';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ido";
	$mezo["display"]=0;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='energia';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="energia";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='kaloria';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="kaloria";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='szenhidrat';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="szenhidrat";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
				
	$mezo["id"]='feherje';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="feherje";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
				
	$mezo["id"]='zsir';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="zsir";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
				
	$mezo["id"]='rost';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="rost";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();		
				
	$mezo["id"]='koleszterin';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="koleszterin";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
				
	$mezo["id"]='diab';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="diab";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	

				
	$mezo["id"]='gluten';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="gluten";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
				
	$mezo["id"]='lactose';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="lactose";
	$mezo["display"]=1;
	$mezo["displaylist"]=1;
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

public function table_fields2($mdata){
	global $adatbazis,$tbl;

//	$mdata=$this->table();

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
	$datas['mezok']=$mezok;
	
	return $datas;	
}


public function save_alapanyag($datas){
	global $Sys_Class,$adatbazis;
	$mdata=$this->table_alapanyag();
	$SD=$this->table_fields2($mdata);
	
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
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="".$mezoe." =  '".$datas[$mezoe]."'";
			}
		}
		$query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
		/*echo $query;
		echo $error;*/
	}
return($res);//csak id-t ad vissza
	
}


/**/
public function recept_alapanyag_form($ertek=array()){
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


	$datas['table']='recept_alapanyag';
	$datas['mezok']=$formelements;/*
energia
kaloria
szenhidrat
feherje
zsir
rost
koleszterin
*/		
return $datas;
		
}

public function save_recept_alapanyag($datas) 
{
	global $adatbazis,$Sys_Class;
	//tábla adatai
	$SD=$this->recept_alapanyag_form(array());	
	if ($datas["recept_id"]>0 && $datas["alapanyag_id"]>0 )
	{
		//insert		
		foreach ($SD["mezok"] as $mezoe)
		{
			$mezok.=$Sys_Class->comasupport($mezok);	
			$mezok.=$mezoe["name"];	
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="'".$datas[$mezoe["name"]]."'";
		}
		$query="REPLACE INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "REPLACE");
		//echo $query.'<br>';
		//echo $error;		
		$res='ok';
	}
	else{
		$res='error';		
	}
return($res);
}




public function save($datas) 
{
	global $adatbazis,$Sys_Class;
	//tábla adatai
	$SD=$this->table_fields();	
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
	//echo $query.'<br>';
	//	echo $error;		
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

public function del_receptalapanyag($recept_id,$alapanyag_id,$all='') 
{
	global $adatbazis,$tbl;
	if( ($recept_id>0&&$alapanyag_id>0)|| (($recept_id>0||$alapanyag_id>0)&&$all==1) ){
		
$updateq="DELETE FROM ".$tbl["recept_alapanyag"]." WHERE  `recept_id` =".$recept_id." AND `alapanyag_id` =".$alapanyag_id."";
		db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
		}

}
public function get_receptalapanyag($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl,$Text_Class;
	$Sys_Class=new sys();

	$maxegyoldalon=8;
	$SD=$this->recept_alapanyag_form();	
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		//$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
	}

	//a tábla saját mezői
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);	
		$mezok.=$mezoe['name'];	
	}
	//Táblázatok
	$tables=$SD["table"];
	//echo $mezok.$tables;
	
	$fmezonev='recept_id';
	if ($filters[$fmezonev]!=''){
			$where.=$Sys_Class->andsupport($where);
			$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
	}
	$fmezonev='alapanyag_id';
	if ($filters[$fmezonev]!=''){
			$where.=$Sys_Class->andsupport($where);
			$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
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
//ha van feltétel elé csapjuk hogy WHERE	
if ($where!=''){
	$where=" WHERE ".$where;	
}
	$query = "SELECT ".$mezok." FROM ".$tables.$where.' '.$order.$limit;
//echo $query ;


	$result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	$result['query']=$query ;
	$result['error']=$error ;
	return $result;
		
}

public function get_alapanyag($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl,$Text_Class;
	$Sys_Class=new sys();

if (!$filters["maxegyoldalon"])
{
	$maxegyoldalon=8;
}
else{
	$maxegyoldalon=$filters["maxegyoldalon"];
	
}
	$SD=$this->table_alapanyag();	
	
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
	
	
	if ($_SESSION['lang']=='de'){
		$nevadd='_de';
	}
	if ($_SESSION['lang']=='en'){
		$nevadd='_en';
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
$fmezonev='nev';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=''.$SD["table"].".`".$fmezonev.$nevadd."`LIKE'%".$filters[$fmezonev]."%'";
	/*	$where.='('.$SD["table"].".`".$fmezonev.$nevadd."`LIKE'%".$filters[$fmezonev]."%'";
		$where.=' or '.$SD["table"].".`".$fmezonev."_de`LIKE'%".$filters[$fmezonev]."%'";
		$where.=' or '.$SD["table"].".`".$fmezonev."_en`LIKE'%".$filters[$fmezonev]."%')";*/
}



$fmezonev='nevtrim';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$morname=explode(',',$filters[$fmezonev]);
		$whereor='';
		if (count($morname))
		foreach ($morname as $mona){
		$whereor.=$Sys_Class->andsupport($whereor);
		$whereor.='('.$SD["table"].".`nev".$nevadd."`LIKE'%".$Text_Class->ekezetekeoda($mona)."%'";
		$whereor.=' OR '.$SD["table"].".`nev".$nevadd."`LIKE'%".$mona."%')";
		}
		$where.='('.str_replace('AND','OR',$whereor).')';
		
	/*	$where.='('.$SD["table"].".`".$fmezonev.$nevadd."`LIKE'%".$filters[$fmezonev]."%'";
		$where.=' or '.$SD["table"].".`".$fmezonev."_de`LIKE'%".$filters[$fmezonev]."%'";
		$where.=' or '.$SD["table"].".`".$fmezonev."_en`LIKE'%".$filters[$fmezonev]."%')";*/
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


public function get($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl;
	$Sys_Class=new sys();

if (!$filters["maxegyoldalon"])
{
	$maxegyoldalon=8;
}
else{
	$maxegyoldalon=$filters["maxegyoldalon"];
	
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

$fmezonev='idmin';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`id`>'".$filters[$fmezonev]."') ";
}

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


$fmezonev='diab';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='gluten';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='lactose';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
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
$fmezonev='nev';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}


$fmezonev='s';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.="(".$SD["table"].".`nev`LIKE'%".$filters[$fmezonev]."%'";
		$where.=" OR ".$SD["table"].".`bevezeto`LIKE'%".$filters[$fmezonev]."%'";		
		$where.=" OR ".$SD["table"].".`leiras`LIKE'%".$filters[$fmezonev]."%')";				
}


$fmezonev='ingrname';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
	//$mezok.=',recept_alapanyag.occassion_id';
	$tables.=',recept_alapanyag';
		$group=" group by ".$SD["table"].".id";
		$where.=$SD["table"].".id=recept_alapanyag.recept_id";
		$where.=$Sys_Class->andsupport($where);
		$where.="recept_alapanyag.alapanyag_id IN(".$filters[$fmezonev].")";
}


if ($filters['ingridsand']!=''){
		$where.=$Sys_Class->andsupport($where);
	//$mezok.=',recept_alapanyag.occassion_id';
	$tables.=',recept_alapanyag';
		$group=" group by ".$SD["table"].".id";
		$where.=$SD["table"].".id=recept_alapanyag.recept_id";
		$andingrarr=explode('|',$filters['ingridsand']);
		foreach ($andingrarr as $andingra){
		$where.=$Sys_Class->andsupport($where);
		$where.="recept_alapanyag.alapanyag_id in(".$andingra.")";
		}
}





/*
$fmezonev='fav';
if ($filters[$fmezonev]!=''){
	$tables.=',user_favorite_hir';
	$mezokc.=',user_favorite_hir.status as lstat';
	$mezok.=',user_favorite_hir.status as lstat';
	
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].".id=user_favorite_hir.ad_id";
	
	
		$where.=$Sys_Class->andsupport($where);
		$where.="user_favorite_hir.user_id IN (".$filters[$fmezonev].") AND user_favorite_hir.status!=4 ";
}

*/

//ha van feltétel elé csapjuk hogy WHERE	
if ($where!=''){
	$where=" WHERE ".$where;	
}

//összes elem lekérdezése
	$queryc = "SELECT ".$mezokc." FROM ".$tables.$where.$group.' '.$order;
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
	$query = "SELECT ".$mezok." FROM ".$tables.$where.$group.' '.$order.$limit;
//echo $query ;


	$result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	$result['query']=$query ;
	$result['error']=$error ;
	return $result;
}


public function recipe_img($recid,$x=300,$y=0){
	global $folders,$defaultimg,$homeurl,$Text_Class;
	if ($y>0){$imgfileex='2';$yy='&y='.$y;}
		$mappa='uploads/'.$folders["uploads"]."konyha/".$recid;
		$imgx=randomimgtofldr("".$mappa);
if ($imgx!="none"){
	$img=$mappa."/".$imgx;
}
else{
	$img="uploads/".$defaultimg;
}	

	$img=$homeurl."/picture".$imgfileex.".php?picture=".encode($img)."&x=".$x.$yy."&ext=.jpg";

return $img;	
}
public function recipe_url($recip){
	global $homeurl,$separator,$Text_Class;
 $link=$homeurl.$separator."recept/".$recip["id"]."/".$Text_Class->to_link($Text_Class->htmlfromchars($recip["nev"]));	
return $link;	
}

////////////////////////////////

public function egy_hozzavalo($id){
	global $tbl,$adatbazis;
	$qeszkoztipus="
	SELECT * FROM  ".$tbl['alapanyag']." WHERE id=".$id." ";
	$eszkozok=db_Query($qeszkoztipus, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
	return($eszkozok[0]);	
}





public function alapanyagkeres($filter){
	global $tbl,$adatbazis,$Text_Class;
	
	if (($filter["alapanyag_ac"])!=""){
		
$where=" WHERE ((nev like '%".$Text_Class->htmltochars($filter["alapanyag_ac"])."%') OR (nev like '%".$filter["alapanyag_ac"]."%')) or ((nev_en like '%".$Text_Class->htmltochars($filter["alapanyag_ac"])."%') OR (nev_en like '%".$filter["alapanyag_ac"]."%')) or ((nev_de like '%".$Text_Class->htmltochars($filter["alapanyag_ac"])."%') OR (nev_de like '%".$filter["alapanyag_ac"]."%')) AND status=1 ";
}
$qeszkoztipus="
SELECT * FROM  ".$tbl['alapanyag']." ".$where."";
$eszkozok=db_Query($qeszkoztipus, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
return ($eszkozok);	
}



public function alapanyag_keres_form($ertek=array()){
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




}

?>