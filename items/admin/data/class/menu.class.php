<?php
class menu{

public function jog(){
	$status[0]='Everyone';
	$status[1]='User';
	$status[2]='Member';
	$status[3]='Moderator';
	$status[4]='Admin';
	$status[4]='Super Admin';	
	return $status;
}

public function status(){
	$status[1]='Active';
	$status[2]='Editing';
	$status[3]='Deleted';
	return $status;
}

	
public function table(){
	global $adatbazis,$tbl;
	$table=$tbl['menu'];
		$mezo=array();
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["length"]='20';
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();
	$mezo["id"]='mid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="menu id";
	$mezo["display"]=0;
	$mezo["length"]='11';
	$mezo["type"]='int';
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
	$mezo["id"]='leiras';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Leírás";
	$mezo["display"]=1;
	$mezo["type"]='text';
	$mezo["requied"]=0;	
		$mezok[]=$mezo;		
		$mezo=array();
	$mezo["id"]='modul';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="modul";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='20';
	$mezo["requied"]=0;	
		$mezok[]=$mezo;
		$mezo=array();
	$mezo["id"]='file';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="file";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='20';
	$mezo["requied"]=0;	
		$mezok[]=$mezo;
		$mezo=array();
	$mezo["id"]='item';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="file";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["length"]='50';
	$mezo["requied"]=0;	
		$mezok[]=$mezo;
		$mezo=array();
	$mezo["id"]='jogid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Jogosultság";
	$mezo["display"]=0;
	$mezo["length"]='11';
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();
	$mezo["id"]='status';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Status";
	$mezo["display"]=0;
	$mezo["length"]='6';
	$mezo["type"]='int';
		$mezok[]=$mezo;
		$mezo=array();		
	$mezo["id"]='sorrend';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="sorrend";
	$mezo["display"]=0;
	$mezo["length"]='4';
	$mezo["type"]='int';
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

public function get_one_menu($id) 
{
	$filters['id']=$id;
	$filters['status']='all';
	$menus=$this->get_menu($filters,'','all');
	$menu=$menus["datas"][0];
	//
	return $menu;
}



public function menu_selectbox($id=0,$return=array(),$filters=array(),$nevhez='') 
{
	$filters2=$filters;
	$filters2['mid']=$id;
if ($filters2['status2']){
	unset($filters2['status']);
	unset($filters2['file']);
	unset($filters2['modul']);
}
	$menus=$this->get_menu($filters2,'','all');
	//arraylist($menus);
	$menu=$menus["datas"];
	//arraylist($menu);
	
if (count($menu[0])>0){
	foreach ($menu as $elem){
		$nevhez1="";
		$elem["nev"]=$nevhez.$elem["nev"];
		$return[]=$elem;
		$nevhez1=$elem["nev"]."-";
		
	$return=$this->menu_selectbox($elem["id"],$return,$filters,$nevhez1);
	}
}
	return $return;

	//
}

public function menu_selectboxfilter($id=0,$return=array(),$filters=array(),$nevhez='')
{
	//$filter["jogid"]=5;
		
	
	
$datas=$this->menu_selectbox($id,$return,$filter,$nevhez);
foreach ($datas as $data){

	if ( $filters["modul"]==""||($filters["modul"]!="" && $data["modul"]==$filters["modul"]) ){
		
		
$datas2[]=	$data;
	}
}

return	$datas2;
}


public function get_menus_down($id,$filters=array(),$order="") 
{

	$filters['mid']=$id;
	$mmenus=$this->get_menu($filters,$order,'all');
	$menus=$mmenus["datas"];
	//
//arraylist($mmenus);

	foreach ($menus as $elem){
			$vissza=$elem;
			$vissza["alatta"]=$this->get_menus_down($elem["id"],$filters);
			$return[]=$vissza;
	}
	return $return;
}
public function menulistafel($id)
{
	$menulistafel=array();

	do {//echo $id.",";
		$egysor=$this->get_one_menu($id);
			$menulistafel[]=$egysor;
			$id=$egysor["mid"];
		//var_dump($egysor);echo " XXX ";
		//menulistafel($fideglenes);
	} while ($egysor["mid"]>0);
	return $menulistafel;
}

//user lekérdezése
public function get_menu($filters,$order='',$page='all') 
{
	global $adatbazis,$tbl,$auser;
	//arraylist($auser);
	$Sys_Class=new sys();

	$maxegyoldalon=20;
	$SD=$this->table_fields();	
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}else{
		$order=' ORDER BY sorrend ASC ';
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
if (isset($filters[$fmezonev])){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}

$fmezonev='midin';
if (isset($filters[$fmezonev])){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`mid` IN (".$filters[$fmezonev].")";
}

$fmezonev='jogid';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`<='".$filters[$fmezonev]."'";
}else
if ($auser["jog"]>0){
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].".`".$fmezonev."`<=".$auser["jog"]." ";
}
else
{
		$where.=$Sys_Class->andsupport($where);
		$where.="".$SD["table"].".`".$fmezonev."`=0 ";

}



$fmezonev='status';
if ($filters[$fmezonev]>0){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."'";
}
else if($filters[$fmezonev]!='all') {
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`='1'";}

//szöveges feltételek	
$fmezonev='nev';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'%".$filters[$fmezonev]."%'";
}

$fmezonev='modul';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'".$filters[$fmezonev]."'";
}
$fmezonev='file';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'".$filters[$fmezonev]."'";
}
$fmezonev='item';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.=$SD["table"].".`".$fmezonev."`LIKE'".$filters[$fmezonev]."'";
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

	$result['query']=$query ;
	$result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	return $result;
}


