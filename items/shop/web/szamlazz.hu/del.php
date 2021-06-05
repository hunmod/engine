<?php
$the_xml='';
$the_xml='<?xml version="1.0" encoding="UTF-8"?>';
$the_xml.='
<?xml version="1.0" encoding="UTF-8"?>
<xmlszamladbkdel xmlns="http://www.szamlazz.hu/xmlszamladbkdel" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.szamlazz.hu/xmlszamladbkdel http://www.szamlazz.hu/docs/xsds/szamladbkdel/xmlszamladbkdel.xsd ">
  <beallitasok>
  <felhasznalo>'.$szmlzzhu_usr.'</felhasznalo>
  <jelszo>'.$szmlzzhu_pass.'</jelszo>
  <szamlaagentkulcs>'.$szmlzzhu_key.'</szamlaagentkulcs>
  </beallitasok>
  <fejlec>
  <szamlaszam>'.$orderdatas["payment_id"].'</szamlaszam>
  </fejlec>
</xmlszamladbkdel>';    
 ?>