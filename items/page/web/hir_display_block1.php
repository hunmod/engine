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
//$elem["url"]=$homeurl.$separator.$getparams[0]."/blog/".($elem["id"]);
//$elem["url"]=$homeurl.$separator."hirek/hir/".$Text_Class->to_link($elem["menu_name"])."/".$Text_Class->to_link($elem["cim"])."/".($elem["id"]);
$elem["url"]=$page_class->createurl($elem);


?>

<new class="col-md-6 col-sm-6 mhbl2" itemscope="" itemtype="http://schema.org/WebPage">
                        <a href="<?php echo $elem["url"];?>" class="box <?php echo $fcolor;?>"  itemprop="url">
                            <h2><?php echo $elem["menu_name"];?></h2>
                            <div class="imgWrap">
                                        <img itemprop="image" src="<?php 
										$nimg=$page_class->getimg($elem['id'],300,148);
											echo $nimg.'';
;?>" alt="<?php echo $Text_Class->htmlfromchars("cim_".$SESSION['lang']);?>"  title="<?php echo $Text_Class->htmlfromchars($elem["cim_".$SESSION['lang']]);?>"  >
                            </div>
                            <div class="upArrowDecor"></div>
                            <h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["cim"]);?></h2>
							<p itemprop="description"><?php echo substr($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["hir_".$SESSION['lang']])),0,130).'...';?></p>

                        </a>
                    </new>
