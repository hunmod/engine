<style>
table{
	min-width:100%;
}
table tr td{
	border:1px solid black;
	min-width:100px;
	margin:0px;
	padding:3px;
}
.priece0{
	background: Chartreuse ;
}
.thead ,
.thead :hover{
	font-weight: bold;
	background:Gainsboro!important;
	text-transform: capitalize;
	
}
table tr:hover{
	background:Wheat;
}

table .glyphicon{
	color:darkgray;
    text-decoration: none!important;
	float: right;
}
table .glyphicon:hover{
	color:black;	
}
.thead .selected{
	color:Beige;
}

@media print {
  a[href]:after {
    content: none !important;
  }
}

</style>
<div class="content">
<ul class="uppermenu">
<li class="uj glyphicon glyphicon-plus"><a href="<?= $homeurl?>/term/new"><?= lan('new')?></a></li>
</ul>


<table>
<?php 
if ($datas){?>
<tr class="thead">
<?php
foreach ($list_term_mezok as $mezo){
	$sela=$selb="";
	$forderparam='ord='.$mezo;
	if ($_GET["ord"]==$mezo){
		if ($_GET["ord_a"]=='ASC')$sela='selected';
		if ($_GET["ord_a"]=='DESC')$selb='selected';
	}


?>
	<td class=""><?= lan($mezo)?> <a href="<?= $homeurl?>/term/list?<?= $forderparam?>&ord_a=ASC" class="glyphicon glyphicon-triangle-bottom <?=$sela?>"></a><a href="<?= $homeurl?>/term/list?<?= $forderparam?>&ord_a=DESC" class="glyphicon glyphicon-triangle-top <?=$selb?>"></a></td>
<?php	
}
?>
		<td class=""><?= lan('actions')?></td>

</tr>
<?php
	
	foreach ($datas as $elem){
	$extraclass='';
	if ($elem["ar"]==0){
		$extraclass='priece0';
	}

	?>
	<tr class="<?= $extraclass?>">
<?php
foreach ($list_term_mezok as $mezo){
?>
	<td class="<?= $mezo ?>"><?= $elem[$mezo] ?></td>
<?php	
}
?>
	<td>
	<a href="<?= $homeurl?>/term/new/<?= encode($elem["id"])?>" class="glyphicon glyphicon-pencil"></a>
	<a href="<?= $homeurl?>/term/list?del=<?= encode($elem["id"])?>" class="glyphicon glyphicon-remove"></a>
	</td>
</tr>
<?php		
	}

	
	
}
?>
</table>
</table>
</table>
</table>

</div>