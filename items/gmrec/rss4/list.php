<?php
//arraylist($hirekelemek);
foreach ($gmrecelemek as $elem){
?>
<item>
	<title><![CDATA[<?php echo ( $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($elem["cim"] ) ) );?>]]></title>
	<link><?php echo $gmrec_class->createurl($elem);?></link>
	<description><![CDATA[<?php  echo (  ( $Text_Class->htmlfromchars( $elem["leiras"]) ));?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($elem["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/hir/".$elem["id"];?></guid>
</item>
<?php }?> 