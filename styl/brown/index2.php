<!DOCTYPE html>
<html lang="hu">
<head>
<?php include_once ("items/headelemets.php");?>
<link rel="stylesheet" href="styl/resetirespons.css" type="text/css">    

<meta name="msvalidate.01" content="45F10A1B46A10689266441A11B8F7D41" />
<meta name="alexaVerifyID" content="JVGViiYPpEPq7gBSuHiljgv26nw" />

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|font-effect-3d" />

 <meta property="og:locale" content="hu_hu" />
 <meta name="country" content="Hungary" />
 <meta name="geo.country" content="HU" />
 <meta name="geo.position" content="47.49630488029150,19.03039838029150" />
 <meta name="ICBM" content="47.49630488029150,19.03039838029150" />


  <script src="scripts/jquery.ui.timepicker.js"></script> 
  <link rel="stylesheet" href="scripts/jquery.ui.timepicker.css" />

<link type="text/css" rel="stylesheet" href="scripts/tipbox.css" media="screen"></link>
<script type="text/javascript" src="scripts/tipbox.js"></script>

   <script src="scripts/html5lightbox/html5lightbox.js"></script> 


<script src="scripts/ckeditor/ckeditor.js" type="text/javascript"></script>

<!--
<link rel="stylesheet" href="./scripts/darkbox/darkbox.css" type="text/css" />
<script src="scripts/darkbox/extend.js" type="text/javascript"></script>
<script src="scripts/darkbox/darkbox.js" type="text/javascript"></script>
-->



<?php if  (isset($google_ad_client)&&($google_ad_client!="")){ ?>
<script type="text/javascript"><!--
google_ad_client =<?php echo $google_ad_client; ?> /*"ca-pub-2466611390896843";*/
/* hunmod.eu */
google_ad_slot = "6392067717";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<?php } ?>



<?php 
//require_once("file:///D|/AppServ/www/backend/backend.php");
//include_once ("items/allpagedatas.php");
?>



<script type="text/javascript">
/*$(window).load(function() {
    $('#slider').nivoSlider();
});*/

function leavebrowser(){
	if (document.getElementById("leavebrowserlink")) {			
		alert('sds');
	}
}

$(window).on("blur focus", function(e) {
    var prevType = $(this).data("prevType");

    if (prevType != e.type) {   //  reduce double fire issues
        switch (e.type) {
            case "blur":
                // do work
				leavebrowser();

                break;
            case "focus":
				//alert('focus');
                // do work
                break;
        }
    }

    $(this).data("prevType", e.type);
})
</script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<script type="text/javascript"><!--
// sets two variables to store the X and Y position
var xpos; var ypos;

function click_sendfile()
{
	$('#wrkstat').html('Töltök');
	$(save).click();	
}



$(document).ready(function() {
  $('#droppedimg').draggable(
  {
    cursor: 'pointer',      // sets the cursor apperance
    opacity: 0.35,          // opacity fo the element while it's dragged
    stack: $('#droppedimg'),       // brings the '#dg2' item to front
    axis: 'y'               // allow dragging only on the horizontal axis
  });	
	
  // sets draggable the element with id="dg"
  $('#droppedimg').draggable(
  {
    stop: function(event, ui) {
      // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
      var xmove = ui.position.left ;
      var ymove = ui.position.top ;

      alert('LEFT:'+ xmove+ ' pixels \n "top:"'+ ymove+ ' pixels');
    }
  });
});
--></script>



    </head>
    <body lang="hu"  onunload="con();">
<script type="text/javascript">
//Leave page

function pagecheck(mval){
	window.location.href = "http://stackoverflow.com";

//return mval;
}
window.onbeforeunload =function(){ 
return pagecheck('mval');
}


/*
$(window).on('unload', function(){
	window.location.href = "http://stackoverflow.com";

};*/
</script>
    
