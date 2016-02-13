<?php session_start();?>
<?php header('Content-Type: application/xml; charset=utf-8');
echo'<?xml version="1.0" encoding="UTF-8"?>';
$smmode=1;
include_once("items/allpagedatas.php");

$auser["jogid"]=0;
$hostlink="http://".$_SERVER['HTTP_HOST'];
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" >

<?php 
//arraylist($file);
	?>
    <?php
			if (count($fomenu))
			foreach ($fomenu as $menuelem){
            if (($menuelem["status"]=="1")){
                        if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
						  
						  $almenuq=$MenuClass->get_menu(array("mid"=>$menuelem["id"]),$order='',$page='all') ;
						  $almenu=$almenuq["datas"];
						  $menuurl=$homeurl.$separator.$MenuClass->shorturl_get("m/".$menuelem["id"]);
						  $menuimgs=$MenuClass->menu_img($menuelem["id"]);
						  $smfile ='items/'.$menuelem["modul"].'/sitemap/'.$menuelem["file"].'.php';
						  
							?>
		<url>
		  <loc><?php echo str_replace('&','&amp;',$menuurl);?></loc>
		  <changefreq>daily</changefreq>
		  <priority>1</priority>
          <?php if($menuimgs['menu_img']){
			 ?><image:image>
			   <image:loc><?php echo str_replace('&','&amp;',$homeurl.'/'.$menuimgs['menu_img_url']);?></image:loc> 
			</image:image>  
           <?php } ?> 
		</url>
<?php 
						  if (is_file($smfile)){
							  $getparams[0]=$menuelem["modul"];
							  $getparams[1]=$menuelem["file"];
							  $getparams[2]=$menuelem["item"];
							  //include('items/'.$menuelem["modul"].'/data/config.php');
							  include('items/'.$menuelem["modul"].'/data/'.$menuelem["file"].'.php');
							include($smfile);
						  }
						////////////////////////////////////////////////////////////////////////	
?>
<?php
			if (count($almenu))
			foreach ($almenu as $menuelem2){
            if (($menuelem2["status"]=="1")){
                        if ($menuelem2["item"]==""){$menuelem2["item"]=$menuelem2["id"];}
						  
						  $almenuq=$MenuClass->get_menu(array("mid"=>$menuelem2["id"]),$order='',$page='all') ;
						  $almenu=$almenuq["datas"];
						  $menuurl=$homeurl.$separator.shorturl_get("m/".$menuelem2["id"]);
						  $menuimgs=$MenuClass->menu_img($menuelem2["id"]);
						  $smfile ='items/'.$menuelem2["modul"].'/sitemap/'.$menuelem2["file"].'.php';
						  if (is_file($smfile)){
							  $getparams[0]=$menuelem2["modul"];
							  $getparams[1]=$menuelem2["file"];
							  $getparams[2]=$menuelem2["item"];
							  //include('items/'.$menuelem2["modul"].'/data/config.php');
							  include('items/'.$menuelem2["modul"].'/data/'.$menuelem2["file"].'.php');
							include($smfile);
						  }
						  else{
							?>
		<url>
		  <loc><?php echo str_replace('&','&amp;',$menuurl);?></loc>
		  <changefreq>daily</changefreq>
		  <priority>1</priority>
          <?php if($menuimgs['menu_img']){?>
			 <image:image>
			   <image:loc><?php echo str_replace('&','&amp;',$homeurl.'/'.$menuimgs['menu_img_url']);?></image:loc> 
			</image:image>  
           <?php } ?> 
		</url>
							<?php }?>
			<?php }	?>
			<?php }?>
<?php 
			/////////////////////////////////////////////
			
			}	?>
			<?php }?>

</urlset>