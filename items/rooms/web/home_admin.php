<script>
    var n = 0;
    function remselect(re) {
        console.log($('#sites[' + re + ']'));
        $('#selector' + re).remove();

    }

    function loadelements_type1(data) {
        //  console.log(data);
        data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
        menudatas = jQuery.parseJSON(data2);
        // console.log(menudatas);
        selectname = 'sites[' + n + ']';
        var selectList = '<div id="selector' + n + '" class="col-xs-12"><div class="col-xs-10"><select id="' + selectname + '" name="' + selectname + '" class="form-control">';
        $.each(menudatas, function (key, value) {
            selectList += "<option value='" + value["id"] + "'>" + value["title"] + "</option>";
        });
        selectList += '</select></div><span onclick="remselect(' + n + ');" class="col-xs-2">-</span></div>';
        $('#siteslist').append(selectList);
        n++;
    }


    function getjsonfrom() {
        // selectbox = getselectedfilelock();

        $.ajax({
            type: "GET",
            url: server_url + "service.php?q=site/site_data",
            success: function (data) {
                loadelements_type1(data);
            }
        });
    }

</script>


<h2><?= lan('home'); ?></h2>
<form method="post">
    <div class="col-xs-12">
        <div class="col-sm-12"><h3><?= lan('csomag'); ?></h3></div>
        <div class=" col-sm-4">
            <?php $Form_Class->selectbox2("csomag[0]", $csomagokarray["datas"], array('value' => 'id', 'name' => 'title'), $datas["csomag"][0], "csomag1"); ?>
        </div>
        <div class=" col-sm-4">
            <?php $Form_Class->selectbox2("csomag[1]", $csomagokarray["datas"], array('value' => 'id', 'name' => 'title'), $datas["csomag"][1], "csomag2"); ?>
        </div>
        <div class=" col-sm-4">
            <?php $Form_Class->selectbox2("csomag[2]", $csomagokarray["datas"], array('value' => 'id', 'name' => 'title'), $datas["csomag"][2], "csomag3"); ?>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-12"><h3><?= lan('sites'); ?></h3></div>
        <span onclick="getjsonfrom();"><?= lan('add'); ?></span>

        <div id="siteslist">
            <?php
            $sitesc = 0;
            if (count($datas['sites'])){
            foreach ($datas['sites'] as $datass) {
                ?>
                <div id="selector<?= $sitesc - 0 ?>" class="col-xs-12">
                    <div class="col-xs-10">
                        <?php $Form_Class->selectbox2("sites[" . $sitesc . "]", $sitesarray["datas"], array('value' => 'id', 'name' => 'title'), $datass, "sites" . $sitesc); ?>
                    </div>
                    <span onclick="remselect(<?= $sitesc - 0 ?>);" class="col-xs-2">-</span>
                </div>
                <?php
                $sitesc++;
            }

            ?>
        </div>
        <script>
            var n =
            <?= $sitesc-0;?>
        </script>
        <?php
        }
        ?>
    </div>


        <div class="col-xs-12">
            <div class="col-sm-12"><h3><?= lan('event'); ?></h3></div>
            <div class=" col-sm-4">
                <?php $Form_Class->selectbox2("event[0]", $eventsarray["datas"], array('value' => 'id', 'name' => 'title'), $datas["event"][0], "csomag1"); ?>
            </div>
            <div class=" col-sm-4">
                <?php $Form_Class->selectbox2("event[1]", $eventsarray["datas"], array('value' => 'id', 'name' => 'title'), $datas["event"][1], "csomag2"); ?>
            </div>
            <div class=" col-sm-4">
                <?php $Form_Class->selectbox2("event[2]", $eventsarray["datas"], array('value' => 'id', 'name' => 'title'), $datas["event"][2], "csomag3"); ?>
            </div>
        </div>

    <button><?= lan('save'); ?></button>
</form>