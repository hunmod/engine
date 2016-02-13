<?php 
header('Content-Type: application/xml; charset=utf-8');
echo'<?xml version="1.0" encoding="UTF-8"?>';

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" >

<url>
  <loc><?php echo $homeurl.'/start/privacy';?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>

<url>
  <loc><?php echo $homeurl.'/start/term';?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>

<url>
  <loc><?php echo $homeurl.'/start/contact';?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>

<url>
  <loc><?php echo $homeurl.'/start/advertise';?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>


<?php 
 include_once ("items/allpagedatas.php");
$almenu=menuadat(15);
if (count($almenu)>=1){
    foreach ($almenu as $amenuelem){
        if ($amenuelem["item"]==""){$amenuelem["item"]=$amenuelem["id"];}
?>
<url>
  <loc><?php echo $homeurl.'/'.shorturl_get("m/".$amenuelem["id"]);?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>
<?php
//hirek
	$recipes=array();
	$hfilters["mid"]=$amenuelem["id"];
	$order=' id DESC';
	$qhir=$hir_class->get($hfilters,'',$_GET["page"]) ;
	$hirekelemek=($qhir['datas']);
	if (count($hirekelemek))foreach ($hirekelemek as $hir){
		
$hir["url"]=$kezdooldal.$separator."magazine/".$Text_Class->to_link($hir["menu_name"])."/".$Text_Class->to_link($hir["cim"])."/".($hir["id"]);
$hir["img"]=$hir_class->getimg($hir['id'],800,533);
//echo $homeurl.'/'.$nimg.'';
	?>
		<url>
		  <loc><?php echo str_replace('&','&amp;',$hir["url"]);?></loc>
		  <changefreq>monthly</changefreq>
		  <priority>1</priority>
			 <image:image>
			   <image:loc><?php echo str_replace('&','&amp;',$homeurl.'/'.$hir["img"]);?></image:loc> 
			</image:image>  
		</url>
	<?php
	}




 } }?>

<url>
  <loc><?php echo $homeurl.'/';?>categories</loc>
  <changefreq>monthly</changefreq>
  <priority>0.2</priority>
</url>
 <?php
 $datas=$class_recipe->get_category($_GET);


if (count($datas)>0)
foreach($datas as $elem){
    $subats=''; 
    if ($subats!=''){
        $subats.=',';
    }
  $subats.= htmlfromchars($elem["name"]);    
    
?>
<url>
  <loc><?php echo str_replace('&','&amp;',$kezdooldal.$separator."categories/".$Text_Class->to_link($elem["name"]).'/'.($elem["id"]));?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.2</priority>
    <image:image>
       <image:loc><?php echo str_replace('&','&amp;',$nimg=$class_recipe->recipecat_img($elem["id"]));?></image:loc> 
    </image:image>  
</url>                            
<?php
$datas=$class_recipe->get_subcategory(array("sub"=>$elem["id"]));
if (count($datas)>0) foreach($datas as $elem){
?>
<url>
  <loc><?php echo str_replace('&','&amp;',$kezdooldal.$separator."recipes?category=".($elem["sub"]).'&sub='.($elem["id"]));?></loc>
  <changefreq>monthly</changefreq>
  <priority>1</priority>
     <image:image>
       <image:loc><?php echo str_replace('&','&amp;',$nimg=$class_recipe->recipescat_img($elem["id"]));?></image:loc> 
    </image:image>  
</url>       
<?php
//receptek
	$recipes=array();
	$sfa["category2"]=$elem["id"];
	$order=' id DESC';
	$arrcepiesx=$class_recipe->get($sfa,'','all');
	$recipes=$arrcepiesx['datas'];
	if (count($recipes))foreach ($recipes as $onrecipe){
	$recipeurl=$class_recipe->recipe_url($onrecipe); 									
	$recipeimg=$class_recipe->recipe_img($onrecipe['id']);
	?>
		<url>
		  <loc><?php echo str_replace('&','&amp;',$recipeurl);?></loc>
		  <changefreq>monthly</changefreq>
		  <priority>1</priority>
			 <image:image>
			   <image:loc><?php echo str_replace('&','&amp;',$recipeimg);?></image:loc> 
			</image:image>  
		</url>
	<?php
	}

}



}
?>                       
 
<url>
  <loc><?php 
                                	$weedatas=$class_recipe->get_weeks(array("id"=>page_settings('active_week')));
	$weedata=$weedatas[0];

                                echo $homeurl.'/weekly/'.$Text_Class->to_link($weedata["name"]).'/'.$weedata["id"];?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.5</priority>
</url>
    
<url>
  <loc><?php echo $homeurl.'/';?>videos</loc>
  <changefreq>monthly</changefreq>
  <priority>0.2</priority>
</url>   
 
<url>
  <loc><?php echo $homeurl.'/'.$separator;?>offers</loc>
  <changefreq>monthly</changefreq>
  <priority>0.2</priority>
</url>     
<?php
//offers
$filters["mid"]=20;
$qhirekhirekelemek=$MenuClass->get_menu($filters,$order='',$page='all');
$hirekelemek=$qhirekhirekelemek["datas"];

//arraylist($hirekelemek);
if (count($hirekelemek)>0)
foreach($hirekelemek as $elem){
    $elem["file"]=$Text_Class->to_link($elem["nev"]);
?>
<url>
    <loc><?php echo str_replace('&','&amp;',$kezdooldal.$separator.$elem["modul"]."/".$elem["file"]."/".($elem["id"]));?></loc>
    <changefreq>monthly</changefreq>
    <priority>0.3</priority>
    <image:image>
    	<image:loc><?php echo str_replace('&','&amp;',$homeurl.'/'.$MenuClass->menu_img($elem["id"]));?></image:loc> 
    </image:image>   
</url> 
<?php
}
?>    
<?php if ($avotec["id"]){?>
<url>
  <loc><?php echo $avotec["url"];?>"><?php echo $avotec["cim"];?></loc>
  <changefreq>monthly</changefreq>
  <priority>0.2</priority>
</url> 
<?php }?>
    
</urlset> 
