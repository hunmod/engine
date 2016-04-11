	<?php
	$thisadmin=1;
	$analitics_id='';
	include_once ("items/headelemets.php");?>
    <!--[if lte IE 7]>
    <script src="css/icomoon-font/lte-ie7.js"></script>
    <![endif]-->
    <!-- bootstrap css -->
    <link href="<?php echo $server_url;?>styl/admin/css/bootstrap.css" rel="stylesheet">
   <!-- custom css -->
    <link href="<?php echo $server_url;?>styl/admin/css/main.css" rel="stylesheet">

    
    <script src="<?php echo $server_url;?>styl/admin/js/html5-trunk.js"></script>
    <script src="<?php echo $server_url;?>styl/admin/js/bootstrap.js"></script>
    <script src="<?php echo $server_url;?>styl/admin/js/toggle.js"></script>
	<script src="<?php echo $server_url;?>scripts/jquery.datetimepicker.js"></script>
    <link href="<?php echo $server_url;?>scripts/jquery.datetimepicker.css" rel="stylesheet">

        <link href="<?php echo $server_url;?>styl/admin/css/toggle.css" rel="stylesheet">

        
    <link href="<?php echo $server_url;?>styl/admin/icomoon/style.css" rel="stylesheet">
        <!-- kereshető rendezhető táblázat script -->
        
    <!-- custom css -->
    <link href="<?php echo $server_url;?>styl/admin/css/main.css" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function(){
                $( "#mainMenu li:has(ul)" ).addClass("sub-menu");
                    
                    $( "li.sub-menu" ).prepend("<span class='almenuMobilGomb fa fa-arrow-circle-o-down'></span>");

                    $(".almenuMobilGomb").click(function(){
                        $(this).siblings("ul").slideToggle(500);
                        $(this).toggleClass("fa-arrow-circle-o-up");
                        $(this).toggleClass("fa-arrow-circle-o-down");
                    });
                });
				

/* Súgó: http://xdsoft.net/jqplugins/datetimepicker/ */

jQuery(function($) {
  $('.datepicker').datetimepicker({
    onGenerate:function( ct ){
      $(this).find('.xdsoft_date.xdsoft_weekend')
        .addClass('xdsoft_disabled');
    },
    weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
    timepicker:false,
    lang:'hu',
    format:'Y/m/d',
  });
});

