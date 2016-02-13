<?php

$elem["url"]=$kezdooldal.$separator.$getparams[0]."/hir/".($elem["id"]);
$elem["url"]=$kezdooldal.$separator."magazine/".$Text_Class->to_link($elem["menu_name"])."/".$Text_Class->to_link($elem["cim"])."/".($elem["id"]);

?>						<div class="box horizontal boxWithMoreLink">
                            <div class="row">
                            
                                <div class="col-lg-3 col-md-4 col-sm-5">
                                    <div class="imgWrap">
                                    <a  href="<?php echo $elem["url"];?>">

                                        <img src="<?php 
										$nimg=$hir_class->getimg($elem['id'],800,533);
											echo $homeurl.'/'.$nimg.'';
;?>" alt="alt"></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-7">
                                <?php if ($getparams[1]=="fav"){?>
                                    <a class="remove" href="<?php echo $server_url."hirek/fav?dfav=".($elem['id']); ?>" >remove <i class="fa fa-trash-o"></i></a>
                                 <?php } ?> 
									<a href="<?php echo $elem["url"];?>">
                                    <h3><?php echo htmlfromchars($elem["cim"]);?></h3>
                                    <p><?php echo ($Text_Class->tageketcsupaszit(htmlfromchars($elem["hir"])));?></p>
                                    </a>
                                </div>
                              
                            </div>
                            <a class="button enterButton moreButton" href="<?php echo $elem["url"];?>">More</a>
                        </div>
