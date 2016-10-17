<?php

if ($_GET["status"] && $_GET["status"]!='all'){
    $filters['status']=$_GET["status"];
}

$filters['lang']='hu';
//if (!$adminv)$filters['ido']=$date;

$qhir=$RoomsClass->get($filters,'','all') ;

echo json_encode($qhir["datas"]);

?>