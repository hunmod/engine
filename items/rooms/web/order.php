<?php
if ($getparams[2] > 0) {

    $filters['id'] = $getparams[2];
    $filters['lang'] = $_SESSION['lang'];
    $roomarray = $RoomsClass->get($filters, $order = '', $page = 'all');
    $rooms =$roomarray["datas"] ;
}
//ha kaptam adatot
if ($order['gyereknum']<1) {
    if ($_SESSION['gyerek']>0) {
        $order['gyereknum'] = $_SESSION['gyerek'];
    }
    else $order['gyereknum'] = 0;
}
if ($order['felnottnum']<1) {
    if ($_SESSION['felnott']>0) {
        $order['felnottnum'] = $_SESSION['felnott'];
    }
    else $order['felnottnum'] = 0;
}

if (!$order['erkezes']) {
    if ($_SESSION['from']) {
        $order['erkezes'] = $_SESSION['from'];
    }
    else $order['erkezes'] = $dateprint;
}
if (!$order['tavozas']) {
    if ($_SESSION['to']) {
        $order['tavozas'] = $_SESSION['to'];
    }
    else $order['tavozas'] = $dateprint;
}
?>
<script>
    var childnum = 0;
    var felnottnum = 0;
    var roomneedval = 0;

    $(window).load(function () {
        var mychild = ($('#gyereknum').val());
        for (i = 0; i < mychild; i++) {
            addgyerek();
        }
        felnottnum =$('#felnottnum').val();
        roomneed();
        //ejaszakak kiszamolas
        nigthwrite();
        $('#felnottnum').on('change', function (a) {
            SetSession('felnott', $('#felnottnum').val(), 'start/setsession');
            //alert('ch');
        });
        $('#gyereknum').on('change', function (a) {
            SetSession('gyerek', $('#gyereknum').val(), 'start/setsession');
           var mnum= $('#gyereknum').val();
            if (mnum>childnum){
                for (i = childnum ; i < mnum; i++) {
                    addgyerek();
                }
            }
            if (mnum<childnum){
                for (i = mnum ; i < childnum+1; i++) {
                    removegyerek();
                    sleep(10000);
                }
                console.log(childnum);

            }
            console.log(mnum);
            //alert('ch');
        });
        $('#felnottplusf').on('click', function (a) {
            SetSession('felnott', valboxplus('felnottnum'), 'start/setsession');
            felnottnum++;
            roomneed();
            //alert('ch');
        });
        $('#gyerekplusf').on('click', function (a) {
            SetSession('gyerek', valboxplus('gyereknum'), 'start/setsession');
            addgyerek();
            roomneed();
            //alert('ch');
        });
        $('#felnottminusf').on('click', function (a) {
            SetSession('felnott', valboxminus('felnottnum'), 'start/setsession');
            felnottnum--;
            roomneed();
            //alert('ch');
        });
        $('#gyerekminusf').on('click', function (a) {
            SetSession('gyerek', valboxminus('gyereknum'), 'start/setsession');
            removegyerek();
            roomneed();
            //alert('ch');
        });
        $('#erkezes').blur(function(event)
        {
            nigthwrite()
        });
        $('#tavozas').blur(function(event)
        {
            nigthwrite()
        });

    });

    function roomneed(){
      var personas=parseInt(childnum)+parseInt(felnottnum);

        $('#roomneed').html(Math.ceil(personas/2));
    }

    function agecalc(birthdate,nowdate){
        if (nowdate){
            datum1 = new Date(nowdate);
        }else{
            datum1 = new Date();
        }
        datum2 = new Date(birthdate);
        kul = datum1.getTime()-datum2.getTime();
        kor=Math.floor(kul/(1000*60*60*24)/365);
        return(kor);
    }
    function daycalc(firstdate,seconddate){
        datum1 = new Date(seconddate);
        datum2 = new Date(firstdate);
        kul = datum1.getTime()-datum2.getTime();
        kor=Math.floor(kul/(1000*60*60*24));
        return(kor);
    }
    function nigthwrite() {
        firstdate = $('#erkezes').val();
        seconddate = $('#tavozas').val();
        days=daycalc(firstdate, seconddate);
        if (days>1){
            nigthst=days-1;
        }
        else nigthst=0;
        $('#ejszam').val(nigthst);
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    function countgyerekek() {
        return $('.childgroup').length;
        //console.log($('.childgroup').length);
    }
    function removegyerek() {
        $('.childgroup').last().remove();
        childnum--;
    }
    function addgyerek() {
        var childataform = '<div class="childgroup">' + '<?php $FormClass->numbox('child['."'+".'childnum'."+'".'][birth]',null,lan('gyerekkora'),'hidden',1);?>' + '</div>';
        $("#gyerekadat").append(childataform);
        childnum++;
        // console.log(childnum);
    }

</script>
<div class="container room">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl; ?>"><?= lan('home'); ?></a> >
        <a href="<?php echo $homeurl . '' . $separator . shorturl_get("rooms/list/"); ?>"> <?= lan('szobalista'); ?></a>
        >
        <span><?php echo "" . ($adat["order"]); ?></span>
    </div>

    <form>
        <div class="col-sm-6">
            <?php $FormClass->textbox('name', $order['name'], lan('nev'), 'hidden', 1); ?>
            <?php $FormClass->emailbox('email', $order['email'], lan('email'), 'hidden', 1); ?>
            <?php $FormClass->textbox('tel', $order['tel'], lan('tel'), 'hidden', 1); ?>
            <?php $FormClass->textaera('message', $order['message'], lan('message'), 'hidden', 1); ?>

        </div>
        <div class="col-sm-6">

            <div class="col-xs-6">
                <b><?= lan('felnott'); ?></b>
                <span class="plus" id="felnottminusf">-</span>
                <input type="text" id="felnottnum" name="felnottnum" value="<?= $order["felnottnum"]; ?>" maxlength="3" readonly>
                <span class="plus" id="felnottplusf">+</span>
            </div>
            <div class="col-xs-6">
                <b><?= lan('gyerek'); ?></b>
                <span class="plus" id="gyerekminusf">-</span>
                <input type="text" id="gyereknum" name="gyereknum" value="<?= $order["gyereknum"]; ?>" maxlength="3"  readonly>
                <span class="plus" id="gyerekplusf">+</span>
            </div>
            <?php $FormClass->datebox('erkezes', $order['erkezes'], lan('erkezes'), 'hidden', 1); ?>
            <?php $FormClass->datebox('tavozas', $order['tavozas'], lan('tavozas'), 'hidden', 1); ?>
            <?php $FormClass->numbox('ejszam', $order['ejszam'], lan('ejszam'), 'hidden', 1); ?>

            <div id="gyerekadat"></div>

        </div>
        <div>
           <?= lan('roomneed')?>:<span id="roomneed"></span>
        </div>
        <div class="clearfix"></div>
<input type="submit" class="btn btn-creme">

    </form>

    <div class="clearfix"></div>
    <?php
    foreach ($rooms as $elem){
        include('items/rooms/web/room_display_prieces.php');
    }
    ?>
</div>
