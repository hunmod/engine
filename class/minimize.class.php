<?php 
Class hnmdminimize{
	
public function writeUTF8File($filename,$content) { 
        $f=fopen($filename,"w"); 
        # Now UTF-8 - Add byte order mark 
        fwrite($f, pack("CCC",0xef,0xbb,0xbf)); 
        fwrite($f,$content); 
        fclose($f); 
} 

	
private function makecss($file,$newname){
	$current = file_get_contents('.'.$file, true);
	$current=str_replace('/**/','',$current);
	$regex = array(
	"`^([\t\s]+)`ism"=>'',
	"`^\/\*(.+?)\*\/`ism"=>"",
	"`([\n\A;]+)\/\*(.+?)\*\/`ism"=>"$1",
	"`([\n\A;\s]+)//(.+?)[\n\r]`ism"=>"$1\n",
	"`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism"=>"\n",
	"/\t/"=>''
	);
	$text = preg_replace(array_keys($regex),$regex,$current);
	$cserel[]="/<!--(.*?)-->/";
	$cserel[]='/\n/';
	$mire="";
	$text = preg_replace ($cserel,$mire,$text);
	$this->writeUTF8File('.'.$newname,$text);	
}	
public function css($file,$newname)	{
	$this->	makecss($file,$newname);
	return $newname;
}



	
private function makejs($file,$newname){
	$current = file_get_contents('.'.$file, true);
	$current=str_replace('/**/','',$current);
        /* remove comments */
        $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $current);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $buffer);
        /* remove other spaces before/after ) */
        $text = preg_replace(array('(( )+\))','(\)( )+)'), ')', $buffer);
		$this->writeUTF8File('.'.$newname,$text);	
}	
	
public function js($file,$newname,$debug=false)	{
if ($debug){
	return $file;	
}
else{
	
if (filectime ('.'.$file)>filectime ('.'.$newname)){
	$this->	makejs($file,$newname);
}
	return $newname;
}
}	
	
	
	
	
	
	
	
}


?>