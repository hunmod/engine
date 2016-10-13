<?php
switch ($elem['mid']) {
    case 16:
	$fcolor="lila";
        break;
    case 12:
	$fcolor="zold";
        break;
    case 17:
	$fcolor="malyva";
        break;
    case 13:
	$fcolor="narancs";
        break;
    case 18:
	$fcolor="kekeszold";
        break;				
}
//$elem["url"]=$homeurl.$separator.$getparams[0]."/hir/".($elem["id"]);
//$elem["url"]=$homeurl.$separator."hirek/hir/".$Text_Class->to_link($elem["menu_name"])."/".$Text_Class->to_link($elem["cim"])."/".($elem["id"]);
$elem["url"]=$hir_class->createurl($elem);


?>

<new class="col-md-4 col-sm-6" itemscope="" itemtype="http://schema.org/WebPage">
                        <a href="<?php echo $elem["url"];?>" class="box matchHeight768 <?php echo $fcolor;?>"  itemprop="url">
                            <!--h2><?php echo $elem["menu_name"];?></h2-->
                            <div class="imgWrap">
                                        <img itemprop="image" src="<?php 
										$nimg=$hir_class->getimg($elem['id'],300,162);
											echo $nimg.'';
;?>" alt="<?php echo $Text_Class->htmlfromchars($elem["cim"]);?>"  title="<?php echo $Text_Class->htmlfromchars($elem["cim"]);?>"  >
                            </div>
                            <div class="upArrowDecor"></div>
                            <h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["cim"]);?></h2>
							<p itemprop="description"><?php echo substr($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["hir"])),0,130).'...';?></p>

                        </a>
                    </new>