public function menu_img($uid,$x=200,$y=200){
global $oldalid,$defaultimg,$menuimg_folder;
//echo $defaultimg;
		if (file_exists($menuimg_folder."/".$uid."/".$uid.".jpg"))
		{
		$ret['menu_img']=$menuimg_folder."/".$uid."/".$uid.".jpg";	
		$ret['menu_img_url']=	$dbadat["menu_image"]='picture2.php?picture='.encode($ret['menu_img'])."&x=".$x."&y=".$y."";
		}
		else {
		$ret['menu_img']=NULL;	
		$ret['menu_img_url']=	$dbadat["menu_image"]='picture2.php?picture='.encode('./uploads/'.$defaultimg)."&x=".$x."&y=".$y."";
		}
		
		if (file_exists($menuimg_folder."/".$uid."/".$uid."h.jpg"))
		{
		$ret['menu_hover']=$menuimg_folder."/".$uid."/".$uid."h.jpg";	
		$ret['menu_hover_url']=	'picture2.php?picture='.encode($ret['menu_hover'])."&x=".$x."&y=".$y."";
		}
		else {
		$ret['menu_hover']=NULL;	
		$ret['menu_hover_url']=	'picture2.php?picture='.encode('uploads/'.$defaultimg)."&x=".$x."&y=".$y."";
		}
		
				

		return $ret;
	
}

public function menulink($text){
	$retur="";
	if ($text!=""){
		$retur="/".$text;
	}	
return $retur;
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
		//echo $query;
		//echo $error;

	}
return($res);//csak id-t ad vissza
}



public function create_table(){
	global $adatbazis;
	$SD=$this->table_fields();
	
$q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (
  `id` bigint(20) NOT NULL auto_increment,
  `mid` int(11) NOT NULL default '0',
  `nev` varchar(100) NOT NULL,
  `leiras` TEXT NOT NULL,
  `modul` varchar(20) NOT NULL,
  `file` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `jogid` int(11) NOT NULL default '0',
  `status` smallint(6) default '1',
  `sorrend` int(4) NOT NULL default '10',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;
";
	
	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");	
		//echo $q.'<br>';
		//echo $error;			
}


public function printmenu($menuarray,$level=3,$mylevel=0){
	global $homeurl,$separator;

if (count($menuarray)&&$mylevel<$level){
	//arraylist($menuarray);
echo '<ul>';
foreach ($menuarray as $menuelem){
    if (($menuelem["status"]=="1")){
	echo '<li>';	
                if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
                  $almenu=$menuelem["alatta"];
		
		echo '<a href="'. 
		 $homeurl.$separator.$this->shorturl_get("m/".$menuelem["id"]);?>"><?php echo $menuelem["nev"].
		'</a>';	  
		$this->printmenu($almenu,$level,$mylevel++);
	echo '</li>';					  
	}
}
echo '</ul>';	
}
}


public function printmenu2($menuarray,$level=3,$mylevel=0){
	global $homeurl,$separator;
	///if (count($menuarray)&&$mylevel<$level){
	if (count($menuarray)){
	//arraylist($menuarray);
echo '<ul>';
foreach ($menuarray as $menuelem){
    //if (($menuelem["status"]=="1" || (!$menuelem["status"]) )){
		if ($menuelem["name"])$menuelem["nev"]=$menuelem["name"];
		if ($menuelem["modules"])$menuelem["modul"]=$menuelem["modules"];
		if ($menuelem["files"])$menuelem["file"]=$menuelem["files"];

	echo '<li>';
                if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
                  $almenu=$menuelem["alatta"];
		
		echo '<a href="'. 
		 $homeurl.$separator.$this->shorturl_get($menuelem["modul"]."/".$menuelem["file"]."/".$menuelem["item"]);?>"><?php echo $menuelem["nev"].'</a>';
		$this->printmenu2($almenu,$level,$mylevel++);
	echo '</li>';					  
	//}
}
echo '</ul>';	
}
}

function shorturl_get_data($getq){
global $tbl,$adatbazis;	
$q="SELECT get,params FROM ".$tbl["short_url"]." WHERE `params` LIKE '".$getq."' LIMIT 1";
	$eredmeny=db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'select');
//echo $q;
	if (isset($eredmeny[0]['get'])&& $eredmeny[0]['get']!=""){
		return $eredmeny[0]['get'];
	}
	else{
		return $getq;
	}
}


public function shorturl_get($q){
	$q=str_replace('//','/',$q);
	$qex=explode('/',$q);
	if (count($qex)<4 ){
	$q=($this->shorturl_get_data($q));
	$qex=explode('/',$q);
	if ($qex[0]=='m' && $qex[1]>0){
		$menudatas=$this->get_one_menu($qex[1]);
		//var_dump($menudatas);
		if ($menudatas['id']>0){
			if ($menudatas['item']==''){$menudatas['item']=$menudatas['id'];}
			$gk=$menudatas['modul'].'/'.$menudatas['file'].'/'.$menudatas['item'];
		//var_dump($gk);
			$q=($this->shorturl_get_data($gk));
		}
	}
	}
	return	$q;
}

}
$tblmodul = 'menu';
$tbl[$tblmodul] = $adatbazis["db1_db"] . "." . $prefix . "menu";
$MenuClass = new menu();
$menustatusarray=$MenuClass->status();

?>