jQuery(function($) {
  $('.datetimepicker').datetimepicker({
    onGenerate:function( ct ){
      $(this).find('.xdsoft_date.xdsoft_weekend')
        .addClass('xdsoft_disabled');
    },
    weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
    lang:'hu'
  });
});


        </script>

  </head>

  <body>

    <!-- Header start -->
    <header>

      <!-- Logo start -->
      <div class="logo">
        HUNMOD <span>Admin</span>
      </div>
      <!-- Logo end -->

      <!-- Optional Dropdown start -->
      <div id="optional-dropdown">
        <ul>
          <li>
            <a href="index.html">
              <span class="fs1" aria-hidden="true" data-icon="&#xe000;" ></span>
            </a>
          </li>
          <li>
            <a href="invoice.html">
              <span class="fs1" aria-hidden="true" data-icon="&#xe099;"></span>
              <span class="count-label"></span>
            </a>
            <ul>
              <li>
                <a href="invoice.html"><span class="fs1" aria-hidden="true" data-icon="&#xe004;"></span> Invoice</a>
              </li>
              <li>
                <a href="maps.html"><span class="fs1" aria-hidden="true" data-icon="&#xe042;"></span> Maps</a>
              </li>
              <li>
                <a href="profile.html"><span class="fs1" aria-hidden="true" data-icon="&#xe074;"></span> Profile</a>
              </li>
              <li>
                <a href="typography.html"> <span class="fs1" aria-hidden="true" data-icon="&#xe141;"></span> Typography</a>
              </li>
              <li>
                <a href="calendar.html"><span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span> Calendar</a>
              </li>
              <li>
                <a href="mail.html"><span class="fs1" aria-hidden="true" data-icon="&#xe004;"></span> Messages</a>
              </li>
              <li>
                <a href="icons.html"><span class="fs1" aria-hidden="true" data-icon="&#xe0a9;"></span> Icons</a>
              </li>
              <li>
                <a href="grid.html"><span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Grid</a>
              </li>
              <li>
                <a href="error.html"><span class="fs1" aria-hidden="true" data-icon="&#xe0f4;"></span> 404</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="mail.html">
              <span class="fs1" aria-hidden="true" data-icon="&#xe040;" ></span>
              <span class="count-label"></span>
            </a>
          </li>
        </ul>
      </div>
      <!-- Optional Dropdown end -->

      <!-- Search bar start -->
      <div class="custom-search">
        <input type="text" class="search-query">
        <button> <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span></button>
      </div>
      <!-- Search bar end -->

      <!-- Mini navigation start -->
      <div id="mini-nav">
          <?php $MenuClass->printmenu($usermenu,2);?>

          <ul>
          <li class="hidden-sm">
            <a href="maps.html">Dropdown
              <span class="fs1" aria-hidden="true" data-icon="&#xe099;"></span>
              <span class="count-label">7</span>
            </a>
            <ul>
              <li>
                <a href="maps.html"><span class="fs1" aria-hidden="true" data-icon="&#xe042;"></span> Maps</a>
              </li>
              <li>
                <a href="invoice.html"><span class="fs1" aria-hidden="true" data-icon="&#xe004;"></span> Invoice</a>
              </li>
            </ul>
          </li>
          <li class="hidden-sm">
            <a href="maps.html">
              <span class="fs1" aria-hidden="true" data-icon="&#xe042;" ></span>
              <span class="count-label">6</span>
            </a>
            <ul>
              <li>
                <a href="maps.html"><span class="fs1" aria-hidden="true" data-icon="&#xe042;"></span> Maps</a>
              </li>
            </ul>
          </li>
          <li class="hidden-sm">
            <a href="mail.html">
              <span class="fs1" aria-hidden="true" data-icon="&#xe049;" ></span>
              <span class="count-label">5</span>
            </a>
              <ul>
              <li>
                <a href="mail.html"><span class="fs1" aria-hidden="true" data-icon="&#xe049;"></span> Messages</a>
              </li>
            </ul>
          </li>

              <li>
                  <?php include('profil_menu.php');?>
              </li>

          <!--li>
            <a href="login.html">
              <span class="text-label">Mr. John </span><span class="fs1" aria-hidden="true" data-icon="&#xe088;"></span>
            </a>

              <ul class="user-summary">
                <li>
                <div class="summary">
                  <div class="user-pic">
                    <img src="<?php echo $server_url;?>styl/admin/img/avatar-1.png" alt="Slick Admin"/>
                  </div>
                  <div class="basic-details">

                      <h4 class="no-margin">Johnny</h4>
                    <h5 class="no-margin">UX Designer</h5>
                    <small>Garabandha, India</small>
                  </div>
                  <div class="profile-progress">
                    <div class="chart-progress" data-percent="68">
                      68%
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </li>
              <li>
                <button class="btn btn-xs btn-danger pull-right" onclick="location.href='login.html'">Logout</button>
                <span class="clearfix"></span>
              </li>
            </ul>
          </li-->

        </ul>

      </div>
      <!-- Mini navigation end -->
<style>
.cke_dialog_background_cover{
display:none;
}
.col-sm-11 textarea{
 width:100%;   
 min-height:150px;
    
}
.col-sm-4 #photo{position: relative!important;}

.adminlogin{
position:fixed;	
top:0;
left:0;
width:100%;
height:100%;
background-color:#000;
}

.adminlogin .adminlogcont{
  /* position: relative; */
  /* display: block; */
  margin-top: 10%;
}

.adminlogin .adminlogcont form{
width:320px;	
background:#fff;
 margin-left: auto;
 margin-right: auto;
 border-radius: 10px;
 padding:10px 20px;
}
.adminlogin .adminlogcont form fieldset{
 border: none;
}

