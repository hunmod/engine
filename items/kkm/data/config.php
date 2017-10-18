<?php
$file_structuct = array();
$file_structuct["modules"] = "kkm";


$file_structuct["name"] = "Kaland játék";
$file_structuct["file"] = "start";

$modules[] = $file_structuct;

function striptextkkm1($text){
    global $homeurl,$storryid;
    $elem= str_replace(array('lapozz az ','lapozz a ','Lapozz a ','Lapozz  a ','Lapozza a ','Lapozza  a ','Lapozza ','lapozz a ','lapozz a','lapozz  a ','Lapozz a z '),'Lapozz a <lnum>',$text);
    $elem= str_replace(array('Lapozz vissza a ','lapozz vissza a '),'Lapozz vissza a <lnum>',$elem);
    $elem= str_replace(array('lapozz az ','Lapozz az ','Lapozz  az '),'Lapozz a <lnum>',$elem);
    $elem= str_replace(array('<lnum><lnum>'),'<lnum>',$elem);
    $elem= str_replace(array('  ',' '),' ',$elem);
    $elem= str_replace(array('-re','-ra'),array('</lnum>-re','</lnum>-ra'),$elem);
    $elem= str_replace(array('- re','- ra'),array('</lnum>-re','</lnum>-ra'),$elem);
    $elem= str_replace('src="','src="'.$homeurl.'/items/kkm/web/'.$storryid."/",$elem);
return $elem;
}


?>