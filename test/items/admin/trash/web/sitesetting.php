<h1>Oldal beállításai/Alapadatok </h1>
<?php $name="site_css";
$css_array=dirlist("styl");
foreach ($css_array as $cssfld)
{
$css_liste["id"]=$cssfld;
$css_liste["nev"]=$cssfld;
$css_list[]=$css_liste;
}
 ?>
<div class="row">
    <H2>Oldal stíluslapja (CSS)</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php 
        $typ['name']='nev';
    $typ['value']='id';
    selectbox($name,$css_list,$typ,page_settings($name)); ?>
    <?php hiddenbox("what",$name); ?><br />
    <input name="" type="submit" value="Save" />
    </form>
	<div class="instruction">
      <p>Az oldal kinézete	</p>
	</div>
</div>
<div class="row">
    <H2>Az oldal cimkéje (Title)</H2>
    <form id="form_title" name="form_title" method="post" action="">
      <input name="title" type="text" id="title" value="<?php echo page_settings("title");?>" size="40" maxlength="40"/><br />
    <input name="" type="submit" value="Save" />
      <input type="hidden" name="what" id="what" value="title" />
    </form>
	<div class="instruction">
    Maximum 40 karakter / Max 40 char
    </div>
</div>
<div class="row">
    <H2>Kulcsszavak (Keywords)</H2>
    <form id="form_Keywords" name="form_Keywords" method="post" action="">
      <input name="keywords" type="text" id="keywords" value="<?php echo page_settings("keywords");?>" size="70" maxlength="200"/><br />
    <input name="" type="submit" value="Save" />
      <input type="hidden" name="what" id="what" value="keywords" />
    </form>
	<div class="instruction">5-7 Szó/Worten
    </div>
</div>
<div class="row">
    <H2>Oldal leírása (Description)</H2>
    <form id="form_description" name="form_description" method="post" action="">
    <textarea  name="description" cols="70" rows="3" id="description"/><?php echo page_settings("description");?></textarea><br />
    <input name="" type="submit" value="Save" />
      <input type="hidden" name="what" id="what" value="description" />
    </form>
    <div class="instruction">
    Az oldal leírása, max 165 karakter/char
      <br />
      Ez jelenik meg pl. facebook megosztásnál.
    </div>
</div>
<div class="row">
<H2>
<h2>Keywords</strong> 
  </h2>
<form id="form_Keywordshidden" name="form_Keywordshidden" method="post" action="">
    <textarea name="keywordshidden" cols="70" rows="7"><?php echo page_settings("keywordshidden");?></textarea>
    <br />
<input name="" type="submit" value="Save" />
  <input type="hidden" name="what" id="what" value="keywordshidden" />
</form>
    <div class="instruction">Ez alapján válogatja ki az oldal a kulcsszavakat a hírekből.<br />
	Nem látszik sehol, csak a rendszer használja(hidden, unlimited)
    </div>
</div>


<div class="row">
<H2>sitemail</H2>
    <form id="form_sitemail" name="form_sitemail" method="post" action="">
    <input name="sitemail" type="text" id="sitemail" value="<?php echo page_settings("sitemail");?>" size="50" maxlength="165"/><br />
    <input name="" type="submit" value="Save" />
    <input type="hidden" name="what" id="what" value="sitemail" />
    </form>
    <div class="instruction">
      <p>Az oldal által elküldött leveleket erről az emaicímről küldi ki.<br />
        Outgoing emails from this mailadress<br />
      </p>
    </div>
</div>

<?php $name="start_page_".$_SESSION["lang"]; ?>
<div class="row">
    <H2>Kezdő oldal (<?php echo $_SESSION["lang"];?>)</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php textbox($name,page_settings($name),"start_page"); ?>
    <?php hiddenbox("what",$name); ?><br />
    <input name="" type="submit" value="Save" />
    </form>
    <div class="instruction">Kezdőoldal
    ez a nyitó oldal, az oldal elérési címének a végét kell beírni.<br />
    <em>http://yoursite.com/modules/modul/item </em>vagy <em>http://yoursite.com/?q=modules/modul/item</em> ebből a <em>modules/modul/item</em> -et kell bemásolni</div>
</div>

<?php 
$rootmenu_array=menupontselectbox(0,$onearray,'','','');
$rootmenu_array[]=array("nev"=>"root","id"=>"0");
$name="menu_root_".$_SESSION["lang"]; ?>
<div class="row">
    <H2>Root menü (<?php echo $_SESSION["lang"];?>)</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php 
    $typ['name']='nev';
    $typ['value']='id';
    selectbox($name,$rootmenu_array,$typ,page_settings($name));
    hiddenbox("what",$name); ?><br />
    <input name="" type="submit" value="Save" />
    </form>
    <div class="instruction">Ez a menüszint jelenik meg főmenüként.</div>
</div>  
<?php $name="timezone"; ?>
<div class="row">
    <H2>Időzóna (timezone)</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php 
    textboxhtml5($name,page_settings($name),"number","n",$name);
    hiddenbox("what",$name); ?> (	<?php echo dateprint($date);?>)<br />
    <input name="" type="submit" value="Save" />
    </form>
    <div class="instruction">A szerver idejéhez képest való időeltolódás, ha a szerver másik időzónában található.</div>
</div>  

<?php $name="footer"; ?>
<div class="row">
    <H2>Footer</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php kcebox($name,page_settings($name),"minimal"); ?>
    <?php hiddenbox("what",$name); ?>
    <input name="" type="submit" value="Save" />
    </form>
    <div class="instruction">Weboldal lábléce.
    </div>
</div>

<?php /* $name="elite_event_date"; ?>
<div class="row">
    <H2>elite Event_date</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php datebox($name,page_settings($name));echo page_settings($name); ?>
    <?php hiddenbox("what",$name); ?>
    <input name="" type="submit" value="Save" />
    </form>
    <div class="instruction">következő challange dátuma
    </div>
</div>  
  
<?php $name="elite_event_text"; ?>
<div class="row">
    <H2>elite Event_date</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php textbox($name,page_settings($name));?>
    <?php hiddenbox("what",$name); ?>
    <input name="" type="submit" value="Save" />
    </form>
<div class="instruction">
    következő challange száma
    </div>
</div>   

<?php  $name="elite_event_date";
*/ ?>
