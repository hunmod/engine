<?php


//$elem["url"]=$homeurl.$separator.$getparams[0]."/hir/".($elem["id"]);
//$elem["url"]=$homeurl.$separator."hirek/hir/".$Text_Class->to_link($elem["menu_name"])."/".$Text_Class->to_link($elem["cim"])."/".($elem["id"]);
//$elem["url"]=$hir_class->createurl($elem);
//$nimg=$hir_class->getimg($elem['id'],800,600);


?>
	<section class="parallax" style="background-image:url('<?php echo $homeurl.$egyelem["url"].'';?>')!important;" itemscope itemtype="http://schema.org/ImageObject">
	</section><!-- Testimonials section -->
	<section id="portfolio">
	
		<div class="bg-light"><!--Start portfolio header -->
			<div class="container">
				<div class="row">

				<div class="col-sm-8 col-sm-offset-2">
						<div class="feature-box title center-block">
										</div>						

			</div><!-- row -->
		</div><!-- container -->
		
<new class="col-sm-8 col-sm-offset-2" itemscope="" itemtype="http://schema.org/WebPage">
                        <a href="<?php echo $homeurl.$egyelem["url"];?>" class="box <?php echo $fcolor;?>"  itemprop="url">
                            <div class="upArrowDecor"></div>
                            <h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($egyelem["text"]);?></h2>
								<a href="<?php echo $homeurl.$egyelem["url"];?>" itemprop="contentUrl"
class="thumbnail" data-image-id="" data-toggle="modal" data-title="<?php echo $egyelem["text"];?>" data-caption="<?php echo $egyelem["text"];?>" data-image="<?php echo $homeurl.$egyelem["url"];?>" data-target="#image-gallery">
               <img src="<?php echo $homeurl.$egyelem["screen"];?>" /></a>	
							<p itemprop="description"><?php echo substr($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($egyelem["text"])),0,130).'...';?></p>

                        </a>
                    </new>
	</section><!-- Testimonials section -->
