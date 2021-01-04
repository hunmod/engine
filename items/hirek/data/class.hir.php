<?php
class hir extends sys{
	
public function status(){
	global $lan;
	$status[1]= lan('edit');
	$status[2]=lan('aktiv');
	$status[3]=lan('procces');
	$status[4]=lan('del');
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
	$table=$tbl['hir'];

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
		

	$mezo["id"]='cim';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Név";
	$mezo["display"]=1;
	$mezo["type"]='varchar';
	$mezo["requied"]=1;		
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
		
	$mezo["id"]='hir';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="Oldal";
	$mezo["display"]=1;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();	
	
	$mezo["id"]='hir2';
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

	$mezo["id"]='ido';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ido";
	$mezo["display"]=0;
	$mezo["displaylist"]=0;
	$mezo["type"]='text';
	$mezo["value"]=$data[$mezo["id"]];
		$mezok[]=$mezo;
		$mezo=array();

	$mezo["id"]='like_count';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="like_count";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
		$mezo=array();
		
	$mezo["id"]='favorite_count';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="favorite_count azonosító";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=0;
	$mezo["value"]=$data[$mezo["id"]];	
		$mezok[]=$mezo;
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



//menu kapcsolat
	$mezok.=$Sys_Class->comasupport($mezok);	
	$mezok.="menu.nev as menu_name";
	$tables.=','.'menu';
	$where.=$Sys_Class->andsupport($where);
	$where.=$SD["table"].".mid="."menu.id";

//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}

$fmezonev='mid';
if ($filters[$fmezonev]!='' && $filters[$fmezonev]!='all'){
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
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `ido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) DEFAULT '1',
  `sorrend` int(11) NOT NULL DEFAULT '10',
  `like_count` INT NOT NULL,
  `favorite_count` INT NOT NULL,
  
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
	$img=defaultimg;
}	
$img=homeurl."/picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";

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

//tags
public function create_tags_table(){
	
	
$q="
CREATE TABLE IF NOT EXISTS `hir_tags` (
  `rec_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";	
}


//like
public function create_like_table(){
	
	
$q=
"
CREATE TABLE IF NOT EXISTS `user_like_hir` (
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
CREATE TABLE IF NOT EXISTS `user_favorite_hir` (
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`ad_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";	
}

//tags recipe
public function del_ad_tags($rec_id)
{
		//a bloghoz tartozó tagek törlése
			$gettags_blog=$this->get_tags_blog($rec_id);
			if (count($gettags_blog)){
				foreach ($gettags_blog as $one)
					$save_tags=array();
					$save_tags["tag_id"]=$one["tag_id"];
					$save_tags["rec_id"]=$one["rec_id"];
			$this->update_tags_blog($save_tags);			
			}	
}

public function save_ad_tags_field($data){
{
$this->del_ad_tag(array('rec_id'=>$data["id"]));
		//vesszővel elválasztva a tag id-k.
		//arraylist($data);
		if ($data["blog_tags"]&&$data["id"]){
			$tags=explode(',',$data["blog_tags"]);
		
				//a bloghoz tartozó tagek mentése		
					if (count($tags))
					{
						foreach ($tags as $onetag){
							if ($onetag>0){
								$save_tags=array();
								$save_tags["tag_id"]=$onetag;
								$save_tags["rec_id"]=$data["id"];
			
									$this->save_ad_tag($save_tags);							
							}
						}
						}
						}
						}

}



public function del_ad_tag($data){
		global $adatbazis;

	if ($data['rec_id']>0||$data['tag_id']>0)
	{
		
	if ($data['rec_id']>0){	
		$WHERE="`rec_id`='".$data['rec_id']."'";
	}
	

	if ($data['tag_id']>0){
	if ($WHERE!=""){	
		$WHERE.=" AND ";
	}	
				
		$WHERE.="`tag_id`='".$data['tag_id']."'";
	}	
	
		$query="DELETE FROM `hir_tags` WHERE ".$WHERE;
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "delete");	
			//echo $query;
		
	}


	
	
}





//like, favorietes
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