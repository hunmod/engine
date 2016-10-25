<?php
if ($getparams[2] > 0 && $getparams[3]=="room") {
    $filterroom['id'] = $getparams[2];
}

if ($getparams[2] > 0 && $getparams[3]=="csomag") {
    $filtercsomag['id'] = $getparams[2];
}
if ($getparams[3]=="room" || $getparams[3]=="") {
    $filterroom['lang'] = $_SESSION['lang'];
    $roomarray = $RoomsClass->get($filterroom, $order = '', $page = 'all');
    $rooms = $roomarray["datas"];
}
if ($getparams[3]=="csomag" || $getparams[3]=="") {
    $filtercsomag['lang'] = $_SESSION['lang'];
    $csomagok = $CsomagClass->get($filtercsomag, '', $page = 'all');
}
$order = $_POST;

if ($order['gyereknum'] < 1) {
    if ($_SESSION['gyerek'] > 0) {
        $order['gyereknum'] = $_SESSION['gyerek'];
    } else $order['gyereknum'] = 0;
}
if ($order['felnottnum'] < 1) {
    if ($_SESSION['felnott'] > 0) {
        $order['felnottnum'] = $_SESSION['felnott'];
    } else $order['felnottnum'] = 0;
}

if (!$order['erkezes']) {
    if ($_SESSION['from']) {
        $order['erkezes'] = $_SESSION['from'];
    } else $order['erkezes'] = $dateprint;
}
if (!$order['tavozas']) {
    if ($_SESSION['to']) {
        $order['tavozas'] = $_SESSION['to'];
    } else $order['tavozas'] = $dateprint;
}

?>
<script>

    function addgyerek() {
        if (isNaN(childnum))childnum=0;

        var childataform = '<div class="childgroup">' + '<div class="col-sm-6"><?php $FormClass->datebox('child['."'+".'childnum'."+'".'][birth]',null,lan('birthdate'),'',1);?>' + '</div>' + '<div class="col-sm-6"><?php $FormClass->numbox('child['."'+".'childnum'."+'".'][age]','null',lan('age'),'',1);?>' + '</div></div>';
        $("#gyerekadat").append(childataform);
        childnum++;
        $('.childgroup .maskdatebox').blur(function (event) {
            name = $(this).attr('id');
            mydate = $(this).val();
            name2 = name.replace('birth', "age");
            if (mydate) {
                myage = agecalc(mydate,null);
                if (myage<18) {
                    agelement = document.getElementById(name2).value = myage;
                    SetSession(name, mydate, 'start/setsession');
                    SetSession(name2, myage, 'start/setsession');
                }else{
                    $(this).val('');
                    agelement = document.getElementById(name2).value = '';
                    $('#gyerekminusf').click();
                    $('#felnottplusf').click();
                }
            }



            roomneed();
        });
        $('.maskdatebox').mask("9999.99.99", {placeholder: 'yyyy.mm.dd'});

        // console.log(childnum);
    }
</script>
<div class="container order">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl; ?>"><?= lan('home'); ?></a> >
        <a href="<?php echo $homeurl . '' . $separator . shorturl_get("rooms/list/"); ?>"> <?= lan('szobalista'); ?></a>
        >
        <span><?php echo "" . ($adat["order"]); ?></span>
    </div>
    <div>
    <h2><?= lan('order');?></h2>
    </div>
    <form method="post">
        <div class="col-sm-6">
            <?php $FormClass->textbox('name', $order['name'], lan('nev'), 'hidden', 1); ?>
            <?php $FormClass->emailbox('email', $order['email'], lan('email'), 'hidden', 1); ?>
            <?php $FormClass->textbox('tel', $order['tel'], lan('tel'), 'hidden', 1); ?>
            <?php $FormClass->textaera('message', $order['message'], lan('message'), 'hidden', 0); ?>
            <div class="info">
                <div class="col-xs-6">
                    <?= lan('roomneed') ?>
                    <div class="clearfix"></div>
                    <div id="roomneed"></div>
                </div>
                <div class="col-xs-6">
                    <span onclick="roomorder();"> <?= lan('roomheave') ?></span>
                    <div class="clearfix"></div>
                    <div id="roomheave"></div>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="col-xs-6">
                <b><?= lan('felnott'); ?></b>
                <span class="plus" id="felnottminusf">-</span>
                <input type="text" id="felnottnum" name="felnottnum" value="<?= $order["felnottnum"]; ?>" maxlength="3"
                       readonly>
                <span class="plus" id="felnottplusf">+</span>

            </div>
            <div class="col-xs-6">
                <b><?= lan('gyerek'); ?></b>
                <span class="plus" id="gyerekminusf">-</span>
                <input type="text" id="gyereknum" name="gyereknum" value="<?= $order["gyereknum"]; ?>" maxlength="3"
                       readonly>
                <span class="plus" id="gyerekplusf">+</span>
            </div>
            <?php $FormClass->datebox('erkezes', $order['erkezes'], lan('erkezes'), 'hidden', 1); ?>
            <?php $FormClass->datebox('tavozas', $order['tavozas'], lan('tavozas'), 'hidden', 1); ?>
            <?php $FormClass->numbox('ejszam', $order['ejszam'], lan('ejszam'), '', 1); ?>
            <div id="gyerekadat">Gyerekek<br>
            </div>
        </div>

        <div class="clearfix"></div>
        <?php
        //arraylist($rooms);
        ?>
        <div class="clearfix"></div>
        <div  class="priecelist">
            <?php foreach ($rooms as $roomdatas) {
                 //lenesarray['datas'][0];
                // arraylist($roomdatas);
                include('formelement_order_room.php');
            ?>
        <?php
        $c++;
        } ?>
        <?php foreach ($csomagok["datas"] as $csomag) {
                $csomag["connectedservices"]=csomagtags_json_from($csomag);
              // arraylist($elem["connectedservices"]['services']['rooms']);
                    //rooms
                 foreach ($csomag["connectedservices"]['services']['rooms'] as $room){
                     $filterssubroom['lang'] = $_SESSION['lang'];
                     $order['rooms'][$c]["id"] = $filterssubroom['id'] = $room['id'];
                     $order['rooms'][$c]["csomagid"]=$csomag['id']+2;
                     $order['rooms'][$c]["person"]=2-$order['rooms'][$c]["foglalt"];
                     $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');

                     $roomdatas=$ideglenesarray['datas'][0];
                    // arraylist($roomdatas);
                        include('formelement_order_room.php');
                     $c++;
                 }
                ?>
        <?php
        }
        //arraylist($order);
        ?>
        <div class="clearfix"></div>
</div>
        <input type="submit" class="btn btn-creme">

    </form>

</div>
    <div>
    <?= lan('gyerekkedvezmeny')?>
    </div>
<?php foreach ($gyerekkedvezmenyek as $name=>$value){
    if ($value['val']>0){
    ?>
    <div>
        <div class="col-sm-6">
            <?= lan($name) ?>
        </div>
        <div class="col-sm-6">
            <?= $value['val'] ?>
            <?= $kedvezmenytipus[$value['tip']] ?>
        </div>
    </div>
<?php }} ?>