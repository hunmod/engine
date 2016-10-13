<style>
    .contactformform input,
    .contactformform .map,
    .contacform iframe,
    .contactformform textarea {

        width: 100% !important;
        margin: 10px 0;
    }

    .contactformform .btn {
        padding: 5px 20px;
    }

    .contactformform {
        position: relative;
    }
    .contactformform .messagedivbg{
        position: absolute;
        background: rgba(0,0,0,0.8);
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        border-radius: 10px;
    }
    .contactformform .messagedivbg .msgdiv{
        background: #fff;
        border-radius: 10px;
        display: table;
        margin: 25% auto auto auto;
        padding: 15px;
        border: 1px solid #000;

    }

    .contacform .glyphicon {
        color: #A49383;
        margin-right: 10px;
    }

    .captcha {
        margin-top: -10000000px !important;
    }
</style>

<?php
if ($_POST["email"])
    if ($_POST["captcha"] == '') {
        $mailtext = '<b>Feladó:</b>' . $_POST["name"] . '<br>';
        $mailtext .= '<b>Email:</b>' . $_POST["email"] . '<br>';
        $mailtext .= '<b>Telefon:</b>' . $_POST["phone"] . '<br>';
        $mailtext .= '<b>message:</b>' . $_POST["message"] . '<br>';

        //$sitemail
        //page_settings("c_email")
        emailkuldes(page_settings("c_email"), $oldalneve, 'Kapcsolatiform', $mailtext);
        emailkuldes($_POST["email"], $oldalneve, 'Kapcsolatiform', $mailtext);
        $sentmail = true;
    }

?>

<div class="container contacform">
    <div class="text-center">
        <h1> <?= lan('kapcsolat') ?></h1>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-4 contactdatas">
        <div class=""><b><?= page_settings("c_nev") ?></b></div>
        <div class=""><?php echo page_settings("c_cim"); ?></div>
        <div class=""><span class="glyphicon glyphicon-earphone"></span><?php echo page_settings("c_telefon"); ?></div>
        <div class=""><span class="glyphicon  glyphicon-phone"></span><?php echo page_settings("c_mtelefon"); ?></div>
        <div class=""><span class="glyphicon glyphicon-credit-card"></span><?php echo page_settings("c_fax"); ?></div>
        <div class=""><span class="glyphicon glyphicon-envelope"></span><?php echo page_settings("c_email"); ?></div>
        <div class=""><?php echo page_settings("c_text1"); ?></div>
    </div>
    <div class="col-sm-6 contactformform">
        <?php if($sentmail){?>
        <div class="messagedivbg">
        <div class="msgdiv">
            <?= lan('messagethx'); ?>
        </div>
        </div>
        <?php }?>
        <form method="post">
            <input name="captcha" type="text" class="form-inline captcha">

            <div class="text-center">
                <h2><?= lan('writeme') ?></h2>
            </div>
            <div class="col-sm-12">
                <input name="name" type="text" class="form-inline" placeholder="<?= lan('yourname') ?>" required>
            </div>
            <div class="col-sm-6">
                <input name="email" type="text" class="form-inline" placeholder="<?= lan('email') ?>" required>
            </div>
            <div class="col-sm-6">
                <input name="phone" type="text" class="form-inline" placeholder="<?= lan('tel') ?>">
            </div>
            <div class="col-sm-12">
                <textarea name="message" placeholder="<?= lan('message') ?>" required></textarea>
            </div>
            <button class="btn btn-creme-inv pull-right "><?= lan('send') ?></button>
        </form>
    </div>
    <div class="col-sm-12">
        <div class=""><?php echo page_settings("c_text2"); ?></div>
    </div>

    <?php
    /*$gmapurl='https://www.google.com/maps/dir/';
    $adress2='József Attila utca 4, Hajdúszoboszló';//'?origin='.
    $adress1='Ócsa Kálvin u. 26.';//'&destination='.
    $adr1=str_replace(array(' ',','),array('+'),$adress1);
    $adr2=str_replace(array(' ',','),array('+'),$adress2);
    $gmapurl.=$adr2.'/'.$adr1."&key=AIzaSyCthQYderNWgXBfX2qMTGtXLayoQRsTgbw";
    echo $gmapurl;*/
    ?>

    <!--div class="col-sm-12 map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.121141496314!2d21.396948951445438!3d47.44857797907216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4747197c8998ec67%3A0x180267c982901242!2zSGFqZMO6c3pvYm9zemzDsywgSsOzenNlZiBBdHRpbGEgdS4gNCwgNDIwMA!5e0!3m2!1shu!2shu!4v1476286770175" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

</div-->