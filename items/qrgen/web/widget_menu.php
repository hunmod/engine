<nav class="veritcalmenu">
<?php 
//arraylist($sidemenu);
?>
    <ul>
    
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/vcard"));?>">Névjegy</a></li>
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/email"));?>">Email</a></li>
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/link"));?>">Link</a></li>
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/sms"));?>">SMS</a></li>
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/wifi"));?>">Wifi</a></li>
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/text"));?>">Szöveg</a></li>
<li><a href="<?php echo $separator;?><?php echo $MenuClass->shorturl_get($getparams[0].("/gps"));?>">pozició</a></li>
    </ul>
</nav>
<div class="clear"></div> 
