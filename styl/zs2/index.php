<?php include_once ("./items/headelemets.php");?>
<link rel="stylesheet" type="text/css" href="styl/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $stylecss;?>" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|font-effect-3d" />




<script>
//ie6
  document.createElement('left');
  document.createElement('right');  
  document.createElement('center');
  document.createElement('header');
  document.createElement('nav');
  document.createElement('content');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('footer');
</script>
<?php 
if (count($extrascript)>=1){

foreach ($extrascript as $xtra){
	echo $xtra;
	}
	
}
?>



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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-15103063-18', 'zsuzsikozmetika.com');
  ga('send', 'pageview');

</script>

    </head>
    <body lang="hu">
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
	
	
	$shorturledit=$getparams[0]."/".$getparams[1];
	if ($getparams[2]!=""){
		$shorturledit.="/".$getparams[2];
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
<a href="<?php echo $homeurl;?>" class="text"><?php echo $oldalneve;?></a>
<div class="text1">Tel: 0620 9152 885</div>
<?php 
$link=$separator."user/enter";
if ($auser["id"]>0){
	$userlogedscss="_logged";
	$link=$separator."user/profil";

}
?>
<div class="profilbutton profile<?php echo $userlogedscss;?>"><a href="<?php echo $link;?>">&nbsp;</a>
</div>
</div>
<div class="clear"></div>
            <nav class="menu">
<?php //$fomenu=menuadat($menustart);
//arraylist($fomenu);
?>
            <ul>
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

 	    </nav>
		</header>
   <div class="clear"></div>
<div class="head_element">
    </div>
    
        <content>
        <?php
        //arraylist($adminmenu);
        if (file_exists($file['web'])){
         include_once($file['web']);
        }
        ?>
        </content>

        <div class="clear"></div>

        <footer>
<a href="javascript:login();">hunmod.eu</a>
<div class="clear"></div>
        </footer>
	</div>


<?php
$stop_time = MICROTIME(TRUE);
$run_time = $stop_time - $start_time;
echo "Oldal generálódásának ideje ".$run_time." másodperc.";
echo "<br>IP.:".dateprintip($date);
?>

<div class="clear"></div>
</div>
</div>

     <?php include_once ("./items/footerscripts.php");?>
     <div class="modal fade" id="hiddenbox"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-400">
             <div class="modal-content">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#hiddenbox').modal('hide');"></button>
                 <div class="modal-head"> </div>
                 <div id="hiddencontent" class="modal-body"></div>
             </div>
         </div>
     </div>

     <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-400">
             <div class="modal-content">
                 <span type="button" onclick="$('#error').modal('hide');" class="close" data-dismiss="error" aria-label="Close" ></span><!-- Sanyi - bekerült a close button-->
                 <?php if($_SESSION["messageerror"]!=''){
                     echo '<div class="modal-head">Error</div>';

                     echo '<div class="modal-body">'.$_SESSION["messageerror"].'</div>';
                 }?>

                 <?php if($_SESSION["messageok"]!=''){
                     echo ' <div class="modal-head"></div>';
                     echo '<div class="modal-body">'.$_SESSION["messageok"].'</div>';
                 }?>

             </div>
         </div>
     </div>
     <?php if(($_SESSION["messageok"]!=''||$_SESSION["messageerror"]!='')&&$noerrorep!=1){
         $_SESSION["messageerror"]='';
         $_SESSION["messageok"]='';
         ?>
         <script>
             $('#error').modal('show');
         </script>
     <?php } //arraylist($_SESSION);
     //echo $noerrorep;
     ?>
     <?php if(count($_SESSION["regeerror"])){?>
         <script>
             reg();
         </script>
     <?php } ?>

    </body>

</html>
