<?phpif ($auser["id"]>0) {
}else{
    //arraylist($auser);
    header('Location: '.$server_url."user/noacces");
    exit;
}

if ($_GET["imadmin"]) {
    if ($_GET["imadmin"] != 'all') {
        $filters['s'] = $_GET["imadmin"];
    }
    $carlist = $gpsacars_class->get_cars($filters);
} else {
    $carlist = $Usercars;
}

?>