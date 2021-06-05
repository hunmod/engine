<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='


<xmlnyugtasend xmlns="http://www.szamlazz.hu/xmlnyugtasend" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlnyugtasend http://www.szamlazz.hu/docs/xsds/nyugtasend/xmlnyugtasend.xsd">
  <beallitasok>                                                            <!-- REQ string -->
  <felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
  <jelszo>'.$szmlzzhu_pass.'</jelszo>
  <szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
  </beallitasok>
  <fejlec>
    <!-- e-mail notification available only for already issued receipts -->
    <nyugtaszam>'.$orderdatas["payment_id"].'</nyugtaszam>             <!-- REQ string --> <!-- Receipt ID -->
  </fejlec>
  <!-- e-mail configuration-->
  <emailKuldes>
    <!-- e-mail details, if not defined, the previous e-mail will be sent  -->
    <email>vevo@example.com</email>                       <!--     string --> <!-- customer e-mail address (recipient)  -->
    <emailReplyto>elado@example.com</emailReplyto> <!--     string --> <!-- reply-to  address, the customer will reply to this address -->
    <emailTargy>Email tárgya</emailTargy>                 <!--     string --> <!-- e-mail subject -->
    <emailSzoveg>                                                       <!--     string --> <!-- e-mail body -->
Text in the e-mail.
Signature
    </emailSzoveg>
  </emailKuldes>
</xmlnyugtasend>';    
 ?>