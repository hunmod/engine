<?php
$filters['id']=$getparams[2];
$filters['lang']=$lang;
$qhir=$category_class->get($filters,'',$_GET["page"]) ;
$hszlistacount=$qhir['count'];
$kategoria=$qhir['datas'][0];

$mappa='uploads/'.$folders["uploads"]."/".$getparams[0]."/".$getparams[2].'/';

$images=$Upload_Class->folderlist($mappa,900,320,900);
$image=$homeurl.$category_class->getimg($elem['id'],900,320);

?>