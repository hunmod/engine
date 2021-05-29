<?php
//fix adatok
$szmlzzhu_usr="hunmod@gmail.com";
$szmlzzhu_pass="Ch4mp10n";
$szmlzzhu_key="4rkp4sx96e96p6kp4sx9bnzpiwkp4sx9zjbnzkkp4s";
$szmlzzhu_szamlaelotag="NP";

$szmlzzhu_bank_name="Unicredit";
$szmlzzhu_bank_account="10918001-00000013-50950007";
$szmlzzhu_bank_replyemail="hunmod@gmail.com";



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

if ($orderdatas["pstatus"]==1) {
//fizetve
    $orderdatas["vegszamla"]="true";
}else{
    $orderdatas["dijbekero"]="true";
}

//arraylist($orderdatas);


$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='<xmlszamla xmlns="http://www.szamlazz.hu/xmlszamla" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlszamla https://www.szamlazz.hu/szamla/docs/xsds/agent/xmlszamla.xsd">
    <beallitasok>
        <!-- settings -->
        <felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
        <!-- a Számlázz.hu user -->
        <jelszo>'.$szmlzzhu_pass.'</jelszo>
        <!-- a Számlázz.hu’s user password -->
        <szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
        <eszamla>true</eszamla>
        <!-- „true” in case you need to create an e-invoice -->
        <szamlaLetoltes>true</szamlaLetoltes>
        <!-- „true” in case you would like to get the PDF invoice in the response -->
        <valaszVerzio>2</valaszVerzio>
        <!-- 1: gives a simple text or PDF as answer. 
                                             2: xml answer, in case you asked for the PDF as well,
                                                it will be included in the XML with base64 coding.
                                         -->
        <aggregator></aggregator>
        <!-- omit this tag -->
    </beallitasok>
    ';