</style>
    </header>
    <!-- Header end -->

    <!-- Main Container start -->
    <div class="main-container">

      <!-- Mian navigation start -->
      <div id="mainnav">
        <?php $homeurl=$homeurl."/";?>
        <!-- User pic start -->
        <div class="user-profile-pic">
          <img src="<?php echo $server_url;?>styl/admin/img/avatar-1.png" alt="Slick Admin">
        </div>
          <!-- User pic end -->
          <?php if ($auser["jogid"]==4)$MenuClass->printmenu2($adminmenu,2);
          ?>
			<ul>
              <li>
              <a href="<?php echo $homeurl.$separator;?>recipe/rclist2"><div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>
              </div>
              Recipes</a>
               <ul>
                   <li><a href="<?php echo $homeurl.$separator;?>recipe/rclist2">Recipes</a></li>
              <li>
                <a href="<?php echo $homeurl.$separator;?>recipe/weeks">weekly</a>
              </li>
                <li><hr></li>            
			<li><a href="<?php echo $homeurl.$separator;?>admin/skills">Skills</a></li>
					<li> <a href="<?php echo $homeurl.$separator;?>admin/occassions">Occassions</a> </li>
                      <li> <a href="<?php echo $homeurl.$separator;?>admin/alergys">Special diet</a> </li>
                      <li> <a href="<?php echo $homeurl.$separator;?>recipe/cuisines">Cuisines</a> </li>
                      <li> <a href="<?php echo $homeurl.$separator;?>recipe/origins">Origins</a> </li>
                      <li> <a href="<?php echo $homeurl.$separator;?>recipe/categories">Categories</a></li>
               </ul>
               
              </li>
              <li>
                <a href="<?php echo $homeurl.$separator;?>video/lista">
                <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe173;"></span>
              </div>
                Videos</a>
              </li>

              
              <li>
                <a href="<?php echo $homeurl.$separator;?>user/list">
                <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe070;"></span>
              </div>
                Users</a>
                        <ul>
                    <li><a href="<?php echo $homeurl.$separator;?>user/list"> Users</a> </li>                  
                   <li><a href="<?php echo $homeurl.$separator;?>recipe/rclist3">Count recipes by user</a></li>
                   <!--li><a href="<?php echo $homeurl.$separator;?>recipe/monthcheaf">Home Cheaf.</a></li-->

               </ul>         
                  
              </li>
              <li>
               <a href="<?php echo $homeurl.$separator;?>hirek/lista">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe023;"></span>
              </div>
               Magazine</a> 
              </li>   
              
              <li>
               <a href="<?php echo $homeurl.$separator;?>offers/lista">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe030;"></span>
              </div>
               Offers</a> 
              </li>  

              <li>
               <a href="<?php echo $homeurl.$separator;?>vote/list">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe015;"></span>
              </div>
               Vote and Play</a> 
              </li> 



              <li>
               <a href="<?php echo $homeurl.$separator;?>ads/list">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe05d;"></span>
              </div>
               Banners</a> 
              </li> 
                   
              <li>
              <a href="#"><div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></span>
              </div>
               Lists/menus</a> 
                    <ul>
                      <li><a href="<?php echo $homeurl.$separator;?>admin/skills">Skills</a></li>
                      <li> <a href="<?php echo $homeurl.$separator;?>admin/occassions">Occassions</a></li>
                      <li> <a href="<?php echo $homeurl.$separator;?>admin/alergys">Special diet</a></li>
                      <li> <a href="<?php echo $homeurl.$separator;?>recipe/cuisines">Cuisines</a></li>
                      <li> <a href="<?php echo $homeurl.$separator;?>recipe/origins">Origins</a></li>
                      <li> <a href="<?php echo $homeurl.$separator;?>recipe/categories">Categories</a></li> 
                <li></li>            
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>admin/tags">Tags</a>
                      </li> 
                      
					</ul>
              </li>  
              <!--li>
               <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span>
              </div>
               satisztika</a> 
                    <ul>
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>job/tags">tagek</a>
                      </li>               
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>job/workaeras">workaeras</a>
                      </li>               

                    </ul>
              </li-->                          
          <li>
            <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0a2;"></span>
              </div>
              Dashboard</a>
              
                    <ul>
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>admin/sitesetting6">Socal media</a>
                      </li>
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>admin/sitesetting5">Page settings</a>
                      </li> 
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>admin/sitesetting7">Email settings</a>
                      </li>                       
                      <li>
                        <a href="<?php echo $homeurl.$separator;?>slide/sliders">Slider settings</a>
                      </li>                                  

                    </ul>              
            </a>
          </li>
          <!--li>
            <a href="ui-elements.html">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0d2;"></span>
              </div>
              UI Elements
            </a>
          </li>
          <li>
            <a href="forms.html">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></span>
              </div>
              Forms
            </a>
          </li>
          <li>
            <a href="charts.html">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span>
              </div>
              Charts
            </a>
          </li>
          <li>
            <a href="invoice.html">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe099;"></span>
              </div>
              Bonus UI
            </a>
            <ul>
              <li>
                <a href="invoice.html">Invoice</a>
              </li>
              <li>
                <a href="maps.html">Maps</a>
              </li>
              <li>
                <a href="profile.html">Profile</a>
              </li>
              <li>
                <a href="typography.html">Typography</a>
              </li>
              <li>
                <a href="mail.html">Mail</a>
              </li>
              <li>
                <a href="calendar.html">Calendar</a>
              </li>
              <li>
                <a href="icons.html">Icons</a>
              </li>
              <li>
                <a href="grid.html">Grid</a>
              </li>
              <li>
                <a href="error.html">404</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="tables.html">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>
              </div>
              Tables
            </a>
          </li>
          <li>
            <a href="gallery.html">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe00d;"></span>
              </div>
              Gallery
            </a>
          </li-->
