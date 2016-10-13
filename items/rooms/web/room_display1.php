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
                                    <name><h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["title"]);?></h2></name>
                                    </a>
                                    <p itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></p>
                                    <p itemprop="description2">
                                    <div class="connectedservices">

                                        <div class="col-sm-12 col-xs-4">
                                            <?= hotelicon_print('SZOBATIPUS', 30, 'fekete') ?> <b><?= lan('SZOBATIPUS') ?></b>  <br>
                                        </div>
                                        <div class="col-sm-12 col-xs-4">
                                            <?= hotelicon_print('SZOBA-MERETE', 30, 'fekete') ?> <b><?= $elem["roomsize"]; ?> M2</b>  <br>
                                        </div>
                                        <?php if ($elem["roomnum"]>1){?>
                                            <div class="col-sm-12 col-xs-4">
                                                <?= hotelicon_print('CSALADI', 30, 'fekete') ?> <b><?= lan('CSALADI');?></b>  <br>
                                            </div>
                                            <?php
                                        }else{?>
                                        <div class="col-sm-12 col-xs-4">
                                            <?= hotelicon_print('KET-FO', 30, 'fekete') ?> <b><?= lan('KET-FO') ?></b>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <?php if ($elem["roomtip"]==3){?>
                                            <div class="col-sm-12 col-xs-4">
                                                <?= hotelicon_print('kulonNAPPALI', 30, 'fekete') ?> <b><?= lan('kulonNAPPALI');?></b>  <br>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="clearfix"></div>
                                        <div class="szobaar">
                                            <?= lan('artolelott') ?><strong><?= $elem["priece"]; ?> Ft</strong>/<?= $tipusok[$elem["tip"]]; ?><?= lan('artolmogott') ?><br>
                                            <?= lan('artolutan') ?>
                                        </div>

                                    </p>
                                    <a href="<?php echo $elem["url"];?>" class="btn btn-creme-inv"><?= lan('reszletek'); ?></a>
                                    <?php if ($auser["jog"]>3){?>
                                        <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."rooms/edittext/".encode($elem["id"]);;?>"><?php echo $lan["edit"];?></a>
                                    <?php }?>
                                </div>
                              
                            </div>

                        </article>