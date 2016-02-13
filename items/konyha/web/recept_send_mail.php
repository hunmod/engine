<?php 
$elem=$recept_data;
//arraylist($elem);
	$mappa=$folders["uploads"]."konyha/".$elem["id"];
	$img=$rec_class->recipe_img($filters["id"],400,300);
/*	if ($img!="none"){
	$img="http://".$_SERVER["HTTP_HOST"]."/"."uploads/picture.php?picture=".encode($mappa."/".$img)."&x=200&ext=.jpg";
	}
	else{
	$img="http://".$_SERVER["HTTP_HOST"]."/"."uploads/".$defaultimg;
	}*/
 $message='
<style>
a{
	text-decoration:none;
	color:#000;
}
.energia{
background:#C1F0FF;
display:block;
width:100%;
}
.kaloria{
background:#CCFDD1;	
display:block;
width:100%;
}
.szenhidrat{
background:#FFDBAE;	
display:block;
width:100%;
}
.feherje{
background:#FFC;	
display:block;
width:100%;
}
.zsir{
background:#FFFBDD;	
display:block;
width:100%;
}
.rost{
background:#F7CBFE;	
display:block;
width:100%;
}
.koleszterin{
background:#E1D7FF;	
display:block;
width:100%;
}
</style>
';
$message.='
 <h2 class="cim bgcolor0" itemprop="name">'.$Text_Class->htmlfromchars($elem["nev"])."<br>".'</h2>
<table width="100%" border="0">
  <tr>
    <td width="200">
	    <a href="'.$rec_class->recipe_url($elem).'" target="_blank" >
	<img src="'. $img.'" alt="'. $elem["nev"].'" title="'. $elem["nev"].'" width="200"/></a>
    </td>
    <td>
 <div><span><strong>Tápérték / 100g</strong></span></div>
<div><span class="energia"><strong>Energia:</strong> '. $elem["energia"].'</span></div>
  <div><span class="kaloria"><strong>Kalória:</strong> '. $elem["kaloria"].'</span></div>
  <div><span class="szenhidrat"><strong>Szénhidrát:</strong> '. $elem["szenhidrat"].'</span></div>
  <div><span class="feherje"><strong>Fehérje:</strong> '. $elem["feherje"].'</span></div>
  <div ><span class="rost"><strong>Rost:</strong> '. $elem["rost"].'</span></div>
  <div ><span class="koleszterin"><strong>Koleszterin:</strong> '. $elem["koleszterin"].'</span></div>
  <div><span class="zsir"><strong>Zsir:</strong> '. $elem["zsir"].'</span></div>   
<br />';
if ($elem["gluten"]){$message.= '<span>Glutén mentes</span>&nbsp;';} 
if ($elem["diab"]){$message.= '<span>Cukor mentes</span>&nbsp;';}   
if ($elem["lactose"]){$message.= '<span>Laktóz mentes&nbsp;';} 
$message.= '<tr>
    <td colspan="2">'.$Text_Class->htmlfromchars($elem["leiras"]).'</td>
  </tr>
</table>
    <a href="'.$rec_class->recipe_url($elem).'" target="_blank" >Tovább</a>';

 echo $message;

if ($_REQUEST["email"]!="")
{
	if ($_REQUEST["s"]==""){
		emailkuldes($_REQUEST["email"]," ",$Text_Class->htmlfromchars($elem["nev"]),$message);	
	}
	else{
		emailkuldes_silent($_REQUEST["email"]," ",Recept,$message);
	}
}

?>