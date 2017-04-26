<?php
if ($getparams[2] > 0 && $getparams[3]=="room") {
    $order['room']=$filterroom['id'] = $getparams[2];
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
    $csomagokarray = $CsomagClass->get($filtercsomag, '', $page = 'all');
    $csomagok = $csomagokarray["datas"];
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
    }
    //getcsomagok
    function loadelements_typecsomag(data) {
        console.log(data);
        data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
        if (data2!=""){
            menudatas = jQuery.parseJSON(data2);
            $("#roomctainer").html('<select id="csomag" name="csomag" class="form-control"></select>');
            var midsel = document.getElementById('csomag');
            var opt = document.createElement('option');
            opt.innerHTML = "<?= lan('valasszcsomagot')?>";
            opt.value = "0";
            midsel.appendChild(opt);

            $.each(menudatas, function (key, value) {
                console.log(value["title"]);
                var opt = document.createElement('option');
                opt.innerHTML = value["title"];
                opt.value = value["id"];
                midsel.appendChild(opt);
            });
        }
        else $("#roomctainer").html('');

    }
    function getjsonfromcsomag(room) {
        if (room!="")
        {
            urladd='&room='+room
        }
        else{
            urladd='';
        }
        geturl=server_url + "service.php?q=csomag/csomag_data"+urladd;
        console.log(geturl)
        $.ajax({
            type: "GET",
            url: geturl,
            success: function (data) {
                loadelements_typecsomag(data);
            }
        });
    }

    $(window).load(function () {
        $('#room').on('change', function () {
            //  alert('tadam');
            getjsonfromcsomag(this.value);
        });
    });
</script>

<div class="col-xs-12">
    <div class="col-xs-6">
        <b><?= lan('felnott'); ?></b>
        <span class="plus" id="felnottminusf">-</span>
        <input type="text" id="felnottnum" name="felnottnum" value="<?= $order["felnottnum"]; ?>" maxlength="3"
               readonly>
        <span class="plus" id="felnottplusf">+</span>
    </div>

    <div class="col-xs-6">
        <b><?= lan('gyerekek'); ?></b>
        <span class="plus" id="gyerekminusf">-</span>
        <input type="text" id="gyereknum" name="gyereknum" value="<?= $order["gyereknum"]; ?>" maxlength="3"
               readonly>
        <span class="plus" id="gyerekplusf">+</span>
    </div>
    <?php $FormClass->datebox('erkezes', $order['erkezes'], lan('erkezes'), 'hidden', 1); ?>
    <?php $FormClass->datebox('tavozas', $order['tavozas'], lan('tavozas'), 'hidden', 1); ?>
    <?php $FormClass->numbox('ejszam', $order['ejszam'], lan('ejszam'), '', 1); ?>
    <div class="clearfix"></div>
    <div id="gyerekadat">
    </div>

</div>
<div class="col-xs-12">
    <?php $FormClass->textbox('name', $order['name'], lan('nev'), 'hidden', 1); ?>
    <?php $FormClass->emailbox('email', $order['email'], lan('email'), 'hidden', 1); ?>
    <?php $FormClass->textbox('tel', $order['tel'], lan('tel'), 'hidden', 1); ?>
    <?php $FormClass->textaera('message', $order['message'], lan('message'), 'hidden', 0); ?>
    <?php if(!$getparams[3] ){?>
    <?php $FormClass->selectbox2('room',$rooms,array('value'=>'id','name'=>'title'),$order['room'],lan('valasszszobat')); ?>
    <div id="roomctainer"></div>
    <?php } ?>
    <div class="info" style="display: none;">
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




<div class="clearfix"></div>