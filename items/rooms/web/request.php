<div class="container order">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl; ?>"><?= lan('home'); ?></a> >
        <a href="<?php echo $homeurl . '' . $separator . shorturl_get("rooms/list/"); ?>"> <?= lan('ajanlat'); ?></a>
        >
        <span><?php echo "" . ($adat["order"]); ?></span>
    </div>
    <div>
    <h2><?= lan('ajalatkeres');?></h2>
    </div>
    <div class="col-xs-8">

    <form method="post">

        <?php
        include('userdata_form.php');

         if($getparams[3]){
            $FormClass->hiddenbox($getparams[3], $getparams[2], lan($getparams[3]));
        ?>
             <div class="clearfix"></div>
             <div class="row"><br></div>
        <div class="clearfix"></div>
        <div  class="priecelist">
            <?php foreach ($rooms as $roomdatas) {
                //lenesarray['datas'][0];
                // arraylist($roomdatas);
               // arraylist($_SESSION);

                include('formelement_order_room3.php');
                $susuccsomagf['lang']=$_SESSION['lang'];
                $susuccsomagf['room']=$roomdatas['id'];
                $susuccsomagf['fromshow']=$_SESSION['from'];
                $susuccsomagf['toshow']=$_SESSION['to'];
//echo $_SESSION['from'];
//echo $_SESSION['to'];

                ?>
                <?php
                $c++;
            } ?>
            <?php foreach ($csomagok as $csomag) {
                if ($c==0){$c='0';}
                $csomag["connectedservices"]=csomagtags_json_from($csomag);
                // arraylist($elem["connectedservices"]['services']['rooms']);
                //rooms
                foreach ($csomag["connectedservices"]['services']['rooms'] as $room){
                    $filterssubroom['lang'] = $_SESSION['lang'];
                    $order['rooms'][$c]["id"] = $filterssubroom['id'] = $room['id'];
                    $order['rooms'][$c]["csomagid"]=$csomag['id'];
                    $order['rooms'][$c]["person"]=2-$order['rooms'][$c]["foglalt"];
                    $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');
                    $roomdatas=$ideglenesarray['datas'][0];
                    // arraylist($roomdatas);
                    include('formelement_order_room3.php');
                    $c++;
                }
                ?>
                <?php
            }
?>
        </div>
             <div class="clearfix"></div>

             <?php
        }

        //arraylist($rooms);
        /*
        ?>
        <div class="clearfix"></div>
        <div  class="priecelist">
            <?php foreach ($rooms as $roomdatas) {
                 //lenesarray['datas'][0];
                // arraylist($roomdatas);
                include('formelement_order_room2.php');
            ?>
        <?php
        $c++;
        } ?>


        <?php foreach ($csomagok as $csomag) {
            if ($c==0){$c='0';}
                $csomag["connectedservices"]=csomagtags_json_from($csomag);
              // arraylist($elem["connectedservices"]['services']['rooms']);
                    //rooms
                 foreach ($csomag["connectedservices"]['services']['rooms'] as $room){
                     $filterssubroom['lang'] = $_SESSION['lang'];
                     $order['rooms'][$c]["id"] = $filterssubroom['id'] = $room['id'];
                     $order['rooms'][$c]["csomagid"]=$csomag['id'];
                     $order['rooms'][$c]["person"]=2-$order['rooms'][$c]["foglalt"];
                     $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');
                     $roomdatas=$ideglenesarray['datas'][0];
                    // arraylist($roomdatas);
                        include('formelement_order_room2.php');
                     $c++;
                 }
                ?>
        <?php
        } */
        //arraylist($order);
        ?>

        <div class="clearfix"></div>


        <input type="submit" class="btn btn-creme">
        <div class="clearfix"></div>
        <?php
        if ($susuccsomagf){
            ?>
            <h2><?= lan('ajanlat');?></h2>
            <div class="clearfix"></div>

        <?php
        //csomagajanlat
        $susuccsomaga=$CsomagClass->get($susuccsomagf);
        //      arraylist($susuccsomaga["datas"]);
        foreach($susuccsomaga["datas"] as $elem){
            include('items/csomag/web/csomag_display2_2.php');
        }
        }
        ?>
    </form>
