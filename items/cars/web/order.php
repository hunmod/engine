<img src="">
<?php
$filterc['id']=decode($getparams[2]);
if ($filterc['id']>0) {
    $car_datas = $car_class->get($filterc, '', 'all');
    $car_data=$car_datas['datas'][0];
    $car_data['img']=$car_class->getimg($filterc['id'],320,240) ;
}



if ($_POST['nev']){
    $adat=$_POST;
    if ($adat['carid']>0) {
        $filterce['id']=$adat['carid'];
        $car_datase = $car_class->get($filterc, '', 'all');
        $car_datae=$car_datase['datas'][0];
        $car_datae['img'] =$car_class->getimg($filterc['id'],320,240) ;
        //$thimg=base64_encode(file_get_contents($car_datae['img']));
    }


    $emltxt.='<h2>'.lan("megrendelés").'</h2>';
    $emltxt.='<div style="width: 50%;float: left">';
    $emltxt.='<b>'.$car_datae['cim'].'</b><br>';
   $emltxt.=$car_datae['img'];
    $emltxt.='<img src=" '.$car_datae['img'].'">';
   // $emltxt.='" '.$car_datae['img'].'"';
    $emltxt.='</div>';
    $emltxt.='<div style="width: 50%;float: left">';
    $emltxt.='<div>'.lan('Alulírott megrendelem az alábbiakban leírt járművet').'</div>';
    $emltxt.='<div>'.lan('megrendeloadatai').'</div>';
    $emltxt.='<b>'.lan('nev').': </b>'.$adat['nev'].'<br>';
    $emltxt.='<b>'.lan('email').': </b>'.$adat['email'].'<br>';
    $emltxt.='<b>'.lan('tel').': </b>'.$adat['tel'].'<br>';
    $emltxt.='<b>'.lan('cim').': </b>'.$adat['cim'].'<br>';
    $emltxt.='<b>'.lan('ido').': </b>'.$adat['ido'].'<br>';

    $emltxt.='</div>';
    $emltxt.='<table border="1" style="width: 100%">';
    $emltxt.='<tr>';
    $emltxt.='<td>'.lan('ido').'</td>';
    $emltxt.='<td>'.lan('helyszin').'</td>';
    $emltxt.='</tr>';

    for ($c = 1; $c <= 10; $c++) {
        if ($adat["cim_".$c]!='') {
            $emltxt.='<tr>';
            $emltxt.= '<td>'.$adat["ora_" . $c] . ':' . $adat["perc_" . $c] . '</td><td>' . $Text_Class->htmlfromchars($adat["cim_" . $c]) . '</td>';
            $emltxt.='</tr>';

        }

    }
    $emltxt.='</table>';
  /*  $emltxt.='<div style="width: 50%;float: left">';

    $emltxt.='<table border="1" style="width: 100%">';
    $emltxt.='<tr>';
    $emltxt.='<td>'.lan('idotartalm').'</td>';
    $emltxt.='<td>'.$adat['idotartalm'].'</td>';
    $emltxt.='</tr>';
    $emltxt.='<tr>';
    $emltxt.='<td>'.lan('óradíj').'</td>';
    $emltxt.='<td>'.$adat['óradíj'].'</td>';
    $emltxt.='</tr>';
    $emltxt.='<tr>';
    $emltxt.='<td>'.lan('kilométerdíj').'</td>';
    $emltxt.='<td>'.$adat['kilométerdíj'].'</td>';
    $emltxt.='</tr>';
    $emltxt.='<tr>';
    $emltxt.='<td>'.lan('bérleti díj').'</td>';
    $emltxt.='<td>'.$adat['bérleti díj'].'</td>';
    $emltxt.='</tr>';
    $emltxt.='<tr>';
    $emltxt.='<td>'.lan('foglaló').'</td>';
    $emltxt.='<td>'.$adat['foglaló'].'</td>';
    $emltxt.='</tr>';

    $emltxt.='</table>';
    $emltxt.='</div>';
    $emltxt.='<div style="width: 50%;float: left">';
    $emltxt.=lan('A fennmaradó összeg').':_____________</br>';
    $emltxt.=lan('Kifizetésének módja').':_____________</br>';
    $emltxt.='</div>';*/
    $emltxt.='<div style="width: 100%;float: left">';
    $emltxt.=$adat['subj'];
    $emltxt.='</div>';

    //echo $emltxt;
   // echo $car_datae['img'];

    emailkuldes(page_settings("c_email"), $oldalneve, 'Megrendelés', $emltxt);
    emailkuldes($_POST["email"], $oldalneve, 'Megrendelés', $emltxt);

    //header("Location:".$homeurl);
    //var_dump( $car_datase['img']);

}







?>
<div class="container">
    <section>
