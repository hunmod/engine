<?php
//arraylist($hirekelemek);
foreach ($dbadat as $elem){	

$rec_description=" #recept ";

		if ($elem["gluten"]){
			$rec_description.="#Gluténmentes ";
			}
		if ($elem["diab"]){
			$rec_description.="#Cukormentes ";
			}
		if ($elem["lactose"]){
			$rec_description.="#Laktózmentes ";
			}
 
	$img=$rec_class->recipe_img($elem["id"],300,250);
?>

<item>
	<title><![CDATA[<?php echo ( $Text_Class->tageketcsupaszit(  $Text_Class->htmlfromchars($elem["nev"] ) ) );?>]]></title>
	<link><?php echo $homeurl.$separator.$getparams[0]."/recept/".$elem["id"];?></link>
	<description><![CDATA[<img src="<?php echo $img;?>" /> <br /> <?php  echo ( $Text_Class->tageketcsupaszit ( $Text_Class->htmlfromchars( $elem["bevezeto"]) )).$rec_description;?> ]]></description>
	<category><![CDATA[<?php echo $pagetitle;?>]]></category>
	<pubDate><?php echo gmdate( 'D, d M Y H:i:s',strtotime($elem["ido"]) ) . ' GMT';?></pubDate>
	<guid><?php echo $hostlink."/".$kezdooldal.$separator.$getparams[0]."/recept/".$elem["id"];?></guid>
</item>
<?php }?> 
<?php //echo tyniszovegkonvert($hir["cim"]);?>
