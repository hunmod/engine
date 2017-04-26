<article itemprop="article"  class="box horizontal boxWithMoreLink" itemscope="" itemtype="http://schema.org/WebPage">
    <div class="row">

        <div class="col-md-7 col-sm-5">
            <div class="imgWrap">

                <a  href="<?php echo $elem["url"];?>" itemprop="url">

                    <img itemprop="image" src="<?php
                    echo $nimg=$RoomsClass->getimg($elem['id'],800,533);?>" alt="<?php echo $elem["hu"]["title"];?>"></a>
            </div>
        </div>
        <div class="col-md-5 col-sm-7">
            <?php if ($getparams[1]=="fav"){?>
                <a class="remove" href="<?php echo $homeurl."hirek/fav?dfav=".($elem['id']); ?>" >remove <i class="fa fa-trash-o"></i></a>
            <?php } ?>
            <a href="<?php echo $elem["url"];?>">
                <name><h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["hu"]["title"]);?></h2></name>
            </a>
            <p itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["hu"]["leadtext"])));?></p>
            <p itemprop="description2">
                <?php
                $puffer1=szobatags_json_from($elem);
                $elem['services']=$puffer1['services'];
                $elem['wellnes']=$puffer1['wellnes'];

                if($elem['services'])foreach ($elem['services'] as $hat=>$val){
                    echo '<div class="connectedservices">'.hotelicon_print($hat, 30, 'fekete').'<b>'.lan($hat).'</b></div>';
                }
                if($elem['wellnes'])foreach ($elem['wellnes'] as $hat=>$val){
                    echo '<div class="connectedservices">'.hotelicon_print($hat, 30, 'fekete').'<b>'.lan($hat).'</b></div>';
                }
                if($elem['foglalasinfok'])foreach ($elem['foglalasinfok'] as $hat=>$val){
                    echo '<div class="connectedservices">'.hotelicon_print($hat, 30, 'fekete').'<b>'.lan($hat).'</b></div>';
                }

                ?></p>

        </div>

    </div>
    <a itemprop="url" class="button enterButton moreButton" href="<?php echo $elem["url"];?>"><?php echo $lan["more"];?></a>
    <?php if ($auser["jog"]>2){?>
        <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."rooms/edittext/".encode($elem["id"]);;?>"><?php echo $lan["edit"];?></a>
    <?php }?>
</article>