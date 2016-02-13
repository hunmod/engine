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
<div class="box horizontal <?php echo $fcolor;?> boxWithMoreLink">
                            <div class="row">
                                <div class="col-lg-6 col-md-7">
                                    <div class="upArrowDecor" style="top: 107px;"></div>
                                    <div class="imgWrap">
                                        <a href="<?php echo $elem["url"];?>"> <img src="<?php 
										$nimg=$hir_class->getimg($elem['id'],800,533);
											echo $homeurl.'/'.$nimg.'';
;?>" alt="alt"></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5">
                                   <a href="<?php echo $elem["url"];?>">  
                                    <h2><?php echo htmlfromchars($elem["cim"]);?></h2>
                                    <p><?php echo (htmlfromchars($elem["hir"]));?></p>
                                    </a>
                                </div>
                            </div>
                            <a class="button enterButton moreButton" href="<?php echo $elem["url"];?>">More</a>
                        </div>