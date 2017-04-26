<?php
$admintemplate=1;
if ($_POST) {
    $elofoglalasikedvezmeny = array();
    foreach ($_POST['elofoglalasikedvezmeny'] as $val) {
        if ($val['nap'] > 0) {
            $elofoglalasikedvezmeny[] = $val;
        }

    }
    $savedata=json_encode($elofoglalasikedvezmeny);
    updt_page_settings('elofoglalasikedvezmeny',$savedata);

    //arraylist($elofoglalasikedvezmeny);

}

/*

foreach ($_POST as $name=>$value){
    if ($name!=""){
        updt_page_settings($name,$Text_Class->htmltochars($value));
    }
}
*/
//include('items/admin/data/sitesetting4.php');
?>