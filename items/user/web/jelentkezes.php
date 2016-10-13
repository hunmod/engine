
<style>
.flabel
{
	margin-top:8px;
	margin-bottom:3px;
	font-weight:bold;
}
.subejt{
 display:inline;
 font-size:12px;
 color:#CF3;	
}
h3{
margin-top:15px;
margin-bottom:10px;
}
</style>
<div class="bgcolor1 text">

<h1>Jelentkezési feltételek</h2>
<div>
  <p>Betöltött 18 éves életkor. <br />
    Háziorvosi, sportorvosi, vagy csapat orvosi igazolás, hogy  fizikailag terhelhető vagy, valamint, hogy nincs eltitkolt betegséged. <br />
    Rendelkezel kitöltött és visszaküldött jelentkezési lappal,  elfogadtad és aláírtad a mellékelt jogi nyilatkozatban foglalt részvételi  szabályzatot és befizetted a részvételi díjat. <br />
    Beleegyezel ,hogy a képzésen felvételeket készíthet mind az  ELITE CHALLENGE, mind pedig az általuk engedélyezett média. <br />
    Rendelkezel ELITE CHALLENGE ajándékjeggyel vagy  belépőjeggyel a POKOLBA, amit a helyszínen kell majd bemutatnod. </p><br />

  <p>    <br />
    Fizikai felmérő:<br />
    3200m síkfutás max. 15:42 alatt <br />
    Fekvőtámasz min. 54 ismétlés szám 2 percen belül (csak a  szabályos végrehajtást fogadjuk el) <br />
    Felülés min. 68 ismétlés szám 2 percen belül (csak a  szabályos végrehajtást fogadjuk el) <br />
    200 méter úszás 5 perc alatt, (gyakorlónadrágban és  zubbonyban kerül végrehajtásra) <br />
    Húzódzkodás min. 6 ismétlés <br />
    5 km-es kötelékfutás gyakorlóban, bakancsban fegyver  makettel max. 32 perc alatt, a trénerek által diktált tempóban </p>
  <p>A felvételi feladatok egymás után, a lehető legkevesebb  holtidővel kerülnek felmérésre. A futó számok kivételével maximum összesen két  felmérési eredmény lehet 10%-al gyengébb, mint a bekerülési szint. Ezek  javítására az első nap még újra lehetőség nyílik és ismét felmérésre kerülnek.  A bekerülési szintek elérésének másodszori elmulasztása a programból történő  automatikus kiesést eredményez.<br />
    Csak a fizikai felvételi sikeres teljesítése után  folytathatod a programot!<br /><br />

    <p>
    <img src="uploads/_chalange/525746_594416657271010_1338762906_n.jpg"  height="320"/> 
    <img src="uploads/_chalange/400639_529420220437321_1225019303_n.jpg" height="320" />     
    </p>
</div>
<div class="atencion" style="font-family:Arial;">
  <p><strong>FONTOS! </strong></p>

<div>
  <p><strong>Tisztelt jelentkezők! 
  
<br /><br />
Az ELITE CHALLENGE program következő végrehajtása, az EC <?= $elitenum; ?>. <?= $elitejel; ?> között kerül lebonyolításra.<br />
<br />
Jelentkezési határidő <?= $elitehat; ?>. Az ezek után történő jelentkezésekre és lemondásokra már nem tudjuk vállalni a foglaló feletti befizetés visszautalását.<br />
<br />
  
  
  Felhívjuk a figyelmet, hogy programunk belépési díja 2014. január 01-től bruttó <?= $elitear; ?> Ft áron kapható! <br />
  A regisztrációhoz a belépőjegy egyösszegű kiegyenlítése szükséges.<br /><br />
    A jelentkezés csak a kitöltött on-line jelentkezési lap visszaküldése után, az átutalt teljes <?= $elitear; ?> FT részvételi díj számlaszámunkra történő beérkezését követően érvényes.  
	  A résztvevők helyének és a program lebonyolításának biztosítása érdekében, a jövőben kizárólag a teljes belépesi díj összegének befizetése ellenében tudjuk biztosítani a belépőkhöz tartozó helyeket és felszerelési tárgyak foglalását, biztosítását.</p>
