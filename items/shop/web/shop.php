<script>
function count_counterelement(myclass){
	var numItems = $('.'+myclass).length	
	return (numItems);
}

function cerate_count_list(several)
{
	for (var i = 1; i < several+1; i++) { 
thisdivid="'"+i+"'";

	  $("#countmenu").append('<li id="countlist'+i+'" onclick="set_active_counterelement('+thisdivid+');">'+i+'</li>');
	}	
}


function set_active_counterelement(mynum)
{
	$( "li" ).removeClass( "active" );
	several=count_counterelement('countelement');	
	for (var i = 1; i < several+1; i++) {
	hidediv('ce'+i);	
	}
	if (several<mynum){
	mynum=several;
	}
	if (1>mynum){
	mynum=1;	
	}

	showdiv('ce'+mynum);
	$( "#countlist"+mynum ).addClass( "active" );
	activeelemntid=mynum;
}

function pageplus_minus(merre)
{
	if (merre=='+')
	{
		activeelemntid++;
	}
	if (merre=='-')
	{
		activeelemntid--;
	}
set_active_counterelement(activeelemntid);
	
}
</script>

<div class="clear" ></div>
<div class="maincontainer">

           <shop_article class="border1 bgcolor1">
<?php 

?>
	<topimage><img src="<?php echo ("http://".$domain.$homefolder."/".$img);?>" alt="<?php echo $pagedata["title"];?>" title="<?php echo $pagedata["title"];?>" itemprop="image"  /></topimage>
	<name><?php echo $Text_Class->htmlfromchars($pagedata["title"]);?></name>
    <endpriece><?php echo priece_format(($pagedata["priece"]+$pagedata["priece"]/100*$pagedata["vat"]),0);?> Ft</endpriece>
<?php if ($eurhuf>0){?>
   (<priece><?php echo priece_format($pagedata["ar"]/$eurhuf,2);?> &#8364;</priece>)
<?php }?>
    <?php if ($pagedata["ar_old"]>$pagedata["priece"]){?>
    <action><?php echo percentage($pagedata["priece"], $pagedata["priece_old"], 0);?> %</action>
    <oldpriece><?php echo priece_format($pagedata["priece_old"],0);?> Ft</oldpriece>
    <?php } ?>
    <priece><?php echo priece_format($pagedata["priece"],0);?> Ft</priece>
    <vat>+<?php echo $Text_Class->htmlfromchars($pagedata["vat"]);?>% ÁFA</vat>
    <orderinfo>
    <?php echo $storage_satus[$pagedata["storage_status"]]["nev"];?>
<?php if ($pagedata["storage_status"]==3){?> <br /><?php echo $pagedata["ordertime"];?> nap<?php }?>
    </orderinfo>
 <?php if ($pagedata["barcode"]!=''){?>   
	<barcode>*<?php echo $pagedata["barcode"];?>*</barcode>
<?php }?>
<div class="clear"></div>
    <div class="actions">
		<ul>
        <?php if ($pagedata["storage_status"]!=5){?>
        <li>
       	 <a class="buy" href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$pagedata["id"];?>&p=add">&nbsp;</a>
        </li>
        <?php } ?>        
        <li>
       	 <a class="facebookicon35" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $homeurl.$separator.$getparams[0]."/shop/".($pagedata["id"]);?>" target="_blank"></a>
        </li>  
		<?php 
        if (($auser["jogid"]>=3) || ($auser["id"]==$pagedata["uid"])){?>
        <li>
       	 <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/edittext/".base64_encode ($pagedata["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()" ><?php echo $buttons["edit"];?></a>
        </li>      
        <?php }?>
        </ul>
	</div>
<div class="clear"></div>
<div class="selector">
    <ul>
        <li id="countlist1" onclick="set_active_counterelement('1');">Leírás</li>
        <li id="countlist2" onclick="set_active_counterelement('2');">Képek</li>
    </ul>
</div>
<div class="countelement" id="ce1">
	<description><?php echo ($Text_Class->htmlfromchars($pagedata["hir"]));?></description>
</div>
<div class="countelement" id="ce2">
	<images>
 <?php
include_once("./items/files/web/list.php");	
?>    
	</images>                    
</div>       
         </shop_article>   
<div class="clear" ></div>
</div>
</div>
<script>
cerate_count_list(count_counterelement('countelement'));
set_active_counterelement(1);
</script>
<?php 
                   // $getparams[2]=decode($getparams[2]);
                    //include_once("./items/files/web/list.php");?>