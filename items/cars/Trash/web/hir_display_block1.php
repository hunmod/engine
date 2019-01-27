<style>
.upArrowDecor{
display:none !important;	
}
</style>
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
$elem["url"]=$kezdooldal.$separator.$getparams[0]."/hir/".($elem["id"]);
$elem["url"]=$kezdooldal.$separator."magazine/".$Text_Class->to_link($elem["menu_name"])."/".$Text_Class->to_link($elem["cim"])."/".($elem["id"]);

?>

<div class="col-md-3 col-sm-6">
                        <a href="<?php echo $elem["url"];?>" class="box matchHeight <?php echo $fcolor;?>" style="height: 474px;">
                            <h2><?php echo $elem["menu_name"];?></h2>
                            <div class="imgWrap">
                                        <img src="<?php 
										$nimg=$hir_class->getimg($elem['id'],800,533);
											echo $homeurl.'/'.$nimg.'';
;?>" alt="<?php echo htmlfromchars($elem["cim"]);?>">
                            </div>
                            <div class="upArrowDecor"></div>
                            <h3><?php echo htmlfromchars($elem["cim"]);?></h3>
                            
							<p><?php echo substr($Text_Class->tageketcsupaszit(htmlfromchars($elem["hir"])),0,110).'...';?></p>

                        </a>
                    </div>
