<?php
class bf extends sys{
	
public function status(){
	global $lan;
	$status[1]= $lan['status1'];
	$status[2]=$lan['status2'];
	$status[3]=$lan['status3'];
	$status[4]=$lan['status4'];
	return $status;
}

	public function tipus(){
		$status[1]= 'INTÉZMÉNY';
		$status[2]= 'LÁTNIVALÓ';
		$status[3]= 'SZÁLLÁS';
		$status[10]= 'szallas és vendéglátás';		
		$status[4]= 'VENDÉGLÁTÁS';
		$status[5]= 'BORÁSZAT';
		$status[6]= 'ŐSTERMELŐ';
		$status[7]= 'KÉZMŰVES';
		$status[8]= 'BICIKLIKÖLCSÖNZŐ';
		$status[9]= 'SZÉPSÉGIPAR';
		$status[11]= 'valami';
		$status[0]= 'EGYÉB';
		return $status;
	}

public function table($data=array()){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table=$tbl['bf'];

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
	$mezo["name"]="nev";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();
	
		
		
	$mezo=array();		
	$mezo["id"]='tipus';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="tipus";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo=array();
	$mezo["id"]='varos';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="varos";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='zip';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="varos";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();


	$mezo["id"]='street';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Utca";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='hsz';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="hsz";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='leiras';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="leiras";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='megjegyzes';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="megjegyzes";
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
	
	$mezo["id"]='ido';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ido";
	$mezo["display"]=0;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='wifi';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="wifi";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
			
	$mezo["id"]='szepkartya';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="szepkartya";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
			
	$mezo["id"]='erzsebetkartya';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="erzsebetkartya";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='bringa';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="bringa";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;

	$mezo["id"]='allat';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="allat";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;

	$mezo["id"]='dohanyzo';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="dohanyzo";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;

	$mezo["id"]='balatonltav';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="balatonltav";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;

	$mezo["id"]='medence';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="medence";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo["id"]='telen';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="telen";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo["id"]='specdieta';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="specdieta";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;



	$mezo["id"]='sport';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="sport";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;

	$mezo["id"]='pos';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="pos";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;


	$mezo["id"]='roki';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="roki";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;


	$mezo["id"]='konyha';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="konyha";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo["id"]='gyerek';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="gyerek";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo["id"]='facebook';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="facebook";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo["id"]='web';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="web";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	
	$mezo["id"]='email';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="email";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;	
	
	$mezo["id"]='telefon';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="telefon";
	$mezo["display"]=0;
	$mezo["type"]='varchar';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;


	$mezo["id"]='support';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="support";
	$mezo["display"]=0;
	$mezo["type"]='bool';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;



	$mezo["id"]='szamlazasicim';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="szamlazasicim";
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
		$where.=$SD["table"].".`".$fmezonev."`='2'";
	}


$fmezonev='tag';
if ($filters[$fmezonev]!=''){
	$tables.=',hir_tags,tags';
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].".id=hir_tags.rec_id";
	$where.=$Sys_Class->andsupport($where);
	$where.="tags.id=hir_tags.tag_id";
	
	
		$where.=$Sys_Class->andsupport($where);
		$where.="tags.name LIKE '".$filters[$fmezonev]."'";
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
		$where.=" OR ".$SD["table"].".`hir`LIKE'%".$filters[$fmezonev]."%'";		
		$where.=" OR ".$SD["table"].".`hir2`LIKE'%".$filters[$fmezonev]."%')";				
}

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
		//echo($query);
		echo '<br>'.'<br>'.'<br>'.'<br>'.'<br>'.$query.'<br>';
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
  `mid` bigint(20) NOT NULL DEFAULT '0',
  `cim` varchar(200) NOT NULL,
  `hir` text NOT NULL,
  `hir2` text NOT NULL,
  `telefon` text NOT NULL,
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `ido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) DEFAULT '1',
  `sorrend` int(11) NOT NULL DEFAULT '10',
  `like_count` INT NOT NULL,
  `favorite_count` INT NOT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
	";
		//$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
		//echo $q.'<br>';
		//echo $error;			
}
public function getimg($id,$x=369,$y=247){
	global $adatbazis,$folders,$defaultimg,$bfimg_loc,$homeurl;
	
	$img=$bfimg_loc.''.$id.'/'.$id.'.jpg';
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
//



}

?>