<?php
if ($_POST['subject']){

//echo ($_REQUEST["emailtext"]);
    $mymessage=$_REQUEST["emailtext"];
    $ufilter["status"]=2;
    $ufilter["jogid"]=4;

    $users=$User_Class->get_users($ufilter);
   // arraylist($users['datas']);
    $to=array();
foreach ($users['datas'] as $arusers){
    $to[]=$arusers['email'];

}


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
   //$et= $SparksendClass->sparkmailsend(page_settings("sitemail"),'hunmod@gmail.com',$_POST['subject'],$emessage);
   $et= $SparksendClass->sparkmailsend(page_settings("sitemail"),$to,$_POST['subject'],$emessage);
var_dump($et);
}



?>



<h2>Email adminoknak</h2>
<form method="post">
<?php $Form_Class->textbox('subject', $_REQUEST["subject"], lan('subject')); ?>
<div>
    Behelyettesítés:
    USERNAME,REALNAME,USEREMAIL,USERPASS,VALIDATE_URL
</div>
<?php
$Form_Class->textaera('emailtext',  $_REQUEST["emailtext"], lan('text')); ?>
<div>
    Behelyettesítés:
    USERNAME,REALNAME,USEREMAIL,USERPASS,VALIDATE_URL
</div>
    <br/>

    <p>
        <button type="submit" class="button enterButton"><?php echo lan('save'); ?> <i
                class="fa fa-arrow-right"></i></button>
    </p>

</form>
