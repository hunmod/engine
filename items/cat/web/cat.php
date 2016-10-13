<div class="container text-center">
    <h1><?php echo $Text_Class->htmlfromchars($kategoria["nev"]);?></h1>
</div>

<?php
//arraylist($images);
$filterss["status"]=2;
$sliderelements=$class_slider->get($filterss);

?>
<slider>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
<?php if ($images){?>
        <ol class="carousel-indicators">
            <?php
            $active=" active";
            $c=0;
            foreach($images as $slider){?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $c; ?>" class="<?= $active;?>"></li>
                <?php
                $c++;
                $active="";
            } ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <?php
            $active=" active";
            foreach($images as $slider){

                $img=$homeurl.$slider['screen'];
                ?>
                <div class="item <?php echo $active;?>">
                    <img src="<?php echo $img;?>" class="img-responsive"  alt="<?php echo $Text_Class->htmlfromchars($kategoria["nev"]);?>">
                </div>
                <?php
                $active="";
            } ?>

        </div>
<? } ?>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</slider>
<div class="clear-fix"></div>
<div class="container">

    <div class="col-sm-8 col-xs-12">
        <?= $Text_Class->htmlfromchars($kategoria["leirash"]);?>
    </div>
    <div class="col-sm-4 col-xs-12 leftcol">
        <?php
        //kategória elemek listája
        $filterssub["lang"]='hu';
        $filterssub["kat"]='szolgaltatas';
        $pageblock['categorylist1']=$category_class->get($filterssub,'',$_GET["page"]) ;
        //$hszlistacount=$pageblock['categorylist1']['count'];
        $forvar=$pageblock['categorylist1']['datas'];

        foreach ($forvar as $elem){
            include ('items/cat/web/one_display1.php');
        }
        ?>

    </div>

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