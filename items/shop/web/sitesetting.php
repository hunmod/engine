<h1>Webshop beállításai</h1>
<table width="100%" border="0">
 
<?php 
$rootmenu_array=menupontselectbox($menustart,$onearray,'','','');
$rootmenu_array[]=array("nev"=>"root","id"=>"0");

$name="shop_root_menu_".$_SESSION["lang"]; ?>
  <tr>
    <td><strong>shop_root_menu (<?php echo $_SESSION["lang"];?>)</strong></td>
    <td><form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php 
	selectbox($name,$rootmenu_array,$typ,page_settings($name));
	hiddenbox("what",$name); ?><br />
	<input name="" type="submit" value="Save" />
    </form></td>
    <td>Főmenü</td>
  </tr>  

<?php $name="shop_maxitem"; ?>
  <tr>
    <td><strong>shop_maxitem</strong></td>
    <td><form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php 
	numbox($name,page_settings($name));
	hiddenbox("what",$name); ?><br />
	<input name="" type="submit" value="Save" />
    </form></td>
    <td>Max elem egy oldalon</td>
  </tr>  

<?php $name="shop_order_mail_subject_".$_SESSION["lang"]; ?>
  <tr>
    <td><strong>Megrendelés mail subject(<?php echo $_SESSION["lang"]?>)</strong></td>
    <td><form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php textbox($name,page_settings($name)); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form></td>
    <td>Megrendelés email<br />
    	Variables:<br />
        ORDER_URL ,VEVO_NEV</td>
  </tr> 

<?php $name="shop_order_mail_text_".$_SESSION["lang"]; ?>
  <tr>
    <td><strong>Megrendelés Email (<?php echo $_SESSION["lang"];?>)</strong></td>
    <td><form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php kcebox($name,page_settings($name),"minimal"); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form></td>
    <td>Megrendelés email<br />
    	Variables:<br />
        ORDER_URL ,VEVO_NEV</td>
  </tr> 
<?php foreach ($post_mod as $postmod){ ?>

<?php $name="priece_post_mode_".$postmod["id"]; ?>
  <tr>
    <td><strong>Szállitasi klts.<?php echo $postmod["nev"];?></strong></td>
    <td><form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php numbox($name,page_settings($name)); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form></td>
    <td></td>
  </tr> 
<?php }?> 
  
  

  
 
</table>
