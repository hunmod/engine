<div class="container">
    <div class="row  text-center">
    <h1><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></h1>
</div>
</div>

<slider>
        	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
			  <?php
			  $active=" active";
			  $c=0;?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $c; ?>" class="<?= $active;?>"></li>
<?php ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

			  <?php
			  $active=" active";
?>
                <div class="item <?php echo $active;?>">
                  <img src="<?php echo $aprodata["image"];?>" class="img-responsive"  alt="">
                </div>
<?php ?>

              </div>
            </div>
</slider>
<div class="container">

<div class="col-sm-12 col-xs-12">

        <news itemscope="" itemtype="http://schema.org/WebPage">
            <h1 itemprop="name"><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></h1>

            <!--top>

        <div class="col-sm-6">
                        <div class="imgWrap alignleft">
                            <img itemprop="image" src="<?php echo $aprodata["image"];?>">
                        </div>
        </div>
        <div class="col-sm-6">
                        <p class="magazine_content">
                        <?php echo "". ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($aprodata["hir"])));?>
                        </p>
        </div>
    </top-->
            <description class="col-sm-4" itemprop="description">
                <?php echo "". ($Text_Class->youtoubecserel($Text_Class->htmlfromchars($aprodata["hir2"])));?>
            </description>

            <description class="col-sm-4" itemprop="Priece">
                <h3><?= lan("Adatok")?></h3>
                <?php if ($aprodata["ev"]>0) {
                    ?>
                    <div><b><?= lan("ev")?>:</b> <?= $aprodata["ev"]?> </div>
                <?php }?>
                <?php if ($aprodata["szin"]) {
                    ?>
                    <div><b><?= lan("szin")?>:</b> <?= $aprodata["szin"]?> </div>
                <?php }?>
                <?php if ($aprodata["szem"]>0) {
                    ?>
                    <div><b><?= lan("szállithato")?>:</b> <?= $aprodata["szem"]?><?= lan("fő")?> </div>
                <?php }?>

            </description>


            <description class="col-sm-4" itemprop="Priece">
                <h3><?= lan("Bérleti díj")?></h3>
                <?php if ($aprodata["elso"]>0) {
                    ?>
                    <div><b><?= lan("elosora")?>:</b> <?= $aprodata["elso"]?> <?= lan("ft")?></div>
                <?php }?>
                <?php if ($aprodata["ora"]>0) {
                    ?>
                    <div><?= $aprodata["ora"]?> <?= lan("ft/h")?></div>
                <?php }?>
                <?php if ($aprodata["videk"]>0) {
                    ?>
                    <div><?= $aprodata["videk"]?> <?= lan("ft/km")?></div>
                <?php }?>
                <?php if ($aprodata["kiallas"]>0) {
                    ?>
                    <div>+ <?= $aprodata["kiallas"]?> <?= lan("ft")?> <?= lan("kiállás")?></div>
                <?php }?>

            </description>


            <?php if ($auser["jog"]>2){?>
                <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."cars/edittext/".encode($aprodata["id"]);;?>"><?php echo $lan["edit"];?></a>
            <?php }?>
        </news>
<div>
    <strong>Áraink nettó árak.</strong>
    <p>Budapesti kiállás esetén, csak óradíjjal számolunk. </p>
    <p>Budapesten kívüli kiállás esetén, az óradíjon túl kilométer díjjal egészülnek ki áraink.</p>
    <p>Az autók minimum 3 órás időtartamra vehetők ígénybe, 8 órás időtartamon túli megrendelés

        esetén, napidíjjal számolunk, amely tipustól függően változik.</p>
    <p>Járműveink, kizárólag saját gépjárművezetővel állnak rendelkezésre.	</p>
    <p>Az üzemanyagárak és a gépjárművek fenntartási költségeinek esetleges módosulásai miatt, az

        árváltoztatás jogát fenntartjuk.</p>
    <p>Ágostonné Faludi Ildikó<br><em>cégvezető</em></p>
</div>
</div>
    <?php
    include('items/files/web/list.php');
    ?>
</div>
<script>
    function carusel_top(){
        if ($( 'body' ).width()>742) {
            //console.log($( 'body' ).width());
            var caruselheight = ($('.carousel-inner').height());
            if (caruselheight>0)$(".leftcol").css({'margin-top': '-' + (caruselheight+1) + 'px'});
        }else{
            $(".leftcol").css({'margin-top': '0px'});
        }
    }
    $( window ).resize(function() {
        carusel_top();    });

    $( window ).load(function() {
        carusel_top();
        });
</script>