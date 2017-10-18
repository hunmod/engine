<?php
//session_start();
//arraylist($_COOKIE["mese"][$_SESSION['storry']]);
//echo ($_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aeletero']);


if ($_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['augyesseg']==''){
    echo 'augyesseg :';
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['ugyesseg']=rand(1,6)+6;
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['augyesseg']=$_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['ugyesseg'];
    echo ($_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['augyesseg']);

}


if ($_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aeletero']==''){
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['eletero']=rand(1,6)+rand(1,6)+12;
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aeletero']=$_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['eletero'];
}

if ($_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aszerencse']==''){
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['szerencse']=rand(1,6)+6;
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aszerencse']=$_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['szerencse'];
}
if ($_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['abecsulet']==''){
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['becsulet']=rand(1,6)+6;
    $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['abecsulet']=$_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['becsulet'];
}





//setcookie("mese", $_COOKIE["mese"]);
//$_COOKIE["mese"]=$_COOKIE["mese"];

//arraylist($_COOKIE["mese"][$_SESSION['storry']]);
//arraylist($_COOKIE);
?>


<style>
    .karakrerlap {
        /* padding-top: 10%;
         padding-left: 25%;
         padding-bottom: 10%;
         background-image: url('<?=$homeurl?>/items/kkm/web/img/kalandlap.jpg');*/
        background-position: left;
        background-size: cover;
        background-repeat: no-repeat;
        background: rgba(100, 100, 100, 0.1);
        border-radius: 20px;
        padding: 10px;
    }

    .karakrerlap #ctargyak {
        height: 21em;
    }

    .toggleelement{
        display: none;
    }
</style>
<div class="karakrerlap">
    <div class="clearfix"></div>

    <div class="col-sm-12">
        <h1>Karakterlap</h1>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-12">
        <?php $FormClass->textbox("cnev", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['nev'], lan('nev')) ?>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-4">
        <?php $FormClass->numbox("caugyesseg", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['augyesseg'], lan('alap ugyesseg')) ?>
    </div>
    <div class="col-xs-4">
        <?php $FormClass->numbox("caeletero", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aeletero'], lan('alap eletero')) ?>
    </div>
    <div class="col-xs-4">
        <?php $FormClass->numbox("caszerencse", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aszerencse'], lan('alap szerencse')) ?>
    </div>


    <div class="col-xs-4">
        <?php $FormClass->numbox("cugyesseg", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['ugyesseg'], lan('ugyesseg')) ?>
    </div>
    <div class="col-xs-4">
        <?php $FormClass->numbox("celetero", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['eletero'], lan('eletero')) ?>
    </div>
    <div class="col-xs-4">
        <?php $FormClass->numbox("cszerencse", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['szerencse'], lan('szerencse')) ?>
    </div>


    <div class="col-xs-6">
        <?php $FormClass->textaera("ctargyak", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['targyak'], lan('targyak')) ?>
        <?php $FormClass->textaera("czsakmany", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['zsakmany'], lan('zsakmany')) ?>
        <?php $FormClass->textaera("ckepesseg", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['kepesseg'], lan('kepesseg')) ?>
    </div>
    <div class="col-xs-6">
        <?php $FormClass->numbox("cabecsulet", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['abecsulet'], lan('alap becsulet')) ?>
        <?php $FormClass->numbox("cbecsulet", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['becsulet'], lan('becsulet')) ?>
        <?php $FormClass->numbox("carany", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['arany'], lan('arany')) ?>
        <?php $FormClass->textbox("ckovek", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['kovek'], lan('kovek')) ?>
        <?php $FormClass->textbox("citalok", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['italok'], lan('italok')) ?>
        <?php $FormClass->textaera("celemiszer", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['elemiszer'], lan('elemiszer')) ?>
        <?php $FormClass->textaera("cvarazslatok", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['elemiszer'], lan('varazslatok')) ?>

    </div>
    <div class="clearfix"></div>

    <div class="col-sm-12">
        <?php $FormClass->textaera("cjegzet", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['jegzet'], lan('jegzet')) ?>
        <?php //ssarraylist($_COOKIE["mese"][$_SESSION['storry']]); ?>
    </div>
    <div class="clearfix"></div>


</div>


<script>
function togglebt(mit) {
    $('#' + mit).toggle('slow');
}

var meseid =<?= $_SESSION['storry']?>;
var karakterid = 0;
$('#cnev').change(function ($this) {
    myval = $('#cnev').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][nev]', myval, '1000');
});


$('#cugyesseg').change(function ($this) {
    myval = $('#cugyesseg').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][ugyesseg]', myval, '1000');
});

