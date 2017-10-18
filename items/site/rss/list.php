<?php
//arraylist($hirekelemek);
foreach ($hirekelemek as $elem){	 
?>
<item>
	<title><![CDATA[<?php echo ( $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($elem["title"] ) ) );?>]]></title>
	<link><?php echo $SiteClass->createurl($elem);?></link>
	<description><![CDATA[<?php  echo (  ( $Text_Class->htmlfromchars( $elem["leadtext"]) ));?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<guid><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/hir/".$elem["id"];?></guid>
</item>
<?php }?> 