<style>
    #kosar{
        font-size: 0.8em;
    }
    #kosar shop .clk{
        font-size: 1.2em;
        font-weight: bold;
    }
    shop a{
        color: #0D0A0A;
    }
    shop product:hover a{
        color: #ffffff;
        text-decoration: none;
    }
    shop product:hover a:hover,
    shop .clk:hover{
        color: #9efc18;
        text-decoration: none;
    }

    shop product oldpriece{
        text-decoration: line-through;
    }
    shop product action{
        //color: #9c3328;
        text-decoration: none;
        position: relative;
        float: right;
        background: #653e75;
        border-radius: 20px 0 20px 0;
        padding: 0.5em;
        color: #9efc18;
    }
    shop product oldpriece,shop product endpriece,shop product action,shop product priece{

        display: block;
    }

    shop .actions li{
        list-style-type:none;

    }
    shop .buy{
 background: url("https://www.wellis.com/img/website_ikonok/kosár/kosar_ikon.png") contain;
    }
    shopproduct{
        display: block;
        overflow: hidden;
        position: relative;
        min-height: 390px!important;
    }
    shop prieces{
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        width: 100%;
        padding: 0.4em;
    }
    shop oldpriece{
        float: left;
    }

    shop product:hover {
        overflow: inherit;
        background: rgba(0, 0, 0, 0.8);
        color: #ffffff;
        z-index: 1000;
    }
    shop product: prieces{
        height: 2em;

    }
    product prieces{
        background: rgba(0,0,0,0.1);
    }
    product:hover prieces{
        color: #ffffff;
        background: rgba(0,0,0,0.4);
    }

    shop product description{
        font-size: 0.8em;
    }
    shop product name{
        font-size: 0.8em;
        font-weight: bold;
    }
    shop product:hover description{
                 color: #ffffff;
             }

    product,topimage,shop,prieces,description{
       display: block;
    }
    .facebookicon35{
    }
    .actions ul{
        padding-inline-start: 0.5em;
        font-size: 0.5em;
    }
</style>
<script>
    function call_kosar_v1(plusminus,id){
        parancs='q=shop/widget_kosar&kosarba='+id+'&p='+plusminus;
        file="includeajax";
        console.log(server_url+file+".php?"+parancs);
        phpopenf("kosar",file,parancs)
    }

</script>
<div class="clear" ></div>
<shop class="container">

<?php if ($auser["jog"]>=4){?>

	<a href="<?php echo $homeurl.'/'.$getparams[0]."/edittext";?>" class="button">Uj Termék</a><br />
<div style="clear">&nbsp;</div>

<?php }?>

<?php if ($oldalakszama>1){
//oldalazó	?>
  <div class="hszoldalazo">
   <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=0"; ?>"> |&lt; </a>
   <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=".($oldal-1); ?>"> &lt; </a>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=".$c; ?>"><?php echo $c+1;?></a><?php	}
	?><a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=".($oldal+1); ?>"> &gt;</a><a href="<?php echo $separator.$_GET["q"]."&oldal=".($oldalakszama-1); ?>">&gt;| </a>
	</div>
    
<div class="clear"></div>    
    <?php	
//oldalazó
}?>

<div class="col-sm-8 col-12">

<?php
if (count($elemek)>0){
    foreach($elemek as $elem){
        //terméklistaelem
        include("termek_s1.php");
    }
}
?>
</div>
    <div class="col-sm-4 col-12" id="kosar" name="kosar">
        <?php include("widget_kosar.php");?>
    </div>

    <?php if ($oldalakszama>1){
//oldalazó	?>
<div class="clear"></div>
  <div class="hszoldalazo">
   <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=0"; ?>"> |&lt; </a>
   <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=".($oldal-1); ?>"> &lt; </a>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=".$c; ?>"><?php echo $c+1;?></a><?php	}
	?><a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."oldal=".($oldal+1); ?>"> &gt;</a><a href="<?php echo $separator.$_GET["q"]."&oldal=".($oldalakszama-1); ?>">&gt;| </a>
	</div>
    <?php	
//oldalazó
}?>
</shop>
<div class="clear"></div>
