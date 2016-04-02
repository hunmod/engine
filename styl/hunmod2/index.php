
<?php include_once ("./items/headelemets.php");?>

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"Llnqi1asyr00q9", domain:"abrakahasba.hu",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<!-- End Alexa Certify Javascript -->


<!-- Alexa-->
<!-- gGR5ouOd2fTuR4jIpPmHOLLkMuE -->
<!--
bing
-->
<meta name="msvalidate.01" content="45F10A1B46A10689266441A11B8F7D41" />
<link id="page_favicon" href="<?php echo $homeurl.$stylefolder;?>icons/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php echo $homeurl.$stylefolder;?>icons/192.png" rel="apple-touch-icon" type="image/x-icon"  />
<link href="<?php echo $homeurl.$stylefolder;?>icons/76.png" rel="apple-touch-icon" sizes="76x76" type="image/x-icon"  />
<link href="<?php echo $homeurl.$stylefolder;?>icons/120.png" rel="apple-touch-icon" sizes="120x120" type="image/x-icon"  />
<link href="<?php echo $homeurl.$stylefolder;?>icons/152.png" rel="apple-touch-icon" sizes="152x152" type="image/x-icon" />
<link href="<?php echo $homeurl.$stylefolder;?>icons/180.png" rel="apple-touch-icon" sizes="180x180" type="image/x-icon"  />
<link href="<?php echo $homeurl.$stylefolder;?>icons/192.png" rel="icon" sizes="192x192" type="image/x-icon" />
<link href="<?php echo $homeurl.$stylefolder;?>icons/128.png" rel="icon" sizes="128x128" type="image/x-icon" />

<!-- Bootstrap -->
<link href="<?php echo $homeurl.$stylefolder;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $homeurl.$stylefolder;?>css/font-awesome.css" rel="stylesheet" type="text/css">
  </head>
  <body>
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
		<?php include('menu.php');?>                                
                                <ul class="nav navbar-nav navbar-right">
<?php if ($auser["id"]<1){?>
                                    <li><a href="javascript:reg();"><span><?php echo $lan["reg"]; ?></span></a></li>
                                    <li><a href="javascript:login();"><span><?php echo $lan["login"]; ?></span></a></li>
                                    
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
		<div class="container-fluid">
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

  
  </body>
</html>