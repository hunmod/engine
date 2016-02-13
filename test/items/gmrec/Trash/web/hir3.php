<?php


?>

<style>
.egyaprodata{
/*background:none;
width:99% !important;
height:auto !important;
*/
font-weight:200;
font-size:14px;
line-height:1.3;
/*color:#666;*/
}
.egyaprodata td{
text-align:left;
}
.egyaprodata h1{
font-size:20px;
margin-bottom:5px;
}
.keresett{
background:#FF9;	
}
</style>
<style>
.con-text {
background: #FFF;
padding: 10px 10px;
box-shadow: 2px 5px 6px rgba(0,0,0,0.5);
}
.row-fluid {
  padding-bottom: 30px;
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
</style>


<div id="content-row">
        <div class="row-container">
          <div class="container-fluid">
            <div class="content-inner row-fluid">   
              <div id="component" class="span12">
<?php
//arraylist($aprodata);
if ($aprodata["status"]==1){?>
<header><h3 class="moduleTitle"><span class="item_title_part0 lastItem firstItem"><?php echo stripcslashes($aprodata["cim"]); ?></span> </h3></header>

<div  class="con-text">
<img src="<?php echo $aprodata["image"];?>&x=260&y=200" style="display:block; float:left;margin:0px 10px 10px 0px;" />

  <?
	echo mediatcserel(htmlfromchars($aprodata["hir2"]));
if ($auser["id"]==$aprodata["uid"] || $auser["jogid"]==4){
?>	
  <a href="<?php echo $separator."hirek/edittext/".encode($getparams[2]);?>"><?php echo $buttons["edit"];?></a>

  <?php	
	}	
}
else{
	echo "404";	
}
?>
				<div class="clear" ></div>

</div>        
              </div>        
			</div>
          </div>

				<div class="clear" ></div>
                
                
               
                

<?php 
                   // $getparams[2]=decode($getparams[2]);
                    //include_once("./items/files/web/list.php");
$filters2['mid']=$getparams["menu"];//$getparams[2];
$filters2['status']='1';

/*
$qhirek=$hir_class->get($filters2) ;
$hirek=($qhirek['datas']);	
arraylist($filters2);
*/
$submenuq=$MenuClass->get_menu($filters2,$order='',$page='all') ;

$countnews=count($submenuq["datas"]);

?>

          <div class="container-fluid">

<div id="content-top-row" class="row-fluid">
<div id="content-top">
<div class="moduletable   span12">
    <div class="mod-newsflash-adv news mod-newsflash-adv__ cols-<?php echo $countnews;?>" id="module_130">
    <div class="row-fluid">

<?php
foreach ($submenuq["datas"] as $msubmenu){
	//$MenuClass->menuimg($msubmenu["id"],'');
	$img=$MenuClass->menuimg($msubmenu["id"],'');
		if ($img!="none"){
			$img="picture.php?picture=".encode($img)."&x=362&y=200&ext=.jpg";
			$page_ogimage=$homeurl."uploads/picture.php?picture=".encode($mappa."/".$img)."&x=600&ext=.jpg";
		}else{$img='';}
?>    

    <article class="span3 item item_num0 item__module">
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
	if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){?>
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

</div>
</div>