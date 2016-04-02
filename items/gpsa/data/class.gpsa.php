<?php
class gpsa
{
    static protected $googleapikey = "AIzaSyBXLKqQrlQAg2zETkuOxBSUYMHAenHuwZw";

    public function getapikey()
    {
        return self::$googleapikey;
    }


    public function commahelp($text)
    {
        if ($text != "") {
            $text .= ",";
        }
        return $text;
    }

    public function andhelp($text)
    {
        if ($text != "") {
            $text .= " AND ";
        }
        return $text;
    }

    public function wherehelp($text)
    {
        if ($text != "") {
            $text = " WHERE " . $text;
        }
        return $text;
    }


    private function curlread($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        return $result = curl_exec($curl);
    }


    private function convert_google_geocode($garray)
    {
        if ($garray["status"] == 'OK') {
            $sbuarray = array();
            $sbuarray["formatted_address"] = $garray['results'][0]["formatted_address"];
            foreach ($garray['results'][0]['address_components'] as $element) {
                switch ($element['types'][0]) {
                    case "postal_code":
                        $sbuarray["zip"] = $element['long_name'];
                        break;
                    case "country":
                        $sbuarray["country"] = $element['long_name'];
                        $sbuarray["country_code"] = $element['short_name'];
                        break;
                    case "administrative_area_level_1":
                        $sbuarray["region"] = $element['long_name'];
                        break;
                    case "locality":
                        $sbuarray["city"] = $element['long_name'];
                        break;
                    case "route":
                        $sbuarray["street"] = $element['long_name'];
                        break;
                    case "street_number":
                        $sbuarray["num"] = $element['long_name'];
                        break;
                }
            }
            return ($sbuarray);
        } else return array();
    }

    public function get_google_geocoding($address)
    {
        $address = str_replace(" ", "+", $address);
        $curl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . self::$googleapikey;
        $ch = curl_init($curl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_PORT, 443);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);

        if (curl_exec($ch) === false) {
            //    echo 'Curl error: ' . curl_error($ch);
            $retval["error"] = curl_error($ch);
        } else {
            //    echo 'Operation completed without any errors';
            //	echo $output;
            $mydata = (json_decode($output, TRUE));
            if (count($mydata["results"] > 0)) {
                $retval = ($mydata["results"]);
            } else {
                $retval = ($mydata);
            }
        }
        // Close handle
        curl_close($ch);
        return $retval;
    }

    public function get_coords_tbl($lat, $long)
    {
        $mret = $this->get_geocode($get = array('lat' => $lat, 'lon' => $long));
        //arraylist($mret);
        if ($mret["datas"][0]) {
            //echo "from db";
            return $mret["datas"][0];
        } else return array();


    }

    public function get_coords($lat, $long)
    {
        $mret = $this->get_geocode($get = array('lat' => $lat, 'lon' => $long));
        //arraylist($mret);
        if ($mret["datas"][0]) {
            //echo "from db";
            return $mret["datas"][0];
        } else {
            //echo "from google";
            $googlejsonurl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=";
            $googlejsonurl .= $lat . ',' . $long;
            $googlejsonurl .= "&key=" . self::$googleapikey;
            //echo $googlejsonurl;
            $res = $this->curlread($googlejsonurl);
            $position = json_decode($res, true);
            $ret = $this->convert_google_geocode($position);
            $ret['lat'] = $lat;
            $ret['lon'] = $long;
            //elmentjük a geocode adatot
            $this->save_geocode($ret);
            return $ret;
        }
    }

