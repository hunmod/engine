<form method="post">
<?php $FormClass->hiddenbox('sendmsg','1');?>
<?php $FormClass->textaera('msg','','üzenet');?>
<?php $FormClass->hiddenbox('rep',$msgroot);?>
<button class="submit-button"><?= $lan['send'];?></button>
</form>