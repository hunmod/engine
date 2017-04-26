<?php
if($_POST['lista'])
{

    $newadrrarr=explode(";",$_POST['lista']);
   // var_dump($_POST['lista']);
    arraylist($newadrrarr);
    foreach ($newadrrarr as $oneaddr){

if ($oneaddr != '') {
    $savedta['status'] = '2';
    $savedta['lang'] = 'hu';
    $savedta["email"] = $oneaddr;
    $savedta["nev"] = $oneaddr;
//arraylist($_POST);
    $hirid = $SparksendClass->save_users($savedta);
}
    }

}

?>


<form method="post">

    <?php $FormClass->textaera('lista',$_POST['lista'],'',lan('emailcimek'));?>
    <input type="submit">
</form>
