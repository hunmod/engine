<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='
<xmlnyugtast xmlns="http://www.szamlazz.hu/xmlnyugtast" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlnyugtast http://www.szamlazz.hu/docs/xsds/nyugtast/xmlnyugtast.xsd">
<beallitasok>
<felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
<!-- a Számlázz.hu user -->
<jelszo>'.$szmlzzhu_pass.'</jelszo>
<!-- a Számlázz.hu’s user password -->
<szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
 <pdfLetoltes>false</pdfLetoltes>                    <!-- download PDF receipt -->
</beallitasok> 
<fejlec>
  <nyugtaszam>'.$orderdatas["payment_id"].'</nyugtaszam>    <!-- ID of the receipt, which should be cancelled -->
  <!--  in case of custom PDF template, the identifier of the used template-->
  <!--
  <pdfSablon></pdfSablon>
   -->
</fejlec>
</xmlnyugtast>';    
?>