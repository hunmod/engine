<?php
//arraylist($hirekelemek);
foreach ($rssdatas as $elem){	
 	$url=$homeurl.$separator.$getparams[0].'/item/'.$Text_Class->htmlfromchars($Text_Class->to_link($elem["title"])).'/'.$elem["id"];
?>
		<url>
		  <loc><?php echo str_replace('&','&amp;',$url);?></loc>
		  <changefreq>daily</changefreq>
		  <priority>0.5</priority>
		</url>
<?php }?> 
<?php //echo tyniszovegkonvert($hir["cim"]);?>
