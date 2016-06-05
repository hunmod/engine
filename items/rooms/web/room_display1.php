<article itemprop="article"  class="box horizontal boxWithMoreLink" itemscope="" itemtype="http://schema.org/WebPage">
                            <div class="row">
                            
                                <div class="col-lg-3 col-md-4 col-sm-5">
                                    <div class="imgWrap">

                                    <a  href="<?php echo $elem["url"];?>" itemprop="url">

                                        <img itemprop="image" src="<?php 
										echo $nimg=$RoomsClass->getimg($elem['id'],800,533);?>" alt="<?php echo $elem["hu"]["title"];?>"></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-7">
                                <?php if ($getparams[1]=="fav"){?>
                                    <a class="remove" href="<?php echo $homeurl."hirek/fav?dfav=".($elem['id']); ?>" >remove <i class="fa fa-trash-o"></i></a>
                                 <?php } ?> 
									<a href="<?php echo $elem["url"];?>">
                                    <name><h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["hu"]["title"]);?></h2></name>
                                    <p itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["hu"]["leadtext"])));?></p>
                                    </a>
                                </div>
                              
                            </div>
                            <a itemprop="url" class="button enterButton moreButton" href="<?php echo $elem["url"];?>"><?php echo $lan["more"];?></a>
<?php if ($auser["jog"]>2){?>                            
                            <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."rooms/edittext/".encode($elem["id"]);;?>"><?php echo $lan["edit"];?></a>
                            <?php }?>
                        </article>