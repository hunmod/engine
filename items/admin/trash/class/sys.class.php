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
 echo '<div style="margin-left:10px;border:#000 1px solid;text-align:left;">';
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




} 


function comasupport($where)
{
	if($where==""){
		$whereb='';
	}else
	{
		$whereb=',';
	}
	return $whereb;
	
}
function andsupport($where)
{
	if($where==""){
		$whereb='';
	}else
	{
		$whereb=' AND ';
	}
	return $whereb;
	
}

?>