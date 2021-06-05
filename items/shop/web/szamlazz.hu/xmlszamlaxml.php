<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='
<xmlszamlaxml xmlns="http://www.szamlazz.hu/xmlszamlaxml" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlszamlaxml https://www.szamlazz.hu/szamla/docs/xsds/agentxml/xmlszamlaxml.xsd">
<felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
<!-- a Számlázz.hu user -->
<jelszo>'.$szmlzzhu_pass.'</jelszo>
<!-- a Számlázz.hu’s user password -->
<szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
  <szamlaszam>'.$orderdatas["payment_id"].'</szamlaszam>
  <!-- 
  <rendelesSzam>'.$orderdatas["id"].'</rendelesSzam>
  <Order number can be used in the query. In this case the last receipt with this order number will be returned 
  -->  
  <!-- 
  <pdf>true</pdf>  Only needed if the pdf must be downloaded
  -->
 </xmlszamlaxml>';    
 ?>