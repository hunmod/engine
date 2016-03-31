<style>
    lat,
    lng {
        display: none;
    }

    .rowdata:nth-child(2n+2) {
        background: #CCC;
    }

    date {
        background: #666;
        color: #FFF;
    }
    #termine_time{
        display: none;
    }
</style>
<script type="text/javascript">
    var poliline = [];

    function yyyymmdd(dateg) {
        var dateIn = new Date(dateg);
        var yyyy = dateIn.getFullYear();
        var mm = dateIn.getMonth() + 1; // getMonth() is zero-based
        var dd = dateIn.getDate();
        return String(yyyy + '-' + mm + '-' + dd); // Leading zeros for mm and dd
    }
    function idotipus() {
        thdate = yyyymmdd(new Date());
        thdate1 =yyyymmdd(new Date()- 86400000);
        thdate2 =yyyymmdd(new Date()- 86400000*2);
        if ($("#idotipus").val() == 0) {
            $("#termine").val(thdate);
            $("#tol").val(thdate);
            $("#ig").val(thdate);
            hidediv('idostep3');
            hidediv('idostep2');
        }
        if ($("#idotipus").val() == 1) {
            $("#termine").val(thdate1);
            $("#tol").val(thdate1);
            $("#ig").val(thdate1);
            hidediv('idostep3');
            hidediv('idostep2');
        }
        if ($("#idotipus").val() == 2) {
            $("#termine").val(thdate2);
            $("#tol").val(thdate2);
            $("#ig").val(thdate2);
            hidediv('idostep3');
            hidediv('idostep2');
        }

        if ($("#idotipus").val() == 3) {
            $("#termine").val(thdate);
           /* $("#tol").val(thdate);
            $("#ig").val(thdate);*/
            showdiv('idostep2');
            hidediv('idostep3');
        }

        if ($("#idotipus").val() == 4) {
            $("#termine").val(thdate);
         /*   $("#tol").val(thdate);
            $("#ig").val(thdate);*/
            hidediv('idostep2');
            showdiv('idostep3');
        }


    }
</script>
<div class="container">
        <form action="" method="get">
            <?php $Form_Class->selectbox('rsz', $carlist['datas'], $typ = array('value' => 'rendszam', 'name' => 'vrendszam'), $get["rsz"],  $lan["rendszam"]);
            ?>
            <div id="idostep1">
                <?php
                $Form_Class->selectboxeasy('idotipus', $idotipus, $get["idotipus"], $lan["idopont"] ,$class = "form-control");
                ?>
            </div>
            <div id="idostep2">
                <?php
                $Form_Class->datetimebox('termine', $get["termine"], $format = 'yy-mm-dd', $lan["idopont"]);
                ?>
            </div>
            <div id="idostep3">
                <?= $lan["tol"]; ?>:<?php
                $Form_Class->datetimebox('tol', $get["tol"], $format = 'yy-mm-dd', $lan["tol"]);
                ?>
                <?= $lan["ig"]; ?>:<?php
                $Form_Class->datetimebox('ig', $get["ig"], $format = 'yy-mm-dd', $lan["ig"]);
                ?>
            </div>
            <input name="" type="submit" class="btn btn-success" value="<?=$lan['search'];?>"/>
        </form>

    <h1><?= $lan["menetlevel"]; ?></h1>
    <?php //arraylist($backdatas);?>
    <trip>
        <?php foreach ($backdatas as $row) { ?>
            <?php if ($aktdd != $row["E"]["datum"]) {
                $aktdd = $row["E"]["datum"]; ?>
                <date class="col-xs-12 date"><?= $aktdd; ?></date>
            <?php } ?>
            <row class="col-xs-12 rowdata">
                <?php $irany = "E"; ?>
                <start class="col-sm-5 col-xs-6">
                    <ido class="col-sm-4 col-xs-12"><?= $row[$irany]["ido"]; ?></ido>
                    <adress class="col-sm-8 col-xs-12"><?= $row[$irany]["addres"]; ?></adress>
                    <lat class="col-sm-6"><?= $row[$irany]['lat']; ?></lat>
                    <lng class="col-sm-6"><?= $row[$irany]['lng']; ?></lng>
                </start>
                <?php $irany = "F"; ?>
                <stop class="col-sm-5 col-xs-6">
                    <ido class="col-sm-4 col-xs-12"><?= $row[$irany]["ido"]; ?></ido>
                    <adress class="col-sm-8 col-xs-12"><?= $row[$irany]["addres"]; ?></adress>
                    <lat class="col-sm-6"><?= $row[$irany]['lat']; ?></lat>
                    <lng class="col-sm-6"><?= $row[$irany]['lng']; ?></lng>
                </stop>
                <disance class="col-sm-2 col-xs-12">
                    <?= $Sys_Class->mround($row["disance"], 2); ?> Km
                </disance>
            </row>
        <?php } ?>
    </trip>

</div>
<script>

    $("#idotipus").change(idotipus);
    $("#termine").change(function () {
        $("#tol").val($("#termine").val());
        $("#ig").val($("#termine").val());
        $("#tol_time").val("00:00:00");
        $("#ig_time").val("23:59:59");
    });
    idotipus();

    //console.log(poliline);
</script>