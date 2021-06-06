<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='
<xmlnyugtacreate xmlns="http://www.szamlazz.hu/xmlnyugtacreate" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlnyugtacreate http://www.szamlazz.hu/docs/xsds/nyugta/xmlnyugtacreate.xsd">
  <beallitasok>                                                   
  <felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
  <!-- a Számlázz.hu user -->
  <jelszo>'.$szmlzzhu_pass.'</jelszo>
  <!-- a Számlázz.hu’s user password -->
  <szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
   <pdfLetoltes>true</pdfLetoltes>                       
  </beallitasok>
  <fejlec>                                               
    <hivasAzonosito></hivasAzonosito>     <!--     string  --> <!-- unique identifier of the call, duplication must be avoided-->
    <elotag>NYGTA</elotag>                    <!-- REQ string  --> <!-- receipt number prefix, required ==> NYGTA-2017-111 -->
    <fizmod>'.$orderdatas["fizmod"].'</fizmod>               <!-- REQ string  --> <!-- payment method, free text field, values ​​used on the interface are: átutalás, készpénz, bankkártya, csekk, utánvét, ajándékutalvány, barion, barter, csoportos beszedés, OTP Simple, kompenzáció, kupon, PayPal,PayU, SZÉP kártya, utalvány -->
    <penznem>Ft</penznem>                   <!-- REQ string  --> <!-- currency: Ft, HUF, EUR, USD stb. -->
    <devizabank>MNB</devizabank>        
    <devizaarf>0.0</devizaarf>      
    <megjegyzes></megjegyzes>          
    <pdfSablon></pdfSablon>                  
  </fejlec>';
  $the_xml.='    
  <tetelek>';
  foreach ($orderdatas["articles"] as $article) {
  $the_xml.=' 
    <tetel>                                         <!-- REQ         --> <!-- at least one item is required to issue a receipt  -->
    <megnevezes>'.$TextClass->htmlfromchars($article["title"]).'</megnevezes>         <!-- REQ string  --> <!-- name of the receipt -->
      <azonosito></azonosito>                                        <!--     string  --> <!-- ID of the receipt -->
      <mennyiseg>'.$article["db"].'</mennyiseg>                               <!-- REQ double  --> <!-- item quantity -->
      <mennyisegiEgyseg>'.$article["measure"].'</mennyisegiEgyseg>          <!-- REQ string  --> <!-- unit of quantity -->
      <nettoEgysegar>'.$article["priece"].'</nettoEgysegar>                <!-- REQ double  --> <!-- net unit price -->
      <netto>'.($article["priece"]*$article["db"]).'</netto>                                 <!-- REQ double  --> <!-- net value (quantity * net unit price) -->
      <afakulcs>'.$article["vat"].'</afakulcs>                                 <!-- REQ string  --> <!-- VAT rate, values: 0, 5, 10, 27, AAM, TAM, EU, EUK, MAA, F.AFA, K.AFA, ÁKK,HO, EUE, EUFADE, EUFAD37, ATK, NAM, EAM, KBAUK, KBAET -->
      <afa>'.($article["sum"]-$article["endpriece"]).'</afa>                                                <!-- REQ double  --> <!-- VAT total value -->
      <brutto>'.$article["sum"].'</brutto>                                      <!-- REQ double  --> <!-- gross total value -->
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
$the_xml.='
  </tetelek>
  <!--
    The <kifizetesek> section (payments) is not mandatory, but if present,
    then the sum of the values should be equal with the total amount of the receipt.
  -->
  <kifizetesek>                                                             <!--     string  --> <!-- details of the payment method -->
    <kifizetes>
      <fizetoeszkoz>'.$orderdatas["fizmod"].'</fizetoeszkoz>                    <!-- REQ string  --> <!-- name of the legal tender -->
      <osszeg'.$orderdatas["oder_priece"].'</osszeg>                                    <!-- REQ double  --> <!-- paid amount with legal tender -->
      <leiras></leiras>                            <!--     double  --> <!-- description of the legal tender -->
    </kifizetes>
  </kifizetesek>
</xmlnyugtacreate>';