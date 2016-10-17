<div class="container">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl;?>">Home</a> >
        <a href="<?php echo $homeurl.'/'.$separator.shorturl_get("m/".$menu["id"]);?>"><?php echo $menu["nev"];?> </a> >
        <span><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></span>
    </div>
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
<div class="container">
<div class="col-sm-8 col-xs-12">
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
            <description class="col-sm-12" itemprop="description">
                <?php echo "". ($Text_Class->youtoubecserel($Text_Class->htmlfromchars($aprodata["hir2"])));?>
            </description>
            <?php if ($auser["jog"]>2){?>
                <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."hirek/edittext/".encode($aprodata["id"]);;?>"><?php echo $lan["edit"];?></a>
            <?php }?>
        </news>

</div>
<div class="col-sm-4 col-xs-12 leftcol">
    <?php include ('./items/csomag/web/sidelist.php');?>
<?php
include('items/files/web/list.php');
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