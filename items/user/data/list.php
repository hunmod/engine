<?php
$UserClass=new user();
$form=new formobjects();

$admintemplate=1;
$UserClass->requser();

$orderbye=array();
//$orderbye['name']='created';
//$orderbye['id']='created';
//$orderlist[]=$orderbye;
$orderbye['nev']='Name';
$orderbye['unev']='Username';
$orderbye['status']='Username';
$orderbye['lastactive']='Active Time';



$orderbyebye=array();

$orderbyebye['ASC']='ASC';
$orderbyebye['DESC']='DESC';

$order='';
if ($_GET['order']!="" && $_GET['order']!="all"){
    $order=" ".$_GET['order'];
    if ($_GET['by']!="" && $_GET['by']!="all"){
        $order.=" ".$_GET['by'];
    }
    else{
        $order.=" ASC ";
    }
}


//$datas
$filters=$_GET;
$myparams='user/list';
foreach ($_GET as $nam=>$req )
{
    if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page')
        //echo '<br>&'.$nam.'='.$req;
        $myparams.='&'.$nam.'='.$req;
}

$maxegyoldalon=20;
if (($_GET["page"]=="") || ($_GET["page"]<=0)){
    $oldal='0';
}
else {
    $oldal=$_GET["page"];
}


if ($_GET["status"])
{
    $filters=$_GET;
}
else{
    $_GET["status"]='all';
}
$usrchk=$UserClass->get_users($filters,$order,$oldal);
//arraylist($usrchk);


$hszlistacount=$usrchk['count'];

//arraylist($filters);

//
$oldal=$_REQUEST["page"];
$mycount=$hszlistacount;
//$maxegyoldalon=page_settings("max_recipe_perpage");
$oldalakszama=ceil ($mycount/$maxegyoldalon);
if ($oldalakszama>$maxoldalazonum){
    $start=$oldal-10;
    if ($start<round($maxoldalazonum/2)){
        $start=0;
        $end=$start+$maxoldalazonum+5;
    }
    //echo $start.'sss'.$oldalakszama-1;
    if ($start>=$oldalakszama-1-round($maxoldalazonum/2)){
        //echo 'sss';
        $start=$oldalakszama-1-$maxoldalazonum;
        $end=$oldalakszama-1;
    }
    else
    {
        $end=$start+$maxoldalazonum;
    }
}
else
{
    $start=0;
    $end=$oldalakszama-1;
}
if ($oldal>$oldalakszama-1)$oldal=$oldalakszama-1;




$datas=$usrchk['datas'];
//echo $usrchk['query'];
//arraylist($datas);

$status=$UserClass->status();
$jog=$UserClass->jog();







if ($_GET['active']){
    updt_page_settings('month_chef',$_GET['active']);
    //page_settings('active_week');
}

//arraylist($status);
$monthcheafq=$UserClass->get_users(array("id"=>page_settings('month_chef')));
$monthcheaf=$monthcheafq['datas'][0];
?>
