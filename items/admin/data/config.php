<?php
//Tables
$tblmodul = 'page_settings';
$tbl[$tblmodul] = $adatbazis["db1_db"] . "." . $prefix . $prefix_pagesetting . "system_sitesetting";
$tblmodul = 'short_url';
$tbl[$tblmodul] = $adatbazis["db1_db"] . "." . $prefix . "short_url";


$file_structuct = array();
$file_structuct["modules"] = "admin";


$file_structuct["name"] = "Menü lista";
$file_structuct["file"] = "menulist";
$modules[] = $file_structuct;

$file_structuct["name"] = "Kapcsolat";
$file_structuct["file"] = "contactform";
$modules[] = $file_structuct;


/*admin menü*/


$file_structuct["name"] = lan("Működés");
$file_structuct["file"] = "sitesetting5";
$adminmenu2[] = $file_structuct;
//
$file_structuct["name"] = "Socialmedia";
$file_structuct["file"] = "sitesetting6";
$adminmenu2[] = $file_structuct;

$file_structuct["name"] = "Menü";
$file_structuct["file"] = "menu";
$adminmenu2[] = $file_structuct;

//
$file_structuct["name"] = "Email";
$file_structuct["file"] = "setemail1";
$adminmenu2[] = $file_structuct;
$file_structuct["name"] = "Láblécblokkok";
$file_structuct["file"] = "setfooterblocks";
$adminmenu2[] = $file_structuct;
$file_structuct["name"] = "Kapcsolati adatok";
$file_structuct["file"] = "contact_widget_edit";
$adminmenu2[] = $file_structuct;




$file_structuct["name"] = "Kezdöoldal - hotel";
$file_structuct["modules"] = "rooms";
$file_structuct["file"] = "home_admin";
$adminmenu2[] = $file_structuct;
$file_structuct["modules"] = "admin";


$file_structuct["name"] = "Oldal beállításai";
$file_structuct["file"] = "sitesetting5";
$file_structuct["alatta"] = $adminmenu2;
$adminmenu[] = $file_structuct;
$adminmenu2[] = array();

$file_structuct=array();
$file_structuct["modules"] = "home";
$file_structuct["name"] = "Kezdöoldal";
$file_structuct["file"] = "home_admin";
$adminmenu[] = $file_structuct;




unset($adminmenu2);
unset($file_structuct["alatta"]);


/*$file_structuct["name"]="Felhasználók";
$file_structuct["file"]="users";
$adminmenu[]=$file_structuct;
*/


/*admin menü
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
global $SysClass;
    $SysClass->arraylist($input);
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