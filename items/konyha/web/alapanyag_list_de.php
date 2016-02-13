<?php 
$order="id DESC ";
$eszkozokmezok=$rec_class->table_alapanyag();
$filters=$_GET;
$filters['']='all';
$maxegyoldalon=$filters["maxegyoldalon"]=50;
$getdatas=$rec_class->get_alapanyag($filters,$order,'all');
$alapanyaglist=$getdatas["datas"];
$hszlistacount=$getdatas['count'];

//arraylist($alapanyaglist);
//megjelenites
?>



<?php
/*
foreach ($alapanyaglist as $a){	
echo '$'.$a['id'].'|'.$a['nev'].'<br />';
}
/*
*/

$de="$ 1443 | braun Reismehl
$ 1442 | vaníliáscukor
$ 1441 | Plantain Samenschale
$ 1440 | Agar
$ 1439 | Pod Bohnen (Fevita)
$ 1438 | Kartoffelflocken
$ 1435 | (mini-phenyl) Ei-Ersatz Pulver
$ 1434 | (BEZGLUTEN) Ei-Ersatz Pulver
$ 1433 | (balviten) Ei-Wieder
$ 1432 | (BEZGLUTEN) Kirschgelee
$ 1431 | (BEZGLUTEN) mit Orangengelee
1 $ 430 | (BEZGLUTEN) rechteckige Wafer
$ 1429 | Pasta bunte Rolle (harifen)
$ 1428 | Spaghetti Nudeln (harifen)
$ 1427 | Reis, Nudeln, Buchstabe (harifen)
$ 1426 | Pasta, Nudeln Rollen, penne (harifen)
$ 1425 | trockene Teigwaren, Nudeln, Eiergerste (Mini-fe)
$ 1424 | trockene Teigwaren, Nudeln, Ei Gerste (BEZGLUTEN)
$ 1423 | trockene Teigwaren, Nudeln, Ei Gerste (balviten)
$ 1422 | (Barbara) Boden-Wafer
$ 1421 | (Master-Familie) 200 g Vanillepudding
$ 1420 | (Master-Familie) Pudding mit Sahne
$ 1419 | (Master-Familie) pudding Punch
$ 1418 | (Master-Familie) Haselnusspudding
$ 1417 | (Master-Familie) Erdbeerpudding
$ 1416 | (Familien Master) Schokoladenpudding
$ 1415 | (Familien Master) Zitronenpudding
$ 1414 | (Master-Familie) fagyipor Schokolade, Vanille, Joghurt
$ 1413 | (Haas) Vanillepudding
$ 1412 | (Haas) pudding tuttifruttis
$ 1411 | (Haas) Tiramisu Pudding
$ 1410 | (Haas) Erdbeerpudding
$ 1409 | (Haas) pudding Punch
$ 1408 | (Haas) Französisch cremigen Pudding Pudding
$ 1407 | (Haas) Schokoladenpudding
$ 1406 | (Haas) Diabetes-Vanillepudding
$ 1405 | (Haas), diabetische Schokoladenpudding
$ 1404 | (Dr.Oetker), Vanillepudding
$ 1403 | (Dr.Oetker) pudding tejszinÍzŰ
$ 1402 | (Dr.Oetker), Buttertoffeepudding
$ 1401 | (Dr.Oetker) pudding Punch
$ 1400 | (Dr.Oetker) dunkle Schokoladenpudding
$ 1399 | (Dr.Oetker) Erdbeerpudding
$ 1398 | (Dr.Oetker), Schokoladenpudding
$ 1397 | (Dr.Oetker) Bananen-Pudding
$ 1396 | (Dr.Oetker) dodder Creamer vanÍliaÍzŰ
$ 1395 | (Dr.Oetker) dodder Creamer mogyoróÍzű
$ 1394 | (balviten) Vanillepudding
$ 1393 | (balviten) Schokoladenpudding
$ 1392 | (nutri kostenlos) Kuchenmehlmischung
$ 1391 | (nutri kostenlos) kenyÉrpor
1 $ 390 | (Bauernhof) Kuchenmehlmischung
$ 1389 | (Bauernhof) kenyÉrpor
$ 1388 | Schwäbische glutenfreien Semmelbrösel
$ 1387 | (nutri kostenlos) Semmelbrösel
$ 1386 | (Mantler) laktosefreie Mehl
$ 1385 | (Ceres) Paniermehl
$ 1384 | (Anna Panni) Mehlmischung
$ 1383 | (balviten) Paniermehl
$ 1382 | (balviten) Backmehlmischung
$ 1381 | (balviten) oberste königliche Mischung Ofen
$ 1380 | (balviten) Kochmehlmischung
$ 1379 | (Doves Farm) önkelesztő Mehlmischung
$ 1378 | (Doves Farm) Brotmehl
$ 1377 | (Doves Farm) Schwarzbrot Mehl
$ 1376 | (m gel) Kuchenmehl
$ 1375 | (m gel) Brotmehl
$ 1374 | (Vincze) extrudierte Maisschrot
$ 1373 | (Zauberbrot), Maismehl
$ 1372 | (auck hof) Maisstärke
$ 1371 | Kastanienmehl Natur
$ 1370 | (Chlorophyll), Amaranth Mehl
$ 1369 | (Emese) kenyérpor
$ 1368 | (Cornito) Glutenfreie Brotkrümel
$ 1367 | (Schar) Integrati pan Brotkrumen
$ 1366 | (Schar) Mehl mischen
$ 1365 | (Schar) b Mix Mehl
$ 1364 | (Schar) farina Mehlteig
$ 1363 | (Familien Master) Pasta Mehl
$ 1362 | (Familien Master) Molkerei-frei Brotkrumen
$ 1361 | (Master-Familie) kenyÉrmix
$ 1360 | (Master-Familie) Brotmehl lupinrosttal
$ 1359 | (Familien Master) Brotmehl
$ 1358 | Traubenkernmehl
$ 1357 | Kürbiskernmehl
$ 1356 | (naturbit) Mehlmischung
$ 1355 | (naturbit) albatutti Diab, GM .. kenyÉrpor
$ 1354 | (naturbit) Alba mix
$ 1353 | (Glutenix) Kernbrennbrotmehl
$ 1352 | (Glutenix) schwammig Kuchenbackmischung
$ 1351 | (Glutenix) Weißbrot Backmischung
1 $ 350 | (Glutenix) Maisstärke
$ 1349 | (Glutenix) Alfamix weizenfreie Mehlmischung
$ 1348 | (Glutenix) alpha mix kenyÉrpor
$ 1347 | Mehl-Gemisch (Finax)
$ 1346 | Original Mehlmischung (Finax)
$ 1345 | rustikalen Brot Mischung (nominal)
$ 1344 | hajdinarosttal Brotmischung (nominal)
$ 1343 | Brotmischung Flachsfasern (nominal)
$ 1342 | Mehl Tortillas (b.corn)
$ 1341 | Grütze Fein Mais (b.corn)
$ 1340 | BASE Mehl (B.CORN)
$ 1339 | Inland MEHL Conc. (BEZGLUTEN)
$ 1.338 | mehr zwielichtige Brotteig Mehl (BEZGLUTEN)
$ 1337 | extra Mehl (BEZGLUTEN)
$ 1336 | Paniermehl (BEZGLUTEN)
$ 1335 | Cookie-Konzentrat (BEZGLUTEN)
$ 1334 | Pfannkuchen Conc. (BEZGLUTEN)
$ 1333 | Brotteig CONC (BEZGLUTEN)
$ 1332 | Paniermehl (Barbara)
$ 1331 | BROT UND Mehlmischung KELTTÉSZTÁHOZ (Barbara)
$ 1330 | Mehl-Mischung kochen, backen (Barbara)
$ 1329 | Reisflocken
$ 1328 | xilovit Null
$ 1327 | geschrieben
$ 1326 | Dinkel-Müsli (NATURAL GOLD)
$ 1325 | Vollkorndinkelmehl (VEGA BOND)
$ 1324 | Dinkelgrieß (ECCOFOOD)
$ 1323 | TÖNKÖLYKORPA (ATAISZ)
$ 1322 | Zabpehelyliszt (Natur)
$ 1321 | ATAISZ Haferflocken
$ 1320 | Gluten linzerpor (M-Gel)
$ 1319 | Apfelmus
$ 1318 | Backpulver
$ 1317 | Glutenix glutenfreie Schwarzbrot Backmischung
$ 1316 | mischen Schär glutenfreie Mehlmischung c
$ 1315 | Apple Fibre
$ 1314 | Kostenlose Backmischung Aus General
$ 1313 | flüssiger Süßstoff
$ 1312 | Zucker Birch (xylylen)
$ 1309 | Furnace glutenfreie Mehlmischung
$ 1308 | flüssiger Süßstoff
$ 1307 | BEZGLUTEN Backpulver
$ 1306 | Mehl
$ 1305 |
$ 1304 | Barley (full seed)
$ 1303 | Flohsamenschalen
$ 1302 | glutenfreie Mehlmischung reduziert Albatutti CH
$ 1301 | Glutenix ländlichen glutenfreies Brot Backmischung
$ 1300 | Brot & Kuchen glutenfreie Mehlmischung
$ 1299 | Alnatura Bio-Amaranth gepufft
$ 1298 | Backpulver
$ 1297 | Fat Truthähne
$ 1296 | suet
$ 1295 | Margarine (Soja)
$ 1294 | Margarine (sütőmargarin)
$ 1293 | Margarine (főzőmargarin)
$ 1292 | Margarine (80% Fett)
$ 1291 | Margarine (70% Fett)
$ 1290 | Margarine (60% Fett)
$ 1289 | Margarine (55% Fett)
$ 1288 | Margarine (40% Fett)
$ 1287 | Margarine (35% Fett)
$ 1286 | Margarine (20% Fett)
$ 1285 | Kakaobutter
1 $ 284 | Fat Duck
$ 1283 | Hühnerfett
$ 1282 | Fat Sheep
$ 1281 | Zaum
$ 1280 | Ucuhubamag Öl
$ 1279 | Kürbiskernöl
$ 1278 | Lebertran
$ 1277 | Teamagolaj
$ 1276 | Traubenkernöl
$ 1275 | Sesamöl
$ 1274 | Muskatöl
$ 1273 | Sardinenöl
$ 1272 | Sheadió Öl
$ 1271 | Reisöl
$ 1270 | Tomato Seed Oil
$ 1269 | Palmöl
$ 1268 | Palmkernöl
$ 1267 | Öl Senf
$ 1266 | Erdnussöl
$ 1265 | Menhaden Fischöl
$ 1264 | Mandelöl
$ 1263 | Mákolaj
$ 1262 | Macadamia-Öl
$ 1261 | Leinöl
$ 1260 | Lachsöl
$ 1259 | Maisöl
$ 1258 | Kokosöl
$ 1257 | Hanfsamenöl
$ 1256 | Hering Öl
$ 1255 | Baumwollsamenöl
$ 1254 | Erdnussöl
$ 1253 | Walnussöl
$ 1252 | Cupuassu Öl
$ 1251 | Weizenkeimöl
$ 1250 | Aprikosenkernöl
$ 1249 | Babassuöl
$ 1248 | Avocado
$ 1247 | Sellerieblätter
$ 1246 | Sellerie
$ 1245 | Yams
$ 1244 | Wasabi Wurzel
$ 1243 | Brunnenkresse
$ 1242 | Spargelsalat
$ 1241 | Gurken
$ 1240 | Karottensaft
$ 1239 | Pastinaken
$ 1238 | Palmherz
$ 1237 | Okra
$ 1236 | Lapugyökér
$ 1235 | Gurken
$ 1234 | Karotten Runde
$ 1233 | Thistle
$ 1232 | Krautsalat
$ 1231 | Dill
$ 1230 | Hummus
$ 1229 | Seaweed
$ 1228 | Pumpkin Kochen
$ 1227 | Schwarzer Rettich
$ 1226 | Rüben
$ 1225 | Endivien-Salat
$ 1224 | Süße Beet
$ 1223 | In Essig eingelegte Gurken
$ 1222 | Zichorienwurzeln
$ 1221 | Bambussprossen
$ 1220 | Serrano Paprika
$ 1219 | Tomaten Paprika
$ 1218 | Jalapeno-Pfeffer
$ 1217 | Pepper Meal
$ 1216 | Chilischoten (grün)
$ 1215 | Chilischoten (rot)
$ 1214 | Rotkohl
$ 1213 | Meerkohl
$ 1212 | Napa Kohl
$ 1211 | Rotkohl
$ 1210 | Grünkohl
$ 1209 |)
$ 1208 | Kohl
$ 1207 | Zwiebeln
$ 1206 | Schnittlauch
$ 1205 | Póréhaygma
$ 1204 | Schalotten
$ 1203 | Schnittlauch
$ 1202 | Purple Onion
$ 1201 | Perlzwiebeln
$ 1200 | Süßkartoffeln (gekocht)
$ 1199 | Kartoffeln (Backofen und in der Schale gebacken)
$ 1198 | Kartoffeln (gebraten)
$ 1197 | Kartoffeln (gekocht)
$ 1196 | Erbsen (gekocht)
$ 1195 | Erbsen (trocken)
$ 1194 | Rote Linsen (gekocht)
$ 1193 | Rote Linsen (trocken)
$ 1192 | Yellow peas (gekocht)
$ 1191 | Objektiv (gekocht)
$ 1190 | Pigeon Erbsen (gekocht)
$ 1189 | Pigeon Erbsen (trocken)
$ 1188 | Kichererbsen (gekocht)
$ 1187 | Grüne Bohnen (gekocht)
$ 1186 | Beans (trocken)
1185 $ | Französisch Bohnen (gekocht)
1184 $ | Französisch Bohnen (trocken)
$ 1183 | Kidney Bohnen (gekocht)
$ 1182 | Kidney Bohnen (trocken)
$ 1181 | Tengerészbab (gekocht)
$ 1180 | Tengerészbab (trocken)
$ 1179 | Pinto Bohnen (gekocht)
$ 1178 | Pinto Bohnen (trocken)
$ 1177 | Sojabohnen (gekocht)
$ 1176 | Szárnyasbab (gekocht)
$ 1175 | Szárnyasbab (trocken)
$ 1174 | Sárgabab (gekocht)
$ 1173 | Sárgabab (trocken)
$ 1172 | Rosa Bohnen (gekocht)
$ 1171 | Rosa Bohnen (trocken)
$ 1170 | Roman Bohnen (gekocht)
$ 1169 | Roman Bohnen (trocken)
$ 1168 | Pinto Bohnen (gekocht)
$ 1167 | Pinto Bohnen (trocken)
$ 1166 | Mungbohne (gekocht)
$ 1165 | Mungbohne (trocken)
$ 1164 | Limabohnen (gekocht)
$ 1163 | Limabohnen (trocken)
$ 1162 | Chinese lange Bohnen (gekocht)
$ 1161 | Chinese lange Bohnen (trocken)
$ 1160 | Jácintbab (gekocht)
$ 1159 | Jácintbab (trocken)
$ 1158 | Schwarze Bohnen (gekocht)
$ 1157 | Schwarze Bohnen (trocken)
$ 1156 | Weiße Bohnen (gekocht)
$ 1155 | Weiße Bohnen (trocken)
$ 1154 | Favabab (gekocht)
$ 1153 | Favabab (trocken)
$ 1152 | Farkasbab (gekocht)
$ 1151 | Farkasbab (trocken)
$ 1150 | Bohnen (gekocht)
$ 1149 | Bohnen (trocken)
$ 1148 | Adzukibohnen (gekocht)
$ 1147 | Adzukibohnen (trocken)
$ 1146 | Wildkaninchenfleisch
$ 1145 | Vadlúdhús
$ 1144 | Boar Meat
$ 1143 | Rentierfleisch
$ 1142 | Pézsmapatkányhús
$ 1141 | Őzhús
$ 1140 | Oposszumhús
$ 1139 | Raccoon Meat
$ 1138 | Squirrel Meat
$ 1137 | Bärenfleisch
$ 1136 | Ziegen
$ 1135 | Fleisch von Schafen
$ 1134 | Elchfleisch
$ 1133 | Büffelfleisch
$ 1132 | Sheep Fleisch
$ 1131 | Froschschenkel
$ 1130 | Antilophús
$ 1129 | pulverförmige)
1.128 USD | Hühnereier (pulverisiert)
$ 1127 | Hühner (Spiegelei)
$ 1126 | Hühnerei (Omelett)
$ 1125 | Hühner (Rührei)
$ 1124 | Hühner (pochierte)
$ 1123 | Hühnerei (Protein)
$ 1122 | Hühner (Dotter)
$ 1121 | Hühner (gekocht)
$ 1120 | Hühner (raw)
$ 1119 | Puteneier
$ 1118 | Goose Egg
$ 1117 | Duck Egg
$ 1116 | Wachtel
$ 1115 | Glasnudeln (gekocht)
$ 1114 | Glas Pasta (trocken)
$ 1113 | Vollkornteigwaren (gekocht)
$ 1112 | Vollkornteigwaren (trocken)
$ 1111 | Pasta (2 Eier)
$ 1110 | spaghetti (gekocht)
$ 1109 | Spaghetti (trocken)
$ 1108 | Somen-Nudeln (gekocht)
$ 1107 | Somen-Nudeln (trocken)
$ 1106 | Soba-Nudeln (gekocht)
$ 1105 | Soba-Nudeln (trocken)
$ 1104 | Reisnudeln (gekocht)
$ 1103 | Reisnudeln (trocken)
$ 1102 | Pie-Teig
$ 1101 | Quinoa
$ 1100 | Hominy (8 Eier)
$ 1099 | Penne (4 Eier)
$ 1098 | Penne Teigwaren (2 Eier)
$ 1097 | Vollkorn)
$ 1096 | Noodles (gekocht)
$ 1095 | Noodles (trocken)
$ 1094 | Mais Pasta (gekocht)
$ 1093 | Mais Pasta (trocken)
$ 1092 | Durumtészta (gekocht)
$ 1091 | Durumtészta (trocken)
$ 1090 | Spreads
$ 1089 | Butter (hell)
$ 1088 | Saure Sahne (20%)
$ 1087 | Saure Sahne (12%)
$ 1085 | Yogurt
$ 1084 | Speiseeis (fettfrei)
$ 1083 | Speiseeis (hell)
$ 1082 | Speiseeis
$ 1081 | Cooking Cream
$ 1080 | Speiseeis
$ 1079 | Quark (Fett)
$ 1078 | Quark (mager)
$ 1077 | Frischkäse
$ 1076 | Gesucht
$ 1075 | Gomolyatúró
$ 1074 | Milch (3,6%) in
$ 1073 | Milch (2,8%) in
$ 1072 | Milch (1,5%) in
$ 1071 | Milch (0,1%) in
1 $ 070 | Condensed Milk
$ 1069 | Ziegenmilch
$ 1068 | Büffelmilch
$ 1067 | Curd
$ 1066 | Trappistenkäse
$ 1065 | Tilsitt Käse
$ 1064 | Romano Käse
$ 1063 | Roquefort-Käse
$ 1062 | Ricotta
$ 1061 | Provolone
$ 1060 | Parmesan
$ 1059 | Käse Parenica
$ 1058 | pálpusztai Käse
$ 1057 | Käse Óvári
$ 1056 | Neufchatel Käse
$ 1055 | Münster Käse
$ 1054 | Mozzarella-Käse
$ 1053 | Monterey Käse
$ 1052 | Mascarpone
$ 1051 | Marble Cheese
1.050 USD | Harzer Käse
$ 1049 | Frischkäse
$ 1048 | Blue Cheese
$ 1047 | Ziegenkäse
$ 1046 | havarti Käse
$ 1045 | Halloumi-Käse
$ 1044 | Greyerzer Käse
$ 1043 | Gouda Käse
$ 1042 | Gorgonzola
$ 1041 | Fontina
$ 1040 | Fetakäse
$ 1039 | Emmentaler
$ 1038 | Edamer
$ 1037 | Colby Käse
$ 1036 | Cheshire Cheese
$ 1035 | Cheddar-Käse
$ 1034 | Camembert
$ 1033 | Brie-Käse
$ 1032 | Sojaquark (Tofu)
$ 1031 | Sojamilch
$ 1030 | Sojasauce
$ 1029 | Soja fasírtpor
$ 1028 | Sojaflocken
$ 1027 | Soja Paris
$ 1026 | Sojawürfel
$ 1025 | Sojabohnen
$ 1024 | Gänsefleisch
$ 1023 | Ente
$ 1022 | Pigeon Meat
$ 1021 | Fürjhús
$ 1020 | Pulykamáj
$ 1019 | turkey gizzard
$ 1018 | Putenherzen
$ 1017 | turkey wings
$ 1016 | Truthahnhals
$ 1015 | Putenbrust
$ 1014 | Türkei zurück
$ 1013 | Türkei Oberschenkel
$ 1012 | turkey Innereien
$ 1011 | Csirkezúza
$ 1010 | Huhn Herz
$ 1009 | Hähnchenflügel (gebraten)
$ 1008 | Hähnchenflügel (gebraten)
$ 1007 | Chicken Wing (gedünstet)
$ 1006 | gekocht)
$ 1005 | Huhn den Hals (gebraten)
$ 1004 | Huhn den Hals (gekocht)
$ 1003 | Chicken (gebraten)
$ 1002 | Chicken (gebraten)
$ 1001 | Chicken (gekocht)
$ 1000 | Chicken Legs (frittiert)
$ 999 | Hühnerfüße (gebraten)
$ 998 | Hühnerfüße (gedünstet)
$ 997 | Wenn Huhn (paniert)
$ 996 | Wenn chicken (gebraten)
$ 995 | Wenn Huhn (gekocht)
$ 994 | Skin Chicken (gebraten)
$ 993 | Skin Chicken (gebraten)
$ 992 | Hühnerhaut (gedünstet)
$ 991 | Innereien (gebraten)
$ 990 | Innereien (gekocht)
$ 989 | Hähnchenschenkel (gebraten)
$ 988 | Hähnchenschenkel (gebraten)
$ 987 | Hähnchenschenkel (gedämpft)
$ 986 | Hähnchenkeulen (gebraten)
$ 985 | Hähnchenkeulen (gebraten)
$ 984 | Hähnchenkeulen (gedünstet)
$ 983 | Fried)
$ 982 | gebraten)
$ 981 | gedünstet)
$ 980 | Chicken (gebraten)
$ 979 | Chicken (gebraten)
$ 978 | Chicken (gekocht)
$ 977 | Cheese Tallér
$ 976 | Tortilla
$ 975 | Ropi
$ 974 | Rágogumi
$ 973 | Popcorn
$ 972 | Pretzel
$ 971 | Kleine
$ 970 | Naples
$ 969 | Erdnussbutter
$ 968 | Neapolitaner
$ 967 | Gefrorene Kastanien-Paste
$ 966 | Mézespuszedli
$ 965 | Süßholz
$ 964 | Marzipan
$ 963 | Marshmallow
$ 962 | Linzer
$ 961 | Halva
$ 960 | Koch Schokolade
$ 959 | White Chocolate
$ 958 | extrudiert Cornflakes
$ 957 | Dunkle Schokolade (70-85% Kakao)
$ 956 | Dunkle Schokolade (60-69% Kakao)
$ 955 | Dunkle Schokolade (45 bis 59% Kakao)
$ 954 | süße Kekse
$ 953 | Süßes Gebäck
$ 952 | Pastry
$ 951 | Zucker
$ 950 | Chips (Pommes frites)
$ 949 | Schweinenieren
$ 948 | Schweinefleisch Mark
$ 947 | Schweinelungen
$ 946 | Schweineherz
$ 945 | Schweineleber
$ 944 | Pig Milz
$ 943 | Schweinemagen
$ 942 | Schweinefleisch Speck
$ 941 | Schweinekotelett
$ 940 | Pigs Ear
$ 939 | Schweineschwanz
$ 938 | Schweinekeule
$ 937 | Schweinekoteletts
$ 936 | Curd Bundle
$ 935 | Kuchen (Butter)
$ 934 | Kuchen (Knistern)
$ 933 | Pita (Vollkorn)
$ 932 | Pita (Weißmehl)
$ 931 | Schwamm-Rolle
$ 930 | Pancakes
$ 929 | Muffin
$ 928 | jam tart
$ 927 | bundt
$ 926 | Kuchen
$ 925 | Waffles
$ 924 | Donut
$ 923 | Walnut Schnecke
$ 922 | Brioche
$ 921 | Milk Kornbrot
$ 920 | Milk-Weizen Croissant
$ 919 | Vollkornbrot
$ 918 | Vollkornbrötchen
$ 917 | Zabkorpás Brot
$ 916 | Kürbiskernbrot
$ 915 | Vollkornbrot
$ 914 | Italienisch Brot
$ 913 | Raisin Bread
$ 912 | Magvas Schwarzbrot
$ 911 | Kernbrot
$ 910 | Leinsamenschwarzbrot
$ 909 | Maisbrot
$ 908 | Französisch Brot
$ 907 | Weißbrot
$ 906 | Elizabeth Brot
$ 905 | Dabas Roggenbrot
$ 904 | Brot Pollard
$ 903 | Búzacsírás Brot
$ 902 | Kartoffelbrot
$ 901 | Beef Nieren
$ 900 | Rindermark
$ 899 | Rinderlunge
$ 898 | Beef Herzen
$ 897 | Rinderbrust
$ 896 | Rinderzunge
$ 895 | Beef Mai
$ 894 | Beef Kraft
$ 893 | Beef top sirloin
$ 892 | Beef Oberschenkel
$ 891 | Beef rib
$ 890 | Rinderfilet
$ 889 | Rindfleisch Boden Lende
$ 888 | mager)
$ 887 | moderate-fat)
$ 886 | Fettige)
$ 885 | saveloy
$ 884 | Schweinswurst
$ 883 | Spam
$ 882 | Krinoline
$ 881 | patty
$ 880 | Speck
$ 879 | Tourist Salami
$ 878 | Paprikasalami
$ 877 | Sommer Salami
$ 876 | Wildschwein Wurst
$ 875 | Rohwurst
$ 874 | Bratwurst
$ 873 | Türkei Sausage
$ 872 | Gyulai Wurst
$ 871 | Cooking Sausage
$ 870 | Chorizo-Wurst
$ 869 | Zala kalt
$ 868 | geschnitten Verona
$ 867 | Frühjahr kalt
$ 866 | Swine Paris
$ 865 | Putenschinken
$ 864 | Parmaschinken
$ 863 | Bauern Ham
$ 862 | Beef Paris
$ 861 | Geflügel Paris (Käse)
$ 860 | Geflügel Paris
$ 859 | Blue crab
$ 858 | Lobster
$ 857 | Dungeness Crab
$ 856 | Octopus
$ 855 | Oysters
$ 854 | Wellhornschnecke
$ 853 | Miesmuscheln
$ 852 | Scallops
$ 851 | Abalone Muscheln
$ 850 | Rotbarsch
$ 849 | Butterfisch
$ 848 | Sturgeon
$ 847 | Tilapia
$ 846 | Tomate)
$ 845 | öligen)
$ 844 | Carp
$ 843 | Pompano Fisch
$ 842 | Steinbutt
$ 841 | Heilbutt
$ 840 | High Felchen
$ 839 | Fisch Himmel
$ 838 | Makrele
$ 837 | Salmon
$ 836 | Prawns
$ 835 | red)
$ 834 | Schwertfisch
$ 833 | Herring
$ 832 | Gefleckter Umberfisch
$ 831 | Wolf Fisch
$ 830 | Snapper
$ 829 | Shark
$ 828 | croaker
$ 827 | amerikanische shad
$ 826 | Sardellen
$ 825 | Pflaumenmus
$ 824 | Brombeeren Marmelade
$ 823 | Aprikosenmarmelade
$ 822 | Johannisbeerstörung
$ 821 | Marmelade Pfirsich
$ 820 | Kirschmarmelade
$ 819 | Himbeermarmelade
$ 818 | Strawberry jam
$ 817 | Hagebuttenmarmelade
$ 816 | Kirschmarmelade
$ 815 | Quince jam
$ 814 | Blaubeermarmelade
$ 813 | Pflaumenkompott
$ 812 | Aprikosenkompott
$ 811 | Kirschkompott
$ 810 | Birnenkompott
$ 809 | Strawberry Kompott
$ 808 | Kirschkompott
$ 807 | Quittenkompott
$ 806 | Ananaskompott
$ 805 | Apfelkompott
$ 804 | Getrocknete Weintrauben
$ 803 | Prunes
$ 802 | Getrocknete Aprikosen
$ 801 | Getrocknete Papaya
$ 800 | Getrocknete Pfirsiche
$ 799 | Getrocknete Mangos
$ 798 | getrockneten Litschis
$ 797 | Getrocknete Birnen
$ 796 | getrocknete Feigen
$ 795 | getrocknete Sultaninen
$ 794 | Getrocknete Kirschen
$ 793 | Getrocknete Äpfel
$ 792 | Getrocknete Cranberries
$ 791 | Aprikosensaft
$ 790 | Pfirsichsaft
$ 789 | Kokosmilch
$ 788 | Grapefruitsaft
$ 787 | Cranberries
$ 786 | Erdbeeren
$ 785 | Som
$ 784 | Greengage Pflaume
$ 783 | Obst
$ 782 | Rote Johannisbeeren
$ 781 | Passion Fruit
$ 780 | Papaya
$ 779 | Nektarinen
$ 778 | Lime
$ 777 | Lychee
$ 776 | Kumquat
$ 775 | Clementinen
$ 774 | Aprikosen
$ 773 | Guava
$ 772 | Pomegranate
$ 771 | Schwarze Johannisbeeren
$ 770 | Heidelbeere
$ 769 | Star Fruit
$ 768 | Zuckermelonen
$ 767 | Holunderbeeren
$ 766 | Pflaume Besztercei
$ 765 | Avocado
$ 764 | Steinpilze
$ 763 | Shiitake-Pilze
$ 762 | Portabella Pilze
761 $ | Grosse Sonnenschirm
$ 760 | Maitake Pilze
$ 759 | Morel
$ 758 | White mushrooms
$ 757 | Enoki-Pilzen
$ 756 | mushroom
$ 755 | Pilz Brown
$ 754 | Tulgur
$ 753 | Tapioka-Perlen
$ 752 | Roggenflocken
$ 751 | Reisstärke
$ 750 | Puffed Millet
$ 749 | Puffweizen Wind
$ 748 | Puffweizen
$ 747 | Muesli
$ 746 | Maisstärke
$ 745 | Sorghum
$ 744 | Weizen Flocken
$ 743 | Weizenstärke
$ 742 | Kartoffelstärke
$ 741 | Gerstenflocken
$ 740 | Barley Groats
$ 739 | Amarántpehely
$ 738 | Amaranth
$ 737 | Wild Rice (gekocht)
$ 736 | Wild Rice (trocken)
$ 735 | Jasmin-Reis (gekocht)
$ 734 | Jasminreis (trocken)
$ 733 | Weißer Reis (gekocht)
$ 732 | Weißer Reis (trocken)
$ 731 | Basmati-Reis (gekocht)
$ 730 | Basmati-Reis (trocken)
$ 729 | brauner Reis (gekocht)
$ 728 | Brauner Reis (trocken)
$ 727 | Arborio Reis (gekocht)
$ 726 | Arborioreis (trocken)
$ 725 | Haferflocken
$ 724 | Vollkornmehl
$ 723 | Tápiókaliszt
$ 722 | Hirsemehl
$ 721 | Grahamliszt
$ 720 | Hartweizen
$ 719 | Cirokliszt
$ 718 | Weizen Gebäck Mehl
$ 717 | Weizenmehl
$ 716 | Gerstenmehl
$ 715 | Wasser
$ 713 | Bouillonwürfel
$ 712 | Fischwürfel
$ 711 | Creamer
$ 710 | Hühnersuppe Würfel
$ 709 | Rotweinessig
$ 708 | Reisessig
$ 707 | Obstessig
$ 706 | Weißweinessig
$ 705 | Das Essig
$ 704 | Balsamicoessig
$ 703 | Apfelessig
$ 702 | Meerrettich Mayonnaise
$ 701 | Spagettikrém
$ 700 | Gulaschcreme
$ 699 | Thousand Island Dressing
$ 698 | Chilikrém
$ 697 | Chili Sauce
$ 696 | Barbecue-Sauce
$ 695 | Salbei (Kraut)
$ 694 | Sellerie (Gewürz)
$ 693 | Onions (Gewürz)
$ 692 | Vanilla (Gewürz)
$ 691 | Kerbel (Gewürz)
$ 690 | Meerrettich (Gewürz)
$ 689 | Estragon (Kraut)
$ 688 | Nutmeg (Gewürz)
$ 687 | Nelken (Gewürz)
$ 686 | Piment (Gewürz)
$ 685 | Salz (Spice)
$ 684 | Safran (Würzmittel)
$ 683 | Rosemary (Würzmittel)
$ 682 | Kümmel (Gewürz)
$ 681 | Red pepper (Gewürz)
$ 680 | Parsley (Gewürz)
$ 679 | Oregano (Kraut)
$ 678 | Senfsamen (Gewürz)
$ 677 | Majoran (Kraut)
$ 676 | Kurkuma (Gewürz)
$ 675 | Caraway (Gewürze)
$ 674 | Koriander (Gewürz)
$ 673 | Capers (Gewürz)
$ 672 | Dill (Kraut)
$ 671 | Thyme (Kraut)
$ 670 | Ginger (Gewürz)
$ 669 | Bockshornklee (Gewürz)
$ 668 | Knoblauch (Gewürz)
$ 667 | Spearmint (Gewürz)
$ 666 | White Pepper (Gewürz)
$ 665 | Cinnamon (Gewürz)
$ 664 | Fennel (Gewürz)
$ 663 | Chili (Spice)
$ 662 | Curry (Gewürz)
$ 661 | Cayenne Pfeffer (Gewürz)
$ 660 | Peppermint (Kraut)
$ 659 | Bohnenkraut (Kraut)
$ 658 | Pepper (Gewürz)
$ 657 | Basil (Kraut)
$ 656 | Bay Blätter (Kräuter)
$ 655 | Anise (Gewürze)
$ 654 | Reissirup
$ 653 | Pektin
$ 652 | Cane
$ 651 | Melasse
$ 650 | Malzsirup
$ 649 | Mais
$ 648 | Kristallzucker
$ 647 | Ahornsirup
$ 646 | Maple Zucker
$ 645 | Sirup Grenadines
$ 644 | Glucose (Dextrose)
$ 643 | Fructose (Fruchtzucker)
$ 642 | Cirokszirup
$ 641 | Befőzőcukor
$ 640 | Brown Sugar
$ 639 | Aspartam
$ 638 | Butternusskürbis
$ 637 | Kürbiskerne
$ 636 | Pekannüsse
$ 635 | Macadamia-Nüsse
$ 634 | Hickory
$ 633 | Cottonseed
$ 632 | Ginkgo Nüsse
$ 631 | Pinienkerne
$ 630 | Brazil Nuts
$ 629 | Haselnuss Bush
$ 628 | Kalbsnieren
$ 627 | Kalbsmark
$ 626 | Kalbslungen
$ 625 | Veal heart
$ 624 | Mai Veal
$ 623 | Kalbsmilz
$ 622 | Kalbskoteletts
$ 621 | Lamm Niere
$ 620 | Sheep Mark
$ 619 | Lamb Lungen
$ 618 | Sheep Herzen
$ 617 | Sheep Sprache
$ 616 | Sheep May
$ 615 | Sheep Kraft
$ 614 | Lammkoteletts
$ 613 | Lammlende
$ 612 | Red Wine
$ 611 | Bier
$ 610 | Sütőrum
$ 609 | Brandy
$ 608 | Likör
$ 607 | Gin
$ 606 | Weißwein
$ 605 | Bier
$ 604 | Cider
$ 603 | Whiskey
$ 602 | Vermouth
$ 601 | Brandy 40 Vol%
$ 600 | Likör
$ 599 | Cognac
$ 598 | Kirschbrand
$ 597 | Champagner
$ 596 | Rotwein 12 Vol%
$ 595 | Weißwein 12,5% Vol
$ 594 | Bier (alkoholfrei)
$ 593 | Bier
$ 592 | Alkoholische Getränke
$ 591 | Traubensaft
$ 590 | kohlensäurehaltige Erfrischungsgetränke, Licht
$ 589 | kohlensäurehaltige Erfrischungsgetränke mit Zucker
$ 588 | Rüben-Saft
$ 587 | Tomatensaft
$ 586 | Orangensaft
$ 585 | Lipton Ice Tea Lemon
$ 584 | Zitronensaft
$ 583 | Céklalé
$ 582 | Mineral Water
$ 581 | Apfelsaft
$ 580 | Eröleves Rahmen 1, 10 g
$ 579 | Eröleves Würfel
$ 578 | Eröleves Suppenwürfel
$ 577 | Bohnen mit Chilipulver, Knorr
$ 576 | Milchschokolade
$ 575 | Sour Candy
$ 574 | Baby Sponge
$ 573 | Sesame
$ 572 | Pistachios
$ 571 | Paranüsse
$ 570 | Leinsamen
$ 569 | Sonnenblumenkerne
$ 568 | Nüsse, gesalzen geröstet
$ 567 | Coconut
$ 566 | Cashew
$ 565 | Mayo, Licht
$ 564 | Globus Mustard
$ 563 | Globus Mayonnaise
$ 562 | Globus Ketchup
$ 561 | Flora Herz-gesunde Mayonnaise
$ 560 | Sojaöl
$ 559 | Rapsöl
$ 558 | Sonnenblumenöl
$ 557 | Leinsamen
$ 556 | Maiskeimöl
$ 555 | Erdnussöl
$ 554 | Klette
$ 553 | Harmonia Margarine RAMA
$ 552 | rama sütömargarin
$ 551 | RAMA fözömargarin
$ 550 | FLORA Herz-gesunde Margarine
$ 549 | FLORA pro-activ Margarine
$ 548 | Delma Margarine (Multivitamin)
$ 547 | Bertolli Margarine (Olivenöl)
$ 546 | Fat Coconut
$ 545 | Butter
$ 544 | Bratkartoffeln
$ 543 | Salzkartoffeln
$ 542 | Kartoffelkroketten
$ 541 | Haferkleie
$ 540 | Dinkel
$ 539 | Roggen (Vollkorn)
$ 538 | Rice (gefräst, poliert)
$ 537 | Cornflakes
$ 536 | Maismehl
$ 535 | Dining keméníyítö
$ 534 | Weizenmehl (Vollkorn)
$ 533 | Weizenmehl
$ 532 | Crowns
$ 531 | Brot (wet) 1 x 60 g
$ 530 | Brot (Wasser)
$ 529 | Trockentest (8 Eier)
$ 528 | Trockenteigwaren (4 Eier)
$ 527 | Spaghetti (Durilo, durumlisztböl)
$ 526 | Spaghetti
$ 525 | Kuchen, Teper. 6 Stück
$ 524 | Kuchen, Käse 6 Stück
$ 523 | Muesli, Sirius (1pc, 25 g)
$ 522 | Biscuits (Guten Morgen)
$ 521 | Cocoa Schnecke 1 Stück (52g)
$ 520 | Cocoa Schnecke
$ 519 | Guten Morgen Kekse (Győr süß, 4 x 50 g)
$ 518 | Croissant (mit Milch)
$ 517 |. Telj.kiörl.kenyér 1szel = 25 g
$ 516 | Weißbrot (hausgemachte Natur)
$ 515 | Zwieback
$ 514 | Tofu
$ 513 | Szójagranulátum
$ 512 | Sojabohnen (trocken)
$ 511 | Soybean
$ 510 | Gelbe Erbsen (trocken)
$ 509 | Linsen (trocken)
$ 508 | Kopfhörern Bohnen
$ 507 | Kichererbsen (trocken)
$ 506 | kann von Bohnen
$ 505 | Beans (trocken)
$ 504 | Pfifferlinge
$ 503 | Big mushroom özláb
$ 502 | Pilz (wild)
$ 501 | Green Pea freeze
$ 500 | Sellerie
$ 499 | Knollensellerie
$ 498 | Pumpkins, Kochen
$ 497 | Onions
$ 496 | Sojasprossen
$ 495 | Pumpkins
$ 494 | Radish
$ 493 | ​​Petersilie
$ 492 | Petersilienwurzel
$ 491 | Oliven
$ 490 | Mais, süß
$ 489 | Kínaikel
$ 488 | Rosenkohl
$ 487 | Kohl
$ 486 | Kopfsalat
$ 485 | Grapes
$ 484 | Plum (getrocknet)
$ 483 | Plum (Bistrita)
$ 482 | Melonen (Gelb Fleisch)
$ 481 | Aprikosenmarmelade
$ 480 | Johannisbeeren, schwarz
$ 479 | Johannisbeeren
$ 478 | Pfirsichkompott
$ 477 | Pfirsiche
$ 476 | Mango
$ 475 | Grapefruit
$ 474 | Feigen (getrocknet)
$ 473 | Feigen (frisch)
$ 472 | Strawberry
$ 471 | Termine (getrocknet)
$ 470 | Avocado
$ 469 | Cranberry
$ 468 | Äpfel (getrocknet)
$ 464 | Tuna, Öl
$ 463 | Sardine, Öl
$ 462 | Hering, Tomaten.
$ 461 | Hering, Öl
$ 460 | Hering, eingewickelt
$ 459 | Cod
$ 458 | Tuna
$ 457 | Squid
$ 456 | Perch
$ 455 | Karpfen (Spiegel)
$ 454 | Trout
$ 453 | Sole
$ 452 | Mackerel
$ 451 | Flunder
$ 450 | Lachs (frisch)
$ 449 | Bream
$ 448 | Heck
$ 447 | Catfish
$ 446 | Shrimp
$ 445 | Zahnrad-
$ 444 | Schwarze Miesmuscheln
$ 443 | Pike
$ 442 | Busa
$ 441 | Eels
$ 440 | Greaves
$ 439 | Bacon, Cluj
$ 438 | Speck, Rauch
$ 437 | Bacon, Tschetschenien
$ 436 | Bacon, Speck
$ 435 | Combustion. Putenbrust mit Schinken
$ 434 | Maschinen Ham
$ 433 | Kaiser von Fleisch, gekocht
Cut-Tour | $ 432
$ 431 | Beef Leberpastete
$ 430 | Päpstlichen Doubles
$ 429 | Italienisch Aufschnitt
$ 428 | Mortadella
$ 427 | Lecsó Sausage
$ 426 | Leberwurst
$ 425 | Hurka, bloody
$ 424 | Hurka, Leber
$ 423 | Hausgemachte Wurst
$ 422 | geräucherte Wurst
$ 421 | Geräuchertes, gekochtes Schweinefleisch
$ 420 | Farmer kalt
$ 419 | Sausage Scouts
$ 418 | Csaba Wurst
$ 417 | Kidney (Wade)
$ 416 | Velo (Alle)
$ 415 | Kutteln
$ 414 | Schweineleber
$ 413 | Hähnchen
$ 412 | Swan
$ 411 | Putenbrust
$ 410 | Gans, Braten
$ 409 | Ente, Braten
$ 408 | Entenbrust
$ 407 | Chicken (Scheiben)
$ 406 | Chicken (Wein)
$ 405 | Hähnchen
$ 404 | Wildes Kaninchen
$ 403 | Boar
$ 402 | Deer
$ 401 | Öz
$ 400 | Beefsteak
$ 399 | Lamm
$ 398 | Lammkeule
$ 397 | Kalbszunge
$ 396 | Kalbsbrust
$ 395 | Waden Farha
$ 394 | Kalbshaxe
$ 393 | Kalbfleisch Rippen (Scheiben)
$ 392 | Kalbsfilet
$ 391 | Sirloin (Scheiben)
$ 390 | Schweinerippchen
$ 389 | Schweinezunge
$ 388 | Schweinenacken
$ 387 | Schweineschulter
$ 386 | Schweinebäuche
$ 385 | Pork Knuckle
$ 384 | Schweinekeule, Schweinekotelett
$ 383 | Schweinerippchen (Scheiben)
$ 382 | Bruststück
$ 381 | Rinderzunge
$ 380 | Rindfleisch Rippchen
$ 379 | Lendenbraten, Soft
$ 378 | Beef Sirloin Hoch
$ 377 | Lendenbraten, flach
$ 376 | Beef Schulter
$ 375 | Beefsteak
$ 374 | Trappistenkäse (halbhart)
$ 373 | Sahne und Frischkäse (soft)
$ 372 | Parmesan Charakter (hart)
$ 371 | Parenica, geräucherter Schinken mit Käse (Er steht auf.)
$ 370 | Marmor-Käsekuchen, cremiger Form unter Kalkulation
$ 369 | Caravan geräucherter Käse
$ 368 | Göcsej Gourmet-Käse (weich)
$ 367 | Auf meinem Tali, Pannonia (hart)
$ 366 | Edamer Käse (halbhart)
$ 365 | Camping Schmelzkäse
$ 364 | Camembert Form unter Kalkulation (Tihany)
$ 363 | Camembert Form unter Kalkulation (Bakonyerdő)
$ 362 | Balaton Käse (halbhart)
$ 361 | Aniko Käse (halbhart)
$ 360 | Fettmilchpulver
$ 359 | Creme Quark, Rosinen, Vanille
$ 358 | Hüttenkäse, halbfette
$ 357 | Gesucht
$ 356 | Milch, Ziegenkäse
$ 355 | Kefir
$ 354 | Europäischer Kefir 2,7%
$ 353 | Joghurt, Obst
$ 352 | Saure Sahne (12% Fett)
$ 351 | Saure Sahne (20% Fett)
$ 350 | Kaffeesahne
$ 349 | Schaumcreme
$ 348 | Milch, Magerschokoladen
$ 347 | Milchschokolade
$ 346 | Schafsmilch
$ 345 | H-Milch, haltbar
$ 344 | pasteurisierter Kuhmilch (1,5% Fett dauert)
$ 343 | pasteurisierter Kuhmilch (2,8% Fett dauert)
$ 342 | Cattle oben
$ 341 | Schlagsahne
$ 340 | Knöchel
$ 339 | Schweinefleisch
$ 338 | Olivenöl
$ 337 | Koriander
$ 336 | Paprika
$ 335 | Öl
$ 334 | szekfüszeg
$ 333 | gemahlener schwarzer Pfeffer
$ 332 | weißer Pfeffer
$ 331 | Thymian
$ 330 | Spinat
$ 329 | Salbei
$ 328 | Oregano
$ 327 | Majoran
$ 326 | Basilikum
$ 325 | Zimt
$ 324 | Pepper
$ 322 | Milch
$ 321 | Mehl
$ 320 | Salz
$ 315 | Queen (Orange, Zitrone) Licht
$ 314 | Pepsi Light, Coca-Cola light
$ 313 | Dietary (light) Softdrinks, (Dei Naranca
$ 312 | Garten (gemischt, Birne, Aprikose, Herbst
$ 311 | Dietary (light) Säfte (BB, Top Jo
$ 310 | Arola Orangen, Zitronen
$ 309 | Coca-Cola, Pepsi-Cola, 7-Up
$ 308 | Canada Dry
$ 307 | 10,5 B-Grad-Licht
$ 306 | Pilsen, Dreher, Spaten usw. Gold-Fassl.
$ 305 | Nectar Bier
$ 304 | Dietary Bier
$ 303 | Alkoholfreies Bier
$ 302 | Unicum
$ 301 | Tojáslikör
$ 300 | Hubertus
$ 299 | Csokoládéflipp
$ 298 | Pear
$ 297 | Kirschbrand
$ 296 | Tokay
$ 295 | Sekt (Durchschnitt)
$ 294 | Süße
$ 293 | Desktop
$ 292 | Butter
$ 291 | Greaves
$ 290 | Bacon (geräuchert)
$ 289 | Lard
$ 288 | Party Spreads
$ 287 | Margarine (Topper, Remia)
$ 286 | Margarine (Rama League, Hera)
$ 285 | Goose Fat
$ 284 | Speiseöl
$ 283 | Delma Margarine
$ 282 | Licht Margarine Delma
$ 281 | Speck
$ 280 | Eigelb
$ 279 | Ei
$ 278 | Eier
$ 277 | Rudi
$ 276 | Quark (Mager)
$ 275 | Cream Cheese (Rosinen, Vanille)
$ 274 | Rund records Topfen
$ 273 | Milk
$ 272 | Fruit Cream Cheese
$ 271 | Blauschimmelkäse Butter
$ 270 | Käse-Tour
$ 269 | Tolna soványsajt
$ 268 | Tihany Camembert
$ 267 | Sport, Óvári
$ 266 | Tale Käsewürfel
$ 265 | Leitha, Marmor, Pálpusztai
$ 264 | Kreuzkümmel Käse
$ 263 | Schneeglöckchen, Bojtár, Mirage
$ 262 | Göcsej
$ 261 | Knoblauch Fettkäse
$ 260 | Emmentaler
$ 259 | Cow (Rohr)
$ 258 | Bakonyerdő Camembert
$ 257 | Plattensee, Edam, Trappist
$ 256 | verarbeiteten Käsewürfel 33g
$ 255 | Creme
$ 254 | Milchkonzentrat (gesüßt)
$ 253 | Milchpulver (Mager)
$ 252 | Milchpulver (Mager)
$ 251 | Saure Sahne (kalorienarm)
$ 250 | 20% Creme
$ 249 | Durable Milch
$ 248 | Maresi Bier mit Milch
$ 247 | Kakao (mager)
$ 246 | Writer
$ 245 | Fruchtjoghurt (Mittelwert)
$ 244 | Gottheit der org. Joghurt (frutti)
$ 243 | Danone Joghurt-Mousse
$ 242 | saure Milch und Joghurt, Kefir
$ 241 | 1,5% Fett Milch
$ 240 | in Salzlake 140 g Wurst
$ 239 | Tyúkmájkrém 70g
$ 238 | Frühjahr Luncheon meat 150g
$ 237 | Schinken und Ei-Creme 65g
$ 236 | Ham and eggs 150 g
$ 235 | Rinderleber Paste 65g
$ 234 | Fetter Fisch 140g
$ 233 | Sommer húsoskrém 65g
$ 232 | Marhamájkrém 65g
$ 231 | Ungarisch gehackt 150g
$ 230 | Luncheon meat 150g
$ 229 | Sonder Brät 150g
$ 228 | Globus Fleisch 65g Creme
$ 227 | Debrecen geflügelten Creme 100g
$ 226 | Plains Paté 150g
$ 225 | Zala Meat
$ 224 | Sausage
$ 223 | Blutwurst
$ 222 | Verona
$ 221 | Hackfleisch (Mittagessen)
$ 220 | Jagd
$ 219 | Winter Salami
$ 218 | Schweinefleisch (mager)
$ 217 | Schweinefleisch (Fett)
$ 216 | Putenfleisch
$ 215 | Paris, Krinoline, saveloy
$ 214 | Italienisch Mortadella
$ 213 | Leberpastete
$ 212 | Májkrémkonzerv
$ 211 | Leberwurst
$ 210 | Rinderleber
$ 209 | Beef (mager)
$ 208 | Horse Meat
$ 207 | Foie gras
$ 206 | Gänsefleisch, Entenfleisch
$ 205 | Sausage (trocken)
$ 204 | Sausage (Ratatouille)
$ 203 | Fleisch Brot
$ 202 | Kaninchenfleisch
$ 201 | Gyulai Doubles
$ 200 | Schinken, Salami
$ 199 | Geräucherter Schinken
$ 198 | Blutwurst
$ 197 | Brawn
$ 196 | Debrecen Wurst
$ 195 | Hähnchen
$ 194 | Csaba Sausage
$ 193 | Veal
$ 192 | Mutton
$ 191 | Baromfivirsli
$ 190 | isotonische Sportgetränk
$ 189 | Dietary Sirupe (Mittelwert)
$ 188 | Obstsirupe (Mittelwert)
$ 187 | Pfirsich, Aprikose Saft
$ 186 | Tomatensaft (natürlich)
$ 185 | Garten (light) Saft
$ 184 | Orangensaft (Olympus)
$ 183 | Zitronensaft (Olympus)
$ 182 | Dietary Staus (Durchschnitt)
$ 181 | Dietary Konserven (Mittelwert)
$ 180 | Jams (Durchschnitt)
$ 179 | Konserven (Mittelwert)
$ 178 | Kürbiskerne
$ 177 | Röstkaffee
$ 176 | Nescafe
$ 175 | Haselnüsse
$ 174 | Poppy
$ 173 | Almond
$ 172 | Kastanienpaste (mélyhötött)
$ 171 | Chestnut
$ 170 | Erdnuss
$ 169 | Walnut
$ 168 | Tamarillo
$ 167 | Grapes
$ 166 | Plum
$ 165 | Blackberry
$ 164 | Melonen
$ 163 | Apricot
$ 162 | Ringló
$ 161 | Johannisbeeren (rot)
$ 160 | Johannisbeeren (schwarz)
$ 159 | Papa
$ 158 | Pfirsiche
$ 157 | Nektarine (kahl Pfirsich)
$ 156 | Mispel
$ 155 | orange
$ 154 | Kirschbaum
$ 153 | Himbeeren
$ 152 | Rosinen
$ 151 | Maracuja
$ 150 | Mandarin
$ 149 | Kokosmilch
$ 148 | Coconuts
$ 147 | Pear
$ 146 | Kiwi
$ 145 | Grapefruit
$ 144 | Watermelon
$ 143 | Bilder
$ 142 | Erdbeeren
$ 141 | Maulbeeren
$ 140 | Stachelbeeren
$ 139 | Termine
$ 138 | Hagebutte
$ 137 | Kirschbaum
$ 136 | Lemons
$ 135 | Quince
$ 134 | Bananas
$ 133 | Pineapple
$ 132 | Apple-
$ 131 | Ketchup
$ 130 | Rot Gold
$ 129 | Mustard
$ 128 | Mayonnaise
$ 127 | Csiperkekonzerv
$ 126 | Porcini
$ 125 | Szegfögomba
$ 124 | Sonnenschirm
$ 123 | Austernpilz
$ 122 | Csiperke
$ 121 | gehackten Gurken
$ 120 | Sauerkraut
$ 119 | Tomato
$ 118 | Oliven
$ 117 | Natur Ratatouille
$ 116 | Gewürzgurke
$ 115 | Csermege Gurke
$ 114 | Green Peppers
$ 113 | Green Peas
$ 112 | Green Beans
$ 111 | Sellerie
$ 110 | Glühlampen
$ 109 | Gurken
$ 108 | Pumpkin
$ 107 | Meerrettich
$ 106 | trockene Bohnen
$ 105 | Pumpkins
$ 104 | Asparagus
$ 103 | Sorrel
$ 102 | Karotten
$ 101 | Yellow Peas
$ 100 | Radieschen (Black)
$ 99 | Radieschen (red)
$ 98 | Rhabarber
$ 97 | Lauch
$ 96 | Petersilie
$ 95 | Petersilienwurzel
$ 94 | Patissons
$ 93 | Spinat
$ 92 | Tomaten
$ 91 | Aubergine
$ 90 | Mangold
$ 89 | Objektiv
$ 88 | Mais (Popcorn)
$ 87 | Mais (zum Kochen)
$ 86 | Chinakohl
$ 85 | Kale
$ 84 | Kohl (Kopf, rot)
$ 83 | Blumenkohl
$ 82 | Kohlrabi
$ 81 | Knoblauch
$ 80 | Topinambur
$ 79 | Zucchini
$ 78 | Chicorée
$ 77 | Beet
$ 76 | Kartoffeln
$ 75 | Brokkoli
$ 74 | Rosenkohl
$ 73 | Artischocken
$ 72 | Gelatine
$ 71 | Naples (Mittelwert)
$ 70 | Honig
$ 69 | Creamer (Aranka)
$ 68 | Kakaopulver
$ 67 | Speiseeis (Vanille, Schokolade)
$ 66 | Gluconat
$ 65 | Fructose
$ 64 | Speiseeis (Mittelwert)
$ 63 | Hefen
$ 62 | Pastry (Mittelwert)
$ 61 | Diabetic Wafer
$ 60 | Schokoladen-Diät (Mittelwert)
$ 59 | Diabetic Cookies (avg.)
$ 58 | Desserts (Mittelwert)
$ 57 | Candy (meine)
$ 56 | Zucker
$ 55 | Schokolade (Mittel)
$ 54 | Corvital
$ 53 | Ham-Let Biscuits 1
$ 52 | 1 Cracottes
$ 51 | Abonett
$ 50 | Weber Knäckebrot (Durchschnitt) 1
$ 49 | Paniermehl
$ 48 | Brot Brot
$ 47 | Rolls
$ 46 | Oatmeal
$ 45 | Soja-Brot
$ 44 | Sojamehl
$ 43 | Pasta (8 Eier)
$ 42 | Pasta (4 Eier)
$ 41 | Yellow Pea Mehl
$ 40 | Mehl
$ 39 | Rye
$ 38 | Reismehl
$ 37 | Reis (braun)
$ 36 | Reis
$ 35 | Strudelteig (1 Packung)
$ 34 | Puffreis
$ 33 | pudding (Mittelwert)
$ 32 | Kuchen, Butter 1
$ 31 | Kuchen, Knistern 1
$ 30 | Pretzel 1
$ 29 | Passah
$ 28 | Levegökenyér
$ 27 | Leinsamenbrot
$ 26 | Corn Flakes
$ 25 | Maisgrieß Mehl
$ 24 | Maissaatgut
$ 23 | Millet
$ 22 | Vollkornbrot 1 Stück
$ 21 | Crescent
$ 20 | Schneeglöckchen Keks
$ 19 | Haushalt Kekse
$ 18 | Buchweizen
$ 17 | Graham Mehl
$ 16 | Graham Brot
$ 15 | geflochtene Brot
$ 14 | Halbschwarzbrot
$ 13 | White Bread
$ 12 | Dietary bread Pollard
$ 11 | Rye
$ 10 | Chips
$ 9 | Brioche 1
$ 8 | Wheat (Wasserkocher)
$ 7 | bun Pollard
$ 6 | Mehl
$ 5 | Grieß
$ 4 | Weizenkeim
$ 3 | Wheat (ganze Mehl)
$ 2 | Bakonyi Schwarzbrot
$ 1 | Plain Brot
";
$cuccos=explode("$",$de);

//létrehozom az extramezőt.
	$queryc = "ALTER TABLE  `alapanyag3` ADD  `nev_de` VARCHAR( 300 ) NOT NULL AFTER  `nev` ;";
	//$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "insert");

//echo $error.'<br>';

foreach ($cuccos as $cucc){
$cu=explode(" | ",$cucc);


	$querycx = "UPDATE  `alapanyag3` SET  `nev_de` =  '".$cu[1]."' WHERE  `alapanyag3`.`id` =".$cu[0]." LIMIT 1 ;";
	$resultc =db_Query($querycx, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "insert");

echo $querycx.'<br>';
$ret[]=	$cu;
}
//arraylist($ret);*/
?>
