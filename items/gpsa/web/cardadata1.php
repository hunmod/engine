<style>
    .triplistcontainer {
        max-height: 600px;
        overflow-y: scroll;
        padding: 0;

    }

    triplist {
        display: table;
        width: 100%;
        float: left;
    }

    triplist row:nth-child(2n+2) {
        background: #CCC;
    }

    triplist row_head,
    triplist row {
        display: table-row;
        width: auto;
        border: 1px solid #666666;
        cursor: pointer;
        position: relative;
    }

    triplist row:hover {
        background: #D2D2D2SSS;
    }

    triplist row_head {
        font-weight: bold;
    }

    triplist .cell {
        width: auto;
        display: table-cell;
        border: 1px solid #999999;
    }

    triplist ido,
    triplist status {
        max-width: 100px;
    }

    triplist lng,
    triplist lat {
        max-width: 80px !important;
    }

    triplist address {
    }

    #map {
        width: 100%;
        height: 400px;
        float: left;
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


    $(document).on('click', 'row', function () {

        var zoomlevel = map.getZoom();
        var latx = $(this).children("lng").html();
        var lngx = $(this).children("lat").html();
        var addressx = $(this).children("address").html();
        map.setCenter(new google.maps.LatLng(latx, lngx));
        map.setZoom(zoomlevel);

        clearmarkers();
        makemarker(latx, lngx);
//	console.log(markers); 
    });


</script>

<div class="container">
    <form method="get">
        <form action="" method="get">
            <?php $Form_Class->selectbox('rsz', $carlist['datas'], $typ = array('value' => 'rendszam', 'name' => 'vrendszam'), $get["rsz"],  $lan["rendszam"])
            ?>
<div id="idostep1">
            <?php
            $Form_Class->selectboxeasy('idotipus', $idotipus, $get["idotipus"],  $lan["idopont"], $class = "form-control");
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
        <h2><?= $lan["cardatas"]; ?></h2>

        <div class="col-sm-6 triplistcontainer">
            <triplist>
                <row_head>
                    <lng class="cell"><?= $lan["lng"]; ?></lng>
                    <lat class="cell"><?= $lan["lat"]; ?></lat>
                    <ido class="cell"><?= $lan["datum"]; ?></ido>
                    <speed class="cell"><?= $lan["speed"]; ?></speed>

                    <status class="cell"><?= $lan["status"]; ?></status>
                    <address class="cell"><?= $lan["adress"]; ?></address>

                </row_head>
                <?php
                foreach ($backdatas as $row) {
                    ?>
                    <row alt="<?= $row["addres"]; ?>">
                        <lng class="cell"><?= $row["lng"]; ?></lng>
                        <lat class="cell"><?= $row["lat"]; ?></lat>
                        <time class="cell"><?= $row["datum"]; ?> <?= $row["ido"]; ?></time>
                        <speed class="cell"><?= $row["sebesseg"]; ?></speed>
                        <!--fuel class="cell"><?= hexdec($row["benzszint"]); ?></fuel-->
                        <status class="cell"><?= $allstatus[$row["statusz"]]; ?></status>
                        <address class="cell"><?= $row["addres"]; ?></address>
                        <?php if ($row["statusz"] == "E") { ?>
                            <script>
                                poliline[poliline.length] = {lat:<?=$row["lng"];?>, lng:<?=$row["lat"];?>};
                            </script>
                        <?php } ?>
                    </row>
                    <?php
                }
                ?>
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
            </triplist>
        </div>
        <div class="col-sm-6">
            <div id="map"></div>
        </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= $gps_class->getapikey(); ?>&callback=initMap" async defer>
</script>


<?php
//arraylist($datas);
?>
