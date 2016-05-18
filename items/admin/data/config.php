<?php
//Tables
$tblmodul = 'page_settings';
$tbl[$tblmodul] = $adatbazis["db1_db"] . "." . $prefix . $prefix_pagesetting . "system_sitesetting";
$tblmodul = 'short_url';
$tbl[$tblmodul] = $adatbazis["db1_db"] . "." . $prefix . "short_url";
$tblmodul = 'menu';
$tbl[$tblmodul] = $adatbazis["db1_db"] . "." . $prefix . "menu";


$file_structuct = array();
$file_structuct["modules"] = "admin";


$file_structuct["name"] = "Menü lista";
$file_structuct["file"] = "menulist";
$modules[] = $file_structuct;


/*admin menü*/


$file_structuct["name"] = "oldal beállításai";
$file_structuct["file"] = "sitesetting5";
$adminmenu2[] = $file_structuct;
//
$file_structuct["name"] = "Socialmedia beállításai";
$file_structuct["file"] = "sitesetting6";
$adminmenu2[] = $file_structuct;
//
$file_structuct["name"] = "email beállításai";
$file_structuct["file"] = "sitesetting7";
$adminmenu2[] = $file_structuct;
$file_structuct["name"] = "Kapcsolati adatok";
$file_structuct["file"] = "contact_widget_edit";
$adminmenu2[] = $file_structuct;

$file_structuct["name"] = "oldal beállításai";
$file_structuct["file"] = "sitesetting5";
$file_structuct["alatta"] = $adminmenu2;


$adminmenu[] = $file_structuct;

unset($adminmenu2);
unset($file_structuct["alatta"]);


/*$file_structuct["name"]="Felhasználók";
$file_structuct["file"]="users";
$adminmenu[]=$file_structuct;
*/
$file_structuct["name"] = "Menü";
$file_structuct["file"] = "menu";
$adminmenu[] = $file_structuct;


/*admin menü*/
$file_structuct["name"] = "Tagek";
$file_structuct["file"] = "tags";
$adminmenu[] = $file_structuct;
/*admin menü*/




function gen_form_save($datas, $table, $alldata = array(), $debugmode = 0)
{
    global $tbl, $adatbazis;
//arraylist($alldata);
    foreach ($datas as $elem) {
        /*
        if ($elem["name"]=='XfileX')
        {$ideglenes='file';}
        else*/
        {
            $ideglenes = $elem["name"];
        }


        if ($elem["name"] != 'id') {

            if ($updtrecords != "") {
                $updtrecords .= ",";
            }
            if ($mezok != "") {
                $mezok .= ",";
            }
            if ($ertekek != "") {
                $ertekek .= ",";
            }
            if ($mezo_ertek != "") {
                $mezo_ertek .= " and ";
            } else {
                $mezo_ertek .= " WHERE ";
            }


            $updtrecords .= " " . $elem["name"] . " = '" . formelement_tipe_value($elem, $alldata) . "'";
            $arraydatas[$elem["name"]] = formelement_tipe_value($elem, $alldata); //soaphoz

            $mezok .= "`" . $ideglenes . "`";
            $ertekek .= "'" . formelement_tipe_value($elem, $alldata) . "'";
            $mezo_ertek .= "(`" . $ideglenes . "` = '" . formelement_tipe_value($elem, $alldata) . "')";
        } else $updt_id = $elem["value"];
    }
    if ($updt_id > 0) {
        $updateq = "UPDATE  " . $tbl[$table] . " SET  " . $updtrecords . " WHERE  `id` =" . $updt_id . " LIMIT 1";
        db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "insert");
        if ($debugmode == 1) {
            echo $updateq . "</hr>";
        }
        $updateq = "Select * from  " . $tbl[$table] . " WHERE  `id` =" . $updt_id . " LIMIT 1";
        $retval = db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "select");
        if ($debugmode == 1) {
            echo $updateq;
        }
        if ($debugmode == 2) {
            echo $updateq . "</hr>";
            arraylist($retval);
        }
        $updateq = "SELECT * from  " . $tbl[$table] . " WHERE id=" . $updt_id . ";";
        $retval = db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "select");
        //echo $updateq;
        return $retval[0];

    } else {
        $updateq = "INSERT INTO  " . $tbl[$table] . " (" . $mezok . ") VALUES (" . $ertekek . ");";
        db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "insert");
        if ($debugmode == 1) {
            echo $updateq;
        }
        if ($debugmode == 2) {
            echo $updateq . "</hr>";
            arraylist($retval);
        }
        $updateq = "SELECT * from  " . $tbl[$table] . " WHERE id=" . mysql_insert_id() . ";";
        $retval = db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "select");
        if ($debugmode == 1) {
            echo $updateq;
        }
        if ($debugmode == 2) {
            echo $updateq . "</hr>";
            arraylist($retval);
        }
        return $retval;
    }
