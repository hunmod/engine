<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
          <section class="col-md-9 col-sm-8">
           <div class="bgcolor1 text">
            <h1>V-card QR-code generator</h1>
            <h2>Telefon névjegy, qr-kódból</h2>
            <form method="post">
            <strong>Név:</strong>
            <?php $Form_Class->textbox('surname',$_REQUEST['surname']);?>
			<?php $Form_Class->textbox('name',$_REQUEST['name']);?><br />
            <strong>Cég:</strong>
            <?php $Form_Class->textbox('ceg',$_REQUEST['ceg']);?><br />
            <strong>Beosztás:</strong>
            <?php $Form_Class->textbox('position',$_REQUEST['position']);?><br />
            <strong>mobil: </strong>
            <?php $Form_Class->textbox('cellno',$_REQUEST['cellno']);?><br />
            <strong>tel(otthon):</strong>
            <?php $Form_Class->textbox('telephone',$_REQUEST['telephoneh']);?><br />
            <strong>tel(munka):</strong>
            <?php $Form_Class->textbox('telephone',$_REQUEST['telephonew']);?><br />
            <strong>web:</strong>
            <?php $Form_Class->textbox('web',$_REQUEST['web']);?><br />
            <strong>email:</strong>
            <?php $Form_Class->textbox('email',$_REQUEST['email']);?><br />
            
            <input name="" type="submit" value="mehet!" />
            </form>
            <?php
            /*
            
            BEGIN:VCARD
            VERSION:2.1
            N:name;Full
            FN:Full name
            ORG:Company name
            TITLE:Job title
            TEL;WORK;VOICE:Business telephone
            TEL;HOME;VOICE:Home telephone
            TEL;CELL;VOICE:Mobile
            TEL;WORK;FAX:Business fax
            ADR;WORK:;Company name;Street address;City;State;Zip;Country
            ADR;HOME:;;Street address;City;State;Zip;Country
            URL;HOME:http://www.personaldomain.com
            URL;WORK:http://www.workdomain.com
            EMAIL;INTERNET:you@firstdomain.com
            EMAIL;INTERNET:you@seconddomain.com
            END:VCARD
            
            BEGIN:VCARD
            VERSION:3.0
            N:Doe;John;;;
            FN:John Doe
            ORG:Example.com Inc.;
            TITLE:Imaginary test person
            EMAIL;type=INTERNET;type=WORK;type=pref:johnDoe@example.org
            TEL;type=WORK;type=pref:+1 617 555 1212
            TEL;type=CELL:+1 781 555 1212
            TEL;type=HOME:+1 202 555 1212
            TEL;type=WORK:+1 (617) 555-1234
            item1.ADR;type=WORK:;;2 Example Avenue;Anytown;NY;01111;USA
            item1.X-ABADR:us
            item2.ADR;type=HOME;type=pref:;;3 Acacia Avenue;Newtown;MA;02222;USA
            item2.X-ABADR:us
            NOTE:John Doe has a long and varied history\, being documented on more police files that anyone else. Reports of his death are alas numerous.
            item3.URL;type=pref:http\://www.example/com/doe
            item3.X-ABLabel:_$!<HomePage>!$_
            item4.URL:http\://www.example.com/Joe/foaf.df
            item4.X-ABLabel:FOAF
            item5.X-ABRELATEDNAMES;type=pref:Jane Doe
            item5.X-ABLabel:_$!<Friend>!$_
            CATEGORIES:Work,Test group
            X-ABUID:5AD380FD-B2DE-4261-BA99-DE1D1DB52FBE\:ABPerson
            END:VCARD
            */
            
            if (isset($_REQUEST["name"])){
            $vcard = "BEGIN:VCARD\r\nVERSION:3.0\r\n";
            $vcard.= "N:" . $_REQUEST['surname'] . ";" . $_REQUEST['name'] . "\r\n";
            $vcard.= "FN:" . $_REQUEST['name'] . " " . $_REQUEST['surname'] . "\r\n";
            if ($_REQUEST['ceg']!="")$vcard.= "ORG:" . $_REQUEST['ceg'] . "\r\n";
            if ($_REQUEST['position']!="")$vcard.= "TITLE:" . $_REQUEST['position'] . " \r\n";
            if ($_REQUEST['telephoneh']!="")$vcard.= "TEL;TYPE=home,voice:" . $_REQUEST['telephoneh'] . "\r\n";
            if ($_REQUEST['telephonew']!="")$vcard.= "TEL;TYPE=work,voice:" . $_REQUEST['telephonew'] . "\r\n";
            if ($_REQUEST['cellno']!="")$vcard.= "TEL;TYPE=cell,voice:" . $_REQUEST['cellno'] . "\r\n";
            if ($_REQUEST['web']!="")$vcard.= "URL;TYPE=work:" . $_REQUEST['web'] . "\r\n";
            if ($_REQUEST['email']!="")$vcard.= "EMAIL;TYPE=internet,pref:" . $_REQUEST['email'] . "\r\n";
            $vcard.= "END:VCARD";
            ?>
            <image alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($vcard);?>&size=3&level=S"><br>
            <?php
            }
            ?>
</div>
</section>
</div>