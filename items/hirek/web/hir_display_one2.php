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

<new class="col-md-12 col-sm-12 new2 <?php echo $fcolor;?>" itemscope="" itemtype="http://schema.org/WebPage">
    <div class="imgWrap">
        <img itemprop="image" src="<?php
        $nimg=$hir_class->getimg($elem['id'],800,433);
        echo $nimg.'';
        ;?>" alt="<?php echo $Text_Class->htmlfromchars($elem["cim"]);?>"  title="<?php echo $Text_Class->htmlfromchars($elem["cim"]);?>"  >
    </div>
                            <h2><?php echo $elem["menu_name"];?></h2>
                            <div class="upArrowDecor"></div>
                            <h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["cim"]);?></h2>
							<p itemprop="description"><?php echo $Text_Class->htmlfromchars($elem["hir2"]);?></p>
</new>
