<?php
$deviza="HUF";

$tblmodulom='shop';
$tblmodulom='shop_order';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."shop_order";

$file_structuct=array();
$file_structuct["modules"]="shop";

$file_structuct["name"]="shop lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="egy termek";
$file_structuct["file"]="shop";
$modules[]=$file_structuct;

$file_structuct["name"]="Shop admin";
$file_structuct["file"]="admin";
$adminmenu[]=$file_structuct;


include('class.shop.php');

//echo $menustart;
//$menupontselectbox=menupontselectbox('103',$onearray,'','','');
//arraylist(menupontselectbox(1,$onearray,'','',''));

//shop megrendelés email
if (page_settings("shop_order_mail_subject_".$_SESSION["lang"])!="")$shop_order_mail_subject=page_settings("shop_order_mail_subject_".$_SESSION["lang"]);
if (page_settings("shop_order_mail_text_".$_SESSION["lang"])!="")$shop_order_mail_text=page_settings("shop_order_mail_text_".$_SESSION["lang"]);

foreach ($menupontselectbox as $event_sel)
{
	if ($event_sel["modul"]=="shop")
	$menupontselectbox_shop[]=$event_sel;
}

//shop rootmenü db-ből
if (page_settings("shop_root_menu_".$_SESSION["lang"])!="")
{$shopmenustart=page_settings("shop_root_menu_".$_SESSION["lang"]);}
else $shopmenustart=0;


//$sidemenu1=menuadat($shopmenustart);


	

//kosárba rakás
if (isset($_REQUEST["kosarba"]))
if ($_REQUEST["kosarba"]>0)
{
	if ($_REQUEST["num"]>1)
	{
		$knum=$_REQUEST["num"];
	}
	else
	{
		$knum=1;
	}
	
	if ($_REQUEST["p"]=="add")
	{
		$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]=$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]+$knum;
	}
	if ($_REQUEST["p"]=="neg")
	{
		$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]=$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]-$knum;
	}
	
	$kosar=$_SESSION["kosaram"]["elem"];
	foreach($kosar as $id=>$value)
	{
		if ($_SESSION["kosaram"]["elem"][$id]<1)
		{
			unset($_SESSION["kosaram"]["elem"][$id]);
		}
	}
}



function shop_sendorder_form($ertek=array()){
	global $sidemenu1,$status,$vat,$sorrendarray;
		$elem=array();
		$elem["name"]="id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="id";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="uid";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="uid";	
		$elem["tipe"]="hidden";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="articles";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="articles";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="name";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="name";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="email";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="email";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;


		$elem=array();
		$elem["name"]="phone";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="phone";	
		$elem["tipe"]="num";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="country";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="country";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="zip";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="zip";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;		

		$elem=array();
		$elem["name"]="city";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="city";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;	

		$elem=array();
		$elem["name"]="address";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="address";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="pname";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="pname";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;		

		$elem=array();
		$elem["name"]="pcountry";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="pcountry";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;	

		$elem=array();
		$elem["name"]="pzip";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="pzip";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;		

		$elem=array();
		$elem["name"]="pcity";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="pcity";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;					

		$elem=array();
		$elem["name"]="paddress";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="paddress";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;						

		$elem=array();
		$elem["name"]="pvatno";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="pvatno";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;						

		$elem=array();
		$elem["name"]="pstatus";	
		$elem["title"]="pstatus";	
	
		$elem["value"]=$ertek[$elem["name"]];	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$status;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectboxa";					
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="pmod";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="pmod";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="payment_date";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="payment_date";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="post_date";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="post_date";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;
		
		$elem=array();
		$elem["name"]="post_mod";	
		$elem["title"]="postázási mód";	
	
		$elem["value"]=$ertek[$elem["name"]];	
				$typ["value"]="id";
				$typ["name"]="nev";
			$elem["param"]=$post_mod;		
			$elem["typ"]=$typ;		
		$elem["tipe"]="selectboxa";					
		$formelements[]=$elem;

		$elem=array();
		$elem["name"]="order_date";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="order_date";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;		

		$elem=array();
		$elem["name"]="post_id";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="trackingnr";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;						

		$elem=array();
		$elem["name"]="subject";	
		$elem["value"]=$ertek[$elem["name"]];		
		$elem["title"]="subject";	
		$elem["tipe"]="text";		
		$formelements[]=$elem;	
		



return $formelements;
}

