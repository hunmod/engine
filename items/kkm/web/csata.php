<style>
    .textbig {
        display: inline-block;
        position: relative;
        font-size: 2.3em;
        font-weight: bold;
        height: 100px;

    }

    .textbig .normal,
    .textbig .red,
    .textbig .green {

        display: block;
        padding: 10%;
        text-align: center;

    }

    .textbig .red {
        background: red;
        color: #fff;

    }

    .textbig .green {
        background: greenyellow;
        color: #fff;

    }

    .csatpanel {
      /*  padding-top: 10%;
        padding-left: 20%;
        padding-bottom: 10%;*/
        background: rgba(100, 100, 100, 0.1);
        border-radius: 20px;
        padding: 10px;
    }
</style>
<div class="csatpanel">

    <div class="text-center">
        <h1>Csatapanel
            <h1>
                <h3>Szörny adatai<h3>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-6 text-center">
        <?php $FormClass->numbox("caszornyugyesseg", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aszornyugyesseg'], lan('alap ugyesseg')) ?>
    </div>
    <div class="col-xs-6 text-center">
        <?php $FormClass->numbox("caszornyeletero", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['aszornyeletero'], lan('alap eletero')) ?>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-6 text-center">
        <?php $FormClass->numbox("cszornyugyesseg", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['szornyugyesseg'], lan('Szörny ugyesseg')) ?>
    </div>
    <div class="col-xs-6 text-center">
        <?php $FormClass->numbox("cszornyeletero", $_COOKIE["mese"][$_SESSION['storry']]['karakter'][0]['szornyeletero'], lan('Szörny eletero')) ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-6">
        <button class="btn btn_success" id="szorny1_dob" onclick="szorny1_dob()">Dobás szörny</button>
    </div>
    <div class="col-xs-6">
        <button class="btn btn_success" id="hos_dob" onclick="hos_dob()">Dobás én</button>
    </div>

    <div class="clearfix"></div>
    <div class="col-xs-6 textbig" id="csataszorny1"></div>
    <div class="col-xs-6 textbig" id="csataen"></div>
    <div class="clearfix"></div>

</div>

<script>
    $('#caszornyugyesseg').change(function ($this) {
        //myval = $('#cugyesseg').val();
        $('#cszornyugyesseg').val($('#caszornyugyesseg').val());
    });
    $('#caszornyeletero').change(function ($this) {
        //myval = $('#cugyesseg').val();
        $('#cszornyeletero').val($('#caszornyeletero').val());
    });
    var szorny2_k1 = '';
    var szorny2_k2 = '';
    var szorny_k1 = '';
    var szorny_k2 = '';
    var hos_k1 = '';
    var hos_k2 = '';

    var szorny_11 = '';
    var hos_11 = '';


    function getRandomArbitrary(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }


    function szorny1_dob() {
        if($('#caszornyugyesseg').val()*1>0)
        {
            ttext = "";
            szorny_k1 = getRandomArbitrary(1, 6);
            szorny_k2 = getRandomArbitrary(1, 6);
            szorny_11 = szorny_k1 + szorny_k2 + ($('#cszornyugyesseg').val() * 1);

            //ttext = szorny_k1 + " ; " + szorny_k2 + "<br>";
            ttext += "<span class='normal'>" + szorny_11 + "</span><br>";


            $('#szorny1_dob').attr('disabled', 'disabled');
            $('#hos_dob').removeAttr('disabled');


            $('#csataszorny1').html(ttext);

        }else{
            alert('tölsd kia a szörnypanelt!');
        }

    }
    function hos_dob() {
        ttext = "";
        hos_k1 = getRandomArbitrary(1, 6);
        hos_k2 = getRandomArbitrary(1, 6);
        hos_11 = hos_k1 + hos_k2 + ($('#cugyesseg').val() * 1);
        //ttext = hos_k1 + " ; " + hos_k2 + "<br>";

        if (hos_11 > szorny_11) {
            ttext += "<span class='green'>" + hos_11 + "</span><br>";
            $('#cszornyeletero').val(($('#cszornyeletero').val() * 1) - 2)
        } else if (hos_11 < szorny_11) {
            ttext += "<span class='red'>" + hos_11 + "</span><br>";
            $('#celetero').val(($('#celetero').val() * 1) - 2)


        } else {
            ttext += "<span class='normal'>" + hos_11 + "</span><br>";

        }

        if ($('#cszornyeletero').val() * 1 < 1) {
            alert('Szörny halott!');
            $('#caszornyugyesseg').val('');
            $('#cszornyugyesseg').val('');
            $('#caszornyeletero').val('');
            $('#cszornyeletero').val('');
        }
        if ($('#celetero').val() * 1 < 1) {
            alert('Meghaltál!');
            herodie();
        }

        $('#hos_dob').attr('disabled', 'disabled');
        $('#szorny1_dob').removeAttr('disabled');


        $('#csataen').html(ttext);

    }


</script>