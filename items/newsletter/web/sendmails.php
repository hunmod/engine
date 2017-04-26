<?php

if ($_POST['subj']){

//echo ($_REQUEST["emailtext"]);
    $mymessage=$_REQUEST["emailtext"];
//arraylist($emailvalaki);
//arraylist($_POST);
foreach ($emailvalaki as $tolisttype=>$tolistname)
    if($tolisttype==$_POST["kiknek"]){
        switch ($tolisttype){
            case 'admins':
                //echo('KAKUKKKKKKKKKKKKKKKKKKKK');
                $ufilter["status"]=2;
                $ufilter["jogid"]=4;
                $users=$User_Class->get_users($ufilter);
                $to=array();
                foreach ($users['datas'] as $arusers) {
                    $to[] = $arusers['email'];
                }
                break;
            case 'users':
                //echo('KAKUKKKKKKKKKKKKKKKKKKKK');
                $ufilter["status"]=2;
                $ufilter["hirlevel"]=1;
                $users=$User_Class->get_users($ufilter);
                $to=array();
                foreach ($users['datas'] as $arusers) {
                    $to[] = $arusers['email'];
                }
                break;
            case 'list0':
               // echo('KAKUKKKKKKKKKKKKKKKKKKKK');
                $ufilter["status"]=2;
                //$ufilter["hirlevel"]=1;
                $qhir=$SparksendClass->get_users($ufilter,'',$_GET["page"]) ;
//arraylist($qhir);
                $hirekelemek=($qhir['datas']);
                $hszlistacount=$qhir['count'];
                $to=array();
                foreach ($hirekelemek as $arusers) {
                    $to[] = $arusers['email'];
                }
                break;


            case 'default':break;

        }
    }
    if($_POST['onemail']){
        $to=array();
        $to[] = $_POST['onemail'];

    }


    $mymessage=$_POST['msg'];



    $emessage='
    <table style="width:100%;">
<tr>
<td>
' . page_settings("email_header") . '
</td>
</tr>
<tr>
<td>
' . $mymessage . '
</td>
</tr>
<tr>
<td>
' . page_settings("email_footer") . '
</td>
</tr>

</table>
   ';
    //$et= $SparksendClass->sparkmailsend(page_settings("sitemail"),'hunmod@gmail.com',$_POST['subj'],$emessage);
    $et= $SparksendClass->sparkmailsend(page_settings("sitemail"),$to,$_POST['subj'],$emessage);
     var_dump($et);
    // var_dump($emessage);
    //arraylist($to);

}




?>


<script>

</script>
<style>


</style>

<div class="container">
    <div class="col-sm-12">
        <h1><?= lan('newslettersend'); ?></h1>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <div class="form-group">

                <?php $Form_Class->selectboxeasy2("kiknek",  $emailvalaki, $_POST["kiknek"], lan('kiknek')); ?>
                <?php $Form_Class->textbox("onemail", ($adat["onemail"]), lan('tesztmail')) ?>


                <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
                <?php $Form_Class->textbox("subj", $Text_Class->htmlfromchars($adat["subj"]), lan('subject')) ?>
                <?php $Form_Class->kcebox("msg", $Text_Class->htmlfromchars($adat["msg"]), lan('message')) ?>
                <div class="clear">
                </div>


            </div>
    </div>


    <p>
        <button type="submit" class="button enterButton btn btn-succes"><?php echo $lan['send']; ?> <i
                class="fa fa-arrow-right"></i></button>
    </p>

    </form>

</div>

</form>
