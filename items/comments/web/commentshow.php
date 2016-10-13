<?php 
//arraylist($comment);
$ufilters['id']=$comment["uid"];
$ufilters['status']='all';
$myusera=$User_Class->get_users($ufilters);
$myuser=($myusera['datas'][0]);
$userimg=$User_Class->profielimg2($myuser, $x = 20, $y = 20);
?>

<li class="comment-main">
	<div class="col-xs-12 comment-container">
			<img src="<?= $userimg;?>">
		<div class="name"><?= $myuser["unev"];?></div>
		<div class="date"><?= $comment["ido"];?></div>
		<div class="text">
			<?= $comment["msg"];?>
		</div>
		<div class="reply-button"><a href="">Válasz</a></div>
	</div>
	<form method="post">
<?php $form_class->hiddenbox('sendmsg','1');?>
<?php $form_class->textaera('msg','','üzenet');?>
<?php $form_class->hiddenbox('rep',$comment["id"]);?>
<button class="submit-button"><?= $lan['send'];?></button>
</form>
<?php
	$filter2['rep']=$comment["id"];
	//lekérdezem a kommenteket, ez alatt 1 szint lehet még.
	$commentsarray2=$comment_class->get($filter2);
	if($commentsarray2['datas'])
	foreach ($commentsarray2['datas'] as $comment2){
		$ufilters['id']=$comment2["uid"];
		$ufilters['status']='all';
		$myusera=$User_Class->get_users($ufilters);
		$myuser=($myusera['datas'][0]);
		$userimg=$User_Class->profielimg2($myuser, $x = 20, $y = 20);
?>

	<ul class="reply-comment-list col-lg-12">
		<li class="comment-reply">
			<div class="col-lg-12 comment-container">
			<img src="<?= $userimg;?>">
		<div class="name"><?= $myuser["unev"];?></div>
		<div class="date"><?= $comment2["ido"];?></div>
		<div class="text">
			<?= $comment2["msg"];?>
		</div>
				<div class="reply-button"><a href="">Válasz</a></div>
			</div>
		</li>
	</ul>
	<?php
	}
	?>
	
</li>


<?php
/*
echo $myuser["nev"];
echo $comment["msg"];
echo $comment["ido"];
//$comment["uid"];*/
?>