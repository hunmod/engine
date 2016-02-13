<h1>Oldal beállításai/Email szöveg </h1>
<?php $name="email_header"; ?>
  
<div class="row">

<H2>Email fejléc</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php kcebox($name,page_settings($name),""); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form>
<div class="instruction">Kimenő emailek fejléce
    </div>
</div>  

<?php $name="email_footer"; ?>
  
<div class="row">

<H2>Email Lábléc</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php kcebox($name,page_settings($name),"minimal"); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form>
<div class="instruction">Kimenő emailek lábléce
    </div>
</div>  

<?php $name="email_reg_subject_".$_SESSION["lang"]; ?>
  
<div class="row">

<H2>Regisztrációs mail subject(<?php echo $_SESSION["lang"]?>)</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php textbox($name,page_settings($name)); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form>
<div class="instruction">Regisztrációs email<br />
    	Variables:<br />
        USER_NAME ,USER_UNAME, USER_PWD, SITE_NAME, SITE_URL, VALIDATE_URL
    </div>
</div>  

<?php $name="email_reg_".$_SESSION["lang"]; ?>
  
<div class="row">

<H2>Regisztrációs mail (<?php echo $_SESSION["lang"]?>)</H2>
    <form id="form_<?php echo $name;?>" name="form_<?php echo $name;?>" method="post" action="">
    <?php kcebox($name,page_settings($name),"minimal"); ?>
    <?php hiddenbox("what",$name); ?>
	<input name="" type="submit" value="Save" />
    </form>
<div class="instruction">Regisztrációs email<br />
    	Variables:<br />
        USER_NAME ,USER_UNAME, USER_PWD, SITE_NAME, SITE_URL, VALIDATE_URL
    </div>
</div>  