<br />
	  Katonáknak, Rendőröknek, Tűzoltóknak, Mentősöknek továbbra is 20% kedvezményt biztosítunk! Kérjük a jelentkezőket, hogy a részvételi díjat legkésőbb a jelentkezési határidő lejártáig befizetni szíveskedjenek, melynek kiegyenlítése után küldjük meg a jelentkező általános felkészülési csomagját. Ennek része egy öthetes fizikai felkészülési program, valamint a felszerelési lista, a belépőjegy és megszívlelendő tanácsok a felkészüléshez. Minden esetben e-mailben igazoljuk vissza a befizetett részvételi díj, valamint a kitöltött jelentkezési lap megérkezését.
<br /><br />
<strong>Figyelem! Kérjük még időben gondoskodjanak a belépési díj utalásáról, hogy elegendő idejük álljon rendelkezésre a fizikai felkészülési program végrehajtására! A programra családorvosi, vagy sportorvosi igazolást kérünk, mellyel igazolják, hogy fertőző betegségben nem szenvednek, valamint fizikailag terhelhetők.</strong>
	  <br />
	  <br />
	  <br />
</div> 

<div>
  <p><strong>RÉSZVÉTELI DÍJ ÁTUTALÁSA: </strong></p>
</div>
<div>
  <p><strong>Kedvezményezett : DEFEX Magyarország Kft. </strong></p>
</div>
<div>
  <p><strong>Számlavezető bank: Szigetvári Takarékszövetkezet </strong></p>
</div>
<div>
  <p><strong>Számlaszám: 50800111-11174101-00000000 </strong></p>
</div>
<div>
  <p><strong>Közleménybe írja be: <?= $elitenum; ?>. ELITE CHALLENGE- AZ ÖN NEVE (teljes)</strong></p>	  <br />

