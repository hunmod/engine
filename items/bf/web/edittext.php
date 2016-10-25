<style>
    #blog_tagsshow span {
        padding: 0 5px;
        margin-right: 5px;
        background: #CCC;
        cursor: pointer;

    }
    .lerningfield {
        position: relative;
    }
    .lerningfield div {
        position: absolute;
        background-color: #FFF;
        border: solid 1px #000000;
        padding-top: 10px;
    }
    .lerningfield div span {
        display: block;
        cursor: pointer;
    }
    .lerningfield div span:hover {
        background-color: #CCC;
    }
    .jobform .col1 .inner, .jobform .col2 .inner, .jobform .col2 {
        overflow: visible;
    }
    #blogtag {
        margin-left: 10px;
        width: 65%;
    }
    #blogtagsl {
        margin-top: 10px;
        max-height: 200px;
        overflow: auto;
        display: none;
        padding: 10px;
        min-width: 250px;
        padding: 3px 10px 5px 10px;
        height: auto;
        line-height: 30px;
        font-size: 18px;
        color: #7c7c7c;
        font-family: 'robotolight';
    }
    .aclist {
        display: block;
        position: absolute;
        background: #FFF;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.7);
        width: 150px;
    }
    .aclist span {
        display: block;
    }
    .aclist span:hover {
        cursor: pointer;
        background: #CCC;
    }
</style>
<div class="container">
    <div class="col-sm-12">
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		
            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
			 <?php   

             $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php echo $lan['tipus'];
            $filtersm["jog"] = "5";
			 ?>:
            <?php $Form_Class->textbox('nev', $adat["nev"],lan("nev")) ?>

            <?php $Form_Class->selectboxeasy2("tipus", $tipus, $adat["tipus"], "tipus"); ?>
		<?php $Form_Class->selectbox2("varos",$citys['datas'],array('value'=>'city_id','name'=>'city_name'),$adat["varos"],"Város");?>   
		Zip:
	            <input name="zip" id="zip" maxlength="5" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["zip"]); ?>">
			<?php echo $lan['street']; ?>Utca:
            <input name="street" id="street" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["street"]); ?>" maxlength="200" style="width: 217px;"/>            
			Hsz:
			<input name="hsz" id="hsz" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["hsz"]); ?>" maxlength="20"/><br/>
				   
			<?php $Form_Class->textbox('telefon', $adat["telefon"],lan("tel")) ?>

	                <?= lan('weboldal'); ?>: <?php $form->textbox("web", $Text_Class->htmlfromchars($adat["web"],lan('weboldal'))) ?>
                <?= lan('email'); ?>: <?php $form->textbox("email", $Text_Class->htmlfromchars($adat["email"],lan('email'))) ?>
            <?php echo lan('szamlazasicim'); ?>: <?php $form->textaera("szamlazasicim", $Text_Class->htmlfromchars($adat["szamlazasicim"],lan('szamlazasicim'))) ?>

			
            <?php echo lan('leiras'); ?>:
            <?php $form->kcebox("leiras", $Text_Class->htmlfromchars($adat["leiras"])) ?>
            <br/>
            <?php echo lan('megjegyzes'); ?>: <?php $form->textaera("megjegyzes", $Text_Class->htmlfromchars($adat["megjegyzes"],lan('megjegyzes'))) ?>
            <br/>
			
             <?= lan('facebookoldal'); ?>: <?php $form->textbox("facebook", $Text_Class->htmlfromchars($adat["facebook"],lan('facebook'))) ?>
<br>

<?php
 if (!isset($adat["pos"]))$adat["pos"]=1;
 if (!isset($adat["wifi"]))$adat["wifi"]=1;
 if (!isset($adat["bringa"]))$adat["bringa"]=1;
 if (!isset($adat["dohanyzo"]))$adat["dohanyzo"]=1;
 if (!isset($adat["sport"]))$adat["sport"]=1;
 if (!isset($adat["allat"]))$adat["allat"]=1;
 if (!isset($adat["roki"]))$adat["roki"]=1;
 if (!isset($adat["konyha"]))$adat["konyha"]=1;
 if (!isset($adat["medence"]))$adat["medence"]=1;
 if (!isset($adat["gyerek"]))$adat["gyerek"]=1;
 if (!isset($adat["specdieta"]))$adat["specdieta"]=1;
 if (!isset($adat["szepkartya"]))$adat["szepkartya"]=1;
 if (!isset($adat["erzsebetkartya"]))$adat["erzsebetkartya"]=1;
 if (!isset($adat["telen"]))$adat["telen"]=1;
 if (!isset($adat["support"]))$adat["support"]=1;
