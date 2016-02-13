<?php 
$alapanyagok=$rec_class->alapanyagkeres($_POST);
?>
<table width="100%">
    <tr>
    <td><?php echo "nev";?></td>
    <td class="energia"><?php echo $lan["energia_short"]; ?></td>
    <td class="kaloria"><?php echo $lan["kaloria_short"]; ?></td>
    <td class="szenhidrat"><?php echo $lan["szenhidrat_short"]; ?></td>
    <td class="feherje"><?php echo $lan["feherje_short"]; ?></td>
	<td class="zsir"><?php echo $lan["zsir_short"]; ?></td>
	<td class="rost"><?php echo $lan["rost_short"]; ?></td>

    </tr>
<?php
foreach ($alapanyagok as $egyertek){
	if ($_SESSION['lang']=='de'){
		$nevaddo='_de';
		if($egyertek["nev".$nevaddo]=='')$nevaddo='';	
	}
	if ($_SESSION['lang']=='en'){
		$nevaddo='_en';
		if($egyertek["nev".$nevaddo]=='')$nevaddo='';
	}
		$egyertek["nev".$nevaddo]=str_replace("
",'',$egyertek["nev".$nevaddo]);

?>
    <tr onclick="recept_ac1sel('<?php echo $egyertek["id"];?>','<?php echo $Text_Class->fixtags($Text_Class->htmlfromchars($egyertek["nev".$nevaddo]));?>','<?php echo $egyertek["megyertekegyseg"];?>');">
    <td><?php echo $egyertek["nev".$nevaddo];?></td>
    <td class="energia"><?php echo $egyertek["energia"];?></td>
    <td class="kaloria"><?php echo $egyertek["kaloria"];?></td>
    <td class="szenhidrat"><?php echo $egyertek["szenhidrat"];?></td>
    <td class="feherje"><?php echo $egyertek["feherje"];?></td>
    <td class="zsir"><?php echo $egyertek["zsir"];?></td>
    <td class="rost"><?php echo $egyertek["rost"];?></td>
    </tr>
<?php 
}
?>
</table>