//vissza kéne adni a rögzített elem id-jét!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //echo $updateq;
}


//formelemek visszaalakítása mentés előtt
function formelement_tipe_value($formelement, $alldata = array())
{
    global $Text_Class;
    if ($formelement["name"] == 'file') {
        $ideglenes = 'XfileX';
    } else {
        $ideglenes = $formelement["name"];
    }


    switch ($formelement["tipe"]) {
        case "datetime":
            return $alldata[$formelement["name"]] . " " . $alldata[$formelement["name"] . "_time"];
            break;

        default:
            return $Text_Class->htmltochars($alldata[$ideglenes]);
    }

}


//formelemek megjelenítésre
function formelement_tipe_show($formelement)
{
    switch ($formelement["tipe"]) {
        case "hidden":
            return '';
            break;
        default:
            return $formelement;
    }

}


//beolvasott adatot alakít át
function formelement_tipe_convert($formelement, $data)
{
    global $Text_Class;
    switch ($formelement["tipe"]) {
        case "long_text":
        case "text":
            return $Text_Class->htmlfromchars($data);
            break;
        default:
            return $data;
    }

}


function find_array_id($id, $array)
{
    $retvalue = array();
    foreach ($array as $elem) {
        if ($elem["id"] == $id) {
            $retvalue = $elem;
        }
    }
    return $retvalue;
}


/*         formelemek kiválasztása  */
function formelement_of_tipe($formelement)
{
    if ($formelement["name"] == 'file') {
        $formelement["name2"] = 'X' . $formelement["name"] . 'X';
    } else {
        $formelement["name2"] = $formelement["name"];
    }

    switch ($formelement["tipe"]) {
        case "text":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            textbox($formelement["name2"], $formelement["value"]);
            break;


        case "textaera":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            textaera($formelement["name2"], $formelement["value"], '');
            break;

        case "long_text":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            kcebox($formelement["name2"], $formelement["value"], '');
            break;

        case "checkbox":
            checkbox($formelement["name2"], $formelement["value"]);
            break;
        case "hidden":
            hiddenbox($formelement["name2"], $formelement["value"]);
            break;

        case "pass":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            passbox($formelement["name2"], $formelement["value"]);
            break;

        case "date":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            datebox($formelement["name2"], $formelement["value"]);
            break;

        case "datetime":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            datetimebox($formelement["name2"], $formelement["value"]);
            break;

        case "num":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            numbox($formelement["name2"], $formelement["value"], '');
            break;

        case "selectbox":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            selectbox_fromsql($formelement["name2"], $formelement["param"], $formelement["typ"], $formelement["value"]);
            break;


        case "selectbox2":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            selectbox2($formelement["name2"], $formelement["param"], $formelement["typ"], $formelement["value"]);
            break;


        case "selectboxa":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            selectbox($formelement["name2"], $formelement["param"], $formelement["typ"], $formelement["value"]);
            break;

        case "selectbox_roll":
            echo '<label class="' . $formelement["name"] . '">' . $formelement["title"] . "</label>";
            selectbox_roll($formelement["name2"], $formelement["param"], $formelement["typ"], $formelement["value"]);
            break;


    }
}

//---------------------------------------------------------- functions -------------------------
//Seo_url


function shorturl_get($getq)
{
    global $tbl, $adatbazis;
    $q = "SELECT * FROM " . $tbl["short_url"] . " WHERE `params` LIKE '" . $getq . "' LIMIT 1";
    $eredmeny = db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'select');

    if (isset($eredmeny[0]['get']) && $eredmeny[0]['get'] != "") {
        return $eredmeny[0]['get'];
    } else {
        return $getq;
    }
}

//-----------------------------------------------menu
//menuhoz
/*
function menuadattomb($id,$tblmodul){
global $tbl,$adatbazis;
$qs="SELECT * FROM ".$tbl[$tblmodul]." WHERE id=".$id." ORDER BY sorrend,nev ASC";
$vissza=db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
return $vissza[0];
}
*/

