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
    function getjsonfrom(route) {
        // selectbox = getselectedfilelock();
        $.ajax({
            type: "GET",
            url: server_url + "service.php?q="+route,
            success: function (data) {
                loadelements_type1(data);
            }
        });
    }
//---------------------------

    var n2 = <?php echo( count($datas['shop']) )?>;

    function remselect2(re) {
        console.log($('#shop[' + re + ']'));
        $('#selector2_' + re).remove();

    }
    function loadelements_type2(data) {
        //  console.log(data);
        data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
        menudatas = jQuery.parseJSON(data2);
        // console.log(menudatas);
        selectname = 'shop[' + n2 + ']';
        var selectList = '<div id="selector2_' + n2 + '" class="col-xs-12"><div class="col-xs-10"><select id="' + selectname + '" name="' + selectname + '" class="form-control">';
        $.each(menudatas, function (key, value) {
            selectList += "<option value='" + value["id"] + "'>" + value["title"] + "</option>";
        });
        selectList += '</select></div><span onclick="remselect2(' + n2 + ');" class="col-xs-2">-</span></div>';
        $('#shoplist').append(selectList);
        n2++;
    }
    function getjsonfrom2(route) {
        // selectbox = getselectedfilelock();
        $.ajax({
            type: "GET",
            url: server_url + "service.php?q="+route,
            success: function (data) {
                loadelements_type2(data);
            }
        });
    }
//---------------------------------------------

</script>
<h2><?= lan('home'); ?></h2>
<form method="post">
    <div class="col-xs-12">
        <div class="col-sm-12"><h3><?= lan('sites'); ?></h3></div>
        <span onclick="getjsonfrom('site/site_data');"><?= lan('add'); ?></span>
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
            n =<?= $sitesc-0;?>
        </script>
        <?php
        }
        ?>
    </div>

    <div class="col-xs-12">
        <div class="col-sm-12"><h3><?= lan('shop'); ?></h3></div>
        <span onclick="getjsonfrom2('shop/site_data');"><?= lan('add'); ?></span>
        <div id="shoplist">
            <?php
            $shopc = 0;
            if (count($datas['shop'])){
            foreach ($datas['shop'] as $datass) {
                ?>
                <div id="selector2_<?= $shopc - 0 ?>" class="col-xs-12">
                    <div class="col-xs-10">
                        <?php $Form_Class->selectbox2("shop[" . $shopc . "]", $shoparray["datas"], array('value' => 'id', 'name' => 'title'), $datass, "sites" . $shopc); ?>
                    </div>
                    <span onclick="remselect2(<?= $shopc - 0 ?>);" class="col-xs-2">-</span>
                </div>
                <?php
                $shopc++;
            }

            ?>
        </div>
        <script>
            n2 =<?= $shopc-0;?>
        </script>
        <?php
        }
        ?>
    </div>
    <button><?= lan('save'); ?></button>
</form>