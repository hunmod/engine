<style>
.imggdiv{
	position:relative;
width:1000px;
height:557px;
overflow:hidden;
margin-left: auto;
margin-right: auto;
}
.img_darab{
position:absolute;
background:url("hunmod3.jpg") !important;
background-repeat:no-repeat !important;
background-position:top left;

text-align:center;


/*border:#000 1px solid;*/

border-radius: 20px;
-webkit-border-radius: border-radius;
-moz-border-radius: border-radius;

box-shadow: 3px 3px 5px #888;
-moz-box-shadow: box-shadow;
-webkit-box-shadow: box-shadow;

filter:alpha(opacity=20);
opacity:0.2;
/* Firefox */
-moz-transition: opacity 1s ;
/* WebKit */
-webkit-transition: opacity 1s ;
/* Opera */
-o-transition: opacity 1s  ;
/* Standard */
transition: opacity 1s  ;
z-index:2;
}

.img_darab:hover{
filter:alpha(opacity=90)!important;
opacity:0.9 !important;
box-shadow: 10px 10px 5px #888;
z-index:3;
}


.img_darab a{
	display:block;
font-size:24px;
font-weight:bold;
color:#FFF;	
padding:5px;
padding-top:10px;
}

</style>

<div class="imggdiv">
<?php 
$imgw=1000;
$imgh=557;


for ($i = 1; $i <= 45; $i++) {

$imgsw=rand(80,150);
$imgsh=rand(70,150);

$imgposw=rand(0,($imgw-$imgsw)/100)*100;
$imgposh=rand(0,($imgh-$imgsh)/90)*90;

$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
//$imgposbgw=$imgw-($imgposw+$imgsw);
//$imgposbgh=$imgh-($imgposh+$imgsh);
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>
<?php  } ?>





<?php
$imgsw=rand(110,200);
$imgsh=rand(110,250);
$imgposw=320;
$imgposh=60;
$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>
<?php
$imgsw=rand(110,250);
$imgsh=rand(110,250);
$imgposw=380;
$imgposh=130;
$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>
<?php
$imgsw=rand(110,250);
$imgsh=rand(110,250);
$imgposw=250;
$imgposh=200;
$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>
<?php
$imgsw=rand(110,250);
$imgsh=rand(110,250);
$imgposw=550;
$imgposh=260;
$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>
<?php
$imgsw=rand(110,200);
$imgsh=rand(110,250);
$imgposw=480;
$imgposh=180;
$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>
<?php
$imgsw=rand(110,250);
$imgsh=rand(110,250);
$imgposw=580;
$imgposh=100;
$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>
<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>


<?php
$imgsw=260;
$imgsh=180;

$imgposw=70;
$imgposh=160;

$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>

<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;"> 
</div>



<?php
$imgsw=150;
$imgsh=60;

$imgposw=710;
$imgposh=400;

$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>

<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;opacity:0.5;z-index:10;"> 
  <a href="mailto:hunmod@gmail.com">email</a></div>


<?php
$imgsw=170;
$imgsh=130;

$imgposw=430;
$imgposh=350;

$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>

<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;opacity:0.5;z-index:10;"> 
  <a href="?q=Referencia_web">Webes referenciák</a></div>


<?php
$imgsw=190;
$imgsh=80;

$imgposw=200;
$imgposh=20;

$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>

<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;opacity:0.5;z-index:10;"> 
  <a href="?q=kapcsolat">Kapcsolat</a></div>


<?php
$imgsw=210;
$imgsh=70;

$imgposw=70;
$imgposh=420;

$imgposbgw=0-$imgposh;
$imgposbgh=0-$imgposw;
?>

<div class="img_darab" style="width:<?php echo $imgsw;?>px;height:<?php echo $imgsh;?>px;left:<?php echo $imgposw;?>px;top:<?php echo $imgposh;?>px;background-position:  <?php echo $imgposbgh;?>px  <?php echo $imgposbgw;?>px !important;opacity:0.5;z-index:10;"> 
  <a href="?q=bemutatkozas">Bemutatkozas</a></div>


</div>