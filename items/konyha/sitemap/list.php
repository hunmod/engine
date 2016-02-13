<?php
//arraylist($hirekelemek);
foreach ($dbadat as $elem){	
 	//$url=$homeurl.$separator.$getparams[0]."/recept/".$elem["id"];
	$url=$rec_class->recipe_url($elem);
	$img=$rec_class->recipe_img($elem["id"],300,250);
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
