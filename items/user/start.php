<?php

$upload_Class=new file_upload();
$slide_folder="uploads/slide/";
$listfiles=$upload_Class->listfiles($slide_folder);




?>
		<script src="<?php echo $server_url;?>scripts/owl-carousel/owl.carousel.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $server_url;?>scripts/owl-carousel/owl.carousel.css" />
	    <link href="<?php echo $server_url;?>scripts/owl-carousel/owl.theme.css" rel="stylesheet">

<style>
#top {
border-bottom:none;
}

#content-row {
padding-bottom: 20px;
padding-top: 20px;
}
.glm .item-title:first-item{
	float:left;
}

.more{
position:absolute;
left:10px;
bottom:7px;	
}
.inner{
position:relative;	
}
.con-text {
background: #FFF;
padding: 10px 10px;
box-shadow: 2px 5px 6px rgba(0,0,0,0.5);
}
.row-fluid {
 /* padding-bottom: 30px;*/
}

#content-row {
  padding-bottom: 44px;
   padding-top: 0px; 
}

.con-text {
background: #FFF;
padding: 10px 10px;
box-shadow: 2px 5px 6px rgba(0,0,0,0.5);
}

.con-text img:first-child{
box-shadow: 2px 5px 6px rgba(0,0,0,0.5);
}

#content-row {
   padding-top: 0px; 
}

.orange .item_title,
.orange 
.more
 {
color: rgb(245,134,59);
}

.green
.item_title,
.green .more 
 {
color: rgb(65,180,73);
}

.blue .item_title,
.blue .more,
.blue h1,
.blue h2, 
.blue h3,
.blue h4,
.blue h5
 {
color: rgb(28,117,187);
text-transform:none;
}

.orange .item_title,
.orange .more,
.orange h1,
.orange h2, 
.orange h3,
.orange h4,
.orange h5
 {
color: rgb(245,134,59);
text-transform:none;
}
.orange .moduleTitle{
	background:rgb(245,134,59);
		color:#FFF;

	
}


.blue .moduleTitle{
	background:rgb(28,117,187);
		color:#FFF;

	
}
.moduleTitle{
	color:#FFF;
	
}
header h3 {
  font-size: 14px;
  padding: 2px 15px;
  box-shadow: 2px 5px 6px rgba(0,0,0,0.5);
  margin: 0 0 17px;
}
#footer-wrapper .footer-wrapper-inner .row-container{
background:none;	
}

.img-intro img {
  height: auto; 
  width: 100%;
}
.mod-newsflash-adv__ cols-5 .mod-newsflash-adv.news .item_content .inner {
  height: 120px;
  padding: 15px 18px 15px;
}

.mod-newsflash-adv.news .item_content{
//padding:0;	
}


.mod_caroufredsel__header{
	
border-top: 3px solid #c1c1c1;
}
.mod-newsflash-adv.news .item_content .inner{
	height: 120px;
	padding: 15px 18px 15px;
}

.mod-article-single .item__module {
   overflow: visible;
}
.item_title, .more{
	
}
.item_title, h4{
	/*line-height: 25px!important;
	font-size:16px;*/
	padding-bottom:0px;
  margin: 0 0 5px;

	
}
.nonbef:before{
display:none;
border:none!important;
}
.mod-newsflash-adv.news .item_content .inner .item_introtext
{
	padding:0px;
	
}
.item_introtext{
	font-size:12px;
	 font-family: 'MyriadPro', sans-serif;
	line-height:16px;
	padding:0px;
	
}

.mod-article-single.mod-article-single__slogan {
margin: -60px auto 0;
height:auto;
width:400px;
margin-bottom:-20px;
}
.img-intro img {
	max-height: 170px;
	width:100%;
	}
	
.owl-controls{
display:block;
width:auto;
position: absolute;
bottom: 13%;
right: 6%;	
}
.owl-theme .owl-controls .owl-page span{
border:3px solid #FFF;
background:none;
width: 14px;
height: 14px;
}
.owl-theme .owl-controls .active span{
background:#f17a16;
}
.slider{
position: relative;
width: 870px;
height: 170px;
margin-left: auto;
margin-right: auto;
}
.slidertop img{
height: 110%;
width: auto;
display: block;
margin-left: -47.5%;
}
.owl-item{
height: 100% !important;
/*width: auto !important;*/
}
.owl-carousel{
width:100%;
height:100%;
}

.slidertop{
position: absolute;
top: 0;
left: 50%;
display: block;
height: 110%!important;
}

	.container, .navbar-static-top .container, .navbar-fixed-top .container, .navbar-fixed-bottom .container {
	overflow: hidden;
	width: 100% !important;
height: 100%;
position: relative;

}
#header-row{
background:url('hbg.jpg') no-repeat center;
background-size: initial;	
}
#content-row .row-container
{
background:none !important;
padding-top:10px;
padding-bottom:10px;	
}
.mod-newsflash-adv.news .item_content:hover .inner {
  box-shadow: 3px 3px 15px rgba(0,0,0,0.5);
}