</div>
</div>
<p><img src="uploads/_chalange/jelentkezz.jpg"  width="960"/>&nbsp; </p>   
<div>
<?php
$postdata=$_POST;
//arraylist($postdata);
if ( 
($postdata["nev"]!="") && 
($postdata["szulido"]!="") && 
($postdata["igszam"]!="") && 
($postdata["tel"]!="") && 
($postdata["szulido"]!="") && 
(isValidEmail($postdata["email"], true) ) 
)
{
$emailtext="";
$emailtext="<br />
<h1>Jelentkezési igényét megkaptuk!</h1>
<br />
<hr />
<strong>Név:</strong> ".$postdata["nev"]."<br />
<strong>Szül.:</strong> ".$postdata["szulido"]."<br />
<strong>Személyi igazolvány szám:</strong> ".$postdata["igszam"]."<br />
<strong>telefonszám:</strong> ".$postdata["tel"]."<br />
<strong>e-mail cím:</strong> ".$postdata["email"]."<br />
<strong>Cím:</strong> ".$postdata["country"]." ".$postdata["zip"]." ".$postdata["allam"]." ".$postdata["varos"]." ".$postdata["cim"]."<br />
<hr />
<strong>Vércsoport:</strong> ".$postdata["blood"]."<br />
<strong>Gyógyszer érzékenység, ismert allergia:</strong> ".$postdata["allergy"]."<br />
<strong>Ismert betegsége, régi sérülése:</strong> ".$postdata["seek"]."<br />
<strong>TB azonosító jel:</strong> ".$postdata["tb"]."<br />
<strong>Kiértesítendő személy telefonszáma:</strong> ".$postdata["sosnum"]."<br />
<strong>Kedvezmény igénybevétel:</strong> ".$postdata["kedvezmeny"]."
<br />
<hr />
<h2>RÉSZVÉTELI DÍJ ÁTUTALÁSA:</h2><br />
<strong>Kedvezményezett:</strong> DEFEX Magyarország Kft. <br />
<strong>Számlavezető bank:</strong> Szigetvári Takarékszövetkezet<br /> 
<strong>Számlaszám:</strong> 50800111-11174101-00000000<br />
<strong>Közleménybe írja be:</strong> ".$elitenum.". ELITE CHALLENGE- AZ ÖN NEVE (teljes)<br />
<br>
Elite Challenge<br />
http://elitechallenge.hu
";
echo "<h1>Köszönjük jelentkezését!</h1>";
emailkuldes($postdata["email"],$postdata["nev"],"Jelentkezes Elite Challenge",$emailtext);	
emailkuldes("elite.challengeprogram@gmail.com",$postdata["nev"],"Jelentkezes Elite Challenge",$emailtext);	

}
else{
?>
</div><br />
<br />

<div align="center">
<h1><?= $elitenum; ?>. Elite Challenge jelentkezési lap</h1>

</div>
<br />
<br />
<h3>Személyi adatok:</h3>
<br />
A szerződéshez szükséges személyi adatok. Adatait az adatkezelési törvény szerint, bizalmasan kezeljük! Harmadik fél számára nem adjuk ki!</li>
<form action="" method="post">
<div class="flabel">Az Ön neve: *</div>
<?php $thisfield="nev";
if ( $postdata["nev"]!="") { $errorclass="error";} else {$errorclass="";}
?>
<input type="text" class="<?php echo $errorclass?>"  name="<?php echo $thisfield?>" value="<?php echo $postdata[$thisfield]?>" required>
<div class="subejt">Családi és utónév</div>
<div class="flabel">Születési idő: *</div>
<?php $thisfield="szulido";
if ( $postdata[$thisfield]!="") { $errorclass="error";} else {$errorclass="";}
 ?>
<input type="text" name="<?php echo $thisfield?>" value="<?php echo $postdata[$thisfield]?>" required>

<script type="text/javascript">
  // call setMask function on the document.ready event
  jQuery(function($) {
    $('input[name="szulido"]').setMask("2999-99-99");
  });  
</script>
<div class="subejt">Év, hónap, nap </div>


<div class="flabel">Személyi igazolvány szám: *</div>
<?php $thisfield="igszam" ;
if ( $postdata[$thisfield]!="") { $errorclass="error";} else {$errorclass="";}
?>
<input type="text" name="<?php echo $thisfield?>" value="<?php echo $postdata[$thisfield]?>" required>
<div class="subejt">Személyi igazolvány,( útlevél száma külföldi állampolgár esetén)</div>


<div class="flabel">Az ön telefonszáma: *</div>
<?php $thisfield="tel" ;
if ( $postdata[$thisfield]!="") { $errorclass="error";} else {$errorclass="";}
?>
+<input type="text" name="<?php echo $thisfield?>" value="<?php echo $postdata[$thisfield]?>" required>

<script type="text/javascript">
  // call setMask function on the document.ready event
  jQuery(function($) {
    $('input[name="tel"]').setMask("99/99 999 9999");
  });  
</script>
<div class="subejt">+36/30 666 3333 formátumban !</div>

<div class="flabel">Az ön e-mail címe *</div>
<?php $thisfield="email" ;
if ( $postdata[$thisfield]!="") { $errorclass="error";} else {$errorclass="";}
?>
<input type="email" name="<?php echo $thisfield?>" value="<?php echo $postdata[$thisfield]?>" required>
<div class="subejt">Létező e-mail címet adjon meg. Ezen a megadott címmel tartjuk a kapcsolatot.</div>

<h3>Az Ön lakcíme: (Postázási cím)</h3>
<div class="flabel">Cím</div>
<?php
$fieldname="cim";
textbox($fieldname,$postdata[$fieldname]);
?> 
<div class="flabel">Város</div>
<?php
$fieldname="varos";
textbox($fieldname,$postdata[$fieldname]);
?> 
<div class="flabel">Állam / tartomány / régió</div>
<?php
$fieldname="allam";
textbox($fieldname,$postdata[$fieldname]);
?> 
<div class="flabel">Postai / irányítószám</div>
<?php
$fieldname="zip";
textbox($fieldname,$postdata[$fieldname]);
?> 
<script type="text/javascript">
  // call setMask function on the document.ready event
  jQuery(function($) {
    $('input[name="zip"]').setMask("9999");
  });  
</script>
<div class="flabel">Ország</div>
              <select name="country" id="country">
                <option value="" selected="selected"></option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombi">Colombi</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                <option value="Congo">Congo</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote d\'Ivoire">Cote d\'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor (Timor Timur)">East Timor (Timor Timur)</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia, The">Gambia, The</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, North">Korea, North</option>
                <option value="Korea, South">Korea, South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepa">Nepa</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent">Saint Vincent</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
<br />

<h3>Egészségügyi adatok:</h3>
Egészségügyi adatok. Adatait az adatkezelési törvény szerint, bizalmasan kezeljük! Harmadik fél számára nem adjuk ki!<br />

<div class="flabel">Vércsoport:</div>
<?php
$fieldname="blood";
textbox($fieldname,$postdata[$fieldname]);
?> 
<div class="flabel">Gyógyszer érzékenység, ismert allergia: *</div>
<?php
$fieldname="allergy";
textbox($fieldname,$postdata[$fieldname]);
?>
<div class="flabel">Ismert betegsége, régi sérülése: *</div>
<?php
$fieldname="seek";
textbox($fieldname,$postdata[$fieldname]);
?> 
<div class="subejt">Olyan betegségek, melyek nem kizáró okai a programnak. A jelentkező terhelhető! Ha nincs, vagy nem tud róla, azt is írja le.</div>


<div class="flabel">TB azonosító jel: *</div>
<?php
$fieldname="tb";
textbox($fieldname,$postdata[$fieldname]);
?> 

<div class="flabel">Kiértesítendő személy telefonszáma: *</div>
+<?php
$fieldname="sosnum";
textbox($fieldname,$postdata[$fieldname]);
?><div class="subejt">+36/30 666 3333 formátumban !</div> 
<script type="text/javascript">
  // call setMask function on the document.ready event
  jQuery(function($) {
    $('input[name="sosnum"]').setMask("99/99 999 9999");
  });  
</script>

<div class="flabel">Kedvezmény igénybevétel *</div>
              <input type="radio" name="kedvezmeny" id="kedvezmeny" value="- 20 % Katona, Rendőr, Tűzoltó,Mentő egyéb hivatásos szolgálattevő" />
- 20 % Katona, Rendőr, Tűzoltó,Mentő egyéb hivatásos szolgálattevő
              <br /><input type="radio" name="kedvezmeny" id="kedvezmeny" value="Nincs kedvezményem" />
 Nincs kedvezményem<br />
<div class="subejt">A kedvezmények igénybevételét a program megkezdése előtt a helyszínen igazolni kell.</div>
  <div class="clear"></div>
<br />

<input name="" type="submit" value="Jelentkezem" />
</form>
</div>
  <div class="clear"></div>
<br />

<div class="bgcolor1 text">
  <p>Büntetőjogi felelősségem tudatában kijelentem, hogy az általam megadott adatok, és információk a valóságot tartalmazzák, a programon történő részvételemet akadályozó eltitkolt  betegségem nincs. Kijelentem továbbá, hogy a programon kizárólag saját akaratomból és elhatározásból kívánok részt venni, melynek ellenértékeként a részvételi díjat, mint egyösszegű foglalót befizetem. Amennyiben akadályoztatásom esetén a megjelölt programon nem tudok részt venni, azt a program kezdetét három héttel megelőzően, a szervezők felé írásban, vagy telefonon jelzem. Tudomásul veszem, hogy a tevékenységek során alkoholt, ajzószereket , teljesítménynövelő szereket, házi orvos által fel nem írt gyógyszereket vagy bódító, kábító hatású készítményt nem fogyaszthatok, illetve ezek hatása alatt a programokon nem vehetek részt. A program alatt magamra kötelező érvényűnek ismerem el a program viselkedési és magatartási szabályait és a trénerektől kapott utasításokat. A kötelező óvó, és biztonsági szabályokat nem szegem meg, a trénerek és programvezető utasításait maradéktalanul betartom, az előírt védő felszerelést rendeltetésszerűen használom. Vállalom továbbá, hogy a fenti szabályok és/vagy kapott utasítások be nem tartása esetén minden, önhibámból keletkezett kár és sérülés miatt a felelősség kizárólag engem terhel.  Amennyiben a rám bízott felszerelés a nem rendeltetésszerű használat vagy gondatlanság miatt saját hibámból sérül meg, vész el, vagy rongálódik meg, a keletkezett kárt, vagy javítási költséget megtérítem. A foglaló jogi természetével tisztában vagyok és tudatában vagyok annak, hogy jelentkezésem visszamondása esetén a foglaló összege  nem jár vissza. Tudomásul veszem, hogy a programba történő bekerülésem és/vagy az abból való kiesésem esetén a befizetett részvételi díj nem jár vissza, erről a programra történő jelentkezésem előtt tájékoztatást kaptam, s kijelentem, hogy a program szervezőivel, és/vagy annak résztvevőivel szemben történő bármely jellegű követelésről és/vagy jogorvoslatról lemondok.</p>
</div>
<?php }?>
<div>
  <p><strong>Ha a jelentkezési lapod  és a foglalód megérkezett, küldjük a felkészülési programunkat. A belépőjegyet csak a teljes részvételi díj befizetése után postázzuk. </strong></p>
</div>
