<?php
$tblmodul='chron';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."system_chron";

$file_structuct=array();
$file_structuct["modules"]="chrone";
/*
$file_structuct["name"]="Cron";
$file_structuct["file"]="list";
$adminmenu[]=$file_structuct;
*/
if ($tblexists[$tbl["chron"]]!=1)
{
$qcreate_system_chron="CREATE TABLE IF NOT EXISTS ".$tbl["chron"]." (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `file` text NOT NULL,
  `lastrun` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `intervalt` bigint(20) NOT NULL default '60' COMMENT 'minute',
  `status` int(3) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `intervalt` (`intervalt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
$returnquery=db_Query($qcreate_system_chron, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
echo $error;
}
//var_dump($returnquery);

function select_one_cron($id){
	global $tbl,$adatbazis;
	$where=" WHERE id=".$id." ";
	$qchrone="SELECT * FROM  ".$tbl['chron'].$where." LIMIT 0 , 30";
	$chronlist=db_Query($qchrone, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
	return $chronlist[0];
}
function cron_editform_form($ertek=array()){
	global $sidemenu1,$status,$vat,$sorrendarray;
		$elem=array();
		$elem["name"]="id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="id";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="name";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="name";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="file";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="Modul .\items";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="lastrun";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="lastrun";	
		$elem["tipe"]="datetime";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="intervalt";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="interval";	
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

return $formelements;
}


?>