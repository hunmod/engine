<div class="col-sm-6 col-lg-4 matcheight">
<location>
    <a href="<?= $bf_class->createurl($elem)?>">

    <div class="col-xs-8 col-lg-6" >
    <h3><?= $elem["nev"]?></h3>
    <?= $elem["zip"]?>
    <?= $elem["varos_nev"]?>
    <?= $elem["street"]?>
    <?= $elem["hsz"]?>
    <br>
    <?= $elem["cat"]?>
</div>
    <div class="col-xs-4 col-lg-6">
        <img class="img-100" src="<?= $bf_class->getimg($elem["id"],$x=200,$y=200)?>">
    </div>
    <?php
///arraylist($elem);
?>
    </a>

</location>
    <div class="clearfix"></div>
</div>
