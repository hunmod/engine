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
    if ($_POST["captcha"] == '') {
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
        $gcoord = $Google_Class->get_google_geocoding(page_settings("c_cim"));

        // $gmapurl='https://www.google.com/maps/dir/';
        // $adress2=''.page_settings("c_cim");//'?origin='.
        //$adress1='Ócsa Kálvin u. 26.';//'&destination='.
        // $adr1=str_replace(array(' ',','),array('+'),$adress1);
        // $adr2=str_replace(array(' ',','),array('+'),$adress2);
        // $gmapurl.=$adr2.'/'.$adr1."&key=". $google_api_key;
        //echo $gmapurl;
        ?>


        <div id="map" class="map"></div>
        <script>
            function initMap() {
                var uluru = {
                    lat:<?=$gcoord[0]['geometry']['location']['lat']?>,
                    lng:<?=$gcoord[0]['geometry']['location']['lng']?>};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=<?= $google_api_key ?>&callback=initMap">
        </script>
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
            <input name="captcha" type="text" class="form-inline captcha">

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
            <div class="col-sm-12 tgl" id="ajnlatsh" onclick="$('.ajnlath').toggle();"><?= lan('Ajánlatkérés');?></div >
            <div class = "ajnlath" >

            <div class="col-sm-12" >
                <b><?= lan('fa magassága') ?></b>
                <?php /* Kategória root lekérdezése*/
                $FormClass->numbox('magassaga', $_POST['magassaga'], lan('magassaga'), $class = "control-label", $requied = 0, $min = 1, $max = 40);
                ?> m
            </div>
            <div class="col-sm-12">
                <b<?= lan('Fa átmérője') ?></b>
                <?php /* Kategória root lekérdezése*/
                $FormClass->numbox('atmeroje', $_POST['atmeroje'], lan('átmérője'), $class = "control-label", $requied = 0, $min = 10, $max = 200);
                ?> cm
            </div>
            <div class="col-sm-12">
                <h4><?= lan('fa fajták') ?></h4>
                <?php /* Kategória root lekérdezése*/
                $filtersfafajtak = array();
                $filtersfafajtak['lang'] = 'hu';
                $filtersfafajtak['kat'] = 'fafajtak';
                $fafajtak1 = array();
                $fafajtak1 = $category_class->get($filtersfafajtak, 'sorrend ASC', $page = 'all');
                //arraylist($fafajtak1);
                foreach ($fafajtak1['datas'] as $fafajta) {
                    //   arraylist($fafajta);
                    $FormClass->checkbox('kat[' . $fafajta['id'] . ']', $_POST['kat'][$fafajta['id']], $fafajta['nev']);
                }

                ?>
            </div>
            <div class="col-sm-12">
                <h4><?= lan('fa állapot') ?></h4>
                <?php /* Kategória root lekérdezése*/
                $filtersfafajtak['lang'] = 'hu';
                $filtersfafajtak['kat'] = 'faallapot';
                $filtersfafajtak['status'] = 2;

                $fafajtak1 = array();
                $fafajtak1 = $category_class->get($filtersfafajtak, 'sorrend ASC', $page = 'all');
                //arraylist($fafajtak1);
                foreach ($fafajtak1['datas'] as $fafajta) {
                    // arraylist($fafajta);
                    $FormClass->checkbox('kat[' . $fafajta['id'] . ']', $_POST['kat'][$fafajta['id']], $fafajta['nev']);
                }

                ?>
            </div>
            <div class="col-sm-12">
                <h4><?= lan('Akadály') ?></h4>
                <?php /* Kategória root lekérdezése*/
                $filtersfafajtak['lang'] = 'hu';
                $filtersfafajtak['kat'] = 'akadaly';
                $fafajtak1 = array();
                $fafajtak1 = $category_class->get($filtersfafajtak, 'sorrend ASC', $page = 'all');
                //arraylist($fafajtak1);
                foreach ($fafajtak1['datas'] as $fafajta) {
                    // arraylist($fafajta);
                    $FormClass->checkbox('kat[' . $fafajta['id'] . ']', $_POST['kat'][$fafajta['id']], $fafajta['nev']);
                }

                ?>
            </div>

            <div class="col-sm-12">
                <h4><?= lan('képek') ?></h4>
                <?= lan('kép') ?> 1:
                <input type="file" name="file1"/><br/>
                <?= lan('kép') ?> 2:
                <input type="file" name="file2"/><br/>
                <?= lan('kép') ?> 3:
                <input type="file" name="file3"/>
            </div>
</div>
            <button class="btn sendbtn pull-right "><?= lan('send') ?></button>
        </form>
    </div>
    <div class="col-sm-12">
        <div class=""><?php echo page_settings("c_text2"); ?></div>
    </div>
    <div class="clear clearfix"></div>
 