/*$extrascript[]='
<script type="text/javascript">
			
function Insertigtokce(editorname,img)
{

x=document.getElementById(\'x\').value;
y=document.getElementById(\'y\').value

var addx="";
var addy="";
var addfx="";
var addfy="";

if (x>0){
addx=\'&x=\'+(x*2);
addfx=\' width="\'+x+\'" \';
}

if (y>0){
addy=\'&y=\'+(y*2);
addfy=\' height="\'+y+\'" \';
}

if (document.getElementById(\'mceid\')){
editorname=document.getElementById(\'mceid\').value;	
}
//&x=100&y=100 

CKEDITOR.instances[editorname].insertHtml('."'<img src=\"uploads/picture.php?picture='+img+addx+addy+'\" '+addfx+addfy+'/>'
 );	

}
</script>
";
*/

function shop_lista($mid,$limit,$order)
{ global $tbl,$adatbazis,$auser;
$status="=1";
if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){$status="!=4";}

	if ($mid==""){
		$mid="0";
	}
	if ($limit==""){
		/*$mid="100";*/
	}
	if ($order==""){
		$order=="ORDER BY  `sorrend` ASC, `id` DESC";
	}
	
	if ($limit){
		$limit= "LIMIT ".$limit;	
	}
	$qelemek="SELECT * FROM  ".$tbl['shop']." WHERE mid in(".$mid.") AND status".$status." ".$order." ".$limit;
	$elemek=db_Query($qelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
	//echo "<br>"."<br>"."<br>"."<br>".$qhirekelemek;
	return $elemek;
}



function egy_shop($id){
global $tbl,$adatbazis,$auser;
$status="=1";
if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){
	$status="!=4";
}

$qhirekelemek="SELECT * FROM  ".$tbl['shop']." WHERE id ='".$id."' AND status".$status." LIMIT 1";
$hirekelemek=db_Query($qhirekelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
return $hirekelemek[0];
}

function print_shoplist($mid,$limit,$order)
{
global $auser,$kezdooldal,$separator,$buttons;
$list=shop_lista($mid,$limit,$order);
//	arraylist($list);
?>
<hirlist>
<?php 
//arraylist($hirekelemek);
if (count($list)>0){
foreach($list as $elem){
?>
<hir_preview>
<h2><a href="<?php echo $kezdooldal.$separator."hirek/hir/".($elem["id"]);?>"><?php echo htmlfromchars($elem["cim"]);?></a></h2>
<text>
	<?php 
	if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){?>
    <br />
	<a href="<?php echo $kezdooldal.$separator."hirek/edittext/".encode($elem["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()" class="edit_btn"><?php echo $buttons["edit"];?></a>
    <?php }?>
    
	<?php echo mediatcserel(htmlfromchars($elem["hir"]));?>
</text>

</hir_preview>
<?php
}
}
?>
</hirlist>
<?php
}

function print_orderlist($mid,$limit,$order)
{
global $auser,$kezdooldal,$separator,$buttons;
$list=shop_sendorder_form($mid,$limit,$order);
//	arraylist($list);
?>
<hirlist>
<?php 
//arraylist($hirekelemek);
if (count($list)>0){
foreach($list as $elem){
?>
<hir_preview>
<h2><a href="<?php echo $kezdooldal.$separator."hirek/hir/".($elem["id"]);?>"><?php echo htmlfromchars($elem["cim"]);?></a></h2>
<text>
	<?php 
	if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){?>
    <br />
	<a href="<?php echo $kezdooldal.$separator."hirek/edittext/".encode($elem["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()" class="edit_btn"><?php echo $buttons["edit"];?></a>
    <?php }?>
    
	<?php echo mediatcserel(htmlfromchars($elem["hir"]));?>
</text>

</hir_preview>
<?php
}
}
?>
</hirlist>
<?php
}

