<h1>Webshop beállításai</h1>
<?php
//$rootmenu_array=$FormClass->menupontselectbox('11',$onearray,'','','');
$rootmenu_array=$MenuClass->get_menus_down('11',$onearray);
$rootmenu_array[]=array("nev"=>"root","id"=>"0");
//$SysClass->arraylist($rootmenu_array);
 ?>

    <form method="post" action="">
        <div class="col-sm-12">
            <strong>Főmenü (<?php echo $_SESSION["lang"];?>)</strong>
            <?php
            $name="shop_root_menu_".$_SESSION["lang"];
            $typ = array('value' => 'id', 'name' => 'nev');
            $FormClass->selectbox($name,$rootmenu_array,$typ,page_settings($name));
            ?>    </div>

                    <div class="col-sm-12">
                        <strong>shop_maxitem</strong>
            <?php
            $name="shop_maxitem";
            $typ = array('value' => 'id', 'name' => 'nev');
            $FormClass->numbox($name,page_settings($name));
             ?><br />
            (Max elem egy oldalon)
                <br />
                <strong>PayPal email</strong>
            <?php
            $name="paypal_email";

            $FormClass->emailbox($name,page_settings($name),lan($name));
             ?><br />
    </div>

        <div class="col-sm-12">
            <strong>Megrendelés mail (<?php echo $_SESSION["lang"]?>)</strong>
            <?php
            $name="shop_order_mail_subject_".$_SESSION["lang"];
            $FormClass->textbox($name,page_settings($name));?><br />
            <?php $name="shop_order_mail_text_".$_SESSION["lang"];
            $FormClass->kcebox($name,page_settings($name),"");
            ?>
             Variables:<br />
            ORDER_URL ,VEVO_NEV
    </div>
        <div class="col-sm-12">
            <strong>Utalási infók mail (<?php echo $_SESSION["lang"]?>)</strong>
            <?php
            $name="shop_order_pay1_subject_".$_SESSION["lang"];
            $FormClass->textbox($name,page_settings($name)); ?><br />
            <?php $name="shop_order_pay1_text_".$_SESSION["lang"];
            $FormClass->kcebox($name,page_settings($name),"");
            ?>
            Variables:<br />
            ORDER_URL ,VEVO_NEV,ORDER_OSSZEG,ORDER_ID</td>
    </div>
        <div class="col-sm-12">
            <strong>Utalási infók mail (<?php echo $_SESSION["lang"]?>)</strong>
            <?php
            $name="shop_order_pay2_subject_".$_SESSION["lang"];
            $FormClass->textbox($name,page_settings($name)); ?><br />
            <?php $name="shop_order_pay2_text_".$_SESSION["lang"];
            $FormClass->kcebox($name,page_settings($name),"");
            ?>
            Variables:<br />
            ORDER_URL ,VEVO_NEV,ORDER_OSSZEG,ORDER_ID</td>
    </div>
        <div class="col-sm-12">
            <strong>Fizetési emlékeztető1 mail (<?php echo $_SESSION["lang"]?>)</strong>
            <?php
            $name="shop_order_pay_pay1_subject_".$_SESSION["lang"];
            $FormClass->textbox($name,page_settings($name)); ?><br />
            <?php $name="shop_order_pay_pay1_text_".$_SESSION["lang"];
            $FormClass->kcebox($name,page_settings($name),"");
            ?>
            Variables:<br />
            ORDER_URL ,VEVO_NEV,ORDER_OSSZEG,ORDER_ID</td>
    </div>
        <div class="col-sm-12">
            <strong>Rendelés postán mail (<?php echo $_SESSION["lang"]?>)</strong>
            <?php
            $name="shop_order_pay_post_subject_".$_SESSION["lang"];
            $FormClass->textbox($name,page_settings($name)); ?><br />
            <?php $name="shop_order_pay_post_text_".$_SESSION["lang"];
            $FormClass->kcebox($name,page_settings($name),"");
            ?>
            Variables:<br />
            ORDER_URL ,VEVO_NEV,ORDER_OSSZEG,ORDER_ID</td>
    </div>
        <div class="col-sm-12">
            <strong>Rendelés lezárva mail (<?php echo $_SESSION["lang"]?>)</strong>
            <?php
            $name="shop_order_close_subject_".$_SESSION["lang"];
            $FormClass->textbox($name,page_settings($name)); ?><br />
            <?php $name="shop_order_close_text_".$_SESSION["lang"];
            $FormClass->kcebox($name,page_settings($name),"");
            ?>
            Variables:<br />
            ORDER_URL ,VEVO_NEV,ORDER_OSSZEG,ORDER_ID</td>
    </div>

        <div class="col-sm-12">
            <h3>Barion</h3>
        </div>

        <div class="col-sm-12">
            <?php
            $name="barion_PosKey";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />
            <?php
            $name="barion_email";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />
    </div>

    <div class="col-sm-12">
            <h3>Szamlazz.hu</h3>
        </div>

        <div class="col-sm-12">
            <?php
            $name="szmlzzhu_usr";
            echo "<title>".$name." (email)</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />

            <?php
            $name="szmlzzhu_pass";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />

            <?php
            $name="szmlzzhu_key";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />

            <?php
            $name="szmlzzhu_szamlaelotag";
            echo "<title>".$name." (nev utan zárójelben)</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />

            <?php
            $name="szmlzzhu_bank_name";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />

            <?php
            $name="szmlzzhu_bank_account";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />

            <?php
            $name="szmlzzhu_bank_replyemail";
            echo "<title>".$name."</title>"
            $FormClass->textbox($name,page_settings($name)); ?>
            <br />            


    </div>



<button type="submit" class="btn btn-success"><?= lan("save")?></button>
    </form>



