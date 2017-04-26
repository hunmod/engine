<?php
//hirek
/*	if ($getparams[0]=='hirek' && $getparams[1]!='edittext' && $getparams[1]!='lista'&& $getparams[1]!='list')
	{
		$gp=$getparams;
		$getparams=array();	
		$getparams[0]='hirek';
		$getparams[1]='list';
		foreach($gp as $gpp){
			if ($gpp!='hirek'&&$gpp!='list')$getparams[]=$gpp;
		}
	}
*/
	if ($getparams[0]=='hir' )
	{
		$gp=$getparams;
		$getparams=array();	
		$getparams[0]='hirek';
		$getparams[1]='hir';
		foreach($gp as $gpp){
			if ($gpp!=$getparams[0] && $gpp!=$getparams[1])$getparams[]=$gpp;
		}
	}	
	if ($getparams[0]=='blog' )
	{
		$gp=$getparams;
		$getparams=array();	
		$getparams[0]='page';
		$getparams[1]='hir';
		foreach($gp as $gpp){
			if ($gpp!=$getparams[0] && $gpp!=$getparams[1])$getparams[]=$gpp;
		}
	}
/*
	if ($getparams[0]=='konyha' && $getparams[1]!='edit' )
	{
		$gp=$getparams;
		$getparams=array();	
		$getparams[0]='konyha';
		$getparams[1]='list';
		foreach($gp as $gpp){
			if ($gpp!='konyha'||$gpp!='recept'||$gpp!='list')$getparams[]=$gpp;
		}	
	}
*/
	if ($getparams[0]=='recept' )
	{
		$gp=$getparams;
		$getparams=array();	
		$getparams[0]='konyha';
		$getparams[1]='recept';
		foreach($gp as $gpp){
			if ($gpp!=$getparams[0] &&$gpp!=$getparams[1])$getparams[]=$gpp;
		}	
	}
/*
if ($getparams[0]=='recept' )
	{
		$gp=$getparams;
		$getparams=array();
		$getparams[0]='gmrec';
		$getparams[1]='recept';
		foreach($gp as $gpp){
			if ($gpp!=$getparams[0] &&$gpp!=$getparams[1])$getparams[]=$gpp;
		}
	}*/
?>