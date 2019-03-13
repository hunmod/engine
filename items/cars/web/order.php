<?php
$filterc['id']=decode($getparams[2]);
if ($filterc['id']>0) {
    $car_datas = $car_class->get($filterc, '', 'all');
    $car_data=$car_datas['data'][0];
}
?>
<div class="container">
    <section>
<?= $Text_Class->htmlfromchars( page_settings('footerblock4_hu'));?>
        <form>
    <div class="col-sm-12">
<?=lan('megrendelodatai')?>
    </div>
            <div class="col-sm-12">
                <?php $form->textbox("nev", $Text_Class->htmlfromchars($adat["nev"]),lan('nev')) ?>
            </div>
            <div class="col-sm-12">
                <?php $form->textbox("email", $Text_Class->htmlfromchars($adat["email"]),lan('email')) ?>
            </div>
            <div class="col-sm-12">
                <?php $form->textbox("tel", $Text_Class->htmlfromchars($adat["tel"]),lan('tel')) ?>
            </div>
            <div class="col-sm-12">
                <?php $form->textbox("cim", $Text_Class->htmlfromchars($adat["cim"]),lan('cim')) ?>
            </div>
            <div class="col-sm-12">
                <?php $form->textbox("carid", $Text_Class->htmlfromchars($adat["carid"]));
                arraylist($car_data);
                ?>
            </div>
            <div class="col-sm-12">
                <?php $form->datebox('ido',$adat["ido"],lan('idopont')) ?>
            </div>
            <div class="col-sm-12">
            <?php for ($c = 1; $c <= 10; $c++) { ?>
                <div class="col-sm-12">
                    <div class="col-sm-3 dt1" >
                        <?php $form->textbox("ora_".$c, $Text_Class->htmlfromchars($adat["ora_".$c])); ?>
                    </div>
                    <div class="col-sm-3" >
                        <?php $form->textbox("perc_".$c, $Text_Class->htmlfromchars($adat["perc_".$c])); ?>
                    </div>
                    <div class="col-sm-6" >
                        <?php $form->textbox("cim_".$c, $Text_Class->htmlfromchars($adat["cim_".$c])); ?>
                    </div>

                </div>

                <?php } ?>
            </div>
            <submit class="Button" >save</submit>
        </form>
    </section>
    <div class="clear"></div>
</div>
