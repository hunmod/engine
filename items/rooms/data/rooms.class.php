<?php
class rooms{
	
public function status(){
	$status[1]= lan('status1');
	$status[2]= lan('status2');
	$status[3]= lan('status3');
	$status[4]= lan('status4');
	return $status;
}
public function tipus(){
	global $lan;
	$status[1]=lan('foej');
	$status[2]=lan('szobaej');
	$status[3]=lan('fo');
	$status[4]=lan('szoba');
	$status[5]=lan('ar');
	return $status;
}
	public function kedvezmenytipus(){
	global $lan;
	$status[1]=lan('ar');
	$status[2]=lan('szazalek');
	return $status;
}
public function roomtipus(){
	global $lan;
	$status[1]=lan('duplaagy');
	$status[2]=lan('franciaagy');
	$status[3]=lan('lakosztaly');

	return $status;
}

public function table_room_text($lang){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table='rooms_text_'.$lang;

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]= 0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL PRIMARY KEY,";
	$mezok[]=$mezo;

	$mezo=array();		
	$mezo["id"]='title';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="title";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='leadtext';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="leadtext";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='longtext';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="longtext";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='included';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="included";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT";
	$mezok[]=$mezo;

	$datas['mysql_end']=")ENGINE = MYISAM ;";
	$datas['table']=$table;
	$datas['mezok']=$mezok;
	return $datas;

}
public function table_room(){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table='rooms';

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='maxroom';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="maxroom";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='priece';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="priece";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;


	$mezo=array();
	$mezo["id"]='priece1';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="priece1";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;


	$mezo=array();
	$mezo["id"]='priece2';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="priece2";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='roomsize';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="roomsize";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;


	$mezo=array();		
	$mezo["id"]='tip';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="tip";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='roomtip';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="roomtip";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();		
	$mezo["id"]='childbad';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="potagy";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='osszenyithato';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="osszenyithato";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='erkely';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="erkely";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='guestbad';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="potagy";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='roomnum';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="helyiseg";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='bathroom';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="furdo";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='kitchen';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="konyha";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '0',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='connectedservices';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="connectedservices";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='sorrend';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="sorrend";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '5',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$mezo=array();
	$mezo["id"]='status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="status";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '1',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;

	$datas['mysql_end']=")ENGINE = MYISAM ;";
	$datas['table']=$table;
	$datas['mezok']=$mezok;
	return $datas;




}
public function table_fields(){
	global $adatbazis,$tbl;

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	$mdata=$this->table_room();
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
	$datas['mezok']=$mezok;
	
	return $datas;	
}
public function table_fields_text($lan){
	global $adatbazis,$tbl;

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	$mdata=$this->table_room_text($lan);
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
	$datas['mezok']=$mezok;
	
	return $datas;	
}

public function get_text($lang,$filters,$order='',$page='all')
{
	global $adatbazis,$tbl,$prefix;
	$Sys_Class=new sys();

	if($lang==''){
		$lang='hu';
	}

	if ($filters['maxegyoldalon']>0){
		$maxegyoldalon=$filters['maxegyoldalon'];
	}else{
		$maxegyoldalon=8;
	}

	$SD=$this->table_room_text($lang);

	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
	}

	//a t�bla saj�t mez�i
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);
		$mezok.=$mezoe['table'];
	}
	//T�bl�zatok
	$tables=$SD["table"];

//ez kell az �sszes tal�lat megsz�mol�s�hoz
	$mezokc.='count('.$SD["table"].'.id) as count';


//sz�mos felt�telek
	$fmezonev='id';
	if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
	}
	$fmezonev='ids';
	if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`id` in (".$filters[$fmezonev].") ";
	}

//ha van felt�tel el� csapjuk hogy WHERE
	if ($where!=''){
		$where=" WHERE ".$where;
	}

//�sszes elem lek�rdez�se
	$queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
	$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	//echo $queryc;
	//arraylist ($resultc);
	$result['count']=$resultc[0]['count'];

//oldalaz�
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
			//oldalak kisz�mol�sa

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
	global $adatbazis,$tbl,$prefix;
	$Sys_Class=new sys();

