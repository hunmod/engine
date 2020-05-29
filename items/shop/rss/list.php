<?php
//arraylist($hirekelemek);
foreach ($elemek as $elem){
?>
<item>
	<title><![CDATA[<?php echo ( $TextClass->tageketcsupaszit(  $TextClass->htmlfromchars($elem["title"] ) ) );?>]]></title>
	<link><?php echo $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?></link>
	<description><![CDATA[<?php  echo (  ( $TextClass->htmlfromchars( $elem["leadtext"]) ));?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($elem["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?></guid>
</item>
<?php }?> 