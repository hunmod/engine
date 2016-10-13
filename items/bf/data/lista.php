<?php
$admintemplate=1;

$myparams='bf/lista';
foreach ($_GET as $nam=>$req )
{
if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page'&&$nam!='mr')
	
$myparams.='&'.$nam.'='.$req;
}
$adminv=1;


if ($auser["jog"]>=3){
$_GET['status']='all';
}
else{
	
}
include('list.php');
?>