$('#caszerencse').change(function ($this) {
    myval = $('#caszerencse').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][aszerencse]', myval, '1000');
});
$('#cszerencse').change(function ($this) {
    myval = $('#cszerencse').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][szerencse]', myval, '1000');
});

$('#caugyesseg').change(function ($this) {
    myval = $('#caugyesseg').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][augyesseg]', myval, '1000');
});

$('#caeletero').change(function ($this) {
    myval = $('#caeletero').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][aeletero]', myval, '1000');
});
$('#celetero').change(function ($this) {
    myval = $('#celetero').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][eletero]', myval, '1000');
});

$('#carany').change(function ($this) {
    myval = $('#carany').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][arany]', myval, '1000');
});
$('#ckovek').change(function ($this) {
    myval = $('#ckovek').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][kovek]', myval, '1000');
});
$('#celemiszer').change(function ($this) {
    myval = $('#celemiszer').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][elemiszer]', myval, '1000');
});


$('#citalok').change(function ($this) {
    myval = $('#citalok').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][italok]', myval, '1000');
});


$('#ctargyak').change(function ($this) {
    myval = $('#ctargyak').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][targyak]', myval, '1000');
});
$('#cvarazslatok').change(function ($this) {
    myval = $('#cvarazslatok').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][varazslatok]', myval, '1000');
});
$('#czsakmany').change(function ($this) {
    myval = $('#czsakmany').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][zsakmany]', myval, '1000');
});

$('#cjegzet').change(function ($this) {
    myval = $('#cjegzet').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][jegzet]', myval, '1000');
});
$('#ckepesseg').change(function ($this) {
    myval = $('#ckepesseg').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][kepesseg]', myval, '1000');
});


$('#cbecsulet').change(function ($this) {
    myval = $('#cbecsulet').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][becsulet]', myval, '1000');
});

$('#cabecsulet').change(function ($this) {
    myval = $('#cabecsulet').val();
    console.log(myval);
    writeCookie('mese[' + meseid + '][karakter][' + karakterid + '][abecsulet]', myval, '1000');
});


$('#caeletero').change();
$('#celetero').change();

$('#caszerencse').change();
$('#cszerencse').change();

$('#caugyesseg').change();
$('#cugyesseg').change();

$('#ckepesseg').change();

$('#cabecsulet').change();
$('#cbecsulet').change();


function herodie(){
    $('#cabecsulet').val('');
    $('#cabecsulet').change();

    $('#cbecsulet').val('');
    $('#cbecsulet').change();

    $('#caeletero').val('');
    $('#caeletero').change();

    $('#celetero').val('');
    $('#celetero').change();

    $('#caszerencse').val('');
    $('#caszerencse').change();

    $('#cszerencse').val('');
    $('#cszerencse').change();

    $('#caugyesseg').val('');
    $('#caugyesseg').change();

    $('#cugyesseg').val('');
    $('#cugyesseg').change();

    $('#ckepesseg').val('');
    $('#ckepesseg').change();

    $('#ctargyak').val('');
    $('#ctargyak').change();
    $('#celemiszer').val('');
    $('#celemiszer').change();
    $('#cvarazslatok').val('');
    $('#cvarazslatok').change();
    $('#czsakmany').val('');
    $('#czsakmany').change();


    writeCookie('mese[' + meseid + '][<?= $storryid ?>]', '', '1000');


    window.location.href = "<?php echo $homeurl.'/kkm/ht/1'; ?>";

}


</script>