?>

                <?= lan('bankterminal'); ?>:
			  <input type="radio" name="pos" value="0" <?php if ($adat["pos"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="pos" value="1" <?php if ($adat["pos"]==1)echo 'checked';?> > <?= lan('igen');?><br>

            <?= lan('wifi'); ?>:
			  <input type="radio" name="wifi" value="0" <?php if ($adat["wifi"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="wifi" value="1" <?php if ($adat["wifi"]==1)echo 'checked';?> > <?= lan('igen');?><br>
              <?= lan('bringa'); ?>:
			  <input type="radio" name="bringa" value="0" <?php if ($adat["bringa"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="bringa" value="1" <?php if ($adat["bringa"]==1)echo 'checked';?> > <?= lan('igen');?><br>
              <?= lan('dohanyzo'); ?>:
			  <input type="radio" name="dohanyzo" value="0" <?php if ($adat["dohanyzo"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="dohanyzo" value="1" <?php if ($adat["dohanyzo"]==1)echo 'checked';?> > <?= lan('igen');?><br>
			  <?= lan('sport'); ?>:
			  <input type="radio" name="sport" value="0" <?php if ($adat["sport"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="sport" value="1" <?php if ($adat["sport"]==1)echo 'checked';?> > <?= lan('igen');?><br>
              <?= lan('allat'); ?>:
			  <input type="radio" name="allat" value="0" <?php if ($adat["allat"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="allat" value="1" <?php if ($adat["allat"]==1)echo 'checked';?> > <?= lan('igen');?><br>
                <?= lan('rokanntbarat'); ?>:
			  <input type="radio" name="roki" value="0" <?php if ($adat["roki"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="roki" value="1" <?php if ($adat["roki"]==1)echo 'checked';?> > <?= lan('igen');?><br>
                <?= lan('konyha'); ?>:
			  <input type="radio" name="konyha" value="0" <?php if ($adat["konyha"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="konyha" value="1" <?php if ($adat["konyha"]==1)echo 'checked';?> > <?= lan('igen');?><br>
	              <?= lan('medence'); ?>:
			  <input type="radio" name="medence" value="0" <?php if ($adat["medence"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="medence" value="1" <?php if ($adat["medence"]==1)echo 'checked';?> > <?= lan('igen');?><br>
  
                <?= lan('gyerekbarat'); ?>:
			  <input type="radio" name="gyerek" value="0" <?php if ($adat["gyerek"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="gyerek" value="1" <?php if ($adat["gyerek"]==1)echo 'checked';?> > <?= lan('igen');?><br>		  
			  
          <?= lan('specdieta'); ?>:
			  <input type="radio" name="specdieta" value="0" <?php if ($adat["specdieta"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="specdieta" value="1" <?php if ($adat["specdieta"]==1)echo 'checked';?> > <?= lan('igen');?><br>
	  
		           <?php $Form_Class->textbox('balatonltav', $adat["balatonltav"],lan("balatonltav")) ?>
            <br/>	  
			  
                <?= lan('szepkartya'); ?>:
			  <input type="radio" name="szepkartya" value="0" <?php if ($adat["szepkartya"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="szepkartya" value="1" <?php if ($adat["szepkartya"]==1)echo 'checked';?> > <?= lan('igen');?><br>
                <?= lan('erzsebetkartya'); ?>:
			  <input type="radio" name="erzsebetkartya" value="0" <?php if ($adat["erzsebetkartya"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="erzsebetkartya" value="1" <?php if ($adat["erzsebetkartya"]==1)echo 'checked';?> > <?= lan('igen');?><br>
			  
            <br/>
             <?= lan('telen'); ?>:
			  <input type="radio" name="telen" value="0" <?php if ($adat["telen"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="telen" value="1" <?php if ($adat["telen"]==1)echo 'checked';?> > <?= lan('igen');?><br>


                <?= lan('tamogat'); ?>:
			  <input type="radio" name="support" value="0" <?php if ($adat["support"]==0)echo 'checked';?> > <?= lan('nem');?>
			  <input type="radio" name="support" value="1" <?php if ($adat["support"]==1)echo 'checked';?> > <?= lan('igen');?><br>
		
			<?php
			
            $form->selectboxeasy2("status", $bfstatus,  $adat["status"], "status");
            ?>
            <br/>
            <img src="<?php echo($nimg); ?>">
            <br/>
            <input id="photo" name="photo" type="file">

             <p>
                <button type="submit" class="button enterButton"><?= lan('save'); ?> <i class="fa fa-arrow-right"></i></button>
            </p>
        </form>


        <?php
        if ($hirid > 0) {
            $getparams[2] = $hirid;
            include('items/files/web/list.php');

            ?>
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "hirek/hir/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    Page preview
                </div>
            </a>

        <?php } ?>

    </div>
    <!--div class="col-md-3 col-sm-4">
<?php include("items/user/web/widget_user_menu.php") ?>
</div-->
</div>