/*
function menulink($text){
$retur="";
if ($text!=""){
$retur="/".$text;
}	
return $retur;
}

//menu képei

function isset_menuimg($id){
	global $stylefolder;
	$targetfile=$stylefolder."menu_img/".$id;
	
	$back='';
	$ret['img']="";
	$ret['img_hover']="";
	if (is_file($targetfile.".gif"))$back=".gif";
	if (is_file($targetfile.".jpg"))$back=".jpg";
	if (is_file($targetfile.".png"))$back=".png";
	if ($back!=""){
		$ret['img']=$targetfile.$back;

		$back2='';
		if (is_file($targetfile."_hover.gif"))$back2="_hover.gif";
		if (is_file($targetfile."_hover.jpg"))$back2="_hover.jpg";
		if (is_file($targetfile."_hover.png"))$back2="_hover.png";
		if ($back2!=""){
			$ret['img_hover']=$targetfile.$back2;
		}
		else{
			$ret['img_hover']=$ret['img'];
		}
	}
	
return $ret;
}

function egymenuimg($id){
	$ret="";
	$back=isset_menuimg($id,"");
	if ($back['img']!="")
	$ret='<img src="'.$back['img'].'" class="menuimg"/>'.'<img src="'.$back['img_hover'].'" class="menuimg_hover"/>';
return $ret;
}

function egymenuadat($id){
global $tbl,$adatbazis;
$qs="SELECT * FROM ".$tbl["menu"]." WHERE id=".$id."";
$vissza=db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
return $vissza;
}
//

//almenü
function menuadat($id){
global $tbl,$adatbazis,$auser;

if ($auser["jogid"]){
	$where=" AND jogid<=".$auser["jogid"]." ";
}
else
{
	$where=" AND jogid=0 ";
}

$qs="SELECT * FROM ".$tbl["menu"]." Where mid=".$id." AND status!=4 ".$where." ORDER BY sorrend,nev ASC";
$vissza=db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
return $vissza;
}

function menuadat2($id){
global $tbl,$adatbazis,$auser;

if ($auser["jogid"]){
	$where=" AND jogid<=".$auser["jogid"]." ";
}
else
{
	$where=" AND jogid=0 ";
}

$qs="SELECT * FROM ".$tbl["menu"]." Where mid=".$id."".$where." ORDER BY sorrend,nev ASC";
$datas=db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");

foreach ($datas as $elem){
		$vissza=$elem;
		$vissza["alatta"]=menuadat2($elem["id"]);
		$return[]=$vissza;
}

return $return;
}


//
function menualatta($id,$modul){
global $tbl,$adatbazis;
if ($modul!=""){$where=" AND modul='".$modul."'";}
$qs="SELECT id FROM ".$tbl["menu"]." WHERE mid=".$id." AND status=1";
$elemei=db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
if ((count ($elemei)>0)&& $elemei!=FALSE){
foreach ($elemei as $elem){
		$vissza.=$elem["id"].",";
		$vissza.=menualatta($elem["id"],$modul);
}
}
return $vissza;
}

//vissza adja az összes menüpontot almenükkel... menulv1-menulv2-....
function menupontselectbox($id,$vissza,$nevhez,$tblmodules,$tblmoudelsfile){
global $tbl,$adatbazis;
$andwhere='';
if ($tblmodules!=""){
	$andwhere=" AND modul='".$tblmodules."'";	
}
if ($tblmoudelsfile!=""){
	$andwhere=" AND file='".$tblmoudelsfile."'";	
}
else 
{
	//$andwhere=" AND file='list'";	
}

$qs="SELECT * FROM ".$tbl["menu"]." WHERE mid=".$id.$andwhere;
//echo $qs."<br>";
$elemei=db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
if ( isset($elemei[0]))
if (count($elemei[0])>0){
	foreach ($elemei as $elem){
		$nevhez1="";
		if (($tblmodules!="")||($elem["modul"])!=$tblmodules){
		$elem["nev"]=$nevhez.$elem["nev"];
		$vissza[]=$elem;
		$nevhez1=$elem["nev"]."-";
		}
	$vissza=menupontselectbox($elem["id"],$vissza,$nevhez1,$tblmodules,$tblmoudelsfile);
	}
}
return $vissza;
}

function menulistafel($fideglenes)
{
	$menulistafel=array();

	do {//echo $fideglenes.",";
		$egysor=egymenuadat($fideglenes);
		if (count($egysor)>0)
		{
		$egysor=$egysor[0];
		$menulistafel[]=$egysor;
		$fideglenes=$egysor["mid"];
		}
		//var_dump($egysor);echo " XXX ";
		//menulistafel($fideglenes);
	} while (isset($egysor["id"])&&$egysor["id"]>0);
	return $menulistafel;
}

//array=menufel id=aktuellmenuid
function onselected($array,$id)
{
	$ret="";
	foreach ($array as $egy	)
	{
		if ($egy["id"]==$id){
			$ret="selected";
			}
		
	}
return $ret;	
}
//-------------------------------------------
*/
//----------------------------------------------------------sitesettings
function page_settings($what)
{
    global $tbl, $adatbazis, $Text_Class;
    $q = "SELECT value as value FROM " . $tbl["page_settings"] . " WHERE `id` = '" . $what . "' LIMIT 1";
    $eredmeny = db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'select');

    if (!isset($eredmeny[0]["value"])) $eredmeny[0]["value"] = '';
    return $Text_Class->htmlfromchars($eredmeny[0]["value"]);