$the_xml.='
    <fejlec>
        <!-- header -->
        <keltDatum>'.date("Y-m-d").'</keltDatum>
        <!-- creating date, in this exact format -->
        <teljesitesDatum>'.date("Y-m-d",strtotime($orderdatas["order_date"]. ' +30 day')).'</teljesitesDatum>
        <!-- payment date -->
        <fizetesiHataridoDatum>'.date("Y-m-d",strtotime($orderdatas["order_date"]. ' +30 day')).'</fizetesiHataridoDatum>
        <!-- due date -->
        <fizmod>'.$orderdatas["fizmod"].'</fizmod>
        <!-- payment method, free text field, values ​​used on the interface are: átutalás, készpénz, bankkártya, csekk, utánvét, ajándékutalvány, barion, barter, csoportos beszedés, OTP Simple, kompenzáció, kupon, PayPal,PayU, SZÉP kártya, utalvány -->
        <penznem>HUF</penznem>
        <szamlaNyelve>hu</szamlaNyelve>
        <megjegyzes></megjegyzes>
        <arfolyamBank>MNB</arfolyamBank>
        <!-- name of bank: in case of invoice about other currency 
                                          than HUF you have to display which bank’s exchange rates 
                                          did we use to calculate VAT -->
        <arfolyam>0.0</arfolyam>
        <!-- exchange rate: in case of invoice about other currency 
                                          than HUF you have to display which bank’s exchange rates 
                                          did we use to calculate VAT -->
        <rendelesSzam>'.$orderdatas["id"].'</rendelesSzam>
        <!-- order number -->
        <dijbekeroSzamlaszam>'.$orderdatas["dijbekeroSzamlaszam"].'</dijbekeroSzamlaszam>
        <!-- reference to pro forma invoice number -->
        <elolegszamla>false</elolegszamla>
        <!-- deposit invoice -->
        <vegszamla>'.$orderdatas["vegszamla"].'</vegszamla>
        <!-- invoice (after a deposit invoice) -->
        <helyesbitoszamla>false</helyesbitoszamla>
        <!-- correction invoice -->
        <helyesbitettSzamlaszam></helyesbitettSzamlaszam>
        <!-- the number of the corrected invoice -->
        <dijbekero>'.$orderdatas["dijbekero"].'</dijbekero>
        <!-- proform invoice -->
        <szamlaszamElotag>'.$szmlzzhu_szamlaelotag.'</szamlaszamElotag>
        <!-- One of the prefixes from the invoice pad menu  -->
    </fejlec>
    ';
    $the_xml.='
    <elado>
        <bank>'.$szmlzzhu_bank_name.'</bank>
        <bankszamlaszam>'.$szmlzzhu_bank_account.'</bankszamlaszam>
        <emailReplyto>'.$szmlzzhu_bank_replyemail.'</emailReplyto>
        <emailTargy>Invoice notification</emailTargy>
        <emailSzoveg>mail text</emailSzoveg>
    </elado>
    ';
    $the_xml.='
    <vevo>
        <!--Buyer details -->
        <nev>'.$TextClass->htmlfromchars($orderdatas["name"]).'</nev>
        <irsz>'.$orderdatas["zip"].'</irsz>
        <telepules>'.$TextClass->htmlfromchars($orderdatas["city"]).'</telepules>
        <cim>'.$TextClass->htmlfromchars($orderdatas["address"]).'</cim>
        <email>'.$orderdatas["email"].'</email>
        <sendEmail>false</sendEmail>
        <!-- should we send the e-mail to the customer (by email) -->
        <adoszam>'.$orderdatas["pvatno"].'</adoszam>
        <!-- fiscal number/tax number -->
        <postazasiNev>'.$TextClass->htmlfromchars($orderdatas["pname"]).'</postazasiNev>
        <postazasiIrsz>'.$orderdatas["pzip"].'</postazasiIrsz>
        <postazasiTelepules>'.$TextClass->htmlfromchars($orderdatas["pcity"]).'</postazasiTelepules>
        <postazasiCim>'.$TextClass->htmlfromchars($orderdatas["paddress"]).'</postazasiCim>
        <azonosito>'.$orderdatas["id"].'</azonosito>
        <!-- identification -->
        <telefonszam>Tel:'.$orderdatas["phone"].'</telefonszam>
        <megjegyzes>'.$TextClass->htmlfromchars($orderdatas["subject"]).'</megjegyzes>
    </vevo>';
    /*$the_xml.='
        <fuvarlevel>
        <!-- waybill/confinement note, you do not need this: omit the entire tag -->
        <uticel></uticel>
        <futarSzolgalat></futarSzolgalat>
    </fuvarlevel>';*/
    $the_xml.='    
    <tetelek>';
    foreach ($orderdatas["articles"] as $article) {
    $the_xml.=' 
        <tetel>
            <megnevezes>'.$TextClass->htmlfromchars($article["title"]).'</megnevezes>
            <mennyiseg>'.$article["db"].'</mennyiseg>
            <mennyisegiEgyseg>db</mennyisegiEgyseg>
            <nettoEgysegar>'.$article["priece"].'</nettoEgysegar>
            <afakulcs>'.$article["vat"].'</afakulcs>
            <nettoErtek>'.$article["endpriece"].'</nettoErtek>
            <afaErtek>'.($article["sum"]-$article["endpriece"]).'</afaErtek>
            <bruttoErtek>'.$article["sum"].'</bruttoErtek>
            <megjegyzes></megjegyzes>
        </tetel>';
    }
    $the_xml.='  </tetelek>  
</xmlszamla>';

//print( "!szamlazz/".$orderdatas["id"].".xml<hr>");

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

//print ($retcurl);

$resp = new SimpleXMLElement($retcurl);

print "Számlázz.hu számla: ".($resp->szamlaszam[0])."<br>";

if ($resp->sikeres[0]){
//print_r($resp);
file_put_contents("!szamlazz/".$orderdatas["id"].".pdf",base64_decode($resp->pdf[0]));

}else{
echo "<hr>error!!<br>";
print($retcurl);
}



?>