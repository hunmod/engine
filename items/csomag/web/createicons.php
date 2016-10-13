<?php
//css kiiratása
/*
?>
<style>
.icon{
	display:inline-block;
	width:30px;
	height:30px;
    background-size: contain!important;
	background-repeat: no-repeat!important;
}
<?php echo hotelcss_print($myicons); ?>
.MOSDOK,
.OLTOZO-FERFI,
.OLTOZO-NOI,
.ZUHANYZO-FERFI,
.ZUHANYZO-NOI
{
	width:75px;
}
</style>


<?php
*/
//tesztmegjelenites
?>
<?php echo hotelicon_print('RENDEZVENY',50,'fekete');?>
<?php
//arraylist($myicons);
foreach ($myicons as $name=>$mylistb ){
	?>
	<div class="col-sm-12">
	<h2><?= $name;?></h2>
	</div>
	<?php
	//arraylist($icons_colors);
	foreach($icons_colors as $ic) {
		foreach ($mylistb[$ic] as $mlb) {
			//arraylist($mlb);
			?>
			<div class="col-sm-2">
			<?php echo hotelicon_print($mlb["name"],50,$ic);?><br>
			<?php echo $mlb["name"];?>
			</div>
			<?php
		}
	}
}?>


 	<?php /*
foreach ($myicons as $name=>$mylistb ){
foreach ($mylistb['fekete'] as $mlb){
	echo hotelicon_print($mlb["name"],'10','fekete').' ';
	echo $mlb["class"].'<br>';
 } }*/ ?>



<?php
//arraylist($mylistb);
?>