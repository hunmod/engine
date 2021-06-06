<?php
//fix adatok
/*$szmlzzhu_usr="hunmod@gmail.com";
$szmlzzhu_pass="Ch4mp10n";
$szmlzzhu_key="4rkp4sx96e96p6kp4sx9bnzpiwkp4sx9zjbnzkkp4s";
$szmlzzhu_szamlaelotag="NP";
$szmlzzhu_bank_name="Unicredit";
$szmlzzhu_bank_account="10918001-00000013-50950007";
$szmlzzhu_bank_replyemail="hunmod@gmail.com";
*/
$szmlzzhu_usr=page_settings("szmlzzhu_usr");
$szmlzzhu_pass=page_settings("szmlzzhu_pass");
$szmlzzhu_key=page_settings("szmlzzhu_key");
$szmlzzhu_szamlaelotag=page_settings("szmlzzhu_szamlaelotag");
$szmlzzhu_bank_name=page_settings("szmlzzhu_bank_name");
$szmlzzhu_bank_account=page_settings("szmlzzhu_bank_account");
$szmlzzhu_bank_replyemail=page_settings("szmlzzhu_bank_replyemail");






//orderdatas
$filtersxx["id"]=($getparams[2]);
$filtersxx["status"]="all";
$datas=$ShopClass->get_shop_order($filtersxx);
$orderdatas=$datas["datas"][0];


$orderdatas["articles"]=str_replace('
','',$orderdatas["articles"]);
$orderdatas["articles"]=str_replace('/r/n','',$orderdatas["articles"]);

//$oder_articlesid=$ShopClass->jsons_from($oder_articlestext);
$oder_articlesid=json_decode($orderdatas["articles"],true);

$orderdatas["elolegszamla"]="false";
$orderdatas["dijbekero"]="false";
$orderdatas["vegszamla"]="false";
$orderdatas["dijbekeroSzamlaszam"]="";

        
        


//korrekció
$orderdatas["articles"]=$oder_articlesid["articles"] ;
if ($orderdatas["pname"]==""){
    $orderdatas["pname"]=$orderdatas["name"];
}
if ($orderdatas["pcountry"]==""){
    $orderdatas["pcountry"]=$orderdatas["country"];
}
if ($orderdatas["pzip"]==""){
    $orderdatas["pzip"]=$orderdatas["zip"];
}
if ($orderdatas["pcity"]==""){
    $orderdatas["pcity"]=$orderdatas["city"];
}
if ($orderdatas["paddress"]==""){
    $orderdatas["paddress"]=$orderdatas["address"];
}
if ($orderdatas["pvatno"]==""){
    $orderdatas["pvatno"]=$orderdatas["vatno"];
}

switch ($orderdatas["pmod"]) {
 //    átutalás, készpénz, bankkártya, csekk, utánvét, ajándékutalvány, barion, barter, csoportos beszedés, OTP Simple, kompenzáció, kupon, PayPal,PayU, SZÉP kártya, utalvány 

    case '0':
        # code...
        $orderdatas["fizmod"]='készpénz';
        break;
    case '1':
        # code...
        $orderdatas["fizmod"]='átutalás';
        break;   
    case '2':
        # code...
        $orderdatas["fizmod"]='utánvét';
        break;   
    case '3':
        # code...
        $orderdatas["fizmod"]='PayPal';
        break;  
    case '4':
        # code...
        $orderdatas["fizmod"]='bankkártya';
        break;   
}
//$orderdatas["pstatus"]=0;
if ($orderdatas["pstatus"]==1) {
//fizetve
    $orderdatas["vegszamla"]="true";
   // $orderdatas["vegszamla"]="false";
    $orderdatas["dijbekero"]="false";
    $orderdatas["elolegszamla"]="false";

}else{
  //  $orderdatas["dijbekero"]="true";
    $orderdatas["dijbekero"]="false";
    $orderdatas["vegszamla"]="false";
    $orderdatas["elolegszamla"]="true";
    
}

//arraylist($orderdatas);

include('szamlazz.hu/xmlszamla.php');
//include('szamlazz.hu/xmlnyugtacreate.php');

print( "!szamlazz/".$orderdatas["id"].".xml<hr>");

//create XML
$myfile = fopen("!szamlazz/".$orderdatas["id"].".xml", "w") or die("Unable to open file!");
fwrite($myfile, $the_xml);
fclose($myfile);



$ch = curl_init('https://www.szamlazz.hu/szamla/');
// Create a CURLFile object
$cfile = curl_file_create(realpath("!szamlazz/".$orderdatas["id"].".xml"), 'text/xml');
// Assign POST data
$data = array('action-xmlagentxmlfile' => $cfile,"generate" => "Issue invoice");
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// Execute the handle
$retcurl=curl_exec($ch);
curl_close($ch);


$myfile = fopen("!szamlazz/get_".$orderdatas['id'].".log", "w");
fwrite($myfile, $retcurl);
fclose($myfile);

$resp = new SimpleXMLElement($retcurl);


if (!$resp->hibauzenet[0])
{
if ($resp->sikeres[0]){
    //print_r($resp);
    file_put_contents("!szamlazz/".$orderdatas["id"].".pdf",base64_decode($resp->pdf[0]));
    $savedata["payment_id"]=$resp->szamlaszam[0];
    $savedata["id"]=$orderdatas["id"];

    $ShopClass->save_shop_order($savedata);
    if ($savedata["payment_id"]!="")print "Számlázz.hu számla: ".$savedata["payment_id"]."<br>";
}else{
    echo "<hr>error!!<br>";
    //print($retcurl);
}
}
else{
    print "hiba: ".(string)$resp->hibauzenet."<br>";
}
if ($resp->sikeres[0]=='false')
{
    print "hiba: ".(string)$resp->hibauzenet."<br>";

}
?>