//távolság számítás
    public function distance($lat1, $lng1, $lat2, $lng2)
    {
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lng1 *= $pi80;
        $lat2 *= $pi80;
        $lng2 *= $pi80;
        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;
        return ($km);
    }


    public function idotipus()
    {
        global $lan;
        $data[0] = $lan['ma'];
        $data[1] = $lan['tegnap'];
        $data[2] = $lan['tegnapelott'];
        $data[3] = $lan['date'];
        $data[4] = $lan['idoszak'];
        return $data;
    }


    public function status()
    {

        $data["A"] = "Riasztó be";
        $data["D"] = "arhiv";
        $data["F"] = "Áll";
        $data["E"] = "Megy";
        $data["X"] = "GPS gyenge";

        return $data;
    }

    public function table_geocode($data = array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = $tbl['geocode'];

        $mezo = array();
        $mezo["id"] = 'lat';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "lat";
        $mezo["display"] = 0;
        $mezo["type"] = 'num';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo = array();
        $mezo["id"] = 'lon';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "lon";
        $mezo["display"] = 0;
        $mezo["type"] = 'num';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo = array();
        $mezo["id"] = 'country_code';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "country_code";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 3;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'country';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "country";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 200;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'region';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "region";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 200;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'city';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "city";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 200;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'street';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "street";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 200;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'num';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "num";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 20;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'zip';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "zip";
        $mezo["display"] = 0;
        $mezo["type"] = 'varchar';
        $mezo["lenght"] = 8;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();
        $datas['table'] = $table;
        $datas['mezok'] = $mezok;
        return $datas;
    }


    public function save_geocode($datas)
    {
        global $Sys_Class, $adatbazis;
        //$mdata=$this->table_geocode($mdata);
        $SD = $this->table_geocode($datas);
        //arraylist($SD);
        //insert
        if ($datas["country"]) {
            foreach ($SD["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe["id"];
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . $datas[$mezoe["id"]] . "'";
            }
            $query = "REPLACE INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $result = db_Query($query, $error, $adatbazis["db3_user"], $adatbazis["db3_pass"], $adatbazis["db3_srv"], $adatbazis["db3_db"], "REPLACE");
            //echo $query.'<br>';
            //echo $error;
        }
//return($res);//csak id-t ad vissza
    }

    public function get_geocode($filters)
    {
        global $Sys_Class, $adatbazis;
        $SD = $this->table_geocode($datas);

        foreach ($SD["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['id'];
        }
        //Táblázatok
        $tables = $SD["table"];

        $fmezonev = 'lat';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }
        $fmezonev = 'lon';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $where = $this->wherehelp($where);
        //echo $mezok.$tables;
        $query = "SELECT " . $mezok . " FROM " . $tables . $where . ' ' . $order . $limit;
        //echo $query ;


        $result['datas'] = db_Query($query, $error, $adatbazis["db3_user"], $adatbazis["db3_pass"], $adatbazis["db3_srv"], $adatbazis["db3_db"], "select");
        $result['query'] = $query;
        $result['error'] = $error;
        return $result;

    }


    public function table_fields($mdata)
    {
        global $adatbazis, $tbl;

//	$mdata=$this->table();

        //$table=$tbl['service_cat'];
        //$mezok[]=$table.'.'.'`status`';

        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }


    public function table_gpsdata($table, $data = array())
    {
        global $adatbazis, $tbl;

        $mezo["id"] = 'lat';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "lat";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'lng';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "long";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'rsz';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "IMEI";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'datum';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "dátum";
        $mezo["display"] = 1;
        $mezo["type"] = 'date';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'ido';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "idő";
        $mezo["display"] = 1;
        $mezo["type"] = 'time';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'sebesseg';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "sebesseg";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'statusz';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "statusz";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'navigacio';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "navigacio";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'benzszint';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "benzszint";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'bemenetek';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "bemenetek";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'atf';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "atf";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'vf';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "vf";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'munkaido';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "munkaido";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        //
        $mezo["id"] = 'beerkezes';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "beerkezes";
        $mezo["display"] = 1;
        $mezo["type"] = 'time';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'ip';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ip";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "id";
        $mezo["display"] = 0;
        $mezo["type"] = 'integer';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;

    }

    public function table_fields_gpsdata($table)
    {
        global $adatbazis, $tbl;

        $mdata = $this->table_gpsdata($table);
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }

    public function table_fields2_gpsdata($table)
    {
        global $adatbazis, $tbl;

        $mdata = $this->table_gpsdata($table);
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $adatbazis["db2_db"] . "." . $mezo['id'] . " as " . $mezo['id'];

                if ($datas['mezokstring'] != "") {
                    $datas['mezokstring'] .= ",";
                }
                $datas['mezokstring'] .= "`" . $mdata['table'] . "`" . "." . $mezo['id'] . " as " . $mezo['id'];

            }

        $datas['table'] = $adatbazis["db2_db"] . ".`" . $mdata['table'] . "`";
        $datas['mezok'] = $mezok;

        return $datas;
    }

    private function get_log_tables()
    {
        global $adatbazis;
        $sqlmytables = "SHOW TABLES FROM " . $adatbazis["db2_db"];
        $mytables = db_Query($sqlmytables, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], '', "select");
        foreach ($mytables as $tbls) {
            $tblexists[$tbls["Tables_in_" . $adatbazis["db2_db"]]] = $adatbazis["db2_db"] . '.' . $tbls["Tables_in_" . $adatbazis["db2_db"]];
        }
        return $tblexists;
    }

    private function convto2($num)
    {
        if ($num < 10) {
            $mp = '0' . ($num * 1);
        } else {
            $mp = ($num * 1);
        }
        return $mp;
    }

    private function gpstable_exist($tol, $ig)
    {
        global $adatbazis, $tbl;
        $existstable = ($this->get_log_tables());

        $timeclass = new time();
        $qd_tol = $timeclass->date_strip($tol);
        $qd_ig = $timeclass->date_strip($ig);

//a lekérdezendő napok
        if (strtotime($tol) <= strtotime($ig)) {
            //évek
            for ($y = $qd_tol['y']; $y <= $qd_ig['y']; $y++) {
                if ($y == $qd_tol['y']) {
                    $mtol = $qd_tol['m'];
                } else $mtol = 1;
                if ($y == $qd_ig['y']) {
                    $mig = $qd_ig['m'];
                } else $mig = 12;

                //echo $y."-".$mtol."-".$mig."<br>";
                //honapok
                for ($m = $mtol; $m <= $mig; $m++) {
                    if ($y == $qd_tol['y'] && $m == $qd_tol['m']) {
                        $dtol = $qd_tol['d'];
                    } else $dtol = 1;

                    if ($y == $qd_ig['y'] && $m == $qd_ig['m']) {
                        $dig = $qd_ig['d'];
                    } else $dig = 31;
                    //napok
                    for ($d = $dtol; $d <= $dig; $d++) {
                        $reqtables[] = $y . '-' . $this->convto2($m) . '-' . $this->convto2($d);
                    }
                }
            }
        }

        if ($reqtables) foreach ($reqtables as $req) {
//echo $req;	
            //var_dump($existstable[$req]);
            if ($existstable[$req] != "") {
                $mytables[] = $req;
            }
            //echo "<br>";
        }
        return $mytables;
    }


    public function get_gpsdata($datas)
    {
        global $adatbazis, $tbl;
        $timeclass = new time();
        if ($datas["order"] == "") {
            $order = "datum DESC,ido DESC";
        } else {
            $order = $datas["order"];
        }
        $orderwhere = " ORDER BY " . $order;


        if ($datas["limit"]) {
            $qlimit = " LIMIT " . $datas["limit"];
        }


        if ($datas["rsz"]) {
            $belsowhere = $this->andhelp($belsowhere);
            $belsowhere .= " rsz=" . $datas["rsz"];
        }

        if ($datas["tol"]) {
            $tol = $datas["tol"];
            $qd_tol = $timeclass->date_strip($datas["tol"]);
            $belsowhere = $this->andhelp($belsowhere);
            $belsowhere .= " datum >= '" . $qd_tol['y'] . "-" . $qd_tol['m'] . "-" . $qd_tol['d'] . "'";
        }
        if ($datas["ig"]) {
            $ig = $datas["ig"];
            $qd_ig = $timeclass->date_strip($datas["ig"]);
            $belsowhere = $this->andhelp($belsowhere);
            $belsowhere .= " datum <= '" . $qd_ig['y'] . "-" . $qd_ig['m'] . "-" . $qd_ig['d'] . "'";
        }

        /*$tol="2016-01-15 05:13:11";
        $ig="2016-01-31 05:13:23";*/

        $gpsdata_tables = $this->gpstable_exist($tol, $ig);
        //arraylist($gpsdata_tables);

        $qd_tol = $timeclass->date_strip($tol);
        $qd_ig = $timeclass->date_strip($ig);

//db-k összefűtése
        if ($gpsdata_tables)
            foreach ($gpsdata_tables as $thistab) {
                $tabledatas = ($this->table_fields2_gpsdata($thistab));
                if ($q != "") {
                    $q .= " UNION ";
                }
                $q .= "SELECT " . $tabledatas["mezokstring"] . " FROM " . $tabledatas["table"];
                $q .= $this->wherehelp($belsowhere);
            }
        $q .= $orderwhere . $qlimit;

        //arraylist($qd_tol);
        //echo "<hr>";
        //var_dump($existstable);
        //arraylist($this->table_fields_gpsdata($table));

        $result = db_Query($q, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "select");
        $ret["datas"] = $result;
        $ret["query"] = $q;
        $ret["error"] = $error;
        $ret["get"] = $datas;


        return $ret;
    }


    public function save_gpsdata($table, $datas)
    {
        global $adatbazis;
        $Sys_Class = new sys();
        //tábla adatai
        $SD = $this->table_fields_gpsdata($table);
        $mtbl = $this->table_gpsdata($table);

//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["id"] < 1) {
            //insert
            foreach ($mtbl["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe['table'];
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . ($datas[$mezoe['id']]) . "'";
            }
            $query = "INSERT INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $result = db_Query($query, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "INSERT");
            echo $query . '<br>';
            echo $error;
            $res = mysql_insert_id();
        } else {
            $res = $datas["id"];
            //update
            foreach ($mtbl["mezok"] as $mezoe) {
                if (isset($datas[$mezoe['id']])) {
                    $datasb .= $Sys_Class->comasupport($datasb);
                    $datasb .= "" . $mezoe['table'] . " =  '" . ($datas[$mezoe['id']]) . "'";
                }
            }
            $query = "UPDATE  " . $SD["table"] . " SET  " . $datasb . "   WHERE  `id` =" . $datas["id"] . " LIMIT 1 ;";
            $result = db_Query($query, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "UPDATE");
            /*echo $query;
            echo $error;*/
        }
        return ($res);//csak id-t ad vissza
    }


    public function create_tbl($table)
    {
        global $adatbazis;
        $sql = "create table `" . $table . "` (
	`lat` varchar (30),
	`lng` varchar (30),
	`rsz` varchar (45),
	`datum` date ,
	`ido` time ,
	`sebesseg` int (11),
	`statusz` char (3),
	`navigacio` char (3),
	`benzszint` varchar (6),
	`bemenetek` varchar (39),
	`atf` varchar (18),
	`vf` varchar (18),
	`munkaido` varchar (18),
	`beerkezes` time ,
	`ip` varchar (45),
	`id` int (11)
);";
        $result = db_Query($sql, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "CREATE");


    }


    public function create_tbl_soforok()
    {

        $sql = "create table `soforok` (
	`rsz` varchar (45),
	`imei` varchar (45),
	`nev` varchar (150),
	`telszam` varchar (75),
	`telszam2` varchar (75),
	`torzsszam` int (8),
	`motortiltas` varchar (12),
	`terulet` varchar (90),
	`megjegyzes` varchar (150),
	`azon` varchar (18),
	`id` int (5)
); 
";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");


    }

    public function create_tbl_regisztracio()
    {

        $sql = "create table `regisztracio` (
	`rendszam` varchar (60),
	`imei` varchar (45),
	`username` varchar (45),
	`password` varchar (90),
	`csoport` varchar (90),
	`szint` varchar (9),
	`csopvez` varchar (15),
	`date` date ,
	`erosit` varchar (12),
	`megjegyzes` varchar (90),
	`telepito` varchar (45),
	`egyenleg` int (11),
	`id` int (25)
);";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");

    }


    public function create_tbl_elofizeto()
    {

        $sql = "create table `elofizeto` (
	`vrendszam` varchar (60),
	`rendszam` varchar (45),
	`ugyfelazon` varchar (45),
	`password` varchar (90),
	`cegnev` varchar (300),
	`szlanev` varchar (300),
	`szlacim` varchar (225),
	`szlahelyseg` varchar (150),
	`szlairszam` varchar (30),
	`boritek` varchar (15),
	`postacim` varchar (300),
	`adoszam` varchar (60),
	`fizhat` date ,
	`fizmod` varchar (3),
	`fizidoszak` varchar (18),
	`szlaidoszak` varchar (6),
	`szerzszam` int (10),
	`csoport` varchar (90),
	`szint` varchar (9),
	`gyartdatum` varchar (33),
	`menlevelofizkezd` date ,
	`menlevelofiz` varchar (12),
	`eszkozberlet` varchar (12),
	`webelofizkezd` date ,
	`kiszereles` date ,
	`modositas` date ,
	`webelofiz` varchar (12),
	`roaming` varchar (15),
	`dsp` varchar (15),
	`alapdij` varchar (15),
	`webdij` varchar (15),
	`menlevdij` varchar (15),
	`dspdij` varchar (12),
	`roamingdij` varchar (12),
	`poziciokeres` varchar (15),
	`smsdij` varchar (9),
	`havidijkedvez` varchar (12),
	`havidijemeles` varchar (15),
	`berletdij` varchar (18),
	`berletkedvez` varchar (15),
	`berletemeles` varchar (15),
	`euro` varchar (12),
	`vv` varchar (60),
	`jutalek` varchar (15),
	`email` varchar (120),
	`erosit` varchar (12),
	`tel` varchar (60),
	`sim` varchar (39),
	`megjegyzes` varchar (300),
	`megjegyzes_datum` date ,
	`egyenleg` int (11),
	`szerviz` varchar (24),
	`ertesites` varchar (12),
	`sms` varchar (12),
	`pinpoint` varchar (24),
	`motortiltas` varchar (21),
	`eszktip` varchar (60),
	`mod` varchar (60),
	`jarmutip` varchar (150),
	`elhelyezes` varchar (150),
	`alvazszam` varchar (150),
	`server` varchar (30),
	`tankmeret` int (3),
	`fogyasztasi_alapnorma` varchar (60),
	`telepito` varchar (45),
	`statusz` varchar (60)
); 
";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");

    }


    public function create_tbl_geocodedata()
    {
        global $adatbazis;

        $sql = 'CREATE TABLE IF NOT EXISTS `' . $table["geocode"] . '` (
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `country_code` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `street` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `rogzitve` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `index` (`lat`,`lon`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;';
        $result = db_Query($sql, $error, $adatbazis["db3_user"], $adatbazis["db3_pass"], $adatbazis["db3_srv"], $adatbazis["db3_db"], "CREATE");

    }

}


$gps_class = new gpsa();

/*
$date='2014-01-03';
$gps_class->save_gpsdata($date,$datas);

$lat="45.8421134";
$long="13.1394500";

$lat="45.8421134";
$long="13.1394500";


$lat="47.5347976";
$long="21.4962501";

$garray=$gps_class->get_coords($lat,$long);
//$addresarray=$gps_class->convert_google_geocode($garray);
var_dump($garray);*/
?>