<?php if ($fb_ap_id!=''){?>    
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hu_HU/all.js#xfbml=1&appId=<?php echo $fb_ap_id;?>&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<?php } ?>
<style>

#hiddendiv
{
	display:none;
	position:fixed;
	top:0;
	left:0;
	width:100%;
	height:100%;	
	background-color:rgba(0,0,0,0.8);
	z-index:10000;
}
#hiddendiv .hd{
width:100%;
height:100%;	
vertical-align:middle;
text-align:center;
background-color:transparent !important;
}
#hiddendiv #hiddencontent{
display:inline-block;
margin-left:auto;
margin-right:auto;
background:#FFF;
min-width:200px;	
}
</style>
<div id="hiddendiv" name="hiddendiv">
	<table class="hd">
    <tr>
    <td class="hd" valign="middle">
    	<div id="hiddencontent" name="hiddencontent">
        fsdfsdfdsff<br>fdfdsfds<br>fsdfsd
        </div>
    </td>
    </tr>
    </table>
</div>

     <?php if ($auser["jogid"]>=4){?>   
        <div class="adminseourl">SEO-URL<br />

	<?php 
	if (($_POST["paramsseo"]!="")&&($_POST["getseo"]!="")&&($_POST["getseo"]!=$_POST["paramsseo"])){
	//save	
	$qs="replace INTO ".$tbl["short_url"]." (`get` ,`params` ,`status`) VALUES ('".$_POST["getseo"]."', '".$_POST["paramsseo"]."', '1');";
	$eredmeny=db_query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'replace');
	//echo $qs;

	//modification	
//	$qs="UPDATE ".$tbl["short_url"]." SET `params` = '".$_POST["paramsseo"]."',`get` = '".$_POST["getseo"]."' WHERE `get`  = '".$_POST["paramsseo"]."' LIMIT 1 ;";
	
	}
	
	if (count($getparams2)==2){
		$shorturledit=$getparams2[0]."/".$getparams2[1];
	}
	else 
	{
	$shorturledit=$getparams[0]."/".$getparams[1];
	if ($getparams[2]!=""){
		$shorturledit.="/".$getparams[2];
		}
	}
	?>
<form action="" method="post">
<input name="paramsseo" type="hidden" value="<?php echo $shorturledit; ?>"/>
<?php echo $shorturledit; ?><br />
<input name="getseo" type="text" value="<?php echo shorturl_get($shorturledit); ?>"/>
<input name="" type="submit" />
</form>
</div>

<?php 
	 }
//echo $_SESSION["utolso_lap"];
// var_dump( $_SERVER["REFERER"]);
?>    
    
    <div class="site">
    <div class="clear" ></div>        
    <header>
<div class="headerpic">
<div class="text font-effect-3d headerlogo" style="font: normal bold 40px;
"><?php echo $oldalneve;?></div>
<?php 
$link=$separator."user/enter";
if ($auser["id"]>0){
	$userlogedscss="_logged";
	$link=$separator."user/profil";

}
?>
<div class="profilbutton profile<?php echo $userlogedscss;?>"><a href="<?php echo $link;?>"><?php echo $auser["unev"];?></a>
</div>
</div>
<div class="clear"></div>
            <nav class="menu bgcolor2">
