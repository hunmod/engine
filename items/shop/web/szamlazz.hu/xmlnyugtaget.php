<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='
<xmlnyugtaget xmlns="http://www.szamlazz.hu/xmlnyugtaget" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlnyugtaget http://www.szamlazz.hu/docs/xsds/nyugtaget/xmlnyugtaget.xsd">
  <beallitasok>
  <felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
  <jelszo>'.$szmlzzhu_pass.'</jelszo>
  <szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
    <pdfLetoltes>true</pdfLetoltes>                             <!-- REQ string  --> <!-- download PDF receipt -->
  </beallitasok>
  <fejlec>
    <nyugtaszam>'.$orderdatas["payment_id"].'</nyugtaszam>          <!-- REQ string  --> <!-- ID of the receip, which should be downloaded -->
    <!-- in case of custom PDF template, the identifier of the used template -->
    <!--
    <pdfSablon></pdfSablon>
     -->
  </fejlec>
</xmlnyugtaget>
?>