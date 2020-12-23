<?php include_once ("./items/headelemets.php");?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link id="page_favicon" href="<?php echo $homeurl.$stylefolder;?>icons/favicon.ico" rel="icon" type="image/x-icon" />

  </head>
  <body>
  <?php
  if (page_settings('confetti') == 2 ) {
      ?>
      <style type="text/css">
         html, body {
              margin: 0;
              padding: 0;
              height: 100%;
              width: 100%;
          }
          #confetti{
              position: fixed;
              left: 0;
              top: 0;
              height: 100%;
              width: 100%;
          }
      </style>
      <canvas id="confetti" width="1" height="1"></canvas>
      <script src="<?= homeurl ?><?=   '/scripts/confetti.js' ?>"></script>
  <?php } ?>
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
                                    <!--li><a href="javascript:reg();"><span><?php echo $lan["reg"]; ?></span></a></li-->
                                    <li><a href="javascript:login();"><span><?php echo $lan["H"]; ?></span></a></li>
                                    
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
    <div class="ParallaxVideo">
        <video autoplay muted loop>
            <source src="<?= homeurl?>/uploads/fire.mp4" type="video/mp4">
        </video>
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