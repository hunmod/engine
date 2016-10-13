<?php
//-------------------------------EMAIL Functions--------------------------------
function emailtablaba($email, $nev, $subject, $htmltext)
{
    global $tbl, $adatbazis, $sitemail, $oldalneve;
    $q = "INSERT INTO  " . $tbl["kimenoemail"] . " (  `id` ,  `cimzettnev` ,  `cimzettemail` ,  `targy` ,  `htmlszoveg` ,  `mikor` ) VALUES (NULL ,  '" . $nev . "',  '" . $email . "',  '" . $subject . "',  '" . $htmltext . "', CURRENT_TIMESTAMP);";
    db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', 'insert');
}

function emailkuldes2($email, $nev, $subject, $htmltext, $files = array())
{
    global $tbl, $adatbazis, $sitemail, $oldalneve, $emailsender;

    $htmltext = '<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\">
<meta content=\"MSHTML 6.00.2600.0\" name=GENERATOR>
</head>
<body>
' . $htmltext . '
</body>
</html>';

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    try {
        $mail->Host = $emailsender["host"];
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Port = $emailsender["port"];
        $mail->Username = $emailsender["uname"];
        $mail->Password = $emailsender["pass"];
        $mail->AddReplyTo($emailsender["emailreply"], $oldalneve);
        $mail->AddAddress($email, $nev);
        $mail->SetFrom($emailsender["email"], $oldalneve);
        $mail->Subject = ($subject);
        $mail->MsgHTML($htmltext);
//  $mail->AddAttachment('images/phpmailer.gif');      // attachment
        // $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
        $mail->Send();
        // echo "Message Sent OK</p>\n";
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }

}

//Ez lesz ami eldönti, melyik protokollt használjuk!!!!!!!!!!!!!!!!
function emailkuldes($email, $nev, $subject, $htmltext, $files = array())
{
    global $tbl, $adatbazis, $sitemail, $oldalneve;
//berakja adatbázisba a kimenő levelet
//emailtablaba($email,$nev,$subject,$htmltext);
    email_with_images($email, $subject, $htmltext);

}


function emailkuldes_silent($email, $nev, $subject, $htmltext)
{
    global $tbl, $adatbazis, $sitemail, $oldalneve;
//berakja adatbázisba a kimenő levelet
//emailtablaba($email,$nev,$subject,$htmltext);

    $message = '<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\">
<meta content=\"MSHTML 6.00.2600.0\" name=GENERATOR>
</head>
<body>'
        . $htmltext . '</body>';

    $from = "";
    $from .= 'To: ' . $nev . ' <' . $email . '>' . PHP_EOL;
    $from .= "From: " . $oldalneve . "<" . $sitemail . ">" . PHP_EOL;
    $from .= "Reply-To: <" . $sitemail . ">" . PHP_EOL;
    $from .= "MIME-Version: 1.0" . PHP_EOL;
    $from .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;
    $from .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
    mail($email, $subject, $message, $from) or print("<center><b>Nem sikerult elkuldeni!</b></center>");
}

//email hogy mindenkép megjelenjen
function emailtext_img_to_header($text)
{
    $images[0] = array();
    $cssurls["image"] = array();
    preg_match_all('/\<img.*\>/', $text, $images);
    preg_match_all("/url\((\"|'|)?((.*\.(png|gif|jpg))(\"|'|))\)/Ui", $text, $cssurls);

    $counter = 0;
    foreach ($images[0] as $image) {
        preg_match('/src *= *["\']?([^"\']*)/i', $image, $src);
        preg_match('/alt *= *["\']?([^"\']*)/i', $image, $alt);
        preg_match('/width *= *["\']?([^"\']*)/i', $image, $width);
        preg_match('/height *= *["\']?([^"\']*)/i', $image, $height);
        preg_match('/class *= *["\']?([^"\']*)/i', $image, $class);
        preg_match('/style *= *["\']?([^"\']*)/i', $image, $style);

        $imagesurl = $src[1];
        $imagealias = 'img' . $counter;
        $type = pathinfo($imagesurl, PATHINFO_EXTENSION);
        $data = file_get_contents($imagesurl);
        $base64 = base64_encode($data);
        $mydata = array();
        $mydata['src'] = $src[1];
        $mydata['name'] = $imagealias . "." . $type;
        $mydata['ext'] = $type;
        $mydata['alias'] = $imagealias;
        $mydata['alt'] = $alt[1];
        $mydata['width'] = $width[1];
        $mydata['height'] = $height[1];
        $mydata['class'] = $class[1];
        $mydata['style'] = $style[1];
        $mydata['base64'] = $base64;
        $mydatas[] = $mydata;
        $counter++;
    }
    foreach ($cssurls[2] as $image) {
        $imagesurl = $image;
        $imagealias = 'img' . $counter;
        $type = pathinfo($imagesurl, PATHINFO_EXTENSION);
        $data = file_get_contents($imagesurl);
        $base64 = base64_encode($data);
        $mydata = array();
        $mydata['src'] = $image;
        $mydata['name'] = basename($image);
        $mydata['ext'] = $type;
        $mydata['alias'] = $imagealias;
        $mydata['base64'] = $base64;
        $mydatas[] = $mydata;
        $counter++;
    }
    //arraylist($data);
    return $mydatas;
}

