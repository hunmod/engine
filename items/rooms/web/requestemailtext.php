<form method="post">
<div class="bootstrap-tabs" data-tab-set-title="mmt">
	<ul class="nav nav-tabs" role="tablist"><!-- add tabs here -->
		<?php foreach ($avaibleLang as $alan){?>
			<li <?php if($_SESSION['lang']==$alan){echo 'class="active" ';}?>role="presentation"><a aria-controls="mmt-tab-<?= $alan?>" class="tab-link" data-toggle="tab" href="#mmt-tab-<?= $alan?>" role="tab"><?= lan('requestemailtext')." ".$alan?></a></li>
			<?php
		}?>
	</ul>

	<div class="tab-content"><!-- add tab panels here -->
		<?php foreach ($avaibleLang as $alan){ ?>
			<div class="tab-pane <?php if($_SESSION['lang']==$alan){echo 'active';}?>" id="mmt-tab-<?= $alan?>" role="tabpanel">
				<?php $steplang = $alan; ?>
				<?php $FormClass->kcebox('requestemailsubject'.$alan, $Text_Class->htmlfromchars(page_settings('requestemailsubject'.$alan)), lan('subject').' '.lan($alan)) ?>
				<?php $FormClass->kcebox('requestemailtext'.$alan, $Text_Class->htmlfromchars(page_settings('requestemailtext'.$alan)), lan('text').' '.lan($alan)) ?>
			</div>

		<?php } ?>
	</div>
</div>
	<button class="btn btn-succes"><?= lan('save');?></button>
</form>