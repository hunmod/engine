<?php
//
class sys{
//curl functions
public function curl_download($Url){
	global $currlsslfile;
    // is cURL installed yet?
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
    // Now set some options (most are optional)
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    // Download the given URL, and return output
    $output = curl_exec($ch);
    // Close the cURL resource, and free system resources
    curl_close($ch);
    return $output;
}
public function curl_cli_post($input,$server_url)
{
    $input_enc= rawurlencode(json_encode($input));
    $input_enc2 = 'input='.$input_enc;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $server_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $input_enc2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output_enc = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output_enc, TRUE);
    return $output;
}
public function curl_srv($input,&$retval,&$inval)
{
    $input_dec_kozb=$input;
    $retval['debug']['input_enc2_hossz']=strlen($input);
    $retval['debug']['input_enc2']=$input;
    $input_dec=  rawurldecode($input_dec_kozb);
    $input_dec_2 = json_decode($input_dec, TRUE);
    $retval['debug']['input_dec_elemszam']=count($input_dec_2);
    $inval=$input_dec_2;
    //$inval=  obj_bol_arr($input_dec_2);
    //$inval=  get_object_vars($input_dec);
    $retval['inval']=$inval;
}
////////////////
public function arraylist($input){
if (count($input)>0){
foreach ($input as $value1=>$first){
 echo '<div style="margin-left:10px;border:#000 1px solid;text-align:left;background: #fffacd;">';
 echo "<strong>".$value1."</strong><br>";
  if (!is_array($first))
  {
	echo($first);
  }
  else{
	arraylist($first)	;
  }
  echo "</div>";
}
}
else echo "<hr>Nem kaptam adatot!<hr>";
}
//
public function comasupport($where)
{
	if($where==""){
		$whereb='';
	}else
	{
		$whereb=',';
	}
	return $whereb;

}
public function andsupport($where)
{
	if($where==""){
		$whereb='';
	}else
	{
		$whereb=' AND ';
	}
	return $whereb;

}
public function orsupport($where)
{
	if($where==""){
		$whereb='';
	}else
	{
		$whereb=' OR ';
	}
	return $whereb;

}
public function sqlwhereand($where)
{

	if($where==""){
		$whereb=' WHERE ';
	}else
	{
		$whereb=' AND ';
	}
	return $whereb;
}
//lista tábla létrehozása, név, id status
public function create_list($tablename){
	 	global $adatbazis;

$q="CREATE TABLE  `".$tablename."` (
 `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `name` VARCHAR( 400 ) NOT NULL ,
 `status` TINYINT NOT NULL
) ENGINE = MYISAM ;";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
}
public function update_list($table,$data){
global $adatbazis;
$query="UPDATE  `".$table."` SET  `name` =  '".$data["name"]."',`status` =  '".$data["status"]."' WHERE  `id` =".$data["id"]." LIMIT 1 ;";
 	$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "update");
	//echo $query ;
}
public function save_list($table,$data)
{
global $adatbazis;

	if( intval($data["id"])<1 )
	{
		//echo $data["id"];
		$query="INSERT INTO  `".$table."` (`id` ,`name` ,`status`)VALUES ('".$data['id']."',  '".$data['name']."','".$data['status']."');";
	//var_dump ($data) ;
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "insert");
	}
	else{
		$this->update_list($table,$data);
	}

}
public function get_list($table,$filter,$order='ORDER BY  `name` ASC')
{
	global $adatbazis;

	if ($filter["id"]>0){
			$where.=$this->sqlwhereand($where);
			$where.="id='".$filter["id"]."'";
	}

	if ($filter["ids"]>0){
			$where.=$this->sqlwhereand($where);
			$where.="id in (".$filter["ids"].")";
	}
	if ($filter["name"]!=''){
		$where.=$this->sqlwhereand($where);
		$where.="name LIKE '%".$filter["name"]."%'";
	}

	if ($filter["city_name"]!=''){
			$where.=$this->sqlwhereand($where);
			$where.="city_name LIKE '%".$filter["city_name"]."%'";
	}
	if ($filter["name2"]!=''){
			$where.=$this->sqlwhereand($where);
			$where.="name = '".$filter["name2"]."'";
	}

	if ($table=="cuisine" && $filter["code"]!=''){
			$where.=$this->sqlwhereand($where);
			$where.="code = '".$filter["code"]."'";
	}

	if ($filter["status"]!=''&&$filter["status"]!='all'){
			$where.=$this->sqlwhereand($where);
			$where.="status = '".$filter["status"]."'";
	} else if ($filter["status"]=='all')
	{

	}else if ($filter["status"]=='nall')
	{
	$where.=$this->sqlwhereand($where);
	$where.="status != '4'";

	}else{
			$where.=$this->sqlwhereand($where);
			$where.="status = '2'";
	}
	$q="SELECT * FROM  `".$table."`".$where." ".$order;
	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
	//var_dump($filter);
	//echo $q;
	return $result;

}
public function mround($number, $precision=0) {

$precision = ($precision == 0 ? 1 : $precision);
$pow = pow(10, $precision);

$ceil = ceil($number * $pow)/$pow;
$floor = floor($number * $pow)/$pow;

$pow = pow(10, $precision+1);

$diffCeil     = $pow*($ceil-$number);
$diffFloor     = $pow*($number-$floor)+($number < 0 ? -1 : 1);

if($diffCeil >= $diffFloor) return  sprintf("%0.2f", $floor);
else return sprintf("%0.2f", $ceil);
}
public function readxml($url){

	if (file_exists($url)) {
		$xml = simplexml_load_file($url, null, LIBXML_NOCDATA);
		return $content = json_decode(json_encode($xml),TRUE);
		return $xml;
		//$this->arraylist($content);
		//print_r($content);
	} else {
		return "XMLERROR";
	}

}
	//List folder
public function dirlist($mappa){
		if (is_dir($mappa)) {
			$files1 = scandir($mappa);
			foreach ($files1 as $file){
				$filename2= $mappa."/".$file;
				$filename2= str_replace("//", "/", $filename2);
				$filename2= str_replace("//", "/", $filename2);
				$filename2= str_replace("//", "/", $filename2);
				$filename2= str_replace("//", "/", $filename2);
				if (($file!='.')&&($file!='..'))
				{
					if (is_dir ($filename2)){$folderimages[]=$file;}
				}
			}
		}
		return $folderimages;
	}
public function getIP_cdata(){
		foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
			if (array_key_exists($key, $_SERVER) === true) {
				foreach (explode(',', $_SERVER[$key]) as $ip) {
					if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
						return $ip;
					}
				}
			}
		}
	}
//Seo_url
public function shorturl_getparams($getq,$lang=null)
{
	global $tbl, $adatbazis;
	if (!$lang){
		$lang=$_SESSION["lang"];
	}
	$q = "SELECT * FROM " . $tbl["short_url"] . "_".$lang." WHERE `get` LIKE '" . $getq . "' LIMIT 1";
	$eredmeny = db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'select');
//echo $q;
	if (isset($eredmeny[0]['params']) && $eredmeny[0]['params'] != "") {
		return $eredmeny[0]['params'];
	} else {
		return $getq;
	}
}
public function shorturl_setprams($data,$lang=null){
	global $tbl, $adatbazis;

	if (!$lang){
		$lang=$_SESSION["lang"];
	}
	$query="REPLACE INTO  ". $tbl["short_url"] . "_".$lang." (`get` ,`params` ,`status`)VALUES ('".$data['get']."',  '".$data['params']."','".$data['status']."');";
	db_query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'insert');

	return($data);
}

public function shorturl_create($lang,$lang=null){
	global $tbl, $adatbazis;
	if (!$lang){
		$lang=$_SESSION["lang"];
	}
	$q1="CREATE TABLE " . $tbl["short_url"] . "_".$lang." (
`get` varchar(100) NOT NULL,
`params` varchar(100) NOT NULL,
`status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
	$q2="ALTER TABLE " . $tbl["short_url"] . "_".$lang."
ADD PRIMARY KEY (`params`),
ADD KEY `get` (`get`);";

	//echo $q;
	db_query($q1, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'create');
	db_query($q2, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'create');


}
	function shorturl_get_data($getq,$lang=null){
		global $tbl,$adatbazis,$_SESSION;
		if (!$lang){
			$lang=$_SESSION["lang"];
		}
		$q="SELECT * FROM ".$tbl["short_url"]. "_".$lang." WHERE `params` LIKE '".$getq."' LIMIT 1";
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
$SysClass=new sys();

class CsvImporter
{
	private $fp;
	private $parse_header;
	private $header;
	private $delimiter;
	private $length;
	//--------------------------------------------------------------------
	function __construct($file_name, $parse_header=false, $delimiter="\t", $length=8000)
	{
		$this->fp = fopen($file_name, "r");
		$this->parse_header = $parse_header;
		$this->delimiter = $delimiter;
		$this->length = $length;
		$this->lines = $lines;

		if ($this->parse_header)
		{
			$this->header = fgetcsv($this->fp, $this->length, $this->delimiter);
		}

	}
	//--------------------------------------------------------------------
	function __destruct()
	{
		if ($this->fp)
		{
			fclose($this->fp);
		}
	}
	//--------------------------------------------------------------------
	function get($max_lines=0)
	{
		//if $max_lines is set to 0, then get all the data

		$data = array();

		if ($max_lines > 0)
			$line_count = 0;
		else
			$line_count = -1; // so loop limit is ignored

		while ($line_count < $max_lines && ($row = fgetcsv($this->fp, $this->length, $this->delimiter)) !== FALSE)
		{
			if ($this->parse_header)
			{
				foreach ($this->header as $i => $heading_i)
				{
					$row_new[$heading_i] = $row[$i];
				}
				$data[] = $row_new;
			}
			else
			{
				$data[] = $row;
			}

			if ($max_lines > 0)
				$line_count++;
		}
		return $data;
	}
	//--------------------------------------------------------------------

}


?>