function print_shop($id,$limit,$order)
{
global $auser,$kezdooldal,$separator,$buttons;
$hir=egy_shop($id);
$elem=$hir[0];
	if ($id){
	?>
	<hir>
	<hir_preview>
		<text>
		<?php echo mediatcserel(htmlfromchars($elem["hir"]));?>
<?php //echo $kezdooldal.$separator."hirek/hir/".($elem["id"]);?>
		<?php 
		if (($auser["jogid"]>=3) ){?>
		<a href="<?php echo $kezdooldal.$separator."hirek/edittext/".encode($id);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()" class="edit_btn"><?php echo $buttons["edit"];?></a>
		<?php } ?>
        	<div class="clear"></div>	

		</text>
		</hir_preview>
		<?php
		
	}
?>
</hir>
<?php
}


function print_shop2($id,$limit,$order)
{
global $auser,$kezdooldal,$separator,$buttons;
$hir=egy_shop($id);
$elem=$hir[0];
	if ($elem["id"]>0){
	?>
	<hir>
	<hir>
	<h2><a href="<?php echo $kezdooldal.$separator."hirek/hir/".($elem["id"]);?>"><?php echo htmlfromchars($elem["cim"]);?></a></h2>
	<text>
		<?php 
		if (($auser["jogid"]>=3) ){?>
		<br />
		<a href="<?php echo $kezdooldal.$separator."hirek/edittext/".encode($id);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()" class="edit_btn"><?php echo $buttons["edit"];?></a>
		
		<?php echo mediatcserel(htmlfromchars($elem["ar"]));?>
		</text>
		
		</hir>
		<?php
		}
	}
?>
</hir>
<?php
}


function numformat_convert($szam,$currencyCodeTyp)
{
	$ret =	sprintf("%01.2f", $szam);
	if ($currencyCodeTyp=="HUF"){
		$ret =	round ($szam);
	}
	return $szam;
}


if ($tblexists[$tbl["shop"]]!=1)
{
$qreatetbl="CREATE TABLE IF NOT EXISTS ".$tbl['shop']." (
  `id` bigint(20) NOT NULL auto_increment,
  `mid` bigint(20) NOT NULL default '0',
  `cim` varchar(200) NOT NULL,
  `hir` text NOT NULL,
  `ar_old` double NOT NULL,
  `ar` double NOT NULL,
  `vat` int(11) default '0',
  `uid` bigint(20) NOT NULL default '0',
  `ido` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `barcode` varchar(16) default NULL,
  `storage_status` smallint(6) default '1',
  `ordertime` smallint(6) default '0',  
  `status` smallint(6) default '1',
  `sorrend` int(11) NOT NULL default '10',
  `other_param` text  NULL,
  PRIMARY KEY  (`id`)
)  CHARSET=utf8 AUTO_INCREMENT=1;";
$returnquery=db_Query($qreatetbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
}
if ($tblexists[$tbl["shop_order"]]!=1)
{
	$qreatetbl="CREATE TABLE IF NOT EXISTS ".$tbl['shop_order']." (
  `id` bigint(20) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL,
  `articles` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `pname` varchar(200) ,
  `pcountry` varchar(200) ,
  `pzip` varchar(6) ,
  `pcity` varchar(200) ,
  `paddress` varchar(400) ,
  `pvatno` varchar(100) ,
  `pstatus` int(11) NOT NULL,
  `pmod` int(11) NOT NULL,
  `payment_date` datetime ,
  `payment_id` varchar(200) ,
  `post_date` datetime ,
  `post_mod` int(3) NULL,  
  `post_id` varchar(50),  
  `order_date` datetime NOT NULL,
  `subject` text,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `pstatus` (`pstatus`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
$returnquery=db_Query($qreatetbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
//echo $qreatetbl;echo $error;
}
?>