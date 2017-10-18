<div class="kocka">
    <button  class="btn btn_succes col-xs-4" onclick="kocka_dob();"> Egy kocka </button>
    <button  class="btn btn_succes col-xs-4" onclick="kocka2_dob();"> Két kocka </button>
    <button  class="btn btn_succes col-xs-4" onclick="kocka3_dob();"> három kocka </button>
    <div class="clearfix"></div>


    <div class="col-xs-12 textbig" id="egykocka_div"></div>
    <div class="clearfix"></div>
</div>

<script>

    var egykocka = '';
    var egykocka2 = '';
    var egykocka3 = '';

    function kocka_dob() {
            ttext = "";
        egykocka = getRandomArbitrary(1, 6);

                ttext += "<span class='normal'>" + egykocka + "</span><br>";


            // ttext = szorny_k1 + " ; " + szorny_k2 + "<br>";




            $('#egykocka_div').html(ttext);

    }
    function kocka2_dob() {
            ttext = "";
        egykocka = getRandomArbitrary(1, 6);
        egykocka2 = getRandomArbitrary(1, 6);

                ttext += "<span class='normal'>" + egykocka +" ,"+ egykocka2+ "</span><br>";


            // ttext = szorny_k1 + " ; " + szorny_k2 + "<br>";




            $('#egykocka_div').html(ttext);

    }
    function kocka3_dob() {
            ttext = "";
        egykocka = getRandomArbitrary(1, 6);
        egykocka2 = getRandomArbitrary(1, 6);
        egykocka3 = getRandomArbitrary(1, 6);

                ttext += "<span class='normal'>" + egykocka +" ,"+ egykocka2+" ,"+ egykocka3+ "</span><br>";


            // ttext = szorny_k1 + " ; " + szorny_k2 + "<br>";




            $('#egykocka_div').html(ttext);

    }

</script>

