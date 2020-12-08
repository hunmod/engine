<?php
//arraylist($hirekelemek);
foreach ($hirekelemek1 as $elem){

    if($elem["item"]){
        $elem["id"]=$elem["item"];
    }

 	$url=$SiteClass->createurl($elem);
	$img=$SiteClass->getimg($elem['id'],800,533);
?>
		<url>
		  <loc><?php echo str_replace('&','&amp;',$url);?></loc>
		  <changefreq>daily</changefreq>
		  <priority>1</priority>
			 <image:image>
			   <image:loc><?php echo str_replace('&','&amp;',$img);?></image:loc> 
			</image:image>  
		</url>
<?php }?> 
<?php //echo tyniszovegkonvert($hir["cim"]);?>
