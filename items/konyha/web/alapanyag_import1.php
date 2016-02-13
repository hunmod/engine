IMPORT1

<?php
function utf8_fopen_read($fileName) {
    $fc =  file_get_contents($fileName);
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}
?> 
<?php 
$hozzavalokdataf = "uploads/hozzavalok_fullutf.txt";

$fh = utf8_fopen_read($hozzavalokdataf);
while (($data = fgetcsv($fh, 1000, ",")) !== false) {



    foreach ($data as $value) {
		$ideglenes=explode( ';', $value ) ;
			if (count($ideglenes)==6)
			{
			$adatok[]=$ideglenes;
			}
		

//    echo $value . "<br />\n";
    }
}


//arraylist($adatok);

foreach ($adatok as $adat){
$q="SELECT *  FROM ".$tbl["alapanyag"]." WHERE nev LIKE '".htmltochars($adat[0])."' OR '".($adat[0])."'";	
$return=db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
//arraylist($return);
if (!isset($return[0])){
//ha új hozzávaló akkor
$updtrecords="";
$updtrecords.=" ('".htmltochars($adat[0])."',";
$updtrecords.=" '".$adat[1]."',";
$updtrecords.=" '".$adat[2]."',";
$updtrecords.=" '".$adat[3]."',";
$updtrecords.=" '".$adat[4]."' ) ";
$updateq="INSERT  INTO  ".$tbl["alapanyag"]." (nev,energia,feherje,zsir,szenhidrat) values  ".$updtrecords."; ";
}
else{
//ha létezik már a hozzávaló akkor

$updtrecords="";
$updtrecords.=" nev='".htmltochars($adat[0])."',";

if (($return[0]["zsir"]==0)&&($adat[1]>0)){
$updtrecords.=" energia='".$adat[1]."',";
}
if (($return[0]["zsir"]==0)&&($adat[2]>0)){
$updtrecords.=" feherje='".$adat[2]."',";
}
if (($return[0]["zsir"]==0)&&($adat[3]>0)){
$updtrecords.=" zsir='".$adat[3]."',";
}
if (($return[0]["szenhidrat"]==0)&&($adat[4]>0)){
$updtrecords.=" szenhidrat='".$adat[4]."' ";
}

$updateq="UPDATE  ".$tbl["alapanyag"]." SET  ".$updtrecords." WHERE id='".$return[0]["id"]."'  LIMIT 1 ";
}
db_Query($updateq, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");

echo $updateq." | ".$return[0]["nev"]."<br>";




}

?> 