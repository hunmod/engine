<?php
//arraylist($eszkozok);
foreach ($rssdatas as $elem){	
	$elem["url"]= $homeurl.$separator.$getparams[0].'/item/'.$Text_Class->htmlfromchars($Text_Class->to_link($elem["title"])).'/'.$elem["id"];
 
?>
<item>
	<title><![CDATA[<?php echo $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($elem["title"] ) );?>]]></title>
	<link><?php echo $elem["url"];?></link>
	<description><![CDATA[<?php  echo $Text_Class->levag($Text_Class->tageketlevesz($Text_Class->htmlfromchars($elem["description"])), 500);?> ]]></description>
	<category><![CDATA[<?php echo $elem["category"];?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($elem["pubDate2"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $elem["link"];?></guid>
</item>
<?php }?> 