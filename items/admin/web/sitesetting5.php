<?php

$css_array = dirlist("styl");
foreach ($css_array as $cssfld) {
    $css_liste["id"] = $cssfld;
    $css_liste["nev"] = $cssfld;
    $css_list[] = $css_liste;
}


?>
<div class="container">

    <h1><?= lan('sitesettings') ?> </h1>
    <section class="col-sm-12">

        <form id="form_title" name="form_title" method="post" action="">
            <?php
            $rootmenu_array = $MenuClass->menu_selectbox(0, array(), $filtersm, $order = '', $page = 'all');
            $rootmenu_array[] = array("nev" => "root", "id" => "0");

            $name = "site_css";
            $Form_Class->selectbox($name, $css_list, array('value' => 'id', 'name' => 'nev'), page_settings($name), 'Stíluslap');

            $name = "menu_root_admin";
            $Form_Class->selectbox($name, $rootmenu_array, array('value' => 'id', 'name' => 'nev'), page_settings($name), 'Rootmenu admin');
            ?>
            <div class="bootstrap-tabs" data-tab-set-title="mmt">
                <ul class="nav nav-tabs" role="tablist"><!-- add tabs here -->
                    <?php foreach ($avaibleLang as $alan) { ?>
                        <li <?php if ($_SESSION['lang'] == $alan) {
                            echo 'class="active" ';
                        } ?>role="presentation"><a aria-controls="mmt-tab-<?= $alan ?>" class="tab-link"
                                                   data-toggle="tab" href="#mmt-tab-<?= $alan ?>"
                                                   role="tab"><?= $alan ?></a></li>
                        <?php
                    }
                    ?>
                </ul>

                <div class="tab-content"><!-- add tab panels here -->
                    <?php foreach ($avaibleLang as $alan) { ?>
                        <div class="tab-pane <?php if ($_SESSION['lang'] == $alan) {
                            echo 'active';
                        } ?>" id="mmt-tab-<?= $alan ?>" role="tabpanel">

                            <?php
                            $Form_Class->selectbox("menu_root_" . $alan, $rootmenu_array, array('value' => 'id', 'name' => 'nev'), page_settings("menu_root_" . $alan), 'Rootmenu(' . $alan . ')');
                            $Form_Class->textbox('start_page_' . $alan, page_settings('start_page_' . $alan), 'Kezdő oldal (' . $alan . ')');
                            $Form_Class->textbox('keywords_' . $alan, page_settings("keywords_" . $alan), 'Kulcsszavak (Keywords)' . $alan . '');
                            $Form_Class->textbox('title_' . $alan, page_settings("title_" . $alan), 'title (Description)' . $alan . '');
                            $Form_Class->textbox('description_' . $alan, page_settings("description_" . $alan), 'description (' . $alan . ')');


                            ?>

                        </div>

                    <?php } ?>
                </div>
            </div>
            <?php
            $blockmouse = array();
            $blockmousee['id'] = 2;
            $blockmousee['nev'] = 'Yes';
            $blockmouse[] = $blockmousee;


            $blockmousee['id'] = 4;
            $blockmousee['nev'] = 'No';
            $blockmouse[] = $blockmousee;

            $Form_Class->selectbox('blockmouse', $blockmouse, array('value' => 'id', 'name' => 'nev'), page_settings('blockmouse'), 'Block left mouseclick');
            $Form_Class->selectbox('letitsnow', $blockmouse, array('value' => 'id', 'name' => 'nev'), page_settings('letitsnow'), lan('letitsnow'));
            $Form_Class->selectbox('indexfollow', $blockmouse, array('value' => 'id', 'name' => 'nev'), page_settings('indexfollow'), lan('robots index'));
            $Form_Class->selectbox('adblockerblocker', $blockmouse, array('value' => 'id', 'name' => 'nev'), page_settings('adblockerblocker'), lan('adblocker blocker'));
            $Form_Class->selectbox('confetti', $blockmouse, array('value' => 'id', 'name' => 'nev'), page_settings('confetti'), lan('confetti'));

            ?>




            <?php /*$Form_Class->textaera('footertext',page_settings("footertext"),'Footertext');?>
           
  				<?php $Form_Class->textaera('policytext',page_settings("policytext"),'Privacy policy');?>  
            
  				<?php $Form_Class->textaera('sitetermtext',page_settings("sitetermtext"),'Site term');?>     
                
                
  				<?php $Form_Class->textaera('contacttext',page_settings("contacttext"),'Site Contact');?>                 

  				<?php $Form_Class->textaera('advertisetext',page_settings("advertisetext"),'site advertise');?>   
                
  				<?php $Form_Class->textaera('footerblock1',page_settings("footerblock1"),'footer block1');?>                 
  				<?php $Form_Class->textaera('footerblock2',page_settings("footerblock2"),'footer block2');?>                 
  				<?php $Form_Class->textaera('footerblock3',page_settings("footerblock3"),'footer block3'); */ ?>


            <input name="" type="submit" value="Save"/>
        </form>
        <script>
            var CKfBUrl = '<?php echo $homeurl;?>/scripts/ckfinder/ckfinder.html';

            CKEDITOR.replace('footertext', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });

            CKEDITOR.replace('policytext', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });
            CKEDITOR.replace('sitetermtext', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });

            CKEDITOR.replace('contacttext', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });
            CKEDITOR.replace('advertisetext', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: ''
            });
            CKEDITOR.replace('footerblock1', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: '',
                toolbar: [
                    ['Source', '-', 'Preview', '-', 'Templates'],
                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'SelectAll', 'RemoveFormat'],
                    ['Undo', 'Redo', '-', 'Find', 'Replace'],
                    ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                    ['Maximize', 'ShowBlocks'],
                    ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'],
                    ['Link', 'Unlink', 'Anchor'], ['NumberedList', 'BulletedList']
                ]
            });

            CKEDITOR.replace('footerblock2', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: '',
                toolbar: [
                    ['Source', '-', 'Preview', '-', 'Templates'],
                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'SelectAll', 'RemoveFormat'],
                    ['Undo', 'Redo', '-', 'Find', 'Replace'],
                    ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                    ['Maximize', 'ShowBlocks'],
                    ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'],
                    ['Link', 'Unlink', 'Anchor'], ['NumberedList', 'BulletedList']
                ]
            });

            CKEDITOR.replace('footerblock3', {
                filebrowserBrowseUrl: CKfBUrl,
                customConfig: '',
                toolbar: [
                    ['Source', '-', 'Preview', '-', 'Templates'],
                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'SelectAll', 'RemoveFormat'],
                    ['Undo', 'Redo', '-', 'Find', 'Replace'],
                    ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                    ['Maximize', 'ShowBlocks'],
                    ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'],
                    ['Link', 'Unlink', 'Anchor'], ['NumberedList', 'BulletedList']
                ]
            });

        </script>
    </section>

</div>