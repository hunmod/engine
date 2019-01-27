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
//fade-right
//fade-left

if ($classfade!='fade-right'){
		$classfade='fade-left';
		$nimg=$hir_class->getimg($elem['id'],800,300);

	?>
<section class="" style="background:url(<?php echo $nimg.'';?>);background-size:cover;">
	<div class="bg-light" style="background:rgba(255,255,255,0.8);"><!--Start portfolio header -->
			<div class="row scrollimation" >	
<?php } 
$nimg=$hir_class->getimg($elem['id'],450,230);

?>

				<div class="col-xs-12 col-sm-6 item text-center scrollimation <?php echo $classfade;?> in" itemscope="" itemtype="http://schema.org/WebPage" >
					<div class="feature-box">
						<img class="icon3" src="<?php echo $nimg.'';?>" alt="<?php echo $Text_Class->htmlfromchars($elem["cim"]);?>" itemprop="name" data-pin-nopin="true">
						<a href="<?php echo $elem["url"];?>" class="box <?php echo $fcolor;?>"  itemprop="url">
							<h4><?php echo $elem["menu_name"];?></h4>
							<h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["cim"]);?></h2>
						</a>
						<p itemprop="description"><?php echo substr($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["hir"])),0,100).'...';?></p>
					</div>
				</div>
<?php
	if ($classfade=='fade-left'){


	$classfade='fade-right';

	} else {
	?>				
			</div>
		</div>
	</section>
	
	<?php 		
		$classfade='fade-left';
 } ?>