<?php
$pinteraccestoken ="AeTW7_K8s9RyvTQspGJ7nqGKUaYQFBlkQtz8hjdCqD4PW-A5oQAAAAA";
$pinterestsendurl="https://api.pinterest.com/v1/pins/?access_token=".$pinteraccestoken."&fields=id%2Clink%2Curl";

function curlpostpinterst($url,$message){
	  $ch = curl_init();
  //$skipper = "luxury assault recreational vehicle";
 // $fields = array( 'penguins'=>$skipper, 'bestpony'=>'rainbowdash');
  $postvars = '';
  foreach($message as $key=>$value) {
    $postvars .= $key . "=" . $value . "&";
  }
 // $url = $pinterestsendurl;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
  curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  print "curl response is:" . $response;
  curl_close ($ch);
	
}

//arraylist($dbadat);

$current=$dbadat[0]['id'];
// Write the contents back to the file
if($current>0)file_put_contents($Utolsoelemfile, $current);



foreach ($dbadat as $recip){
//Pinterstbe

$page_description="#recept ";

		if ($recip["gluten"]){
			$page_keywords.=",Gluténmentes";
			$page_description.="#Gluténmentes ";
			}
		if ($recip["diab"]){
			$page_keywords.=",Cukormentes";
			$page_description.="#Cukormentes ";
			}
		if ($recip["lactose"]){
			$page_keywords.=",Laktózmentes";
			$page_description.="#Laktózmentes ";
			}
$page_description.=" ".$recip["nev"]." ".$Text_Class->levag($Text_Class->tageketcsupaszit($recip["bevezeto"]),350);



$message=array(
'board'=>'abakahasba/receptek',
'link'=>$rec_class->recipe_url($recip),
'note'=>($page_description),
'image_url'=>urlencode($rec_class->recipe_img($recip["id"],600,520))
//'image_base64'=>$b64image
);
arraylist($message);

curlpostpinterst($pinterestsendurl,$message);

}





/*

$imgurl=urlencode ('http://abrakahasba.hu/picture2.php?picture=dXBsb2Fkcy9fa29ueWhhL2tvbnloYS8xMDMvMjAxNTA5MjAyMDAwMDMuanBn&x=400&y=300&ext=.jpg');

$fimageorig='http://abrakahasba.hu/'.decode('dXBsb2Fkcy9fa29ueWhhL2tvbnloYS8xMDMvMjAxNTA5MjAyMDAwMDMuanBn');
//$b64image ='data:image/' . 'img/jpg' . ';base64,' . base64_encode(file_get_contents($imgurl));
//$b64image=base64_encode_image ($imgurl,'jpg');

//$b64image = fopen($imgurl, 'rb'); 







$message=array(
'board'=>'abakahasba/receptek',
'link'=>'http://abrakahasba.hu/recept/103/Narancsos-szivarvanytorta',
'note'=>'Narancsos szivárványtorta',
'image_url'=>$imgurl
//'image_base64'=>$b64image
);

echo $b64image;

  $ch = curl_init();
  //$skipper = "luxury assault recreational vehicle";
 // $fields = array( 'penguins'=>$skipper, 'bestpony'=>'rainbowdash');
  $postvars = '';
  foreach($message as $key=>$value) {
    $postvars .= $key . "=" . $value . "&";
  }
  $url = $pinterestsendurl;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
  curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  print "curl response is:" . $response;
  curl_close ($ch);

*/



?>