</div>
<div class="col-xs-4">
    Ide jön egy extra elem
</div>
</div>
<?php
function lanxtra($text,$lancode){
    global $lang_Class;
    switch ($lancode) {
        case 'hu':
            $xlslangid = 1;
            break;
        case 'de':
            $xlslangid = 2;
            break;
        case 'en':
            $xlslangid = 3;
            break;

    }
    $inputFileName = './lang.xls';
    $lanxtra= $lang_Class->xlstoarray($inputFileName, $xlslangid);

    return $lanxtra[$text];
}
$elang='en';

//var_dump(lanxtra('nev',$elang));
if ($_POST["email"]) {
    //arraylist($_SESSION);
   // $_SESSION['lang']='hu';
    $postdatas=$_POST;
    $emailtext.=lanxtra('nev',$elang).': '.$postdatas['name'].'<br>';
    $emailtext.=lanxtra('email',$elang).': '.$postdatas['email'].'<br>';
    $emailtext.=lanxtra('tel',$elang).': '.$postdatas['tel'].'<br>';
    $emailtext.=lanxtra('erkezes',$elang).': '.$postdatas['erkezes'].'<br>';
    $emailtext.=lanxtra('tavozas',$elang).': '.$postdatas['tavozas'].'<br>';
    $emailtext.=lanxtra('ejszam',$elang).': '.$postdatas['ejszam'].'<br>';
    $emailtext.=lanxtra('felnott',$elang).': '.$_SESSION['felnott'].'<br>';
    $emailtext.=lanxtra('gyerek',$elang).': '.$_SESSION['gyerek'].'<br>';

    if (count($postdatas['child']))
        $emailtext .= lanxtra('gyerek',$elang).'<br>';
     foreach ($postdatas['child'] as $gyerek){
        $emailtext .=  $gyerek['birth'] .'('. $gyerek['age'] . ')<br>';
    }


if ($postdatas['room']){$postdatas['rooms'][]=$postdatas['room'];}



   if ($filtercsomag['id'] ){
       $csomagok[0];
       $emailtext.=lanxtra('csomag',$elang).': '.$csomagok[0]['title'].'<br>';

       if($postdatas['room']){
               $ideglenesarray = $filterssubroom=array();
               $filterssubroom['lang'] = $_SESSION['lang'];
               $filterssubroom['id'] = $postdatas['room'];
               $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');
               $emailtext.=' '.$ideglenesarray["datas"][0]['title'].'<br>';


       }

   }else if ($filterroom['id'] ){
       $rooms[0];
       $emailtext.=lanxtra('szoba',$elang).': '.$rooms[0]['title'].'<br>';
   }else if ($postdatas['rooms']){
       foreach($postdatas['rooms'] as $mroom){
           if ($mroom['ordernum']){
               $filterssucsomag=$ideglenesarray1 =$ideglenesarray = $filterssubroom=array();
               $filterssucsomag['lang'] = $filterssubroom['lang'] = $_SESSION['lang'];
               $filterssubroom['id'] = $mroom['id'];
               $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');
               $emailtext.=' '.$ideglenesarray["datas"][0]['title'];

               if ($mroom["csomagid"]){
                   $filterssucsomag['id']= $mroom["csomagid"];
                   $ideglenesarray2 = $CsomagClass->get($filterssucsomag, '', $page = 'all');
                   $emailtext.=' ('.lanxtra('csomag',$elang).' '.$ideglenesarray2["datas"][0]['title'].' )';

               }
           }


               $emailtext.='<br>';


           }
        if($postdatas['csomag']){
            $filterssucsomag['id']= $postdatas["csomag"];
            $ideglenesarray2 = $CsomagClass->get($filterssucsomag, '', $page = 'all');
            $emailtext.=' ('.lanxtra('csomag',$elang).' '.$ideglenesarray2["datas"][0]['title'].' )'.'<br>';

        }


   }

    $emailtext.=lanxtra('message',$elang).': '.$postdatas['message'].'<br>';
    $emailtexthu=$emailtext;
    $emailtext='';
//-------------------------------------------------------------------------------------------------------------------------------------------------------

    $elang=$_SESSION['lang'];

    $emailtext.=lanxtra('nev',$elang).': '.$postdatas['name'].'<br>';
    $emailtext.=lanxtra('email',$elang).': '.$postdatas['email'].'<br>';
    $emailtext.=lanxtra('tel',$elang).': '.$postdatas['tel'].'<br>';
    $emailtext.=lanxtra('erkezes',$elang).': '.$postdatas['erkezes'].'<br>';
    $emailtext.=lanxtra('tavozas',$elang).': '.$postdatas['tavozas'].'<br>';
    $emailtext.=lanxtra('ejszam',$elang).': '.$postdatas['ejszam'].'<br>';
    $emailtext.=lanxtra('felnott',$elang).': '.$_SESSION['felnott'].'<br>';
    $emailtext.=lanxtra('gyerek',$elang).': '.$_SESSION['gyerek'].'<br>';

    if (count($postdatas['child']))
        $emailtext .= lanxtra('gyerek',$elang).'<br>';
    foreach ($postdatas['child'] as $gyerek){
        $emailtext .=  $gyerek['birth'] .'('. $gyerek['age'] . ')<br>';
    }


    if ($postdatas['room']){$postdatas['rooms'][]=$postdatas['room'];}



    if ($filtercsomag['id'] ){
        $csomagok[0];
        $emailtext.=lanxtra('csomag',$elang).': '.$csomagok[0]['title'].'<br>';

        if($postdatas['room']){
            $ideglenesarray = $filterssubroom=array();
            $filterssubroom['lang'] = $_SESSION['lang'];
            $filterssubroom['id'] = $postdatas['room'];
            $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');
            $emailtext.=' '.$ideglenesarray["datas"][0]['title'].'<br>';


        }

    }else if ($filterroom['id'] ){
        $rooms[0];
        $emailtext.=lanxtra('szoba',$elang).': '.$rooms[0]['title'].'<br>';
    }else if ($postdatas['rooms']){
        foreach($postdatas['rooms'] as $mroom){
            if ($mroom['ordernum']){
                $filterssucsomag=$ideglenesarray1 =$ideglenesarray = $filterssubroom=array();
                $filterssucsomag['lang'] = $filterssubroom['lang'] = $_SESSION['lang'];
                $filterssubroom['id'] = $mroom['id'];
                $ideglenesarray = $RoomsClass->get($filterssubroom, '', $page = 'all');
                $emailtext.=' '.$ideglenesarray["datas"][0]['title'];

                if ($mroom["csomagid"]){
                    $filterssucsomag['id']= $mroom["csomagid"];
                    $ideglenesarray2 = $CsomagClass->get($filterssucsomag, '', $page = 'all');
                    $emailtext.=' ('.lanxtra('csomag',$elang).' '.$ideglenesarray2["datas"][0]['title'].' )';

                }
            }


            $emailtext.='<br>';


        }
        if($postdatas['csomag']){
            $filterssucsomag['id']= $postdatas["csomag"];
            $ideglenesarray2 = $CsomagClass->get($filterssucsomag, '', $page = 'all');
            $emailtext.=' ('.lanxtra('csomag',$elang).' '.$ideglenesarray2["datas"][0]['title'].' )'.'<br>';

        }


    }
    $emailtext.=lanxtra('message',$elang).': '.$postdatas['message'].'<br>';

$_SESSION["requesttext"]=$emailtext;
echo $emailtext;
echo $emailtexthu;

echo "
<script>
//window.location.href = '".$homeurl.$separator."rooms/thankyourequestshow';
</script>
";

   // arraylist($postdatas['rooms']);

}
?>