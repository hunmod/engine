<?php
$nimg = $CsomagClass->getimg($elem['id'], 500, 600);
?>
<article class="csomag csomag_disp1" style="background-image: url(<?= $nimg ?>);">
    <div class="csomadshownormal">
        <div class="icon">
            <?= hotelicon_print($elem['icon'], 50, 'feher') ?>
        </div>
        <div class="imgframe">
		<!--img class="img-responsive" src="<?= $nimg ?>" alt="<?= $elem['title']?>"-->
        </div>


	<div class="leiras">
        <div class="cim">
            <h3><?= $elem['title']?></h3>
        </div>
		<div class="ar"><?= $elem['priece']?> <?= lan('ft')?>/<?= $artipus[$elem['tip']]?> <?= lan('artol')?></div>
        <div class="btndiv">
		<a href="<?php echo $CsomagClass->createurl($elem);/*$elem["url"];*/?>" class="btn btn-creme "><?= lan('reszletek'); ?></a>
        </btndiv>
		</div>
        <div class="clearfix"></div>
    </div>


    <div class="leiraslong">
        <?php $idservices=(json_decode($elem["connectedservices"],true));?>

        <h3><?= $elem['title']?></h3>

        <div class="clearfix"></div>
        <?php
        foreach ($idservices["services"]["csomagkategoria"] as $s_show=>$val){
            $cscat =$category_class->get(array('id'=>$s_show,'lang'=>$_SESSION['lang'])) ;
?>
            <div class="col-xs-10 col-xs-offset-2 text-left">
            <?= hotelicon_print($cscat['datas'][0]['class'], 30, 'feher',$cscat['datas'][0]['nev'])?> <span><?= $cscat['datas'][0]['nev'];?></span>
            </div>
        <?php
        }
        ?>
        <div class="clearfix"></div>

        <?= $elem['leadtext']?>
        <div class="clearfix"></div>
        <div class="btnframe">
        <a href="<?php echo $CsomagClass->createurl($elem);/*$elem["url"];*/?>" class="btn btn-creme-inv "><?= lan('reszletek'); ?></a>
        </div>
    </div>
</article>