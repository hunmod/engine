<?php
//arraylist($hirekelemek);
foreach ($hirekelemek as $elem){	 
?>
<item>
	<title><![CDATA[<?php echo ( tageketcsupaszit(  htmlfromchars($elem["nev"] ) ) );?>]]></title>
	<link><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/hir/".$elem["id"];?></link>
	<description><![CDATA[<?php  echo (  ( htmlfromchars( $elem["hir"]) ));?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($elem["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/hir/".$elem["id"];?></guid>
</item>
<?php }?> 