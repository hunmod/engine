<div class="container text-center">
<h1>Cím</h1>
</div>

<?php
$filterss["status"]=2;
$sliderelements=$class_slider->get($filterss);
?>
<slider>
        	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
			  <?php
			  $active=" active";
			  $c=0;
foreach($sliderelements["datas"] as $slider){?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $c; ?>" class="<?= $active;?>"></li>
<?php
$c++;
$active="";
} ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

			  <?php
			  $active=" active";
foreach($sliderelements["datas"] as $slider){
			$img="picture2.php?picture=".encode($slider['imgurl'])."";
?>
                <div class="item <?php echo $active;?>">
                  <img src="<?php echo $server_url.$img;?>&x=980&y=420" class="img-responsive"  alt="<?php echo $slider["name_".$_SESSION['lang']]; ?>">
				  <a href="<?php echo $slider["url_".$_SESSION['lang']]; ?>">
                  <div class="carousel-caption">
                    <h2><?php echo $slider["name_".$_SESSION['lang']]; ?></h2>
					<p><?php echo $slider["description_".$_SESSION['lang']]; ?></p>
                  </div>
				  </a>
                </div>
<?php
$active="";
} ?>

              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
</slider>
<div class="container">

<div class="col-sm-8 col-xs-12">

<h3>Mi a Lorem Ipsum?</h3>

<p>
A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.
</p>
<p>
Miért használjuk?
Ez egy régóta elfogadott tény, miszerint egy olvasót zavarja az olvasható szöveg miközben a szöveg elrendezését nézi. A Lorem Ipsum használatának lényege, hogy többé-kevésbé rendezettebb betûket tartalmaz, ellentétben a Tartalom helye, Tartalom helye-féle megoldással. Sok desktop szerkesztõ és weboldal szerkesztõ használja a Lorem Ipsum-ot mint alapbeállítású szövegmodellt, és egy keresés a lorem ipsum-ra sok félkész weboldalt fog eredményezni.

</p>
<p>
Honnan származik?
A hiedelemmel ellentétben a Lorem Ipsum nem véletlenszerû szöveg. Gyökerei egy Kr. E. 45-ös latin irodalmi klasszikushoz nyúlnak. Richarrd McClintock a virginiai Hampden-Sydney egyetem professzora kikereste az ismeretlenebb latin szavak közül az egyiket (consectetur) egy Lorem Ipsum részletbõl, és a klasszikus irodalmat átkutatva vitathatatlan forrást talált. A Lorem Ipsum az 1.10.32 és 1.10.33-as de Finibus Bonoruem et Malorum részleteibõl származik (A Jó és Rossz határai - Cicero), Kr. E. 45-bõl. A könyv az etika elméletét tanulmányozza, ami nagyon népszerû volt a reneszánsz korban. A Lorem Ipsum elsõ sora, Lorem ipsum dolor sit amet.. a 1.10.32-es bekezdésbõl származik.
</p>
       <img class="img-responsive" src="https://media-cdn.tripadvisor.com/media/photo-o/02/1d/cf/18/hotel-exterior.jpg" alt="title">

<h3>Mi a Lorem Ipsum?</h3>

<p>
A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.
</p>
<p>
Miért használjuk?
Ez egy régóta elfogadott tény, miszerint egy olvasót zavarja az olvasható szöveg miközben a szöveg elrendezését nézi. A Lorem Ipsum használatának lényege, hogy többé-kevésbé rendezettebb betûket tartalmaz, ellentétben a Tartalom helye, Tartalom helye-féle megoldással. Sok desktop szerkesztõ és weboldal szerkesztõ használja a Lorem Ipsum-ot mint alapbeállítású szövegmodellt, és egy keresés a lorem ipsum-ra sok félkész weboldalt fog eredményezni.

</p>
<p>
Honnan származik?
A hiedelemmel ellentétben a Lorem Ipsum nem véletlenszerû szöveg. Gyökerei egy Kr. E. 45-ös latin irodalmi klasszikushoz nyúlnak. Richarrd McClintock a virginiai Hampden-Sydney egyetem professzora kikereste az ismeretlenebb latin szavak közül az egyiket (consectetur) egy Lorem Ipsum részletbõl, és a klasszikus irodalmat átkutatva vitathatatlan forrást talált. A Lorem Ipsum az 1.10.32 és 1.10.33-as de Finibus Bonoruem et Malorum részleteibõl származik (A Jó és Rossz határai - Cicero), Kr. E. 45-bõl. A könyv az etika elméletét tanulmányozza, ami nagyon népszerû volt a reneszánsz korban. A Lorem Ipsum elsõ sora, Lorem ipsum dolor sit amet.. a 1.10.32-es bekezdésbõl származik.
</p>

</div>
<div class="col-sm-4 col-xs-12 leftcol">
<?php include ('csomag.php');?>
<?php include ('csomag.php');?>
<?php include ('csomag.php');?>
<?php include ('csomag.php');?>
<?php include ('csomag.php');?>
<?php include ('csomag.php');?>
<?php include ('csomag.php');?>

</div>

</div>
<script>
    function carusel_top(){
        if ($( 'body' ).width()>742) {
            //console.log($( 'body' ).width());
            var caruselheight = ($('.carousel-inner').height());
            if (caruselheight>0)$(".leftcol").css({'margin-top': '-' + (caruselheight+1) + 'px'});
        }else{
            $(".leftcol").css({'margin-top': '0px'});
        }
    }
    $( window ).resize(function() {
        carusel_top();    });

    $( window ).load(function() {
        carusel_top();
        });
</script>