//return $q;
}

function updt_page_settings($variable, $value)
{
    global $tbl, $adatbazis, $Text_Class;
    $value=$Text_Class->htmltochars($value);
    $q = "REPLACE INTO " . $tbl["page_settings"] . " (`id`,`value`) VALUES ('" . $variable . "','" . $Text_Class->htmltochars($value) . "')";
    db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'replace');
    echo $error;
    return $q;
}

//---------------------------------------------------------- num functions

function percentage($val1, $val2, $precision)
{
    $res = 100 - round(($val1 / $val2) * 100, $precision);

    return $res;
}

function priece_format($number, $length = 2)
{
    return number_format($number, $length);
}


//-------------------------------------------------------------------Text Functions
/*function tageketcsupaszit($text)
{
	$cserel="/<(.*?)>/";
	$mire="";
	$text = preg_replace ($cserel,$mire,$text);  
	return $text; 
}

function fixtags($text){
$text = htmlspecialchars($text);
$text = preg_replace("/=/", "=\"\"", $text);
$text = preg_replace("/&quot;/", "&quot;\"", $text);
$tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
$replacement = "<$1$2$3$4$5$6$7$8$9$10>";
$text = preg_replace($tags, $replacement, $text);
$text = preg_replace("/=\"\"/", "=", $text);
return $text;
}

/*leszedi az ékezetes karaktereket */
/*function to_link($text){
 	 $html=array('a','A','a','A','a','A','a','A','a','A','a','A','e','E','e','E','e','E','e','E','i','I','i','I','i','I','i','I','n','N','o','O','o','O','o','O','o','O','o','O','o','O','ss','u','U','u','U','u','U','u','U','o','O','u','U','_','');
	$chars=array('á','Á','à','À','â','Â','å','Å','ã','Ã','ä','Ä','é','É','è','È','ê','Ê','ë','Ë','í','Í','ì','Ì','î','Î','ï','Ï','ñ','Ñ','ó','Ó','ò','Ò','ő','Ő','ø','Ø','ő','Ő','ö','Ö','ß','ú','Ú','ù','Ù','û','Û','ü','Ü','ő','Ő','ű','Ű',' ',':');
return str_replace( $chars,$html, $text);
}
/*leszedi az ékezetes karaktereket */
/*
function htmltochars($text){
	//return stringencode($text);
	//return urlencode($text);
		//$text=stringdecode($text);
	$text= ekezetekeoda($text);
	return $text;
	}

function htmlfromchars($text){	
	$text= ekezeteketvissza($text);

	$text= stringdecode($text);
	return $text;
	
}
*/
function keywordstaged($text, $keywords)
{
    $x = explode(",", $keywords);
    foreach ($x as $y) {
        $text = str_replace($y, ' <abbr title="' . substr($y, 1) . '">' . substr($y, 1) . '</abbr>', $text);
        //$y=mb_convert_case($y, MB_CASE_TITLE, "UTF-8");
        $text = str_replace($y, ' <abbr title="' . substr($y, 1) . '">' . substr($y, 1) . '</abbr>', $text);

    }
//$neutext
    return $text;
}

/*
function tageketlevesz($text)
{
//	$text=str_replace ("</p>","<br />",$text);
//	$text=str_replace ("<p>","",$text);
	$cserel[]="/<a href=\"(.*?)\">/";
	$cserel[]="/<\/a>/";
	$cserel[]="/<span (.*?)>/";
	$cserel[]="/<\/span>/";
//	$cserel[]="/<img (.*?)>/";

	$mire="";
	$text = preg_replace ($cserel,$mire,$text);  
return $text; 
}
*/

function encode($string)
{
    return base64_encode($string);
}

function decode($string)
{
    return base64_decode($string);
}

