<?php

if ($_GET["status"] && $_GET["status"]!='all'){
    $filters['status']=$_GET["status"];
}else $filters['status']=2;

$filters['lang']='hu';
$filters['page']='all';
$filters['maxegyoldalon']='all';
$filters['page']='all';
//if (!$adminv)$filters['ido']=$date;

$qhir=$hir_class->get($filters,'',$_GET["page"]) ;
//arraylist($qhir);
echo json_encode($qhir["datas"]);


?>