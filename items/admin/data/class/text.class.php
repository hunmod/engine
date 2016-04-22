<?php
//
class texttotext{

public function telnumber_at($text){
	$text=numbers($text);
	if ((strlen($text)<16) && (strlen($text)>11)){
		if (substr($text, 0, 2)=="06"){
			$text=substr_replace($text, "436", 0, 2);
			};
		if (substr($text, 0, 3)=="430"){
			$text=substr_replace($text, "43", 0, 3);
			};
	}
	else {
		$text="";
		}
	return $text;
}
public function telnumber_hu($text){
	$text=numbers($text);
	if ((strlen($text)<13) && (strlen($text)>10)){
		if (substr($text, 0, 2)=="06"){
			$text=substr_replace($text, "36", 0, 2);
			};
		if (substr($text, 0, 3)=="+36"){
			$text=substr_replace($text, "36", 0, 3);
			};
		if (substr($text, 0, 2)=="36"){
			$text=substr_replace($text, "36", 0, 2);
			};
	}
	else {
		$text="";
		}
	return $text;
}

public function Checkint($szam)
{
  if (ctype_digit($szam)) {
   } else {return true;}
} 
public function isValidEmail($address, $checkMX = true)
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
    return false;*/
  return true;
}



public function youtoubecserel($text)
{
$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
$ideglenes=$text;
$notgood=0;
do {
	$matches=array();
	preg_match($pattern, $ideglenes, $matches);
//arraylist($matches);

  if (isset($matches[1])){
	  $cserel[]="http://www.".$matches[0];
	  $cserel[]="https://www.".$matches[0];

	  $mire[]='<iframe style="max-width:560px;width:100%;" height="315" src="valdermort/embed/'. $matches[1].'" frameborder="0" allowfullscreen></iframe>';
	  	  $mire[]='<iframe style="max-width:560px;width:100%;" height="315" src="valdermort/embed/'. $matches[1].'" frameborder="0" allowfullscreen></iframe>';
	  $ideglenes = str_replace ($cserel,$mire,$ideglenes);
	  // echo $ideglenes."<br>";   
  }
  else {$notgood=1;}

} while ($notgood==0);
  	$ideglenes = str_replace ("valdermort","http://www.youtube.com",$ideglenes);   
//arraylist($mire);
return $ideglenes;
}


public function keywordstaged($text,$keywords)
{
	$x=explode(",",$keywords );
	foreach ($x as $y){
		$text=str_replace($y, ' <abbr title="'.substr($y, 1).'">'.substr($y, 1).'</abbr>', $text);
		//$y=mb_convert_case($y, MB_CASE_TITLE, "UTF-8");
		$text=str_replace($y, ' <abbr title="'.substr($y, 1).'">'.substr($y, 1).'</abbr>', $text);
	}
return $text;
}



public function menulink($text){
$retur="";
if ($text!=""){
$retur="/".$text;
}	
return $retur;
}

public function tageketcsupaszit($text)
{
	$cserel="/<(.*?)>/";
	$mire="";
	$text = preg_replace ($cserel,$mire,$text);  
	return $text; 
}

public function tageketlevesz($text)
{
//	$text=str_replace ("</p>","<br />",$text);
//	$text=str_replace ("<p>","",$text);
	$cserel[]="/<a (.*?)href=\"(.*?)\">/";
	$cserel[]="/<\/a>/";
	$cserel[]="/<span(.*?)>/";
	$cserel[]="/<\/span>/";
	$cserel[]="/<div(.*?)>/";
	$cserel[]="/<\/div>/";	
	$cserel[]="/<p(.*?)>/";	
	$cserel[]="/<\/p>/";	
	$cserel[]="/<em(.*?)>/";	
	$cserel[]="/<\/em>/";	
	$cserel[]="/<!--(.*?)-->/";
//	$cserel[]="/<img (.*?)>/";

	$mire="";
	$text = preg_replace ($cserel,$mire,$text);  
return $text; 
}


public function fixtags($text){
$text = htmlspecialchars($text);
$text = preg_replace("/=/", "=\"\"", $text);
$text = preg_replace("/&quot;/", "&quot;\"", $text);
$tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
$replacement = "<$1$2$3$4$5$6$7$8$9$10>";
$text = preg_replace($tags, $replacement, $text);
$text = preg_replace("/=\"\"/", "=", $text);
return $text;
}


	//Az $s szöveget megszakítja, és "..."-ot tesz a végére $h karakterszámnál
