<?php
//arraylist($hirekelemek);
foreach ($qmenu as $elem){	
  $datas=$video_class->get(array("mid"=>$data["id"])," id DESC", '0');
 foreach ($datas["datas"] as $mdata){

?>
<item>
	<title><![CDATA[<?php echo ( $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($elem["nev"] ) ) );?>]]></title>
	<link><?php echo $homeurl."/video/videos".'/'.$elem["id"];?></link>
	<description><![CDATA[<?php  echo $mdata["url"]; ?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($mdata["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $homeurl.$separator.$getparams[0]."/vid/".$mdata["id"];?></guid>
</item>
<?php }
}?> 