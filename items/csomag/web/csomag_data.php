<?php

if ($_GET["status"] && $_GET["status"]!='all'){
    $filters['status']=$_GET["status"];
}

if ($_GET["room"] && $_GET["room"]!='all'){
    $filters['room']=$_GET["room"];
}

$filters['lang']='hu';
//if (!$adminv)$filters['ido']=$date;

$qhir=$CsomagClass->get($filters,'','all') ;
//arraylist($qhir);
echo json_encode($qhir["datas"]);
?>