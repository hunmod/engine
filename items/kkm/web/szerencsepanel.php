<div class="Szerencse">
    <div class="text-center">
        <h1>Szerencse<h1>
    </div>
    <button id="szerencse_dob" class="btn btn_succes" onclick="szerencse_dob();">Szerencse</button>

    <div class="clearfix"></div>

    <div class="col-xs-12 textbig" id="szeencs_div"></div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>

<script>

    var szerenecse_k1 = '';
    var szerenecse_k2 = '';

    function szerencse_dob() {
        if ($('#cszerencse').val()*1 > 0)
    {
        ttext = "";
        szerenecse_k1 = getRandomArbitrary(1, 6);
        szerenecse_k2 = getRandomArbitrary(1, 6);
        szerencsesvagy = szerenecse_k1 + szerenecse_k2 - ($('#cszerencse').val() * 1);
        if (szerencsesvagy >= 1) {

            ttext += "<span class='green'>" + "Szerencséd van" + "</span><br>";

        }
        else {
            ttext += "<span class='red'>" + "Nincs szerncséd" + "</span><br>";

        }
        // ttext = szorny_k1 + " ; " + szorny_k2 + "<br>";


        $('#cszerencse').val(($('#cszerencse').val() * 1) - 1);
        $('#cszerencse').change();

        $('#szerencse_dob').attr('disabled', 'disabled');


        $('#szeencs_div').html(ttext);
    }
    else{
        alert('elfogyott a szerencsepontod!');
    }

    }

</script>


