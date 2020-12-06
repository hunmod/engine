<style>

    .contactformform .btn {
        padding: 5px 20px;
    }

    .contactformform {
        position: relative;
    }

    .contactformform .messagedivbg {
        position: absolute;
        background: rgba(0, 0, 0, 0.8);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        border-radius: 10px;
    }

    .contactformform .messagedivbg .msgdiv {
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

    #map {
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
    }

    input[name="captcha"] {
        margin-top: -1em;
        opacity: 0;
        cursor: default;
    }

    input[name="magassaga"],
    input[name="atmeroje"] {
        width: 4em;
        display: inline-block;
    }

    .ajnlath{
        display: none;
    }
    .tgl,
    .sendbtn
    {
        text-align: center;
        font-size: 2em;
        display: block;
        background:#cc5500;
        color: #FFF;
        cursor: pointer;
        margin-top: 20px;

    }
    .sendbtn{
        width: 100%;
        border: none;
        background: #4d9200;
        text-transform: capitalize;
    }
</style>

<?php
if ($_POST["email"])
    if (isset($_POST["captcha"])&&$_POST["captcha"] == '') {
        $mailtext = '<b>Feladó:</b>' . $_POST["name"] . '<br>';
        $mailtext .= '<b>Email:</b>' . $_POST["email"] . '<br>';
        $mailtext .= '<b>Telefon:</b>' . $_POST["phone"] . '<br>';
        $mailtext .= '<b>message:</b>' . $_POST["message"] . '<br>';
        if ($_POST['kat']) foreach ($_POST['kat'] as $name => $value) {
            $filtersfafajtak['lang'] = 'hu';
            $filtersfafajtak['id'] = $name;
            $kats = $category_class->get($filtersfafajtak, $order = '', $page = 'all');
            //arraylist($kats['datas'][0]['nev']);
            $name = $kats['datas'][0]['nev'];
            $mailtext .= $name . ' | ';
        }
        if ($_POST['magassaga']) $mailtext .= '<br><strong>Magassága:</strong>' . $_POST['magassaga'];
        if ($_POST['magassaga']) $mailtext .= '<br><strong>Magassága:</strong>' . $_POST['magassaga'];

        $ing = '';
        $filename[1] = $date + rand(100, 999);
        $ing = $UploadClass->uploadfile('file1', 'uploads/userpic/1', $filename[1]);
        //echo $ing;
        if ($ing) $mailtext .= '<br><img src="' . serverurl . $ing . '">';

        $ing = '';
        $filename[2] = $date + rand(100, 999);
        $ing = $UploadClass->uploadfile('file2', 'uploads/userpic/1', $filename[2]);
        //echo $ing;
        if ($ing) $mailtext .= '<br><img src="' . serverurl . $ing . '">';

        $ing = '';
        $filename[3] = $date + rand(100, 999);
        $ing = $UploadClass->uploadfile('file3', 'uploads/userpic/1', $filename[3]);
        //echo $ing;
        if ($ing) $mailtext .= '<br><img src="' . serverurl . $ing . '">';

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
        <?php if (page_settings("c_telefon")) { ?>
            <div class=""><span class="glyphicon glyphicon-earphone"></span><?php echo page_settings("c_telefon"); ?>
            </div>
        <?php }
        if (page_settings("c_mtelefon")) { ?>
            <div class=""><span class="glyphicon  glyphicon-phone"></span><?php echo page_settings("c_mtelefon"); ?>
            </div>
        <?php }
        if (page_settings("c_fax")) { ?>
            <div class=""><span class="glyphicon glyphicon-credit-card"></span><?php echo page_settings("c_fax"); ?>
            </div>
        <?php }
        if (page_settings("c_email")) { ?>
            <div class=""><span class="glyphicon glyphicon-envelope"></span><?php echo page_settings("c_email"); ?>
            </div>
            <div class=""><?php echo page_settings("c_cim"); ?></div>
            <?php
        }
        if (page_settings("fb_page_name")) { ?>
            <div class=""><span class="glyphicon glyphicon-book"></span><a href="https://www.facebook.com/<?=page_settings("fb_page_name") ?>" target="_blank">Facebook</a>
            </div>
            <?php
        }

       // $gcoord = $Google_Class->get_google_geocoding(page_settings("c_cim"));

        // $gmapurl='https://www.google.com/maps/dir/';
        // $adress2=''.page_settings("c_cim");//'?origin='.
        //$adress1='Ócsa Kálvin u. 26.';//'&destination='.
        // $adr1=str_replace(array(' ',','),array('+'),$adress1);
        // $adr2=str_replace(array(' ',','),array('+'),$adress2);
        // $gmapurl.=$adr2.'/'.$adr1."&key=". $google_api_key;
        //echo $gmapurl;
        ?>
        <!-- Load Facebook SDK for JavaScript -->
        <?= page_settings("c_text3"); ?>


        <div id="map" class="map">
        <iframe
                width="600"
                height="450"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=<?= $google_api_key ?>
    &q=<?php echo page_settings("c_cim"); ?>" allowfullscreen>
        </iframe>



        </div>


    </div>
    <div class="col-sm-6 contactformform">
        <?php if ($sentmail) { ?>
            <div class="messagedivbg">
                <div class="msgdiv">
                    <?= lan('messagethx'); ?>
                </div>
            </div>
        <?php } ?>
        <form method="post" enctype="multipart/form-data">
            <input name="captcha" type="text" class="form-inline">

            <div class="col-sm-12">
                <?php $FormClass->textbox('name', $_POST['name'], lan('name'), '', 1); ?>

            </div>
            <div class="col-sm-6">
                <?php $FormClass->textbox('email', $_POST['email'], lan('email'), '', 1); ?>
            </div>
            <div class="col-sm-6">
                <?php $FormClass->textbox('phone', $_POST['phone'], lan('phone'), '', 1); ?>
            </div>
            <div class="col-sm-12">
                <?php $FormClass->textaera('message', $_POST['message'], lan('message'), '', 1); ?>
            </div>

            <div class="col-sm-12">
                <div class=""><?php echo page_settings("c_text1"); ?></div>
            </div>
            <div class="col-sm-12">
            <button type="submit" class="btn btn-succes"><?=lan('küldés')?></button>
            </div>

        </form>
    </div>
    <div class="col-sm-12">
        <div class=""><?php echo page_settings("c_text2"); ?></div>
    </div>
    <div class="clear clearfix"></div>
 