.slogan{
  margin-bottom: 18px;	
}	
@media (max-width: 870px){
.slider{

}

}
</style>





<div id="header-row">
	<div id="demo"  class="slider">
        <div class="container">
        
        
            <div class="span12">
              <div id="owl-demo">
<?php 			foreach ($listfiles as $file){
						$img="picture.php?picture=".encode($slide_folder.$file)."&x=264&y=187&ext=.jpg";
						$img=$slide_folder.$file;
						//echo $img.' |'.$slide_folder.$file
?>
 					 <div class="item"><img src="<?php echo $img;?>" width="264" style="margin-top:-20px" ></div>
<?php
 				} 
?>
<?php 			foreach ($listfiles as $file){
						$img="picture.php?picture=".encode($slide_folder.$file)."&x=264&y=187&ext=.jpg";
						$img=$slide_folder.$file;
						//echo $img.' |'.$slide_folder.$file
?>
 					 <div class="item"><img src="<?php echo $img;?>" width="264" style="margin-top:-20px" ></div>
<?php
 				} 
?>
              </div>
            </div>
        </div>
        <div class="slidertop owl-item"><img src="http://gastlandcatering.hu/dev//uploads/2.jpg" alt=""></div>
	</div>
</div>
<script>
  $("#owl-demo").owlCarousel({
     /* items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: false, //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option	  
*/
      navigation : false, // Show next and prev buttons
      slideSpeed : 200,
      paginationSpeed : 400,
      singleItem:false,     
	  items : 4,

      autoPlay: 3000, //Set AutoPlay to 3 seconds
  });
</script>     
<div class="clearfix"></div>
<section class="moduletable slogan">
<div class="mod-article-single mod-article-single__slogan">
    <div class="item__module glm">
     <?php 
	 $oldal_class=new oldal_data();
	 if ($_SESSION["lang"]=="hu")$filtersh['id']=29;
	 if ($_SESSION["lang"]=="en")$filtersh['id']=78;	
	$filtersh['status']='all';
	$qhir=$hir_class->get($filtersh) ;
	$wellcome=($qhir['datas'][0]);
	//arraylist($wellcomed);
	echo ($wellcome["hir"]);
	 ?>

    </div>
</div>
</section>



<div class="row-container">
    <div class="container-fluid">
        <div id="system-message-container">
            <div id="system-message">
            </div>
        </div>
    </div>
</div>



<?php include("items/hirek/web/start1.php");?>

<!---
<div id="content-row">
        <div class="row-container">
          <div class="container-fluid">
            <div class="content-inner row-fluid">  
<?php
//arraylist($aprodata);
if ($aprodata["status"]==1){
	//arraylist($aprodata);
	if($aprodata["id"]==1)
	{
	$aclass='blue';	
	}
	else
	{
	$aclass='orange';	
	}

	?>             
              <div id="component" class="span12 <?php echo $aclass;?>">

<header><h3 class="moduleTitle"><span class="item_title_part0 lastItem firstItem"><?php echo stripcslashes($aprodata["cim"]); ?></span> </h3></header>

<div  class="con-text">
<img src="<?php echo $aprodata["image"];?>&x=260&y=200" style="display:block; float:left;margin:0px 10px 10px 0px;" />

  <?
	echo mediatcserel(htmlfromchars($aprodata["hir2"]));
	if (/*$auser["id"]==$aprodata["uid"]|| */ $auser["jogid"]==4){
?>	
  <a href="<?php echo $separator."hirek/edittext/".encode($getparams[2]);?>"><?php echo $buttons["edit"];?></a>
				<div class="clear" ></div>

</div>  
  <?php	
	}	
}
else{
	//echo "404";	
}
?>      
              </div>        
			</div>
          </div>


<?php 
//hirek sáv1
// $getparams[2]=decode($getparams[2]);
//include_once("./items/files/web/list.php");

if($_SESSION["lang"]=="hu"){
	$filters2['mid']=13;//$getparams[2];

}
if($_SESSION["lang"]=="en"){
	$filters2['mid']=60;//$getparams[2];

}
$filters2['status']='1';
/*
$qhirek=$hir_class->get($filters2) ;
$hirek=($qhirek['datas']);	
arraylist($filters2);
*/
$submenuq=$MenuClass->get_menu($filters2,$order='',$page='all') ;
$countnews=count($submenuq["datas"]);
?>
        <div class="row-container">

          <div class="container-fluid">

<div id="content-top-row" class="row-fluid">
<div id="content-top">
<div class="moduletable   span12">

    <div class="mod-newsflash-adv news mod-newsflash-adv__ cols-<?php echo $countnews;?>" id="module_130">
    <div class="row-fluid">

