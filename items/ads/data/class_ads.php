<?php

class ads{

public function status(){
$status=array();
$status[1]='Active';
$status[2]='Editing';
$status[3]='Deleted';
return $status;
    }
    
public function sizes(){
$bannersizes=array();
$i=0;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["nev"]="nincs megadva";

$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="468";
	$bannersizes[$i]["h"]="60";
	$bannersizes[$i]["nev"]="Full Banner (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";


$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="728";
	$bannersizes[$i]["h"]="90";
	$bannersizes[$i]["nev"]="Leaderboard (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";


$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="336";
	$bannersizes[$i]["h"]="280";
	$bannersizes[$i]["nev"]="Square (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

	
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="300";
	$bannersizes[$i]["h"]="250";
	$bannersizes[$i]["nev"]="Square (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

	
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="250";
	$bannersizes[$i]["h"]="250";
	$bannersizes[$i]["nev"]="Square (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

			
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="160";
	$bannersizes[$i]["h"]="600";
	$bannersizes[$i]["nev"]="Skyscraper (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";


$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="120";
	$bannersizes[$i]["h"]="600";
	$bannersizes[$i]["nev"]="Skyscraper (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";


$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="120";
	$bannersizes[$i]["h"]="240";
	$bannersizes[$i]["nev"]="Small Skyscraper (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="240";
	$bannersizes[$i]["h"]="400";
	$bannersizes[$i]["nev"]="Fat Skyscraper (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";
	
	
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="234";
	$bannersizes[$i]["h"]="60";
	$bannersizes[$i]["nev"]="Half Banner (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

	
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="180";
	$bannersizes[$i]["h"]="150";
	$bannersizes[$i]["nev"]="Rectangle (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";
	
	
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="125";
	$bannersizes[$i]["h"]="125";
	$bannersizes[$i]["nev"]="Square Button (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="468";
	$bannersizes[$i]["h"]="120";
	$bannersizes[$i]["nev"]="Full Banner (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

				
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="900";
	$bannersizes[$i]["h"]="120";
	$bannersizes[$i]["nev"]="footerbanner (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

				
$i++;
	$bannersizes[$i]["id"]=$i;
	$bannersizes[$i]["w"]="200";
	$bannersizes[$i]["h"]="320";
	$bannersizes[$i]["nev"]="element4 article (".$bannersizes[$i]["w"]."x".$bannersizes[$i]["h"].")";

				$typ["value"]="id";
				$typ["name"]="nev";	
				return 	$bannersizes;
		
}


public function get($filters){
global $tbl,$adatbazis;	
$where="";
$tables=$tbl["ads"];
if ($filters["adid"]>0){
	$where=" adid in (".$filters["adid"].")";
}

if ($filters["status"]>0){
if ($where!=""){$where.=" AND ";}
	$where.=" ".$tbl["ads"].".status =".$filters["status"];
}


if ($filters["id"]>0){
	if ($where!=""){$where.=" AND ";}
	$where.=" id =".$filters["id"];
}

if ($filters["nid"]!=''){
	if ($where!=""){$where.=" AND ";}
	$where.=" id NOT IN (".$filters["nid"].')';
}

if ($filters["pos"]!=''){
	$tables.=",ads_pos";
	if ($where!=""){$where.=" AND ";}
	$where.=" ".$tbl["ads"].".id =ads_pos.ad_id";
	if ($where!=""){$where.=" AND ";}
	$where.=" ads_pos.pos_id in(".$filters["pos"].")";
	$where.="  AND  ads_pos.status =2";
}

if ($filters["lang"]){
	$tables.=",ads_lang";
	if ($where!=""){$where.=" AND ";}
	$where.=" ".$tbl["ads"].".id =ads_lang.ad_id";
	if ($where!=""){$where.=" AND ";}
	$where.=" ads_lang.lang_id ='".$filters["lang"]."'";
	$where.="  AND  ads_lang.status =2";
}


if ($where!=""){
	$where=" WHERE ".$where;
}


$qlist="SELECT * FROM  ".$tables.$where.";";
//echo $qlist;
$ADS_list=db_Query($qlist, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");

return 	$ADS_list;
}
	
public function print_ads($ads){
	if ($ads["code"]!="" && $ads["url"]!=""){
		//ha mind a ketto ki van töltve akkor csak kép lehet
		echo '<a href="'.$ads["url"].'" target="_blank"><img src="'.$ads["code"].'"></a>';	
	}	
	else
	if ($ads["code"]!=""){
			echo $ads["code"];	
	}
	

	
	
}

public function save($postvalue){
global $tbl,$adatbazis;	
	
	if ($postvalue["id"]>0)
	{
		$qins="
UPDATE  ".$tbl["ads"]."  SET  `code` =  '".$postvalue["code"]."',
`adid` =  '".$postvalue["adid"]."',
`name` =  '".$postvalue["name"]."',
`country` =  '".$postvalue["country"]."',
`sorrend` =  '".$postvalue["sorrend"]."',
`url` =  '".$postvalue["url"]."',
`status` =  '".$postvalue["status"]."' WHERE  `ads`.`id` =".$postvalue["id"].";		
		
		";
	db_Query($qins, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
	$ret=$postvalue["id"];
	
	}
	else {
		$qins="INSERT INTO  ".$tbl["ads"]." (
		`id` ,
		`adid` ,
		`code` ,
		`url` ,
		`status`,
		`name`,
		`country`,
		`sorrend`
		
		)
		VALUES (
		'".$postvalue["id"]."' ,  '".
		$postvalue["adid"]."',  '".
		$postvalue["code"]."',  '".
		$postvalue["url"]."',  '".
		$postvalue["status"]."',  '".
		$postvalue["name"]."',  '".
		$postvalue["country"]."',  '".
		$postvalue["sorrend"]."'
		);";
	db_Query($qins, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
	$ret= mysql_insert_id();
	echo $qins.'<br>'.$error;

	} 
return $ret;	
}

	
public function createtbl($filters){	
$qadstbl="CREATE TABLE IF NOT EXISTS ".$tbl[$tblmodulom]." (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200),
  `adid` int(11) NOT NULL,
  `code` longtext character set utf8 NOT NULL,
  `url` text character set utf8 NOT NULL,
  `sorrend` int(11) NOT NULL default '10',
  `country` varchar(2) NULL default '',
  `status` int(3) NOT NULL default '1',
  PRIMARY KEY  (`id`)

) DEFAULT CHARSET=utf8;
";
$returnquery=db_Query($qadstbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");

	
}





public function save_adlang($ad,$pos,$status=2){
global $tbl,$adatbazis;	

$qins="REPLACE INTO `ads_lang` (`ad_id`, `lang_id`, `status`) VALUES ('".$ad."', '".$pos."', '".$status."');";
//echo $qins;	
	db_Query($qins, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
}


public function get_ad_lang($filters){
global $tbl,$adatbazis;	
$where="";

if ($filters["ad_id"]>0){
	$where=" ad_id in (".$filters["ad_id"].")";
}

if ($filters["status"]>0){
if ($where!=""){$where.=" AND ";}
	$where.=" status =".$filters["status"];
}else{
if ($where!=""){$where.=" AND ";}
		$where.=" status =2";

}


if ($filters["lang_id"]>0){
if ($where!=""){$where.=" AND ";}
	$where.=" lang_id =".$filters["lang_id"];
}


if ($where!=""){
	$where=" WHERE ".$where;
}


$qlist="SELECT * FROM  `ads_lang`".$where.";";
//echo $qlist;
$ADS_list=db_Query($qlist, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");

return 	$ADS_list;
}



public function save_adpos($ad,$pos,$status=2){
global $tbl,$adatbazis;	

$qins="REPLACE INTO `ads_pos` (`ad_id`, `pos_id`, `status`) VALUES ('".$ad."', '".$pos."', '".$status."');";
//echo $qins;	
	db_Query($qins, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
}
public function get_ad_pos($filters){
global $tbl,$adatbazis;	
$where="";

if ($filters["ad_id"]>0){
	$where=" ad_id in (".$filters["ad_id"].")";
}

if ($filters["status"]>0){
if ($where!=""){$where.=" AND ";}
	$where.=" status =".$filters["status"];
}else{
if ($where!=""){$where.=" AND ";}
		$where.=" status =2";

}


if ($filters["pos_id"]>0){
if ($where!=""){$where.=" AND ";}
	$where.=" pos_id =".$filters["pos_id"];
}


if ($where!=""){
	$where=" WHERE ".$where;
}


$qlist="SELECT * FROM  `ads_pos`".$where.";";
//echo $qlist;
$ADS_list=db_Query($qlist, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");

return 	$ADS_list;
}

public function get_sizes_id($max_x=1230,$max_y=1024,$min_x=0,$min_y=0){
	if($max_x==0)$max_x=2000;
	if($max_y==0)$max_y=2000;	
	//echo $x.','.$y.'<br>';
	global $Sys_Class;
	$ret='';
	$adspos=$this->sizes();
	foreach ($adspos as $pos)
	{
		//echo $pos['w'].'<'.$max_x.'&&'.$pos['h'].'<'.$max_y.'<br>';
		if( 
		$pos["id"]>0&&
		(($pos['w']<=$max_x) && ($pos['h']<=$max_y))
		&& 
		(($pos['w']>=$min_x) && ($pos['w']>=$min_x))
		){
		$ret.=$Sys_Class->comasupport($ret);	
		$ret.=$pos['id'];	
		}
	}	
	//echo $ret;
	return $ret;
}
	
}




?>