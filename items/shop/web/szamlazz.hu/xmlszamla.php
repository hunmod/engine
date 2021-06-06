<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='
<xmlszamla xmlns="http://www.szamlazz.hu/xmlszamla" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlszamla https://www.szamlazz.hu/szamla/docs/xsds/agent/xmlszamla.xsd">
    <beallitasok>
        <felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
        <jelszo>'.$szmlzzhu_pass.'</jelszo>
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
    </beallitasok>
    <fejlec>
        <keltDatum>'.date("Y-m-d").'</keltDatum>
        <teljesitesDatum>'.date("Y-m-d",strtotime($orderdatas["payment_date"]. '')).'</teljesitesDatum>
        <fizetesiHataridoDatum>'.date("Y-m-d",strtotime($orderdatas["order_date"]. ' +30 day')).'</fizetesiHataridoDatum>
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
        <dijbekeroSzamlaszam>'.$orderdatas["payment_id"].'</dijbekeroSzamlaszam>
        <!-- reference to pro forma invoice number -->
        <elolegszamla>'.$orderdatas["elolegszamla"].'</elolegszamla>
        <!-- deposit invoice -->
        <vegszamla>'.$orderdatas["vegszamla"].'</vegszamla>
        <!-- invoice (after a deposit invoice) -->
        <helyesbitoszamla>false</helyesbitoszamla>
        <!-- correction invoice -->
        <helyesbitettSzamlaszam>'.$orderdatas["payment_id"].'</helyesbitettSzamlaszam>
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
            <mennyisegiEgyseg>'.$article["measure"].'</mennyisegiEgyseg>
            <nettoEgysegar>'.$article["priece"].'</nettoEgysegar>
            <afakulcs>'.$article["vat"].'</afakulcs>
            <nettoErtek>'.$article["endpriece"].'</nettoErtek>
            <afaErtek>'.($article["sum"]-$article["endpriece"]).'</afaErtek>
            <bruttoErtek>'.$article["sum"].'</bruttoErtek>
            <megjegyzes></megjegyzes>
        </tetel>';
    }

    $the_xml.=' 
        <tetel>
            <megnevezes>'.lan("posta").'</megnevezes>
            <mennyiseg>1</mennyiseg>
            <mennyisegiEgyseg>db</mennyisegiEgyseg>
            <nettoEgysegar>'.$oder_articlesid["summa"]["postpriece"].'</nettoEgysegar>
            <afakulcs>0</afakulcs>
            <nettoErtek>'.$oder_articlesid["summa"]["postpriece"].'</nettoErtek>
            <afaErtek>0</afaErtek>
            <bruttoErtek>'.$oder_articlesid["summa"]["postpriece"].'</bruttoErtek>
            <megjegyzes></megjegyzes>
        </tetel>';

    $the_xml.='  </tetelek>  
</xmlszamla>';    
?>