<?php 
//arraylist($fomenu);
?>
            <ul>
            <?php 
			$zindex=250;
			foreach ($fomenu as $menuelem){
            if (($menuelem["status"]=="1")){
                        if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
		                  $almenu=menuadat($menuelem["id"]);?>
                <li>
               
                <a href="<?php echo $separator;?><?php echo shorturl_get("m/".$menuelem["id"]);?>"><?php echo egymenuimg($menuelem["id"]);?><?php echo $menuelem["nev"];?></a>
                <?php if (count($almenu)>=1){?>
                    <ul style="z-index:<?php echo $zindex--;?>">
                    <?php foreach ($almenu as $amenuelem){
                        if ($amenuelem["item"]==""){$amenuelem["item"]=$amenuelem["id"];}
						?>
                <li><a href="<?php echo $separator;?><?php echo shorturl_get("m/".$amenuelem["id"]);?>"><?php echo egymenuimg($amenuelem["id"]);?><?php echo $amenuelem["nev"];?></a></li>
                        
<?php }?>
              		</ul>
<?php }?>
                </li>
           
<?php } ?>
		<?php } ?>
		</ul>
 	    </nav>
		</header>
        <content>
        <?php
		if ((count($rightside)>=1)&&(count($leftside)>=1)){
			if (file_exists($file['web'])){
			 include_once($file['web']);
			}			
		}
		else
		if (count($leftside)>=1){
			$cssframe="pageleftside";	
		?>
			<section class="pageleftside">
				<left style="overflow:hidden;" >
					<?php 
					foreach($leftside as $lelement)
					{
						if (file_exists($lelement)){
                         include_once($lelement);
                        }	
					}
					?>  
               		<div class="clear"></div> 
            	</left>
                <right style="overflow:hidden;" >
                    <section class="pagefull" >
                        <div class="clear"></div>
                        <?php
                        if (file_exists($file['web'])){
                         include_once($file['web']);
                        }
                        ?>
                        <div class="clear"></div>
					</section>
                </right>
            </section>
			<div class="clear" ></div>           
            
		<?php
		}
		else 
		if (count($rightside)>=1){
			$cssframe="pagerightside";	
			
		?>
			<section class="pagerightside">
				<left style="overflow:hidden;" >
                    <div class="clear"></div>
                    <?php
                    if (file_exists($file['web'])){
                     include_once($file['web']);
                    }
                    ?>
               		<div class="clear"></div> 
            	</left>
                <right style="overflow:hidden;" >
                    <section class="pagefull" >
                        <div class="clear"></div>
							<?php 
                            foreach($rightside as $lelement)
                            {
                                if (file_exists($lelement)){
                                 include_once($lelement);
                                }	
                            }
                            ?> 
                        <div class="clear"></div>
					</section>
                </right>
            </section>
			<div class="clear" ></div>           
            
		<?php			
			
		}
		else
		if (isset($file['web']))
        if (file_exists($file['web'])){
       	 include_once($file['web']);
        }
        ?>
        </content>


        <footer>
        <div><?php echo page_settings("footer");?></div>
<div><a href="http://hunmod.eu">hunmod</a> WEB ENGINE &copy;</div>
<div class="clear"></div>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
        </footer>
	</div>


<?php 
$stop_time = MICROTIME(TRUE);
$run_time = $stop_time - $start_time;
if ($auser["jogid"]>=4){
	echo "Oldal generálódásának ideje ".$run_time." másodperc.";
	echo "<br>IP.:".dateprintip($date);
}
?>

<div class="clear"></div>
</div>
</div>


<!--SHAREBUTTONS
<div class="floatbutton">
<div class="hiddentext">
    <div class="socialbuttons">
    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $thisulr; ?>" class="facebook">&nbsp;</a>
    <a target="_blank" href="http://twitter.com/intent/tweet?source=sharethiscom?url=<?php echo $thisulr; ?>&text=ds" class="twitter">&nbsp;</a>
	<a target="_blank" href="https://plus.google.com/share?url=<?php echo $thisulr; ?>" class="googleplus">&nbsp;</a>
    </div>
</div>
<br><br>
</div>
-->
<?php if ($fb_page_name!=""){?>
<div class="facebookbutton">
  <span><img src= "uploads/system/facebookluk.png" width="50px" height="50px" alt="fb" /></span>
    <div id="facebookcontainer" class="facebookcontainer border4">
       <div class="fb-like-box" data-href="https://www.facebook.com/<?php echo $fb_page_name?>" data-width="300" data-show-faces="true" data-stream="true" data-show-border="false" data-header="false"></div>
    </div>
</div>
<?php } ?>


<?php if ($googleplus_id){?>
<div class="googlebutton">
  <span><img src= "https://ssl.gstatic.com/images/icons/gplus-29.png" width="50px" height="50px" alt="fb" /></span>
    <div id="facebookcontainer" class="facebookcontainer border4">
    <div class="g-person" data-width="280" data-href="//plus.google.com/<?php echo ($googleplus_id); ?>" data-rel="publisher"></div>
	<div class="g-plus" data-width="280" data-href="//plus.google.com/<?php echo ($googleplus_id); ?>" data-rel="publisher"></div>
    </div>
</div>
<?php } ?>
    </body>
</html>