<?php

foreach ($submenuq["datas"] as $msubmenu){
	$aclass=get_class_byid($msubmenu["id"]);	

	
	//$MenuClass->menuimg($msubmenu["id"],'');
	$img=$MenuClass->menuimg($msubmenu["id"],'');
		if ($img!="none"){
			$img="picture.php?picture=".encode($img)."&x=362&y=200&ext=.jpg";
			$page_ogimage=$homeurl."uploads/picture.php?picture=".encode($mappa."/".$img)."&x=600&ext=.jpg";
		}else{$img='';}
?>    

    <article class="span3 item item_num0 item__module <?php echo $aclass;?>">
        <div class="item_content">
        <figure class="item_img img-intro img-intro__none">
        <a href="?q=catering/menu2/<?php echo $msubmenu['id'];?>">
        <img src="<?php echo $img;?>" alt="" >
        </a>
        </figure>
        <div class="inner">
        <h4 class="item_title item_title__">
        <span> <strong><?php echo $msubmenu['nev'];?></strong></span> </h4>
         <div class="item_introtext">
          <?php echo $msubmenu['leiras'];?>
          </div>
         <a class="more" href="?q=m/<?php echo $msubmenu['mid'];?>"><span>&#10137;</span></a>
         <?php /*echo $msubmenu['file'];?>//<?php echo $msubmenu['id'];*/ ?>
         	<?php 
	if (($auser["jogid"]>=3) /*|| ($auser["id"]==$elem["uid"])*/){?>
    <br />
	<a href="<?php echo $kezdooldal.$separator."admin/menu_edit/".$msubmenu["id"];?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
    <?php }?>
        </div>
        </div>
        <div class="clearfix"></div> 
    </article>
<?php } ?>

    
    </div>
    </div>
    

</div>    
</div>    
</div>   


</div>   

<?php 
//menu2
// $getparams[2]=decode($getparams[2]);
//include_once("./items/files/web/list.php");

if($_SESSION["lang"]=="hu"){
	$filters2['mid']=14;//$getparams[2];
}
if($_SESSION["lang"]=="en"){
	$filters2['mid']=61;//$getparams[2];
}
$filters2['status']='1';
/*
$qhirek=$hir_class->get($filters2) ;
$hirek=($qhirek['datas']);	
arraylist($filters2);
*/
$submenuq=$MenuClass->get_menu($filters2,$order='',$page='all') ;
$countnews=count($submenuq["datas"]);
?>
			</div>
        <div class="row-container">
			<div class="container-fluid">

<div id="content-top-row" class="row-fluid">
<div id="content-top">
<div class="moduletable   span12">
    <div class="mod-newsflash-adv news mod-newsflash-adv__ cols-<?php echo $countnews;?>" id="module_130">
    <div class="row-fluid">

<?php
foreach ($submenuq["datas"] as $msubmenu){
	$aclass=get_class_byid($msubmenu["id"]);	
	//$MenuClass->menuimg($msubmenu["id"],'');
	$img=$MenuClass->menuimg($msubmenu["id"],'');
		if ($img!="none"){
			$img="picture.php?picture=".encode($img)."&x=362&y=200&ext=.jpg";
			$page_ogimage=$homeurl."uploads/picture.php?picture=".encode($mappa."/".$img)."&x=600&ext=.jpg";
		}else{$img='';}
?>    

    <article class="span3 item item_num0 item__module <?php echo $aclass;?>">
        <div class="item_content">
        <figure class="item_img img-intro img-intro__none">
        <a href="?q=catering/menu2/<?php echo $msubmenu['id'];?>">
        <img src="<?php echo $img;?>" alt="" >
        </a>
        </figure>
        <div class="inner">
        <h4 class="item_title item_title__">
        <span> <strong><?php echo $msubmenu['nev'];?></strong></span> </h4>
         <div class="item_introtext">
          <?php echo $msubmenu['leiras'];?>
          </div>
         <a class="more" href="?q=<?php echo $msubmenu['modul'];?>/<?php echo $msubmenu['file'];?>/<?php echo $msubmenu['id'];?>"><span>&#10137;</span></a>
         	<?php 
	if (($auser["jogid"]>=3) /*|| ($auser["id"]==$elem["uid"])*/){?>
    <br />
	<a href="<?php echo $kezdooldal.$separator."admin/menu_edit/".$msubmenu["id"];?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
    <?php }?>
        </div>
        </div>
        <div class="clearfix"></div> 
    </article>
<?php } ?>

    
    </div>
    <div class="clearfix"></div>
    </div>
    
    
</div>
</div>
</div>
<div class="clear" ></div>
</div>
<img src="<?php echo $homeurl;?>/uploads/footer_hu.png"  width="100%" />
</div--->
