<?php foreach ($hirekarray as $elem){?>
<div class="egyelem">
<div>
Hírek-<?php echo $elem['menu_cim']; ?>
</div>
<?php echo $elem['cim']; ?>
<hr />
<?php echo $elem['hir']; ?>
<br />
</div> 
<?php }?>
<?php
if (count($hirek)<=0) 
{
	echo "Nincs ilyen elem!";
}
?>
