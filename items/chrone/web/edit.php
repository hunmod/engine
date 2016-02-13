<script>
function menu_admin_select(modul,filename){
	document.getElementById('name').value=modul;
	document.getElementById('XfileX').value=filename;
$('span').removeClass(' selected').addClass('');
	
$('#'+filename+modul).addClass(" selected");
}
</script>
<form id="edit_form" method="post">
<?php
//arraylist($egyelem[0]);
foreach ($formelements as $felem){
	formelement_of_tipe($felem);
	echo "<br>";
}
?>
<input name="smbt" type="submit" value="Ment" />
</form>
  <article style="max-width:50%; float:left;">
  <h1>Modul:</h1>
  <ul>
  <?php	
//arraylist ($dbadat);
foreach ($chronemenu as $modul){
$style="menuselect";
if (($modul["modules"]==$dbadat["modul"])&&($modul["file"]==$dbadat["file"])){
	$style="menuselect default";
	}
?>
    <li><span onclick="menu_admin_select('<?php echo $modul["name"];  ?>','<?php echo $modul["file"];  ?>');" class="<?php echo $style;?>" id="<?php echo $modul["file"].$modul["modules"];  ?>"><?php echo $modul["name"];  ?></span></li>	
  <?php	
}
?>	
  </ul>
  <?php	
//arraylist($modules);
?>

</article>