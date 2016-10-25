<?php
$cfilters['nolat']='nolat';
$citysarray=$location_class->get_city($cfilters,' LIMIT 0,5');
$citys=$citysarray["datas"];
arraylist($citysarray);

foreach($citys as $adat){
if($adat["city_name"]&&($adat["lati"]==10 ||!$adat["longi"]==0 )) {
    $gpsdatas = $Google_Class->get_google_geocoding($adat["city_name"]);
    $adat["lati"] = $gpsdatas[0]["geometry"]["location"]['lat'];
    $adat["longi"] = $gpsdatas[0]["geometry"]["location"]['lng'];

    if ($adat["zip"]=='' && $adat["lati"]!=0){
        $locdatas = $Google_Class->get_google_geocdata($adat["longi"], $adat["lati"]);
        $citylocdatas = array();
        foreach ($locdatas[0]["address_components"] as $adddat) {
            if ($adddat['types'][0] == 'postal_code') {
                $adat["zip"] = $adddat['long_name'];
            }
        }
    }
    arraylist($gpsdatas);

    $location_class->save_city($adat);
    sleep(1);
}
     //arraylist($locdatas);

}

/*
if($_GET["cn"])$gpsdatas = $Google_Class->get_google_geocoding($_GET["cn"]);
arraylist($gpsdatas);
*/

?>

<script>
    $( document ).ready(function() {
       //setTimeout("location.reload(true);",10000);
    });

</script>
<div class="container">
    <section class="col-sm-12" >
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span> <?= lan("search");?>
                        </div>
                    </div>
                    <div class="widget-body">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <?php //$form->hiddenbox('q',$_GET["q"]);?>
                                <?php $FormClass->textbox('name',$_GET["name"],'name',"sr-only");?>
                            </div>

                            <button type="submit" class="btn btn-success" data-original-title=""><?= lan("search");?></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <a href="<?php echo $homeurl.$separator."".$getparams[0]."/city_edit";?>" class="btn btn-success"><?= lan("ujvaros");?></a>
        <!-- Row start -->
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span><?= lan("varos");?><br />

                        </div>
                    </div>

                    <div class="widget-body">
                        <div id="dt_example" class="example_alt_pagination">
                            <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                                <thead>
                                <tr>
                                    <th style="width:5%"><?= lan('id');?></th>
                                    <th style="width:5%"><?= lan('zip');?></th>
                                    <th style="width:5%"><?= lan('nev');?></th>
                                    <th style="width:10%" class="hidden-phone"><?= lan("action");?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if (($citys))foreach ($citys as $data){?>


                                    <tr class="gradeX">
                                        <td><?php echo $data['city_id']; ?></td>
                                        <td><?php echo $data['zip']; ?></td>
                                        <td><?php echo $data['city_name']; ?></td>

                                        <td class="hidden-phone">
                                            <a href="<?php echo $server_url.$separator."".$getparams[0]."/city_edit/".encode($data['city_id']);?>" class="actions-icons">
                                                <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                                            </a>
                                            <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."dtag=".$data['id'];?>" class="delete-row" data-original-title="Delete">
                                                <img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash">
                                            </a>
                                        </td>
                                    </tr>

                                    <?php ?>

                                <?php }?>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>

                            <nav class="text-center">
                                <ul class="pagination">
                                    <li>
                                        <a href="<?php echo $server_url.$separator.$myparams."page=0"; ?>" aria-label="first">
                                            <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $server_url.$separator.$myparams."page=".($oldal-1); ?>" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                        </a>
                                    </li>



                                    <?php for ($c=0;$c<=$oldalakszama-1;$c++){
                                        $selc= '';
                                        if ($oldal==$c)$selc='class="active"';
                                        ?>
                                        <li> <a href="<?php echo $server_url.$separator.$myparams."&page=".$c; ?>" <?php echo $selc; ?> ><?php echo $c+1;?></a></li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="<?php echo $server_url.$separator.$myparams."&page=".($oldal+1); ?>" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $server_url.$separator."&page=".($oldalakszama-1); ?>" aria-label="Last">
                                            <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
    </section>
</div>

<!-- Row end -->

