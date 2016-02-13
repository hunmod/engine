<?php
//arraylist($hirekelemek);
foreach ($hirekelemek as $elem){	 
?>
<item>
	<title><![CDATA[<?php echo ( $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($elem["cim"] ) ) );?>]]></title>
	<link><?php echo $hir_class->createurl($elem);?></link>
	<description><![CDATA[<?php  echo (  ( $Text_Class->htmlfromchars( $elem["hir"]) ));?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($elem["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/hir/".$elem["id"];?></guid>
</item>
<?php }?> 