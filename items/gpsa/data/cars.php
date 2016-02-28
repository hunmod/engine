<?php
if ($auser["id"]>0) {
}else{
    //arraylist($auser);
    header('Location: '.$server_url."user/noacces");
    exit;
}
$form = new formobjects();

$orderbye = array();
$orderbye['vrendszam'] = 'vrendszam';
$orderbye['rendszam'] = 'rendszam';
$orderbye['szerzszam'] = 'szerzszam';

$orderbyebye = array();
$orderbyebye['ASC'] = 'ASC';
$orderbyebye['DESC'] = 'DESC';

$order = '';
if ($_GET['order'] != "" && $_GET['order'] != "all") {
    $order = " " . $_GET['order'];
    if ($_GET['by'] != "" && $_GET['by'] != "all") {
        $order .= " " . $_GET['by'];
    } else {
        $order .= " ASC ";
    }
}

$filters = $_GET;
$myparams = 'gpsa/users2';
foreach ($_GET as $nam => $req) {
    if ($nam != 'PHPSESSID' && $nam != 'q' && $nam != 'CKFinder_Path' && $nam != 'googtrans' && $nam != 'oldal' && $nam != 'cpsession' && $nam != 'langedit' && $nam != 'lang' && $nam != 'cprelogin' && $nam != 'page')
        //echo '<br>&'.$nam.'='.$req;
        $myparams .= '&' . $nam . '=' . $req;
}

$maxegyoldalon = 20;
if (($_GET["page"] == "") || ($_GET["page"] <= 0)) {
    $oldal = '0';
} else {
    $oldal = $_GET["page"];
}


//$filters["rendszamok"]="'862548026691464','356895036977984'";


$carlist=$gpsacars_class->get_cars($filters,$order);
$datas=$carlist["datas"];
//arraylist($carlist);
echo($carlist['query']);

if (!$get["rsz"]){
//$get["rsz"]='356895036977984';
}


//$Form_Class->selectbox('rsz',$carlist['datas'],$typ=array('value'=>'rendszam','name'=>'vrendszam'),$get["rsz"],$caption="")
?>