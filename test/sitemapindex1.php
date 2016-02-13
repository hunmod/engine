<?php header('Content-Type: application/xml; charset=utf-8');
echo'<?xml version="1.0" encoding="UTF-8"?>';

$smmode=1;
include_once("items/allpagedatas.php");
$q = "?";
$auser["jogid"]=0;
$hostlink="http://".$_SERVER['HTTP_HOST'];
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" >

<?php 
//arraylist($file);

if (file_exists ($file["sitemap"])){include_once($file["sitemap"]);}
else{
	?>
   <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php
			if (count($fomenu))
			foreach ($fomenu as $menuelem){
            if (($menuelem["status"]=="1")){
                        if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
						  $almenuq=$MenuClass->get_menu(array("mid"=>$menuelem["id"]),$order='',$page='all') ;
						  $almenu=$almenuq["datas"];
						  $menuurl=shorturl_get("m/".$menuelem["id"]);
						  
						  echo $menuelem["modul"].'/'.$menuelem["file"];
						  ?>
   <sitemap>
      <loc><?php echo $homeurl.'sitemap.xml?q='.$menuurl; ?></loc>
      <lastmod>2004-10-01T18:23:17+00:00</lastmod>
   </sitemap>          
   
        
                    <?php foreach ($almenu as $amenuelem){
                        if ($amenuelem["item"]==""){$amenuelem["item"]=$amenuelem["id"];}
						 $almenuurl=shorturl_get("m/".$amenuelem["id"]);
						?>
   <sitemap>
      <loc><?php echo $homeurl.'sitemap.xml?q='.$almenuurl; ?></loc>
      <lastmod>2004-10-01T18:23:17+00:00</lastmod>
   </sitemap>     
                        
					<?php }	?>
			<?php }	?>
			<?php }	?>
   </sitemapindex>   
<?php
}
?> 
</urlset>
