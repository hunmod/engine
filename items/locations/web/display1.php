<article itemprop="article"  class="box horizontal boxWithMoreLink" itemscope="" itemtype="http://schema.org/WebPage">
                            <div class="row">
                                <div class="col-md-7 col-sm-5">
                                    <div class="imgWrap">
                                    <a  href="<?php echo $elem["url"];?>" itemprop="url">
                                        <img itemprop="image" src="<?php 
										echo $nimg=$PlacesClass->getimg($elem['id'],800,533);?>" alt="<?php echo $elem["title"];?>"></a>
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
                                        <div class="clearfix"></div>
            
                                    </p>
                                    <a href="<?php echo $elem["url"];?>" class="btn btn-creme-inv"><?= lan('reszletek'); ?></a>
                                    <?php if ($auser["jog"]>3){?>
                                        <a itemprop="url" class="btn btn-creme-inv" href="<?php echo $homeurl.$separator."locations/edittext/".encode($elem["id"]);;?>"><?php echo lan("edit");?></a>
                                    <?php }?>

                                    <a onclick="gotomarker('<?php echo $elem['lati']; ?>','<?php echo $elem['longi']; ?>')"><?php echo $elem['title']; ?></a>

                                </div>
                            </div>hhhhhhhhhhhhhhhhh
                        </article>