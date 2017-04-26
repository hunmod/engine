<?php
if ($_GET['rkosar'] && $_GET['id'] && ($_GET['tipus']=='room' || $_GET['tipus']=='csomag')){
    $_SESSION['roomkosar'][$_GET['tipus']][$_GET['id']]=$_GET['id'];
}

if ($_GET['rkosar']&& $_GET['id']&& $_GET['del'] && ($_GET['tipus']=='room' || $_GET['tipus']=='csomag')){
    unset($_SESSION['roomkosar'][$_GET['tipus']][$_GET['id']]);
}



//arraylist($_SESSION['roomkosar']['room']);

if ($_SESSION['roomkosar']['room'])foreach ($_SESSION['roomkosar']['room'] as $szoba){
    $filters['lang']=$_SESSION['lang'];
    $filters['id']=$szoba;
    if ($filters['id']>0) {
        $xroom = $RoomsClass->get($filters);
        if($xroom['datas'][0])$kosarszobak[] = $xroom['datas'][0];
    }
}

?>