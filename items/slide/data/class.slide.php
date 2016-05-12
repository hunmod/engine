<?php 
class slide{
	
public function create_tables(){
			global $adatbazis;

$q="
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `imgurl` varchar(400) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `description` text,
  `status` int(2) NOT NULL DEFAULT '2',
  `sorrend` int(3) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

";
db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "create");	
}


public function get_sorrend(){
	return range(1, 20);
}	

	
public function insert($data){
		global $adatbazis,$Text_Class;

	if(isset($data["name"]))$data["name"]=$Text_Class->htmltochars($data["name"]);
	if(isset($data["description"]))$data["description"]=$Text_Class->htmltochars($data["description"]);


	if ($data['id']>0)
	{
		$this->update($data);
	}
	else {
		$query="INSERT INTO  `slide` (`id` ,`name` ,`imgurl` ,`url`,`description` ,`status` ,`sorrend`)
		VALUES (NULL ,  '".$data["name"]."',  '".$data['imgurl']."', '".$data['url']."', '".$data['description']."', '".$data['status']."', '".$data['sorrend']."');";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "insert")
		;
		//echo $query;
		//echo $error;

		
		return 	mysql_insert_id();
	}
}	


public function update($datas){
global $adatbazis,$Text_Class;

	if(isset($datas["name"]))$datas["name"]=$Text_Class->htmltochars($datas["name"]);
	if(isset($datas["description"]))$datas["description"]=$Text_Class->htmltochars($datas["description"]);


	$mezoka[]='name';
	$mezoka[]='imgurl';	
	$mezoka[]='url';	
	$mezoka[]='description';	
	$mezoka[]='status';	
	$mezoka[]='sorrend';	

		foreach ($mezoka as $mezoe)
		{
			//echo '<br>|'.$mezoe.'<br>';
			//echo '|<br>';
			if (isset($datas[$mezoe])){
			$datasb.=$this->comasupport($datasb);	
			$datasb.="`".$mezoe."` =  '".$datas[$mezoe]."'";
			}
		}
			//echo '<br>|'.$datasb.'<br>';

		$query="UPDATE  `slide` SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
		//echo $query;
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
		//echo $error;
			

}	
	


public function get($filters){
global $adatbazis,$Text_Class;
	$mezoka[]='id';	
	$mezoka[]='name';	
	$mezoka[]='url';
	$mezoka[]='imgurl';	
	$mezoka[]='description';	
	$mezoka[]='`status`';	
	$mezoka[]='`sorrend`';

	$tablak="slide";
	
		$where.=" WHERE slide.id!='0'";
	
if ($filters["id"]>0){
		$where.=" AND slide.id='".$filters["id"]."'";
}	
if ($filters["status"]>0&&$filters["status"]!='all'){
		$where.=" AND slide.status='".$filters["status"]."'";
		
}	

$order=' ORDER BY `sorrend` ASC ';


		foreach ($mezoka as $mezoe)
		{
			$mezok.=$this->comasupport($mezok);	
			$mezok.=$mezoe;
		}
			//echo '<br>|'.$datasb.'<br>';

		$query="SELECT ".$mezok." FROM ".$tablak.$where.$order;
		//echo $query;
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
		//echo $error;
	foreach($result as &$data){
		if(isset($data["name"]))$data["name"]=$Text_Class->htmlfromchars($data["name"]);
		if(isset($data["description"]))$data["description"]=$Text_Class->htmlfromchars($data["description"]);
	}
		$res["datas"]=$result;
		return $res;

}	





public function comasupport($where)
{
	if($where==""){
	$whereb='';
	}
	else
	{
	$whereb=',';
	}
	return $whereb;
	
}

public function printbanner($data)
{
	global $server_url;
	if ($data["imgurl"]){
				$img="picture.php?picture=".encode($data['imgurl'])."&ext=.jpg";

		echo '<a href="'.$data["url"].'" target="_blank"><img src="'.$server_url.$img.'"></a>'	;
	}
}
public function printslide($data)
{
	if ($data["imgurl"]){
		if ($data["url"]){	
			echo '<a href="'.$data["url"].'" target="_blank"><img src="'.$data["imgurl"].'"></a>'	;
		}
		else{
			echo '<img src="'.$data["imgurl"].'">'	;		
		}
	}
	if ($data["description"]){
		
		echo '<div class="slidetext">'.$data["description"].'</div>';		

	}
}
	
}
?>