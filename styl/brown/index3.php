<!DOCTYPE html>
<html lang="hu">
  <head>
<?php include_once ("./items/headelemets.php");?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="<?php echo $homeurl.$stylefolder;?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $server_url;?>styl/bootstrap/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $server_url;?>styl/bootstrap/css/font-awesome.css" rel="stylesheet" type="text/css">    
  </head>
  <body>
  
	<!-- HEADER -->
    <div class="container-fluid" id="fejlec">
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
          <a class="navbar-brand" href="#">Project</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          
                        
            <?php 
			$zindex=250;
			if (count($fomenu))foreach ($fomenu as $menuelem){
            if (($menuelem["status"]=="1")){
                        if ($menuelem["item"]==""){$menuelem["item"]=$menuelem["id"];}
		                  $almenu=menuadat($menuelem["id"]);?>
                <li>
               
                <a href="<?php echo $homeurl.$separator;?><?php echo shorturl_get("m/".$menuelem["id"]);?>"><?php echo egymenuimg($menuelem["id"]);?><?php echo $menuelem["nev"];?></a>
                <?php if (count($almenu)>=1){?>
                    <ul style="z-index:<?php echo $zindex--;?>">
                    <?php foreach ($almenu as $amenuelem){
                        if ($amenuelem["item"]==""){$amenuelem["item"]=$amenuelem["id"];}
						?>
                <li><a href="<?php echo $homeurl.$separator;?><?php echo shorturl_get("m/".$amenuelem["id"]);?>"><?php echo egymenuimg($amenuelem["id"]);?><?php echo $amenuelem["nev"];?></a></li>
                        
<?php }?>
              		</ul>
<?php }?>
                </li>
           
<?php } ?>
		<?php } ?>

                            
                            
						</ul>
            </li>
          </ul>
                                <ul class="nav navbar-nav navbar-right">
                                
