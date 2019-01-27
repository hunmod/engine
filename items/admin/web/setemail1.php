<?php $form = new formobjects(); ?>

<script>

    function Insertigtokce(editorname, img) {

        x = document.getElementById(editorname + 'x').value;
        y = document.getElementById(editorname + 'y').value

        var addx = '';
        var addy = '';
        var addfx = '';
        var addfy = '';

        if (x > 0) {
            addx = '&x=' + (x * 1.2);
            addfx = ' width="' + x + '" ';
        }

        if (y > 0) {
            addy = '&y=' + (y * 1.2);
            addfy = ' height="' + y + '" ';
        }


//'&x=100&y=100" 

        CKEDITOR.instances[editorname].insertHtml('<img src="uploads/picture.php?picture=' + img + addx + addy + '" ' + addfx + addfy + '/>');

    }
</script>
<div class="container">
    <section class="col-sm-12">

        <h1>Oldal email beállításai</h1>

        <form id="form_title" name="form_title" method="post" action="">
            <?php $form->textbox('sparkapikey', page_settings("sparkapikey"), 'sparkpost apikey'); ?>
            <div>
                <a href="https://app.sparkpost.com/auth" target="_blank">sparkpost</a>
                </div>
            <?php $form->textbox('sitemail', page_settings("sitemail"), 'Kimenő levelek email címe'); ?>
            <?php $form->textbox('sitemailname', page_settings("sitemailname"), 'Kimenő levelek feladó neve'); ?>
            <?php $form->textaera('email_header', page_settings("email_header"), 'Email header'); ?>
            <?php $form->textaera('email_footer', page_settings("email_footer"), 'Email footer'); ?>
            <?php $form->textbox('email_reg_subject', page_settings("email_reg_subject"), 'Regisztration mail subject'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS,VALIDATE_URL
            </div>
            <?php
            $form->textaera('email_reg_text', page_settings("email_reg_text"), 'Regisztration mail text'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS,VALIDATE_URL
            </div>

            <?php
            $form->textaera('email_reg_text_fb', page_settings("email_reg_text_fb"), 'Facebook Regisztration mail'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS
            </div>


            <?php $form->textbox('email_pass_reset_subject', page_settings("email_pass_reset_subject"), 'Jelszó emlékeztető mail tárgya'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS
            </div>
            <?php
            $form->textaera('email_pass_reset_text', page_settings("email_pass_reset_text"), 'Jelszó emlékeztető mail szövege'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS
            </div>

            <?php $form->textbox('email_pass_change_subject', page_settings("email_pass_change_subject"), 'Jelszó módosítás mail tárgya'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS

            </div>
            <?php
            $form->textaera('email_pass_change_text', page_settings("email_pass_change_text"), 'Jelszó módosítás mail szövege'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL,USERPASS

            </div>
            <?php $form->textbox('email_user_del_subject', page_settings("email_user_del_subject"), 'Felhasználó törlés mail tárgya'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL

            </div>
            <?php
            $form->textaera('email_user_del_text', page_settings("email_user_del_text"), 'Felhasználó törlés mail szövege'); ?>
            <div>
                Behelyettesítés:
                USERNAME,REALNAME,USEREMAIL
            </div>
            <hr>


            <input name="" type="submit" value="Save"/>
        </form>
        <script>
            var CKfBUrl = '<?php echo $homeurl;?>/scripts/ckfinder/ckfinder.html';

            CKEDITOR.replace('email_header', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });

            CKEDITOR.replace('email_footer', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });

            CKEDITOR.replace('email_reg_text', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });

            CKEDITOR.replace('email_reg_text_fb', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });


            CKEDITOR.replace('email_pass_reset_text', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });

            CKEDITOR.replace('email_pass_change_text', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });
            CKEDITOR.replace('email_user_del_text', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });
        </script>
    </section>
</div>