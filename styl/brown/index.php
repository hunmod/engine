<?php include_once ("./items/headelemets.php");?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php include_once ("head.php");?>
   </head>
  <body>
  <?php //include_once ("confetti.php");?>
  	<!-- HEADER -->
    <header class="container-fluid">
		<div class="container-fluid">
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       
<a class="navbar-brand" href="<?php echo $homeurl;?>"><?php echo $oldalneve;?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav langbar">
    <li><span class="<?php echo $_SESSION["lang"];?> active"></span>
        <ul>
        	<li><a href="<?php echo $homeurl?>?lang=hu"class="hu">HU</a></li>
        	<li><a href="<?php echo $homeurl?>?lang=de"class="de">DE</a></li>
        	<li><a href="<?php echo $homeurl?>?lang=en"class="en">EN</a></li>            
        </ul>
    </li> 
</ul>   
		<?php include('menu.php');?>
		<?php include('profil_menu.php');?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>                    
		</div>
	</header>	

		<div class="container">
<?php include('items/konyha/web/widget_home.php');?>		
		</div>
 		<div class="maincontainer">

            <div class="container">
            </div>
<?php
			// arraylist($adminmenu);
			if (file_exists($file['web'])){
				include_once($file['web']);
			}
?>    
            <div class="container">
            </div>    
		</div>	
		<div class="container-fluid">
<div class="maincontainer footads" style="text-align:center;">
<?php 
$widgetsfootb[]="items/ads/web/widget_side2.php";
foreach ($widgetsfootb as $widget)if (file_exists($widget))include($widget);?>
</div>		
</div>
    <footer class="container-fluid" id="footer">
		<div class="container footercontainer">
        <?php include("footer.php");?>
		</div>
	</footer>
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
        
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background:#fff;color:#000;">
        <div>
            <div>
            
            
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div>
            </div>
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
        
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=Llnqi1asyr00q9" style="display:none" height="1" width="1" alt="" /></noscript>

<script type="text/javascript">var SC_CId = "96464",SC_Domain="n.ads3-adnow.com";SC_Start_96464=(new Date).getTime();</script>
<script type="text/javascript" src="http://st.n.ads3-adnow.com/js/adv_out.js"></script>  

<script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
></script>
  </body>
</html>