public function levag($s, $h)
	{

		$s=preg_replace("/\[kep\|([^\|]*)\|([^\]]*)\]/","",$s);
		if(strlen($s)<=$h) return ($s);
		$szov=substr($s, 0, $h);

		if(strrpos($szov, " ")>0)
		{
			$szov=substr($szov, 0, strrpos($szov, " "));
		}

$szov=str_replace('
', '', $szov);
	return  $szov."...";
	}
	


/*leszedi az ékezetes karaktereket */
public function to_link($text){
 	 $html=array('a','A','a','A','a','A','a','A','a','A','a','A','e','E','e','E','e','E','e','E','i','I','i','I','i','I','i','I','n','N','o','O','o','O','o','O','o','O','o','O','o','O','ss','u','U','u','U','u','U','u','U','o','O','u','U','_','','-','','');
	$chars=array('á','Á','à','À','â','Â','å','Å','ã','Ã','ä','Ä','é','É','è','È','ê','Ê','ë','Ë','í','Í','ì','Ì','î','Î','ï','Ï','ñ','Ñ','ó','Ó','ò','Ò','ő','Ő','ø','Ø','ő','Ő','ö','Ö','ß','ú','Ú','ù','Ù','û','Û','ü','Ü','ő','Ő','ű','Ű',' ',':','_','?');
return str_replace( $chars,$html, $text);
}


public function stringencode($text){
	$html=array('&#8211;','&#8212;','&#161;','&#191;','&#34;','&#8220;','&#8221;','&#39;','&#8216;','&#8217;','&#171;','&#187;','&#160;','&#38;','&#162;','&#169;','&#247;','&#62;','&#60;','&#181;','&#183;','&#182;','&#177;','&#8364;','&#163;','&#174;','&#167;','&#153;','&#165;','&#225;','&#193;','&#224;','&#192;','&#226;','&#194;','&#229;','&#197;','&#227;','&#195;','&#228;','&#196;','&#230;','&#198;','&#231;','&#199;','&#233;','&#201;','&#232;','&#200;','&#234;','&#202;','&#235;','&#203;','&#237;','&#205;','&#236;','&#204;','&#238;','&#206;','&#239;','&#207;','&#241;','&#209;','&#243;','&#211;','&#242;','&#210;','&#244;','&#212;','&#248;','&#216;','&#245;','&#213;','&#246;','&#214;','&#223;','&#250;','&#218;','&#249;','&#217;','&#251;','&#219;','&#252;','&#220;','&#255;','&#180;','&#96;','&#139;','&#138;','&#251;','&#235;','&#34;','&#39;');
	$chars=array('–','—','¡','¿','"','“','”','','‘','’','«','»','  ','°','¢','©','÷','&gt;','&lt;','µ','·','¶','±','€','£','®','§','™','¥','á','Á','à','À','â','Â','å','Å','ã','Ã','ä','Ä','æ','Æ','ç','Ç','é','É','è','È','ê','Ê','ë','Ë','í','Í','ì','Ì','î','Î','ï','Ï','ñ','Ñ','ó','Ó','ò','Ò','ô','Ô','ø','Ø','õ','Õ','ö','Ö','ß','ú','Ú','ù','Ù','û','Û','ü','Ü','ÿ','´','`','ő','Ő','ű','Ű','"',"'");
return str_replace( $chars,$html, $text);
}


public function stringdecode($text){
	$html=array('&#8211;','&#8212;','&#161;','&#191;','&#34;','&#8220;','&#8221;','&#39;','&#8216;','&#8217;','&#171;','&#187;','&#160;','&#38;','&#162;','&#169;','&#247;','&#62;','&#60;','&#181;','&#183;','&#182;','&#177;','&#8364;','&#163;','&#174;','&#167;','&#153;','&#165;','&#225;','&#193;','&#224;','&#192;','&#226;','&#194;','&#229;','&#197;','&#227;','&#195;','&#228;','&#196;','&#230;','&#198;','&#231;','&#199;','&#233;','&#201;','&#232;','&#200;','&#234;','&#202;','&#235;','&#203;','&#237;','&#205;','&#236;','&#204;','&#238;','&#206;','&#239;','&#207;','&#241;','&#209;','&#243;','&#211;','&#242;','&#210;','&#244;','&#212;','&#248;','&#216;','&#245;','&#213;','&#246;','&#214;','&#223;','&#250;','&#218;','&#249;','&#217;','&#251;','&#219;','&#252;','&#220;','&#255;','&#180;','&#96;','&#139;','&#138','&#251;','&#235;','&#34;','&#39;');
	$chars=array('–','—','¡','¿','"','“','”','','‘','’','«','»','  ','&','¢','©','÷','&gt;','&lt;','µ','·','¶','±','€','£','®','§','™','¥','á','Á','à','À','â','Â','å','Å','ã','Ã','ä','Ä','æ','Æ','ç','Ç','é','É','è','È','ê','Ê','ë','Ë','í','Í','ì','Ì','î','Î','ï','Ï','ñ','Ñ','ó','Ó','ò','Ò','ő','Ő','ø','Ø','ő','Ő','ö','Ö','ß','ú','Ú','ù','Ù','û','Û','ü','Ü','ÿ','´','`','ő','Ő','ű','Ű','"',"'");
return str_replace( $html,$chars, $text);
}


public function ekezetekeoda($rizsa){
	$mire=array('ő','ű','Á','á','É','é','Ú','ú','Ó','ó','Ü','ü','Ö','ö','Ű','ű','Ő','ő','Í','í','ű');
	$mirol=array('&#337;','&#369;','&Aacute;','&aacute;','&Eacute;','&eacute;','&Uacute;','&uacute;','&Oacute;','&oacute;','&Uuml;','&uuml;',
	'&Ouml;','&ouml;','&#368;','&#369;','&#336;','&#337;','&Iacute;','&iacute;','&ucirc;');
	//return iconv("UTF-8", "ISO-8859-2", str_replace($mirol, $mire, $rizsa));
	$rizsa=str_replace('  ', ' ', $rizsa);
	return str_replace( $mire,$mirol, $rizsa);
	}	

public function ekezeteketvissza($rizsa){
	$mire=array('ő','ű','Á','á','É','é','Ú','ú','Ó','ó','Ü','ü','Ö','ö','Ű','ű','Ő','ő','Í','í',' ','','ű');
	$mirol=array('&#337;','&#369;','&Aacute;','&aacute;','&Eacute;','&eacute;','&Uacute;','&uacute;','&Oacute;','&oacute;','&Uuml;','&uuml;',
	'&Ouml;','&ouml;','&#368;','&#369;','&#336;','&#337;','&Iacute;','&iacute;','&nbsp;','&shy;','&ucirc;');
	//return iconv("UTF-8", "ISO-8859-2", str_replace($mirol, $mire, $rizsa));
	return str_replace($mirol, $mire, $rizsa);
	}	

 //Ezzel a függvénnyel szedegetjük ki az esetleges kódokat, html-tageket a szövegbõl, ami lekérdezésbe megy, a szerver védelmére
 function szovegfeldolgoz_array_walk(&$szoveg) {
  $uj_szoveg = strip_tags($szoveg) ;
  $uj_szoveg = str_replace('%', '', $uj_szoveg) ;
  $uj_szoveg = str_replace('&#37', '', $uj_szoveg) ;
  $uj_szoveg = str_replace("'", "", $uj_szoveg) ;
  $uj_szoveg = str_replace('&#39', '', $uj_szoveg) ;
  $uj_szoveg = str_replace("=", "", $uj_szoveg) ;
  $uj_szoveg = str_replace('&#61', '', $uj_szoveg) ;
  $uj_szoveg = str_replace('&#59', '', $uj_szoveg) ;
  $uj_szoveg = str_replace(";", "", $uj_szoveg) ;
  $szoveg = $uj_szoveg ;
 }	

public function htmltochars($text){
	//return stringencode($text);
	//return urlencode($text);
	//$text=$this->stringencode($text);
//	$text= $this->szovegfeldolgoz_array_walk($text);
	$text= $this->ekezetekeoda($text);
	
	return $text;
	}

public function htmlfromchars($text){	
	$text= $this->ekezeteketvissza($text);
	$text= $this->stringdecode($text);
	return $text;
}

public function szovegvisszaalakit($text){
	$text=$this->htmlfromchars($text);
	$text=mediatcserel($text);
return $text;	
}



public function encode($string){
return base64_encode($string);	
}
public function decode($string){
return base64_decode($string);	
}




} 
?>