//--------------------------curl functions------------------------------
function get_google_geocoding($address)
{
    global $google_api_key;
    $address = str_replace(" ", "+", $address);
    $curl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . $google_api_key;
    $ch = curl_init($curl);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_PORT, 443);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);

    if (curl_exec($ch) === false) {
        //    echo 'Curl error: ' . curl_error($ch);
        $retval["error"] = curl_error($ch);
    } else {
        //    echo 'Operation completed without any errors';
        //	echo $output;
        $mydata = (json_decode($output, TRUE));
        if (count($mydata["results"] > 0)) {
            $retval = ($mydata["results"]);
        } else {
            $retval = ($mydata);
        }
    }
    // Close handle
    curl_close($ch);
    return $retval;
}


function curl_download($Url)
{
    global $currlsslfile;
    // is cURL installed yet?
    if (!function_exists('curl_init')) {
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

function curl_cli_post($input, $server_url)
{
    $input_enc = rawurlencode(json_encode($input));
    $input_enc2 = 'input=' . $input_enc;
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

function curl_srv($input, &$retval, &$inval)
{
    $input_dec_kozb = $input;
    $retval['debug']['input_enc2_hossz'] = strlen($input);
    $retval['debug']['input_enc2'] = $input;
    $input_dec = rawurldecode($input_dec_kozb);
    $input_dec_2 = json_decode($input_dec, TRUE);
    $retval['debug']['input_dec_elemszam'] = count($input_dec_2);
    $inval = $input_dec_2;
    //$inval=  obj_bol_arr($input_dec_2);    
    //$inval=  get_object_vars($input_dec);
    $retval['inval'] = $inval;
}


//-------------------------------------------------------
function arraylist($input)
{
    if (count($input) > 0) {
        foreach ($input as $value1 => $first) {
            echo '<div style="margin-left:10px;border:#000 1px solid;text-align:left;">';
            echo "<strong>" . $value1 . "</strong><br>";
            if (!is_array($first)) {
                echo($first);
            } else {
                arraylist($first);
            }
            echo "</div>";
        }
    } else echo "<hr>Nem kaptam adatot!<hr>";
}

//-------------------------------------------------------------create tables
if ($tblexists[$tbl["page_settings"]] != 1) {
    $qcreate_page_settings = "
CREATE TABLE IF NOT EXISTS " . $tbl["page_settings"] . " (
  `id` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
    $returnquery = db_Query($qcreate_page_settings, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "create");
    $qcreate_page_settings = "
INSERT INTO " . $tbl["page_settings"] . "
VALUES ('title', 'Page title'), 
('footer', '<p>footer</p>'),
('keywords', 'keyword1,keyword2,keyword3,hunmod'),
('sitemail', 'dontreply@site.com'), 
('email_header', '<h1>Email header</h1>'), 
('email_footer', '<p>Email	footer</p>'), 
('keywordshidden', 'keyword1,keyword2,keyword3,hunmod,more'),
('site_css', 'default'),
('menu_root_hu', '0'),
('description', 'page description with more text');
";
    $returnquery = db_Query($qcreate_page_settings, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "create");
}

if ($tblexists[$tbl["short_url"]] != 1) {
    $qcreate_short_url = "CREATE TABLE IF NOT EXISTS " . $tbl["short_url"] . " (
  `get` varchar(100) NOT NULL,
  `params` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY  (`params`),
  KEY `get` (`get`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
    $returnquery = db_Query($qcreate_short_url, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "create");
}

if ($tblexists[$tbl["menu"]] != 1) {
    $qcreate_menu = "CREATE TABLE IF NOT EXISTS " . $tbl["menu"] . " (
  `id` bigint(20) NOT NULL auto_increment,
  `mid` int(11) NOT NULL default '0',
  `nev` varchar(100) NOT NULL,
  `leiras` TEXT NOT NULL,
  `modul` varchar(20) NOT NULL,
  `file` varchar(20) NOT NULL,
  `item` varchar(10) NOT NULL,
  `jogid` int(11) NOT NULL default '0',
  `status` smallint(6) default '1',
  `sorrend` int(4) NOT NULL default '10',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;
";

//ALTER TABLE  `menu` ADD  `leiras` TEXT NOT NULL AFTER  `nev` ;
    $returnquery = db_Query($qcreate_menu, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "create");
    $qcreate_menu = "
INSERT INTO " . $tbl["menu"] . " VALUES (1, 0, 'root', 'start', 'list', '', 0, 1, 10);
";
    $returnquery = db_Query($qcreate_menu, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "create");
}
?>