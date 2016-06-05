          <ul class="nav navbar-nav">
            <?php 
			$zindex=250;
			if (count($fomenu))foreach ($fomenu as $menuelem){
            if (($menuelem["status"]=="1")){
                        if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
		                  //$almenu=menuadat($menuelem["id"]);
						 // $almenu=$MenuClass->get_one_menu($menuelem["id"]);
						   $almenuq=$MenuClass->get_menu(array("mid"=>$menuelem["id"]),$order='',$page='all') ;
						  $almenu=$almenuq["datas"];
						  $menuimg=$MenuClass->menu_img($menuelem["id"]);
						  ?>
                <li>
                <a href="<?php echo $homeurl.$separator;?><?php echo $MenuClass->shorturl_get("m/".$menuelem["id"]);?>"><?php echo $menuelem["nev"];?></a>
                <?php if (count($almenu)>=1){?>
                    <ul style="z-index:<?php echo $zindex--;?>">
                    <?php foreach ($almenu as $amenuelem){
                        if ($amenuelem["item"]==""){$amenuelem["item"]=$amenuelem["id"];}
						$almenuimg=$MenuClass->menu_img($amenuelem["id"]);
						?>
                <li><a href="<?php echo $homeurl.$separator;?><?php echo $MenuClass->shorturl_get("m/".$amenuelem["id"]);?>"><?php echo $amenuelem["nev"];?></a></li>
<?php }?>
              		</ul>
<?php }?>
                </li>
           
<?php } ?>
		<?php } ?>
<?php if ($auser["jog"]>3){?>
<li><a href="<?php echo $homeurl.$separator;?>admin/menu">+</a></li>
<?php }?>
                            
                            
			</ul>