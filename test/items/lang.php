<?php
function echo_text($text,$tag='',$class='',$lang=''){
	global $langtext,$lang;
	
	if ($tag!='')
	{
		if ($class!='') $cl=' class="'.$class.'"';
		
		$before='<'.$tag.$cl.'>';
		$after='</'.$tag.'>';		
	}
	if ($langtext[$lang][$text]!=''){
		echo $before.$langtext[$lang][$text].$after;
	}
	else{
		echo $before.$langtext['hu'][$text].$after;
	}
}

function get_text($text,$lang=''){
	global $langtext,$lang;
	


	if ($langtext[$lang][$text]!=''){
		return $before.$langtext[$lang][$text].$after;
	}
	else{
		return $before.$langtext['hu'][$text].$after;
	}
}


//nyelvi változók:
$langtext['nl']['search']="Uitgebreid zoeken";
$langtext['nl']['elado']="kopen";
$langtext['nl']['kiado']="huren";

$langtext['hu']['more']='Tovább';
$langtext['hu']['next']='Következő';

$langtext['hu']['login']='Bejelentkezés';
$langtext['hu']['reg']='regisztráció';

$langtext['hu']['user']='felhasználó';
$langtext['hu']['password']='jelszó';
$langtext['hu']['save']='mentés';
$langtext['hu']['submit']='Küldés';
$langtext['hu']['search']='Keresés';



$langtext['hu']['nev']='Név';
$langtext['hu']['firstname']='Családnév';
$langtext['hu']['lastname']='Keresztnév';
$langtext['hu']['middlename']='Középsőnév';

$langtext['hu']['email']='email';
$langtext['hu']['emailsubject']='email tárgy';

$langtext['hu']['email_uzenet']='Ide írja rövid üzenetét';
$langtext['hu']['kuldes']='Küldés';
$langtext['hu']['leiras']='Leírás';

$langtext['hu']['cim']='Cím';
$langtext['hu']['zip']='Irsz.';
$langtext['hu']['city']='Város';
$langtext['hu']['street']='Utca';

$langtext['hu']['iranyar']='Iranyar';
$langtext['hu']['tipus']='Tipus';
$langtext['hu']['jelleg']='Jelleg';

$langtext['hu']['kepek']='Képek';
$langtext['hu']['ingatlan_adatai']='Ingatlan Adatai';
$langtext['hu']['kapcsolat']='Kapcsolat';
$langtext['hu']['helyisegek']='Helyiségek';
$langtext['hu']['terkep']='Térkép';

$langtext['hu']['kozmuvek']='Közművek';
$langtext['hu']['adottsagok']='Adottságok';
$langtext['hu']['tulajdonsagok']='Tulajdonságok';

$langtext['hu']['helyseg']='Helység';
$langtext['hu']['megye']='Megye';
$langtext['hu']['ar_tol']='Ár-tól';
$langtext['hu']['ar_ig']='Ár-ig';



$langtext['hu']['villanyaram']='Áram';
$langtext['hu']['vizellatas']='Víz';
$langtext['hu']['csatorna']='Csatorna';
$langtext['hu']['telefon']='Telefon';
$langtext['hu']['tel']='Tel';
$langtext['hu']['mobil']='Mobil';
$langtext['hu']['fax']='Fax';
$langtext['hu']['tvantenna']='TV';
$langtext['hu']['gazellatas']='Gázellátás';
$langtext['hu']['kilatas']='Kilátás';
$langtext['hu']['komfortfokozat']='Komfort fokozat';
$langtext['hu']['allapot']='Állapot';
$langtext['hu']['kulsoallapot']='Külső állapot';
$langtext['hu']['epitesimod']='Építesi mód';
$langtext['hu']['epitesiev']='Épitési év';
$langtext['hu']['kozoskoltseg']='Közösköltség';
$langtext['hu']['parkolas']='Parkolas';
$langtext['hu']['futes']='Fűtes';
$langtext['hu']['klima']='Klima';
$langtext['hu']['akadalymentesites']='Akadálymentesítes';
$langtext['hu']['butorozottsag']='Butorozottsag';
$langtext['hu']['hasznosalapterulet']='hasznosalapterulet';
$langtext['hu']['telekalapterulet']='Telekalapterulet';
$langtext['hu']['terulet']='Terület';
$langtext['hu']['szobakszama']='Szobákszáma';
$langtext['hu']['felszobakszama']='Félszobákszama';
$langtext['hu']['tovabbihelyisegek']='tovabbihelyisegek';
$langtext['hu']['emelet']='Emelet';
$langtext['hu']['szintek']='Szintek';
$langtext['hu']['energetikaitanusitvany']='Energetikai tanusítvany';
$langtext['hu']['felvono']='Lift';

$langtext['hu']['elerhetoseg']='Elérhetőség';
$langtext['hu']['lakcim']='Cím';

$langtext['hu']['helyisegek']='Helyiségek';
$langtext['hu']['belmagassag']='Belmagasság';
$langtext['hu']['meret']='Méret';
$langtext['hu']['padloburkolat']='padloburkolat';
$langtext['hu']['falburkolat']='falburkolat';


$langtext['hu']['elado']='Eladó';
$langtext['hu']['kiado']='Kiadó';
$langtext['hu']['ingatlan']='ingatlan';
$langtext['hu']['ingatlanok']='ingatlanok';


$langtext['hu']['bigger_map']='Nagyobb térképre váltás';
$langtext['hu']['dowload_vcard']='Vcard letöltése';

/////////////////////////////////////////////////////////////////////////////////////////////////////

$language=$langtext[$lang];


//

$sysmodule=array('name'=>'user','file'=>'login');
$syslang[$sysmodule['name']][$sysmodule['file']]['formname']=$language['login'];
$syslang[$sysmodule['name']][$sysmodule['file']]['uname']=$language['user'];
$syslang[$sysmodule['name']][$sysmodule['file']]['pass']=$language['password'];
$syslang[$sysmodule['name']][$sysmodule['file']]['email']=$language['email'];
$syslang[$sysmodule['name']][$sysmodule['file']]['submit']=$language['login'];

$sysmodule=array('name'=>'user','file'=>'reg');
$syslang[$sysmodule['name']][$sysmodule['file']]['formname']=$language['reg'];
$syslang[$sysmodule['name']][$sysmodule['file']]['nev']=$language['nev'];
$syslang[$sysmodule['name']][$sysmodule['file']]['unev']=$language['user'];
$syslang[$sysmodule['name']][$sysmodule['file']]['pass']=$language['password'];
$syslang[$sysmodule['name']][$sysmodule['file']]['password']=$language['password'];
$syslang[$sysmodule['name']][$sysmodule['file']]['email']=$language['email'];
$syslang[$sysmodule['name']][$sysmodule['file']]['submit']=$language['login'];

function syslang($modules,$file,$text)
{
global $syslang;
return $lang=$syslang[$modules][$file][$text];
}
function echosyslang($modules,$file,$text)
{
global $syslang;
echo $syslang[$modules][$file][$text];
}
//$syslang[$modules["modules"]][$modules["file"]]=$langtext[$lang]['ingatlanok'];
?>