<?= $Text_Class->htmlfromchars( page_settings('footerblock4_hu'));?>
        <form method="post">
            <div class="col-sm-6">
                <?= $car_data['cim']?><br>
                <img class="img-100" src="<?= $car_data["img"]?>">
                <?php if ($car_data["elso"] > 0) {
                    ?>
                    <div><b><?= lan("elosora") ?>:</b> <?= $car_data["elso"] ?> <?= lan("ft") ?></div>
                <?php } ?>
                <?php if ($car_data["ora"] > 0) {
                    ?>
                    <div><?= $car_data["ora"] ?> <?= lan("ft/h") ?></div>
                <?php } ?>
                <?php if ($car_data["videk"] > 0) {
                    ?>
                    <div><?= $car_data["videk"] ?> <?= lan("ft/km") ?></div>
                <?php } ?>
                <?php if ($car_data["kiallas"] > 0) {
                    ?>
                    <div>+ <?= $car_data["kiallas"] ?> <?= lan("ft") ?> <?= lan("kiállás") ?></div>
                <?php } ?>


            </div>
    <div class="col-sm-6">
<?=lan('megrendelodatai')?>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("nev", $Text_Class->htmlfromchars($adat["nev"]),lan('nev').'*','',1) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("email", $Text_Class->htmlfromchars($adat["email"]),lan('email').'*','',1) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("tel", $Text_Class->htmlfromchars($adat["tel"]),lan('tel').'*','',1) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("cim", $Text_Class->htmlfromchars($adat["cim"]),lan('cim')) ?>
            </div>
    </div>

            <div class="col-sm-12">
                <?php $Form_Class->hiddenbox("carid", $Text_Class->htmlfromchars($car_data["id"]));
                //arraylist($car_data);
                ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->datebox('ido',$adat["ido"],lan('date').'*','control-label',1) ?>
            </div>

            <div class="col-sm-12">
                <div>
                    <div class="col-sm-2 dt1 ordertime" >
                        <?= lan('ido') ?>
                    </div>
                    <div class="col-sm-10 ordertime" >
                        <?= lan('hely') ?>
                    </div>

                </div>
    <b> Indulás ideje, helye</b>
                <div>
                    <div class="col-xs-2 dt1 ordertime" >
                        <?php $Form_Class->textbox("ora_1", $Text_Class->htmlfromchars($adat["ora_1"]),lan('ido'),'',1); ?>
                    </div>
                    <div class="col-xs-10 ordertime" >
                        <?php $Form_Class->textbox("cim_1", $Text_Class->htmlfromchars($adat["cim_1"]),lan('hely'),'',1); ?>
                    </div>
                </div>

                <b> Útvonal (nem kötelező kitölteni)</b>

                <?php for ($c = 2; $c <= 6; $c++) { ?>
                <div>
                    <div class="col-xs-2 dt1 ordertime" >
                        <?php $Form_Class->textbox("ora_".$c, $Text_Class->htmlfromchars($adat["ora_".$c]),lan('ido')); ?>
                    </div>
                    <!--div class="col-sm-1 ordertime" >
                        <?php $Form_Class->textbox("perc_".$c, $Text_Class->htmlfromchars($adat["perc_".$c])); ?>
                    </div-->
                    <div class="col-xs-10 ordertime" >
                        <?php $Form_Class->textbox("cim_".$c, $Text_Class->htmlfromchars($adat["cim_".$c]),lan('hely')); ?>
                    </div>

                </div>

                <?php } ?>

                <b> Rendezvény vége</b>
                <div>
                    <div class="col-xs-2 dt1 ordertime" >
                        <?php $Form_Class->textbox("ora_7", $Text_Class->htmlfromchars($adat["ora_7"]),lan('ido'),'',1); ?>
                    </div>
                    <div class="col-xs-10 ordertime" >
                        <?php $Form_Class->textbox("cim_7", $Text_Class->htmlfromchars($adat["cim_7"]),lan('hely'),'',1); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <?php $Form_Class->textbox("idotartalm", $Text_Class->htmlfromchars($adat["idotartalm"]),lan('Rendezvény hossza')) ?>
            </div>
            <div class="col-sm-3">
                <?=lan('ora')?>
            </div>
            <div> </div>
            <div class="col-sm-12">
                <?php
                $param['minimal']=1;
                $Form_Class->kcebox("subj", $Text_Class->htmlfromchars($adat["subj"]),lan('Megjegyzés'),$param) ?>
            </div>


            <div class="col-sm-12">
                <input type="submit" class="btn-success" >
            </div>

        </form>
    </section>
    <div class="clear"></div>
</div>

<script language="JavaScript">

    $.datepicker.setDefaults($.datepicker.regional['hu']);
    $("#ido").datepicker();
    $('#ido').datepicker('option', 'dateFormat', 'yy-mm-dd');
    $('#ido').datepicker('option', 'regional', 'hu');


  /*  $('#ido').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '+10d',
            language: 'hu-HU',
            locale: 'hu'
        });*/
        $('.dt1 .form-control').timepicker({
            // Options
            regional: 'hu',
            hourText: 'Óra',             // Define the locale text for "Hours"
            minuteText: 'Perc',         // Define the locale text for "Minute"
            amPmText: ['DE', 'DU'],       // Define the locale text for periods
            showPeriod: false
        });


</script>