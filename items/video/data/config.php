<?php
$tblmodulom='oldalak';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."web_oldal";
$file_structuct=array();
$file_structuct["modules"]="video";

/*$file_structuct["name"]="oldalak listája";
$file_structuct["file"]="list";
$modules[]=$file_structuct;*/
$file_structuct["name"]="videos list";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="videok";
$file_structuct["file"]="videos";
$modules[]=$file_structuct;

$file_structuct["name"]="Videos";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;


include_once("video.class.php");
$video_class=new video();

$video_class->create_table();

$extrascript[]='
<script type="text/javascript">
			
function Insertigtokce(editorname,img)
{

x=document.getElementById(\'x\').value;
y=document.getElementById(\'y\').value

var addx="";
var addy="";
var addfx="";
var addfy="";

if (x>0){
addx=\'&x=\'+(x*2);
addfx=\' width="\'+x+\'" \';
}

if (y>0){
addy=\'&y=\'+(y*2);
addfy=\' height="\'+y+\'" \';
}

if (document.getElementById(\'mceid\')){
editorname=document.getElementById(\'mceid\').value;	
}
//&x=100&y=100 

CKEDITOR.instances[editorname].insertHtml('."'<img src=\"uploads/picture.php?picture='+img+addx+addy+'\" '+addfx+addfy+'/>'
 );	

}
</script>
";



?>