<?php if ($auser["id"]<1){?>
          <li>
            <a href="<?php echo $homeurl.$separator;?>users/enter">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe088;"></span>
              </div>
              Login
            </a>
          </li>
<?php } else {?>          
          <li>
            <a href="<?php echo $homeurl.$separator;?>user/logout">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe088;"></span>
              </div>
              logout
            </a>
          </li>
<?php }?>          
        </ul>
      </div>
      <!-- Mian navigation end -->

      <!-- Dashboard wrapper start -->
      <div class="dashboard-wrapper">
<?php 		
if ($auser["jog"]>=3){
	
		if (isset($file['web']))
        	if (file_exists($file['web']))include_once($file['web']);
        }
        else{
			if (file_exists('items/user/web/alogin.php'))include_once('items/user/web/alogin.php');

		}
		
?>

      </div>
      <!-- Dashboard wrapper end -->
    
    </div>
    <!-- Main Container end -->


    <!-- Scripts -->

    <script src="<?php echo $server_url;?>styl/admin/js/wysiwyg/wysihtml5-0.3.0.js"></script>

    <script src="<?php echo $server_url;?>styl/admin/js/jquery.min.js"></script>
    <script src="<?php echo $server_url;?>styl/admin/js/bootstrap.js"></script>
    <script src="<?php echo $server_url;?>styl/admin/js/jquery-ui-1.8.23.custom.min.js"></script>


    <!-- Flot charts -->
    <script src="<?php echo $server_url;?>styl/admin/js/flot/jquery.flot.js"></script>
    <script src="<?php echo $server_url;?>styl/admin/js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo $server_url;?>styl/admin/js/flot/jquery.flot.tooltip.js"></script>

    <!-- Easy pie charts -->
    <script src="<?php echo $server_url;?>styl/admin/js/jquery.easy-pie-chart.js"></script>

    <!-- Tiny Scrollbar JS -->
    <script src="<?php echo $server_url;?>styl/admin/js/tiny-scrollbar.js"></script>

    <!-- Sparkline JS -->
    <script src="<?php echo $server_url;?>styl/admin/js/jquery.sparkline.js"></script>

    <script src="<?php echo $server_url;?>styl/admin/js/rating/jquery.raty.js"></script>

    <!-- custom Js -->
    <script src="<?php echo $server_url;?>styl/admin/js/custom-index.js"></script>

    <script src="<?php echo $server_url;?>styl/admin/js/custom.js"></script>


    
    <script type="text/javascript">
      $(function() {
      $.fn.raty.defaults.path = 'img';

      $('#rate3').raty({ score: 3 });
      $('#rate5').raty({ score: 5 });
      $('#rate1').raty({ score: 1 });
    });
    </script>
  </body>
</html>