if ($filters['maxegyoldalon']>0){
	$maxegyoldalon=$filters['maxegyoldalon'];
	}else{
	$maxegyoldalon=8;
}

	$SD=$this->table_room();
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
	}

	//a t�bla saj�t mez�i
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);	
		$mezok.=$mezoe['table'];	
	}
	//T�bl�zatok
	$tables=$SD["table"];
	if($filters['lang']) {
		$SD2 = $this->table_room_text( $language = $filters['lang'],$data = array());
		$tables .= ',' . $SD2["table"];

		$mezok .= $Sys_Class->comasupport($mezok);
		$mezok .= $SD2["table"] . ".title as 'title'";
		$mezok .= $Sys_Class->comasupport($mezok);
		$mezok .= $SD2["table"] . ".leadtext as 'leadtext'";
		$mezok .= $Sys_Class->comasupport($mezok);
		$mezok .= $SD2["table"] . ".longtext as 'longtext'";
		$where .= $Sys_Class->andsupport($where);
		$where .= $SD2["table"] . ".id" . ' = ' . $SD["table"] . ".id ";
	}





	/*.',location_citys_data';
	$mezok.=',location_citys_data.city_name as varos_nev ';
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].'.varos=location_citys_data.city_id';
*/
	//m�sik t�bla mez�i hozz�ad�sa
		//$mezok.='tabla.mezo'
		//t�bla kapcsolat
		//$where.=$SD["table"].".mezo=tabla.mezo";

//ez kell az �sszes tal�lat megsz�mol�s�hoz	
	$mezokc.='count('.$SD["table"].'.id) as count';


//sz�mos felt�telek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}
	$fmezonev='ids';
	if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`id` in (".$filters[$fmezonev].") ";
	}

//ha van felt�tel el� csapjuk hogy WHERE	
if ($where!=''){
	$where=" WHERE ".$where;	
}

//�sszes elem lek�rdez�se
	$queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
	$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	//echo $queryc;
	//arraylist ($resultc);
	$result['count']=$resultc[0]['count'];
	
//oldalaz�	
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
	//oldalak kisz�mol�sa
	
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
public function save_text($lan,$datas)
{
	global $adatbazis;
	$Sys_Class=new sys();
	//t�bla adatai
	$SD=$this->table_fields_text($lan);	
	$mtbl=$this->table_room_text($lan);
	
//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
		//insert
		foreach ($mtbl["mezok"] as $mezoe)
		{
			$mezok.=$Sys_Class->comasupport($mezok);	
			$mezok.=$mezoe['table'];	
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="'".($datas[$mezoe['id']])."'";
		}
		$query="replace INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
		//echo $query.'<br>';
		//echo $error.'<br>';
		$res=mysql_insert_id();

return($res);//csak id-t ad vissza
}
public function save($datas)
{
	global $adatbazis;
	$Sys_Class=new sys();
	//t�bla adatai
	$SD=$this->table_fields();	
	$mtbl=$this->table_room();	
	
//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
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
		//echo $query.'<br>';
		//echo $error.'<br>';
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

public function getimg($id,$x=369,$y=247){
	global $adatbazis,$folders,$defaultimg,$room_loc,$homeurl;

	$img=$room_loc.'/'.$id.'/'.$id.'.jpg';
	//$img=randomimgtofldr($mappa);
	//echo $img;
	if (is_file($img)){
		$img=$img;
	}
	else{
		$img="/uploads/".$defaultimg;
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
	return $homeurl.$separator."rooms/room/".$hir["id"]."/".$Text_Class->to_link($hir["hu"]["title"]);
}

public function create_table(){
	global $adatbazis;
	$SD=$this->table_room();
	$q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
	foreach ($SD["mezok"] as $mezo){
		$q.=" ".$mezo["mysql_field"];

	}
	$q.=" ".$SD["mysql_end"];

	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
//		echo $q.'<br>';
//		echo $error;
}
public function create_table_text($lang){
	global $adatbazis;
	$SD=$this->table_room_text($lang);
	$q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
	foreach ($SD["mezok"] as $mezo){
		$q.=" ".$mezo["mysql_field"];

	}
	$q.=" ".$SD["mysql_end"];

	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
	//echo $q.'<br>';
	//echo $error;
}


}
$RoomsClass=new rooms();

$RoomsClass->create_table();
$RoomsClass->create_table_text('hu');
$artipus=$RoomsClass->tipus();
$roomtipus=$RoomsClass->roomtipus();
$roomstatus=$RoomsClass->status();
$kedvezmenytipus=$RoomsClass->kedvezmenytipus();
?>