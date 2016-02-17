<?php

$allstatus = $gps_class->status();

//$carlist=$gpsacars_class->create_tbl_usercar();
//$carlist=$gpsacars_class->cars_table_update1();
$regisztracio = $gpsacars_class->get_regisztracio($filters);


//arraylist($regisztracio);


?>
<?php
foreach ($regisztracio["datas"] as $reg) {
    $cars = array();
    $dret = array();

    if ($reg["imei"] != "") {
        $filters["rendszam"] = $reg["imei"];
        $rcar = $gpsacars_class->get_cars($filters);

//emberek adatai
//arraylist($rcar["datas"][0]["email"]);
        $dret['unev'] = $reg["username"];
        $dret['pass'] = $reg["password"];
        $dret['jogid'] = 1;
        $dret['nev'] = $rcar["datas"][0]["email"];
        $dret['email'] = $rcar["datas"][0]["email"];
        if ($reg["erosit"] == 'igen') {
            $dret['status'] = 1;
        } else {
            $dret['status'] = 2;
        }
        $dret['nev'] = $reg["username"];

//hozzájuk tartozó autók
        $car["uid"] = $dret["id"];
        $car["cid"] = $rcar["datas"][0]["szerzszam"];
        if ($car["cid"] > 0) $cars[] = $car;

//hozzájuk tartozó csoportból autók
        $groups = explode(' ', $reg["csoport"]);
       // arraylist($groups);
        if (count($groups) > 1) {
            foreach ($groups as $rgroup) {
                if ($rgroup != 0 && $rgroup != "") {
                    $filters["csoport"] = $rgroup;
                    $mcars = $gpsacars_class->get_cars($filters);

                    foreach ($mcars["datas"] as $mcar) {
                        $car["uid"] = $dret["id"];
                        $car["cid"] = $mcar["szerzszam"];
                        if ($car["cid"] > 0) $cars[] = $car;
                    }

                }

            }


        }
//usernév szerint hozzá tartozik
        $filters["ugyfelazon"] = $dret['unev'];
        $mcars = $gpsacars_class->get_cars($filters);

        foreach ($mcars["datas"] as $mcar) {
            if ($dret['email']==""&& $mcar["email"]){
                $dret['email']= $mcar["email"];

            }

            $car["uid"] = $dret["id"];
            $car["cid"] = $mcar["szerzszam"];
            if ($car["cid"] > 0) $cars[] = $car;
        }





       //user ellenörzése hogy létezik e
        $ufilters["email"]=$dret['email'];
        $suser=$User_Class->get_users($ufilters);
       // arraylist();
        if ($suser["datas"][0]["id"]>0){
            //ha létezik a user
            $dret['id']=$suser["datas"][0]["id"];
            $User_Class->save($dret);

        }else{
            $dret['id']=$User_Class->save($dret);
        }


        echo $dret['id']." ".$dret['nev']." ".$dret['email'];
        // arraylist($reg);
        echo "<br>carsnum:" . count($cars);
        arraylist($cars);

    }
    ?>
    <?php

}
?>