<?php if ($auser["id"]<1){?>
                                    <li><a href="javascript:reg();"><span>Sign up</span></a></li>
                                    <li><a href="javascript:login();"><span>Log in</span></a></li>
                                    
<?php } else {?>
                                    <li class="sub-menu"><a href="<?php echo $homeurl.'/'.$separator;?>user/profil"><span>Profil</span></a>
                                    
                                    <ul>
		                               <li><a href="<?php echo $homeurl.'/'.$separator;?>user/logout">Logout</a></li>

                                    </ul>
                                    
                                    </li>                     
<?php }?>                                    
                                </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>                    
		</div>
		<div class="container">
			<div class="jumbotron">
				<h1><span>az igazi</span> kedvezménykártya</h1>
				<p>A TESSCard egy névre szóló kedvezmény kártya, amelyet 3-99 éves korig bárki igényelhet. TESSCard pontokat gyűjthetsz vele a legkülönfélébb üzletekben, azonban a pontokat az „Aegon Tanulj és Sportolj!” program keretében csak kultúrával és sporttal kapcsolatos termékekre, szolgáltatásokra válthatod be.</br>(Jogi személyek és jogi személyiség nélküli gazdasági társaságok nem vehetnek részt a Programban.)</p>
				<a href="#" onclick="$('#login').modal('show');" class="btn btn-primary">Regisztráció</a>
			</div>
		</div>	
	</div>
       
                            <?php
                            
                           // arraylist($adminmenu);
                            
                            echo $file['web'];
                        if (file_exists($file['web'])){
                         include_once($file['web']);
                        }
                        ?>    
        
        
        
	<!-- A KÁRTYA -->
	<div class="container-fluid" id="akartya">
		<div class="container" id="alcim">
			<h1>a kártya előnyei</h1>
		</div>
		<div class="container">
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-ok-sign"></i>
				<p>Ingyenes kedvezménykártya, díjak és költségek nélkül</p>
			</div>
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-ok-sign"></i>
				<p>Társkártyák is igényelhetők hozzá, amelyekkel gyorsabban gyűlnek a pontok</p>
			</div>
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-ok-sign"></i>
				<p>Lehetővé válik a saját vagy a gyermeked sportolási költségeinek jelentős csökkentése</p>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-ok-sign"></i>
				<p>A pontokat beválthatod akár egyesületi tagdíjra is</p>
			</div>
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-ok-sign"></i>
				<p>Különféle üzletekben gyűjthetsz tesscard pontokat</p>
			</div>
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-ok-sign"></i>
				<p>Az egész ország területén folyamatosan növekvő számú elfogadóhelyen használhatod</p>
			</div>
			<a id="pont"></a>
		</div>
		<div class="container" id="alcim">
			<h1>Pontgyűjtés</h1>
		</div>
		<div class="container" id="pontgyujtes">
			<div class="col-sm-6">
				<p>A TESSCard elfogadóhelyeken minden vásárláskor pontjóváírást kérhetsz a TESSCard kedvezmény kártyád átnyújtásával</br>vagy a www.tessonline.hu-n keresztül történő internetes vásárlással.</br>A jóváírt TESSCard pontok száma a partner által adott kedvezmény mértékétől függ, amely elfogadóhelyenként változó lehet. Vásárláskor a teljes összeget fizeted, de pontok formájában jóváírt kedvezményed elérheti akár a 10-20 %-ot is, amelyet megkapsz és elköltheted kultúrára vagy sportra, akár mozijegyre, könyvekre vagy uszoda belépőre, fitness tagságra.</p>
			</div>
			<div class="col-sm-6">
				<p>Az elfogadóhelyek által meghirdetett pontakciók alkalmával is növelheted pontegyenlegedet.</br>Az összegyűjtött pontokat felhasználhatod szolgáltatások vagy termékek kedvezménnyel történő vagy teljes értéken történő megvásárlására.</br><span>A beváltóhelyek listáját megtalálod honlapunkon. TESSCard pont beváltásnál 1 pont = 1 Ft. Egy vásárlás alkalmával minimum 1.000 TESSCard pontot (1.000 Ft-ot) szükséges beváltanod.</span></p>
			</div>
		</div>
	</div>
	<a id="kartya"></a>
	
	<!-- KARTYATIPUSOK -->
	<div class="container-fluid" id="lablec">
		<div class="container" id="kartyatipusok">
			<h1>Kártyatípusok</h1>
		</div>
		<div class="container">
			<div class="col-sm-6" id="kartyak">
				<img src="images/starter.png">
				<h2>starter</h2>
				<p>Sikeres kártyaigénylés után kinyomtathatod a létrejött Starter TESSCard kártyát, amely a későbbiekben a pontgyűjtéshez szükséges kártyaszámot tartalmazza. Azonban ha nincs lehetőséged a kártya kinyomtatására, úgy elég csak a kártyaszámot felírnod, a pontgyűjtéshez nem kötelező használnod a kinyomtatott Starter kártyát. A Starter kártyával csak gyűjteni lehet a TESSCard pontokat.</p>
			</div>
			<div class="col-sm-6" id="kartyak">
				<img src="images/plasztik.png">
				<h2>plasztik</h2>
				<p>Ha a Starter kártyát elkezded használni és vásárolsz legalább bruttó 5.000 Ft értékben, akkor 3 héten belül, postán automatikusan megkapod a végleges, névre szóló plasztik TESSCard kártyát. A plasztik kártyával már nemcsak gyűjtheted a pontokat, hanem be is válthatod a TESSCard elfogadóhelyeken.</p>
			</div>
		</div>
		<a id="kapcs"></a>
	</div>
	
	<!-- ELERHETOSEGEK -->
	<div class="navbar navbar-default navbar-bottom" role="navigation">
		<div class="container" id="elerhetocim">
			<h3>Elérhetőségeink</h3>
		</div>
		<div class="container" id="elerhetosek">
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-home"></i>
				<p><span>Tesscard Kft.</span></p>
				<p>2100 Gödöllő, Dózsa György út 1.</p>
			</div>
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-phone-alt"></i>
				<p><span>Telefon</span><p>
				<p>+36 1 234 5678</p>
			</div>
			<div class="col-sm-4">
				<i class="glyphicon glyphicon-envelope"></i>
				<p><span>E-mail</span></p>
				<p>info@tesscard.hu</p>
			</div>
		</div>
	</div>
        
        
        
        <div class="modal fade" id="hiddenbox"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-400">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#hiddenbox').modal('hide');"></button>  
                  <div class="modal-head"> </div> 
                 <div id="hiddencontent" class="modal-body">

                    </div>
            </div>
          </div>
        </div>




  
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $homeurl.$stylefolder;?>js/bootstrap.min.js"></script>
  </body>
</html>