function email_with_images($email, $subject, $mymessage)
{
    global $tbl, $adatbazis, $sitemail, $oldalneve, $Text_Class;

    $to = $email;
    $bound_text = "jimmyP123";
    $bound = "--" . $bound_text . "\r\n";
    $bound_last = "--" . $bound_text . "--\r\n";


    $message = $Text_Class->htmlfromchars(html_entity_decode('<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\">
<meta content=\"MSHTML 6.00.2600.0\" name=GENERATOR>
<style>
table h1{
	color:#CD0301;
}
table h2{
	color:#CD0301;
}
table a{
	color:#CD0301;
	text-decoration:none;
}
table a:hover{
	text-decoration:underline;
}
</style>

</head>
<body>
<table style="width:100%;">
<tr>
<td>
' . page_settings("email_header") . '
</td>
</tr>
<tr>
<td>
' . $mymessage . '
</td>
</tr>
<tr>
<td>
' . page_settings("email_footer") . '
</td>
</tr>

</table>
</body>
</html>'));

    //a szövegben levő fájlokat összegyűjti
    $efiles = emailtext_img_to_header($message);
    //arraylist($efiles);
    //lecseréljük a csatlt képekre a mi képeinket.
    foreach ($efiles as $thfile) {
        $message = str_replace($thfile["src"], 'cid:' . $thfile["alias"], $message);
    }
    $headers .= 'To: ' . $email . PHP_EOL;
    $headers .= "From: " . $oldalneve . "<" . $sitemail . ">" . PHP_EOL;
    $headers .= "Reply-To: <" . $sitemail . ">" . PHP_EOL;
    $headers .= "MIME-Version: 1.0\r\n" . "Content-Type: multipart/mixed; boundary=\"$bound_text\"";

    $message .= "\r\n";

    $message .= $bound . "Content-Type: text/html; charset=\"utf-8\"\r\n"
        . "Content-Transfer-Encoding: 7bit\r\n\r\n"
        . $message
        . "\r\n";

    //fájlok beszóráas a headerbe.
    foreach ($efiles as $thfile) {
        $message .= $bound . "Content-Type: image/" . $thfile["ext"] . "; name=\"" . $thfile["name"] . "\"\r\n"
            . "Content-Transfer-Encoding: base64\r\n"
            . "Content-disposition: attachment; file=\"" . $thfile["name"] . "\"\r\n"
            . "Content-ID: <" . $thfile['alias'] . ">\r\n"
            . "\r\n"
            . chunk_split($thfile["base64"]);
    }
    $message .= $bound_last;


    if (mail($to, html_entity_decode($subject), html_entity_decode($message), $headers)) {
        //echo 'MAIL SENT';
        return true;
    } else {
        //echo 'MAIL FAILED';
        return false;
    }
}


function isValidEmail($address, $checkMX = true)
{
    $valid_tlds = array("arpa", "biz", "com", "edu", "gov", "int", "mil", "net", "org",
        "ad", "ae", "af", "ag", "ai", "al", "am", "an", "ao", "aq", "ar", "as", "at", "au",
        "aw", "az", "ba", "bb", "bd", "be", "bf", "bg", "bh", "bi", "bj", "bm", "bn", "bo",
        "br", "bs", "bt", "bv", "bw", "by", "bz", "ca", "cc", "cf", "cd", "cg", "ch", "ci",
        "ck", "cl", "cm", "cn", "co", "cr", "cs", "cu", "cv", "cx", "cy", "cz", "de", "dj",
        "dk", "dm", "do", "dz", "ec", "ee", "eg", "eh", "er", "es", "et", "fi", "fj", "fk",
        "fm", "fo", "fr", "fx", "ga", "gb", "gd", "ge", "gf", "gh", "gi", "gl", "gm", "gn",
        "gp", "gq", "gr", "gs", "gt", "gu", "gw", "gy", "hk", "hm", "hn", "hr", "ht", "hu",
        "id", "ie", "il", "in", "io", "iq", "ir", "is", "it", "jm", "jo", "jp", "ke", "kg",
        "kh", "ki", "km", "kn", "kp", "kr", "kw", "ky", "kz", "la", "lb", "lc", "li", "lk",
        "lr", "ls", "lt", "lu", "lv", "ly", "ma", "mc", "md", "mg", "mh", "mk", "ml", "mm",
        "mn", "mo", "mp", "mq", "mr", "ms", "mt", "mu", "mv", "mw", "mx", "my", "mz", "na",
        "nc", "ne", "nf", "ng", "ni", "nl", "no", "np", "nr", "nt", "nu", "nz", "om", "pa",
        "pe", "pf", "pg", "ph", "pk", "pl", "pm", "pn", "pr", "pt", "pw", "py", "qa", "re",
        "ro", "ru", "rw", "sa", "sb", "sc", "sd", "se", "sg", "sh", "si", "sj", "sk", "sl",
        "sm", "sn", "so", "sr", "st", "su", "sv", "sy", "sz", "tc", "td", "tf", "tg", "th",
        "tj", "tk", "tm", "tn", "to", "tp", "tr", "tt", "tv", "tw", "tz", "ua", "ug", "uk",
        "um", "us", "uy", "uz", "va", "vc", "ve", "vg", "vi", "vn", "vu", "wf", "ws", "ye",
        "yt", "yu", "za", "zm", "zr", "zw");
    // Rough email address validation using POSIX-style regular expressions
    /* if (!eregi("^[a-z0-9_]+@[a-z0-9\\-_]{2,}\\.[a-z0-9\\-\\.]{2,}$", $address))
       return false;
     else*/
    $address = strtolower($address);
    // Explode the address on name and domain parts
    $name_domain = explode("@", $address);
    // There can be only one I mean... the "@" symbol
    if (count($name_domain) != 2)
        return false;
    // Check the domain parts
    $domain_parts = explode(".", $name_domain[1]);
    if (count($domain_parts) < 2)
        return false;
    // Check the TLD ($domain_parts[count($domain_parts) - 1])
    if (!in_array($domain_parts[count($domain_parts) - 1], $valid_tlds))
        return false;
    // Searche DNS for MX records corresponding to the hostname ($name_domain[0])
    /**if ($checkMX && !getmxrr($name_domain[1], $mxhosts))
     * return false;*/
    return true;
}

;
//-------------------------------EMAIL Functions--------------------------------


//-------------------------------Text Functions--------------------------------


//A kapott adatokból(oldal beállított kulcsszavai+aktuláis tartalomtól kapott szöveg) összeállítja a kulcsszavakat
function sortum($a, $b)
{
    return strlen($b) - strlen($a);
}

function createpagekeywords($text, $keywordscounter_max = 5)
{
    global $metakeywords;
    //kiválogatja a 4 nél hosszabb karakterű szvakat.
    $minstrlen = 4;
    $text = tageketcsupaszit(htmlspecialchars_decode(htmlfromchars($text)));//megtisztítjuk a szöveget.
    $pagekeywords = "";
    $xpld = " ";
    $vowels = array(",", "!", ".", ":", '/', '
', ' ', '/n', '/r', "-", "_", "*", "+", "  ", "", "
	" . '	' . "	");
    $text = str_replace($vowels, " ", $text);
    $x = explode($xpld, tageketcsupaszit($text));
    $metakeywords;


    if (count($x) > 0) {
        foreach ($x as $y) {
            if (strlen($y) > $minstrlen) {
                $posi = strpos($y, "http");  //posi is equal to 0
                if (!is_numeric($posi)) {
                    if ($pagekeywords != "") {
                        $pagekeywords .= ",";
                    }
                    //	$pagekeywords.=tageketcsupaszit($y);
                    $pagekeywordsarray[] = $y;
                }
            }
        }
    }

    if (count($pagekeywordsarray) > 0) {
        //megvannak az esetleges kulcsszavak ezeket előfordulás, számosság szerint sorba rakjuk szűrjük.
        $pagekeywordsarray2 = array_count_values(array_map('strtolower', $pagekeywordsarray));
        arsort($pagekeywordsarray2);


        if (count($pagekeywordsarray2) > 0) {
            foreach ($pagekeywordsarray2 as $name => $value) {
                if (strlen($name) > $minstrlen) {
//szűrő
                    if (($name != " ") && ($name != "&nbsp;"))
                        $pagekeywordsarray3[] = $name;
                }
            }
        }

        unset($pagekeywordsarray3[0]);
        unset($pagekeywordsarray3[1]);

        //usort($pagekeywordsarray3,'sortum');


        //arraylist($pagekeywordsarray3);

        //a kulcsszavakat tartalmazó általános tömbünk előfordulás, számosság szerint sorba rakjuk szűrjük.
        $metakeywords = str_replace(", ", ",", htmlfromchars($metakeywords));
        $metakeywordsarray = explode(",", tageketcsupaszit($metakeywords));
        $metakeywordsarray2 = array_count_values(array_map('strtolower', $metakeywordsarray));
    }
    if (count($metakeywordsarray2) > 0) {

        foreach ($metakeywordsarray2 as $name => $value) {
            if (strlen($name) > $minstrlen) {
                $metakeywordsarray3[] = $name;
            }
        }
    }
//arraylist($metakeywordsarray3);
    //ha van megadva kulcsszó és a kapott értékből is lett tömb....
    if ((count($metakeywordsarray3) > 0) && (count($pagekeywordsarray3) > 0)) {
        $keywordsarray = array_intersect($pagekeywordsarray3, $metakeywordsarray3); //tömbök metszete
        $keywordsarrayplus = array_diff($pagekeywordsarray3, $metakeywordsarray3); //tömbök különbsége
        usort($keywordsarrayplus, 'sortum');

//arraylist($keywordsarrayplus);
    }
    //kulcsszavak kirakása
    $pagekeywords = "";
    $keywordscounter = 0;
    if (count($keywordsarray) > 0) {
        foreach ($keywordsarray as $elem) {
            if ($pagekeywords != "") {
                $pagekeywords .= ",";
            } else {
                $keywordscounter = 0;
            }
            $pagekeywords .= $elem;
            $keywordscounter++;
        }

        if ((count($keywordsarrayplus) > 0) && ($keywordscounter_max > $keywordscounter)) {
            foreach ($keywordsarrayplus as $elem) {
                if ($keywordscounter_max > $keywordscounter) {
                    if ($pagekeywords != "") {
                        $pagekeywords .= ",";
                    } else {
                        $keywordscounter = 0;
                    }
                    $pagekeywords .= $elem;
                    $keywordscounter++;
                }
            }
        }


    }


    if ((count($pagekeywordsarray3) > 0) && ($keywordscounter_max > $keywordscounter)) {
        foreach ($pagekeywordsarray3 as $elem) {
            if ($keywordscounter_max > $keywordscounter) {
                if ($pagekeywords != "") {
                    $pagekeywords .= ",";
                } else {
                    $keywordscounter = 0;
                }
                $pagekeywords .= $elem;
                $keywordscounter++;
            }
        }
    }

    if ((count($metakeywordsarray3) > 0) && ($keywordscounter_max > $keywordscounter)) {
        foreach ($metakeywordsarray3 as $elem) {
            if ($keywordscounter_max > $keywordscounter) {
                if ($pagekeywords != "") {
                    $pagekeywords .= ",";
                } else {
                    $keywordscounter = 0;
                }
                $pagekeywords .= $elem;
                $keywordscounter++;
            }
        }
    }


    //arraylist($metakeywords);
    return $pagekeywords;
}

//A kapott adatokból(oldal beállított kulcsszavai+aktuláis tartalomtól kapott szöveg) összeállítja a kulcsszavakat


//-------------------------------Text Functions--------------------------------


//-------------------------------Files Functions--------------------------------
function dirlist($mappa)
{
    global $homeurl;
    //ha létezik a könyvtár
    $mappa = $mappa;
    //echo $mappa."<br>";

    //$folders["uploads"]
    if (is_dir($mappa)) {
        $files1 = scandir($mappa);
        foreach ($files1 as $kep) {
            $filename2 = $mappa . "/" . $kep;
            $filename2 = str_replace("//", "/", $filename2);
            $filename2 = str_replace("//", "/", $filename2);
            $filename2 = str_replace("//", "/", $filename2);
            $filename2 = str_replace("//", "/", $filename2);
            //ha létezik a fájl
            if (($kep != '.') && ($kep != '..')) {
                if (is_dir($filename2)) {
                    $folderimages[] = $kep;
                }
            }
        }
    }
    return $folderimages;
}

//-------------------------------Files Functions--------------------------------


//-------------------------------Date-time Functions--------------------------------

/*
function timstamtoyear($stamp,&$day){
$day=$stamp/(24*60*60);
};

function timstamtoday($stamp,&$day){
$day=$stamp/(24*60*60);
};

function timstamtodays($stamp,&$hours){
$hours=$stamp/(60*60*24);
};

function timstamtohours($stamp,&$hours){
$hours=$stamp/(60*60);
};

function timstamtomin($stamp,&$min){
$min=$stamp/60;
};


function elteltido($utso,&$eltelt){
$napervenyesseg=64;
$stampervenyesseg=$napervenyesseg*24*60*60;
$most=strtotime(date('Y-m-j H:i:s'));
$utolso=strtotime($utso);
$eltelt=$most-$utolso;
};

*/


/*
function dateplus($date,$interval){
	//day,hour,minutes,second
	$back = date("Y-m-d H:i:s",strtotime(date($date)." +".$interval." minutes"));
	return($back);	
	}
*/


function dateprintip($date)
{
    //$ret=datedata($date);
    $ret = date('YmdHi', strtotime($date));
    $c = 0;
    $ret2 = '';
    for ($i = 0; $i <= (strlen($ret) - 1); $i++) {
        $c++;
        $ret2 .= $ret[$i];
        if ($c == 3) {
            $ret2 .= ".";
            $c = 0;
        }
        // echo $i;
    }
    return ($ret2);
}

function dateprint($date)
{
    $ret = date('Y-m-d H:i:s', strtotime($date));
    return ($ret);
}

function dateprintshort($date)
{
    $ret = date('Y-m-d', strtotime($date));
    return ($ret);
}

function datedata($date)
{
    $ret = date('YmdHis', strtotime($date));
    return ($ret);
}


function ifdate($input)
{
    if (strlen($input) < 10) {
        return 0;
    } else {
        $igen = checkdate(substr($input, 5, 2), substr($input, 8, 2), substr($input, 0, 4));
        return $igen;
    }
}

//-------------------------------Date-time Functions--------------------------------


/*
2 dátum különbsége, perbcen...
$most=strtotime(date("Y-m-j H:i:S"));
$utolso=strtotime("2011-04-16 16:27:55");
$eltelt=$most-$utolso;
var_dump($eltelt/60);exit;
*/

//ha kap egy gelfile-t getben akkor törli


//


//-------------------------GPS-----------------------------
function distance_GPScoords($lat1, $lng1, $lat2, $lng2)
{
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;
    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
    return ($km);
}

;
//---------------------------------------------------------

function lan($lanval)
{
    global $lan;
    if (isset($lan[$lanval])) {
        if ($lan[$lanval] != 'dontshow')
            return $lan[$lanval];
    } else return $lanval;

}

/*
//sitesettext
function page_text($what){
	global $tbl,$adatbazis;	
	$q="SELECT * FROM ".$tbl["site_text"]." WHERE `id` = '".$what."' LIMIT 1";
	$eredmeny=db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'select');
return htmlfromchars($eredmeny[0]["szoveg"]);
//return $q;
}

*/

/* admin adatai 
function admindata($id){
	global $tbl,$adatbazis;	
	$q="SELECT * FROM ".$tbl["admins"]." WHERE `id` = '".$id."' LIMIT 1";
	$eredmeny=db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'select');
return $eredmeny[0];

	
}
*/

?>