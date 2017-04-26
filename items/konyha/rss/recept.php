<?php
	$mappa=$folders["uploads"]."konyha/".$recept_data["id"];
	$img=randomimgtofldr("uploads/".$mappa);
	if ($img!="none"){
	$img=$hostlink."/uploads/picture.php?picture=".encode($mappa."/".$img);
	}
	else{
	$img=$hostlink."/uploads/".$defaultimg;
	}
?>
<item>
	<title><![CDATA[<?php echo ( $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($recept_data["nev"] ) ) );?>]]></title>
	<link><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/recept/".$recept_data["id"];?></link>
	<description><![CDATA[<img src="<?php echo $img;?>" /> <br /> <?php  echo ( $Text_Class->tageketcsupaszit ( $Text_Class->htmlfromchars( $recept_data["bevezeto"]) ));?> ]]></description>
	<category><![CDATA[<?php echo $Text_Class->htmlfromchars( $pagetitle);?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($recept_data["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/recept/".$recept_data["id"];?></guid>
</item>