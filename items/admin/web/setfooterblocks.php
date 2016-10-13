<?php $form=new formobjects();?>
<div class="container">
    <section class="col-sm-12">

<h1>Lábléc elemek beállítása</h1>
    <form id="form_title" name="form_title" method="post" action="">

        <div class="bootstrap-tabs" data-tab-set-title="mmt">
            <ul class="nav nav-tabs" role="tablist"><!-- add tabs here -->
                <?php foreach ($avaibleLang as $alan){?>
                    <li <?php if($_SESSION['lang']==$alan){echo 'class="active" ';}?>role="presentation"><a aria-controls="mmt-tab-<?= $alan?>" class="tab-link" data-toggle="tab" href="#mmt-tab-<?= $alan?>" role="tab"><?= lan('text')." ".$alan?></a></li>
                    <?php
                }
                ?>
            </ul>

            <div class="tab-content"><!-- add tab panels here -->
                <?php foreach ($avaibleLang as $alan){ ?>
                    <div class="tab-pane <?php if($_SESSION['lang']==$alan){echo 'active';}?>" id="mmt-tab-<?= $alan?>" role="tabpanel">
                        <?php $steplang = $alan; ?>
                        Blok1:
                         <?php $form->kcebox('footerblock1_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock1_'.$steplang))) ?>
                        Blok2:
                         <?php $form->kcebox('footerblock2_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock2_'.$steplang))) ?>
                        Blok3:
                         <?php $form->kcebox('footerblock3_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock3_'.$steplang))) ?>
                        Blok4:
                         <?php $form->kcebox('footerblock4_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock4_'.$steplang))) ?>
                        Blok5:
                         <?php $form->kcebox('footerblock5_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock5_'.$steplang))) ?>
                        Blok6:
                         <?php $form->kcebox('footerblock6_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock6_'.$steplang))) ?>
                        Blok7:
                         <?php $form->kcebox('footerblock7_'.$steplang, $Text_Class->htmlfromchars( page_settings('footerblock7_'.$steplang))) ?>
                    </div>

                <?php } ?>
            </div>
        </div>

    <input name="" class="btn btn-success" type="submit" value="Save" />
        </form>
        </section>   

</div>