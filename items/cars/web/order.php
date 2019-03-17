<?php
$filterc['id']=decode($getparams[2]);
if ($filterc['id']>0) {
    $car_datas = $car_class->get($filterc, '', 'all');
    $car_data=$car_datas['datas'][0];
}



if ($_POST){
    $adat=$_POST;
    $emltxt='<h2>'.lan("megrendeles").'</h2>';
    $emltxt.='<div>'.lan('Alulírott megrendelem az alábbiakban leírt járművet').'</div>';
    $emltxt.='<div>'.lan('megrendeloadatai').'</div>';
    $emltxt.='<b>'.lan('nev').': </b>'.$adat['nev'].'<br>';
    $emltxt.='<b>'.lan('email').': </b>'.$adat['email'].'<br>';
    $emltxt.='<b>'.lan('tel').': </b>'.$adat['tel'].'<br>';
    $emltxt.='<b>'.lan('cim').': </b>'.$adat['cim'].'<br>';
    if ($adat['carid']>0) {
        $filterce['id']=$adat['carid'];
        $car_datase = $car_class->get($filterce, '', 'all');
        $car_datae=$car_datase['datas'][0];
        $emltxt.='<b>'.lan('car').': </b>'.$car_datae['cim'].'<br>';

    }
    $emltxt.='<b>'.lan('ido').': </b>'.$adat['ido'].'<br>';
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
    $emltxt.='<div style="width: 50%;float: left">';

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

    $emltxt.='</div>';

    echo $emltxt;
}







?>
<div class="container">
    <section>
<?= $Text_Class->htmlfromchars( page_settings('footerblock4_hu'));?>
        <form method="post">
    <div class="col-sm-12">
<?=lan('megrendelodatai')?>
    </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("nev", $Text_Class->htmlfromchars($adat["nev"]),lan('nev')) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("email", $Text_Class->htmlfromchars($adat["email"]),lan('email')) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("tel", $Text_Class->htmlfromchars($adat["tel"]),lan('tel')) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("cim", $Text_Class->htmlfromchars($adat["cim"]),lan('cim')) ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("carid", $Text_Class->htmlfromchars($car_data["id"]));
               echo $car_data['cim'];
                //arraylist($car_data);
                ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->datebox('ido',$adat["ido"],lan('idopont')) ?>
            </div>
            <div class="col-sm-12">
            <?php for ($c = 1; $c <= 10; $c++) { ?>
                <div>
                    <div class="col-sm-1 dt1" >
                        <?php $Form_Class->textbox("ora_".$c, $Text_Class->htmlfromchars($adat["ora_".$c])); ?>
                    </div>
                    <div class="col-sm-1" >
                        <?php $Form_Class->textbox("perc_".$c, $Text_Class->htmlfromchars($adat["perc_".$c])); ?>
                    </div>
                    <div class="col-sm-10" >
                        <?php $Form_Class->textbox("cim_".$c, $Text_Class->htmlfromchars($adat["cim_".$c])); ?>
                    </div>

                </div>

                <?php } ?>
            </div>
            <div class="col-sm-12">
                <?php $Form_Class->textbox("idotartalm", $Text_Class->htmlfromchars($adat["idotartalm"]),lan('idotartalm')) ?>
            </div>




            <input type="submit" class="btn-success" >save</input>
        </form>
    </section>
    <div class="clear"></div>
</div>
