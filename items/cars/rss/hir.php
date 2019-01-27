    <item>
        <title><![CDATA[<?php echo html_entity_decode( strip_tags( $Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($aprodata["cim"])) ) );?>]]></title>
        <link><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/".$getparams[1]."/".$$getparams[2];?></link>
        <description><![CDATA[<?php  echo   ( ($Text_Class->htmlfromchars($aprodata["hir2"])) );?> ]]></description>
        <pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($aprodata["ido"]) ) . ' GMT';?></pubDate>
        <category domain="main"></category>
    
    </item>

