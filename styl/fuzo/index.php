<?php include_once ("./items/headelemets.php");?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link id="page_favicon" href="<?php echo $homeurl.$stylefolder;?>icons/favicon.ico" rel="icon" type="image/x-icon" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5QL4LK8');</script>
<!-- End Google Tag Manager -->
  </head>
  <body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QL4LK8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<!-- HEADER -->
    <header>
		<div class="container-fluid">
<nav class="navbar navbar-default">
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
		<?php include('menu.php');?>                                
                                <ul class="nav navbar-nav navbar-right">
<?php if ($auser["id"]<1){?>
                                    <!--li><a href="javascript:reg();"><span><?= lan("reg")?></span></a></li-->
                                    <li><a href="javascript:login();"><span><?= lan("login")?></span></a></li>
                                    
<?php } else {?>
                                    <li class="sub-menu"><a href="<?php echo $homeurl.'/'.$separator;?>user/profil"><span><?php echo $lan["profil"]; ?></span></a>
                                    
                                    <ul>
		                               <li><a href="<?php echo $homeurl.'/'.$separator;?>user/logout"><?php echo $lan["logout"]; ?></a></li>

                                    </ul>
                                    
                                    </li>                     
<?php }?>                                    
                                </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>                    
		</div>
	</header>	

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
		<div class="container-fluid">
            <?php include("footer.php")?>
		</div>
	</footer>




  <?php include_once ("./items/footerscripts.php");?>
        <div class="modal fade" id="hiddenbox"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-400">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="$('#hiddenbox').modal('hide');"></button>  
                  <div class="modal-head"> </div> 
                 <div id="hiddencontent" class="modal-body"></div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-400">
            <div class="modal-content">
                <span type="button" onClick="$('#error').modal('hide');" class="close" data-dismiss="error" aria-label="Close" ></span><!-- Sanyi - bekerült a close button-->
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


    <?php
    //var_dump($auser);

    if($auser["jogid"]>=3){?>
        <div class="adminseourl">SEO-URL<br />
            <form action="" method="post">
                <input name="paramsseo" type="hidden" value="<?php echo $shorturledit; ?>"/>
                <?php echo $shorturledit;
                ?><br />
                <input name="getseo" type="text" value="<?php echo $shorturltext; ?>"/>
                <input name="" type="submit" />
            </form>
        </div>
    <?php } ?>
  </body>
</html>