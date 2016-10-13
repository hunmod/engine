<?php
//menuadatok
if (($getparams[2]!="") && (is_numeric($getparams[2])) ){
	$menushop['id']=$getparams[2];
}
else{
	$menushop['id']=0;
}

$fideglenes=$menushop['id'];
$almenuid=menuadat($fideglenes,$tblmodul);

foreach ($almenuid as $elem){
$elem["url"]=$kezdooldal.$separator.$getparams[0]."/".$getparams[1]."/".$elem["id"];
$almenu[]=$elem;
}

$menunavigaciohoz=menulistafel($fideglenes,$tblmodul);

//$menukalatta= menualatta($menushop['id'],$tblmodul);

$metakeywords.= ",".htmlfromchars($menunavigaciohoz[count($menunavigaciohoz)-1]["nev"]);
$pagetitle.=htmlfromchars($menunavigaciohoz[0]["nev"]);
?>