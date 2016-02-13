<?php
function curlpostpinterst($url,$message){
	  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,0);                //0 for a get request
  curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  print "curl response is:" . $response;
  curl_close ($ch);
	
}
curlpostpinterst('http://abrakahasba.hu/konyha/recipepinterest1',$message);
curlpostpinterst('http://abrakahasba.hu/konyha/listposts',$message);
curlpostpinterst('http://abrakahasba.hu/konyha/listpostspage',$message);
?>