<?php
//
class texttotext{

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

/*leszedi az ékezetes karaktereket */
public function to_link($text){
 	 $html=array('a','A','a','A','a','A','a','A','a','A','a','A','e','E','e','E','e','E','e','E','i','I','i','I','i','I','i','I','n','N','o','O','o','O','o','O','o','O','o','O','o','O','ss','u','U','u','U','u','U','u','U','o','O','u','U','_','',',');
	$chars=array('á','Á','à','À','â','Â','å','Å','ã','Ã','ä','Ä','é','É','è','È','ê','Ê','ë','Ë','í','Í','ì','Ì','î','Î','ï','Ï','ñ','Ñ','ó','Ó','ò','Ò','ő','Ő','ø','Ø','ő','Ő','ö','Ö','ß','ú','Ú','ù','Ù','û','Û','ü','Ü','ő','Ő','ű','Ű',' ',':','_');
return str_replace( $chars,$html, $text);
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


public function tageketlevesz($text)
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


public function encode($string){
return base64_encode($string);	
}
public function decode($string){
return base64_decode($string);	
}




} 
?>