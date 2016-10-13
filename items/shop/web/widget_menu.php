<nav class="veritcalmenu">
<?php 
//arraylist($sidemenu);
?>
    <ul>
    <?php foreach ($sidemenu1 as $menuelem){
    if (($menuelem["status"]=="1")){
                if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
                  $almenu=menuadat($menuelem["id"]);?>
        <li><a href="<?php echo $separator;?><?php echo shorturl_get($menuelem["modul"].menulink($menuelem["file"]).menulink($menuelem["item"]));?>"><?php echo $menuelem["nev"];?></a>
        <?php if (count($almenu)>=1){?>
            <ul>
            <?php foreach ($almenu as $amenuelem){
                if ($amenuelem["item"]==""){$amenuelem["item"]=$amenuelem["id"];}?>
                <li><a href="<?php echo $separator;?><?php echo shorturl_get($amenuelem["modul"].menulink($amenuelem["file"]).menulink($amenuelem["item"]));?>"><?php echo $amenuelem["nev"];?></a></li>
    <?php }?>
            </ul>
    <?php }?>
        </li>
    
    <?php } ?>
    <?php } ?>
    </ul>
</nav>
<div class="clear"></div> 
