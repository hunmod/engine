<rssarticle class="col-md-4 col-sm-6 ">
<a href="<?php echo ($egyrssdata["url"]);?>" itemprop="url"><h2 itemprop="name"> <?php echo ($egyrssdata["title"]);?></h2></a>
<description itemprop="description"><?php echo $Text_Class->levag($Text_Class->tageketlevesz($Text_Class->htmlfromchars($egyrssdata["description"])), 500);?></description>
<?php if ($auser["jogid"]>=3){ ?>
	<a href="<?php echo $separator.$getparams[0]."/"."edit/".$egyrssdata["id"];?>">edit</a><br />
<?php } ?>
<br />
</rssarticle>