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
/*foreach ($alapanyaglist as $a){	
echo '$'.$a['id'].'|'.$a['nev'].'<br />';
}
/*

*/

$en="$ 1443 | brown rice flour
$ 1442 | vaníliáscukor
$ 1,441 | Plantain seed coat
$ 1440 | Agar
$ 1439 | podded beans (fevita)
$ 1438 | potato flakes
$ 1435 | (mini-phenyl) egg replacer powder
$ 1434 | (Bezgluten) egg replacer powder
$ 1433 | (balviten) Egg Replacer
$ 1,432 | (Bezgluten) cherry jelly
$ 1431 | (Bezgluten) with orange jelly
$ 1 430 | (Bezgluten) rectangular wafer
$ 1429 | pasta colorful reel (harifen)
$ 1428 | spaghetti pasta (harifen)
$ 1427 | rice, pasta, letter (harifen)
$ 1,426 | pasta, pasta reel, penne (harifen)
$ 1425 | dry pasta, noodles, egg barley (mini-fe)
$ 1424 | dry pasta, noodles, egg barley (Bezgluten)
$ 1423 | dry pasta, vermicelli, egg barley (balviten)
$ 1422 | (Barbara) ground wafer
$ 1421 | (master's family) 200g vanilla pudding
$ 1420 | (master's family) pudding with cream
$ 1419 | (master's family) pudding punch
$ 1418 | (master's family) hazelnut pudding
$ 1417 | (master's family) strawberry pudding
$ 1416 | (master's family) chocolate pudding
$ 1415 | (master's family) lemon pudding
$ 1414 | (master's family) fagyipor chocolate, vanilla, yogurt
$ 1413 | (Haas) vanilla pudding
$ 1412 | (Haas) pudding tuttifruttis
$ 1411 | (Haas) tiramisu pudding
$ 1410 | (Haas) strawberry pudding
$ 1409 | (Haas) pudding punch
$ 1408 | (Haas) French creamy pudding pudding
$ 1407 | (Haas) chocolate pudding
$ 1406 | (Haas) diabetic vanilla pudding
$ 1405 | (Haas), diabetic chocolate pudding
$ 1404 | (Dr.Oetker), vanilla pudding
$ 1403 | (Dr.Oetker) pudding tejszinÍzŰ
$ 1402 | (Dr.Oetker), butterscotch pudding
$ 1401 | (Dr.Oetker) pudding punch
$ 1400 | (Dr.Oetker) dark chocolate pudding
$ 1399 | (Dr.Oetker) strawberry pudding
$ 1398 | (Dr.Oetker), chocolate pudding
$ 1397 | (Dr.Oetker) banana pudding
$ 1396 | (Dr.Oetker) dodder creamers vanÍliaÍzŰ
$ 1395 | (Dr.Oetker) dodder creamer mogyoróÍzű
$ 1394 | (balviten) vanilla pudding
$ 1393 | (balviten) chocolate pudding
$ 1392 | (nutri free) cake flour mix
$ 1391 | (nutri free) kenyÉrpor
$ 1 390 | (farm) cake flour mix
$ 1389 | (farm) kenyÉrpor
$ 1,388 | Swabian gluten-free bread crumbs
$ 1387 | (nutri free) bread crumbs
$ 1386 | (Mantler) lactose-free flour
$ 1385 | (Ceres) breadcrumbs
$ 1384 | (Anna Panni) flour mix
$ 1383 | (balviten) breadcrumbs
$ 1382 | (balviten) baking flour mix
$ 1381 | (balviten) supreme royal mix oven
$ 1380 | (balviten) cooking flour mix
$ 1379 | (doves farm) önkelesztő flour mix
$ 1,378 | (doves farm) bread flour
$ 1377 | (doves farm) brown bread flour
$ 1376 | (m gel) cake flour
$ 1375 | (m gel) bread flour
$ 1,374 | (Vincze) extruded corn grist
$ 1373 | (magic bread), corn flour
$ 1372 | (auck hof) cornstarch
$ 1371 | chestnut flour Natur
$ 1370 | (chlorophyll), amaranth flour
$ 1369 | (Emese) kenyérpor
$ 1368 | (cornito) Gluten-free bread crumbs
$ 1367 | (Schar) Integrati pan bread crumbs
$ 1366 | (Schar) flour mix it
$ 1365 | (Schar) b mix bread flour
$ 1364 | (Schar) farina flour dough
$ 1363 | (master's family) pasta flour
$ 1362 | (master's family) dairy-free bread crumbs
$ 1361 | (master's family) kenyÉrmix
$ 1,360 | (master's family) bread flour lupinrosttal
$ 1359 | (master's family) bread flour
$ 1358 | Grape Seed Flour
$ 1357 | pumpkin seed flour
$ 1356 | (naturbit) flour mix
$ 1355 | (naturbit) albatutti Diab, gm.. kenyÉrpor
$ 1,354 | (naturbit) Alba mix
$ 1353 | (glutenix) core burn bread flour
$ 1352 | (glutenix) spongy cake baking mix
$ 1351 | (glutenix) white bread baking mix
$ 1 350 | (glutenix) corn starch
$ 1349 | (glutenix) alfamix wheat-free flour mix
$ 1348 | (glutenix) alpha mix kenyÉrpor
$ 1347 | purpose flour mixture (finax)
$ 1346 | original flour mixture (finax)
$ 1345 | rustic bread mixture (nominal)
$ 1344 | hajdinarosttal bread mixture (nominal)
$ 1343 | Bread mix flax fiber (nominal)
$ 1342 | Flour tortillas (b.corn)
$ 1341 | Groats Fine corn (b.corn)
$ 1340 | BASE FLOUR (B.CORN)
$ 1339 | DOMESTIC FLOUR Conc. (Bezgluten)
$ 1338 | more seedy bread dough flour (Bezgluten)
$ 1337 | Extra purpose flour (Bezgluten)
$ 1,336 | breadcrumbs (Bezgluten)
$ 1335 | Cookie CONCENTRATE (Bezgluten)
$ 1,334 | pancake Conc. (Bezgluten)
$ 1333 | bread dough CONC (Bezgluten)
$ 1332 | breadcrumbs (BARBARA)
$ 1331 | BREAD AND FLOUR MIXTURE KELTTÉSZTÁHOZ (BARBARA)
$ 1330 | flour mixture cooking, baking (BARBARA)
$ 1329 | Rice flakes
$ 1328 | xilovit zero
$ 1327 | spelled
$ 1326 | spelled muesli (NATURAL GOLD)
$ 1,325 | whole wheat spelled flour (VEGA BOND)
$ 1,324 | Spelt semolina (ECCOFOOD)
$ 1323 | TÖNKÖLYKORPA (ATAISZ)
$ 1322 | Zabpehelyliszt (Nature)
$ 1321 | ATAISZ oatmeal
$ 1320 | Gluten linzerpor (M-Gel)
$ 1319 | Apple sauce
$ 1318 | baking soda
$ 1317 | glutenix gluten-free brown bread baking mix
$ 1316 | mix Schär gluten-free flour mix c
$ 1315 | Apple Fibre
$ 1314 | Free baking mix From General
$ 1313 | Liquid sweetener
$ 1312 | Sugar Birch (xylylene)
$ 1309 | Furnace gluten-free flour mix
$ 1308 | liquid sweetener
$ 1307 | Bezgluten baking powder
$ 1306 | flour
$ 1305 |
$ 1304 | Barley (full seed)
$ 1303 | psyllium seed husks
$ 1302 | gluten-free flour mix reduced Albatutti CH
$ 1301 | glutenix rural gluten-free bread baking mix
$ 1300 | breads & cakes gluten-free flour mix
$ 1,299 | Alnatura organic puffed amaranth
$ 1298 | Baking powder
$ 1297 | Fat Turkeys
$ 1296 | suet
$ 1295 | Margarine (soy)
$ 1294 | Margarine (sütőmargarin)
$ 1293 | Margarine (főzőmargarin)
$ 1292 | Margarine (80% fat)
$ 1291 | Margarine (70% fat)
$ 1290 | Margarine (60% fat)
$ 1,289 | Margarine (55% fat)
$ 1288 | Margarine (40% fat)
$ 1287 | Margarine (35% fat)
$ 1286 | Margarine (20% fat)
$ 1285 | Cocoa butter
$ 1 284 | Fat Duck
$ 1283 | Chicken Fat
$ 1282 | Fat Sheep
$ 1281 | bridle
$ 1280 | Ucuhubamag oil
$ 1,279 | Pumpkin Seed Oil
$ 1278 | Cod liver oil
$ 1,277 | Teamagolaj
$ 1276 | Grape Seed Oil
$ 1275 | Sesame seed oil
$ 1274 | Nutmeg oil
$ 1,273 | Sardine oil
$ 1272 | Sheadió oil
$ 1271 | Rice Oil
$ 1270 | Tomato Seed Oil
$ 1269 | Palm oil
$ 1268 | Palm kernel oil
$ 1267 | Oil mustard
$ 1266 | Peanut Oil
$ 1265 | Menhaden fish oil
$ 1264 | Almond Oil
$ 1263 | Mákolaj
$ 1262 | macadamia oil
$ 1261 | Linseed oil
$ 1260 | Salmon Oil
$ 1,259 | corn oil
$ 1258 | Coconut Oil
$ 1257 | Hemp seed oil
$ 1256 | Herring oil
$ 1255 | Cottonseed oil
$ 1254 | Groundnut oil
$ 1253 | walnut oil
$ 1252 | Cupuassu oil
$ 1251 | Wheat germ oil
$ 1250 | Apricot Kernel Oil
$ 1249 | babassu oil
$ 1248 | Avocado
$ 1247 | celery leaves
$ 1246 | Celery root
$ 1245 | Yams
$ 1,244 | Wasabi root
$ 1,243 | Watercress
$ 1,242 | Asparagus Salad
$ 1241 | pickles
$ 1240 | Carrot juice
$ 1239 | Parsnips
$ 1238 | Palm Heart
$ 1237 | Okra
$ 1236 | Lapugyökér
$ 1235 | cucumber
$ 1234 | Carrots Round
$ 1233 | Thistle
$ 1232 | Cabbage Salad
$ 1,231 | Dill
$ 1230 | Hummus
$ 1229 | Seaweed
$ 1228 | Pumpkin Cooking
$ 1227 | Black radish
$ 1226 | Turnips
$ 1225 | Endive Salad
$ 1224 | Sweet Beet
$ 1223 | Pickled Cucumber
$ 1222 | Chicory roots
$ 1221 | Bamboo Shoots
$ 1220 | Serrano peppers
$ 1219 | Tomatoes Peppers
$ 1218 | jalapeno pepper
$ 1217 | Pepper Meal
$ 1216 | Chili peppers (green)
$ 1215 | Chili peppers (red)
$ 1214 | Red cabbage
$ 1213 | Marine cabbage
$ 1212 | Napa cabbage
$ 1211 | Purple Cabbage
$ 1210 | kale
$ 1,209 |)
$ 1208 | cabbage
$ 1207 | onions
$ 1206 | Chive
$ 1205 | Póréhaygma
$ 1204 | Shallots
$ 1203 | Chives
$ 1202 | Purple Onion
$ 1201 | Pearl Onions
$ 1,200 | Sweet potatoes (boiled)
$ 1199 | Potatoes (oven and baked in shell)
$ 1198 | Potatoes (fried)
$ 1,197 | Potatoes (boiled)
$ 1196 | peas (cooked)
$ 1195 | Peas (dry)
$ 1194 | Red Lentils (cooked)
$ 1,193 | Red Lentils (dry)
$ 1192 | Yellow peas (cooked)
$ 1191 | Lenses (cooked)
$ 1190 | Pigeon peas (cooked)
$ 1189 | Pigeon Peas (dry)
$ 1,188 | Chick peas (cooked)
$ 1187 | Green beans (cooked)
$ 1186 | Beans (dry)
$ 1185 | French beans (cooked)
$ 1184 | French beans (dry)
$ 1183 | Kidney beans (cooked)
$ 1182 | Kidney beans (dry)
$ 1181 | Tengerészbab (cooked)
$ 1180 | Tengerészbab (dry)
$ 1179 | pinto beans (cooked)
$ 1,178 | pinto beans (dry)
$ 1177 | Soya beans (cooked)
$ 1176 | Szárnyasbab (cooked)
$ 1175 | Szárnyasbab (dry)
$ 1174 | Sárgabab (cooked)
$ 1173 | Sárgabab (dry)
$ 1172 | Pink beans (cooked)
$ 1171 | Pink beans (dry)
$ 1170 | Roman beans (cooked)
$ 1169 | Roman beans (dry)
$ 1,168 | pinto beans (cooked)
$ 1167 | pinto beans (dry)
$ 1166 | Mung Bean (cooked)
$ 1,165 | Mung Bean (dry)
$ 1164 | lima beans (cooked)
$ 1163 | lima beans (dry)
$ 1162 | Chinese long beans (cooked)
$ 1161 | Chinese long beans (dry)
$ 1,160 | Jácintbab (cooked)
$ 1159 | Jácintbab (dry)
$ 1158 | Black beans (cooked)
$ 1157 | Black beans (dry)
$ 1156 | White beans (cooked)
$ 1155 | White beans (dry)
$ 1154 | Favabab (cooked)
$ 1153 | Favabab (dry)
$ 1,152 | Farkasbab (cooked)
$ 1151 | Farkasbab (dry)
$ 1150 | broad beans (cooked)
$ 1149 | broad beans (dry)
$ 1148 | adzuki beans (cooked)
$ 1147 | adzuki beans (dry)
$ 1146 | Wild Rabbit Meat
$ 1145 | Vadlúdhús
$ 1144 | Boar Meat
$ 1143 | reindeer meat
$ 1142 | Pézsmapatkányhús
$ 1141 | Őzhús
$ 1140 | Oposszumhús
$ 1139 | Raccoon Meat
$ 1138 | Squirrel Meat
$ 1137 | Bear Meat
$ 1136 | Goats
$ 1135 | meat of sheep
$ 1134 | Moose Meat
$ 1133 | buffalo meat
$ 1,132 | Sheep Meat
$ 1131 | Frogs' legs
$ 1130 | Antilophús
$ 1129 | powdered)
1128 USD | Hen Eggs (powdered)
$ 1127 | Hen eggs (fried egg)
$ 1126 | hen egg (omelet)
$ 1125 | Hen eggs (scrambled)
$ 1124 | Hen eggs (poached)
$ 1123 | hen egg (protein)
$ 1122 | Hen eggs (yolk)
$ 1121 | Hen eggs (cooked)
$ 1120 | Hen eggs (raw)
$ 1119 | turkey eggs
$ 1118 | Goose Egg
$ 1117 | Duck Egg
$ 1116 | quail
$ 1115 | Glass noodles (cooked)
$ 1114 | Glass Pasta (dry)
$ 1,113 | Whole-grain pasta (cooked)
$ 1,112 | Whole-grain pasta (dry)
$ 1111 | Pasta (2 eggs)
$ 1110 | spaghetti (cooked)
$ 1109 | Spaghetti (dry)
$ 1108 | Somen noodles (cooked)
$ 1107 | Somen noodles (dry)
$ 1106 | Soba noodles (cooked)
$ 1105 | Soba noodles (dry)
$ 1104 | Rice noodles (cooked)
$ 1103 | Rice noodles (dry)
$ 1102 | Pie Dough
$ 1101 | Quinoa
$ 1100 | Hominy (8 eggs)
$ 1099 | Penne Pasta (4 eggs)
$ 1,098 | Penne Pasta (2 eggs)
$ 1097 | wholemeal)
$ 1096 | Noodles (cooked)
$ 1095 | Noodles (dry)
$ 1094 | Corn Pasta (cooked)
$ 1093 | Corn Pasta (dry)
$ 1092 | Durumtészta (cooked)
$ 1091 | Durumtészta (dry)
$ 1090 | spreads
$ 1089 | Butter (light)
$ 1088 | Sour cream (20%)
$ 1087 | Sour cream (12%)
$ 1085 | Yogurt
$ 1084 | Ice cream (fat-free)
$ 1083 | Ice cream (light)
$ 1082 | Ice cream
$ 1081 | Cooking Cream
$ 1080 | Ice cream
$ 1079 | curd cheese (fat)
$ 1078 | curd cheese (lean)
$ 1077 | Cream Cheese
$ 1076 | Wanted
$ 1075 | Gomolyatúró
$ 1074 | Milk (3.6%) in
$ 1073 | Milk (2.8%) in
$ 1072 | Milk (1.5%) in
$ 1071 | Milk (0.1%) in
$ 1 070 | Condensed Milk
$ 1069 | Goat Milk
$ 1068 | Buffalo Milk
$ 1067 | Curd
$ 1066 | Trappist cheese
$ 1065 | Tilsitt cheese
$ 1064 | Romano cheese
$ 1063 | Roquefort cheese
$ 1062 | ricotta cheese
$ 1061 | provolone cheese
$ 1060 | Parmesan cheese
$ 1059 | cheese Parenica
$ 1058 | pálpusztai cheese
$ 1057 | cheese Óvári
$ 1056 | Neufchatel cheese
$ 1055 | Muenster cheese
$ 1054 | Mozzarella cheese
$ 1053 | Monterey cheese
$ 1052 | Mascarpone cheese
$ 1051 | Marble Cheese
1050 USD | Limburger cheese
$ 1049 | Cream cheese
$ 1048 | Blue Cheese
$ 1047 | Goat cheese
$ 1046 | havarti cheese
$ 1,045 | halloumi cheese
$ 1044 | Gruyere cheese
$ 1043 | Gouda cheese
$ 1042 | Gorgonzola cheese
$ 1041 | Fontina cheese
$ 1040 | Feta cheese
$ 1039 | Emmentaler cheese
$ 1038 | Edam cheese
$ 1037 | Colby cheese
$ 1036 | Cheshire Cheese
$ 1035 | Cheddar cheese
$ 1034 | Camembert
$ 1033 | Brie cheese
$ 1032 | Soybean Curd (Tofu)
$ 1031 | Soya Milk
$ 1030 | Soy sauce
$ 1029 | Soy fasírtpor
$ 1028 | Soya Flakes
$ 1027 | Soya Paris
$ 1026 | Soya Cubes
$ 1025 | Soybeans
$ 1024 | Goose Meat
$ 1023 | Duck Meat
$ 1022 | Pigeon Meat
$ 1021 | Fürjhús
$ 1020 | Pulykamáj
$ 1019 | turkey gizzard
$ 1,018 | turkey hearts
$ 1017 | turkey wings
$ 1016 | turkey neck
$ 1015 | turkey breast
$ 1014 | Turkey back
$ 1013 | Turkey thigh
$ 1012 | turkey giblets
$ 1011 | Csirkezúza
$ 1010 | Chicken Heart
$ 1009 | chicken wings (fried)
$ 1008 | chicken wings (fried)
$ 1007 | Chicken Wing (steamed)
$ 1006 | cooked)
$ 1005 | Chicken Neck (fried)
$ 1004 | Chicken Neck (cooked)
$ 1003 | Chicken (fried)
$ 1002 | Chicken (fried)
$ 1001 | Chicken (boiled)
$ 1000 | Chicken Legs (deep fried)
$ 999 | Chicken Feet (fried)
$ 998 | Chicken Feet (steamed)
$ 997 | When chicken (breaded)
$ 996 | When chicken (fried)
$ 995 | When chicken (boiled)
$ 994 | Skin Chicken (fried)
$ 993 | Skin Chicken (fried)
$ 992 | Chicken Skin (steamed)
$ 991 | giblets (fried)
$ 990 | giblets (cooked)
$ 989 | Chicken thighs (fried)
$ 988 | Chicken thighs (fried)
$ 987 | Chicken thighs (steamed)
$ 986 | Chicken drumsticks (fried)
$ 985 | Chicken drumsticks (fried)
$ 984 | Chicken drumsticks (steamed)
$ 983 | Fried)
$ 982 | fried)
$ 981 | steamed)
$ 980 | Chicken (fried)
$ 979 | Chicken (fried)
$ 978 | Chicken (boiled)
$ 977 | Cheese Tallér
$ 976 | Tortilla
$ 975 | Ropi
$ 974 | Rágogumi
$ 973 | Popcorn
$ 972 | Pretzel
$ 971 | tiny
$ 970 | Naples
$ 969 | Peanut Butter
$ 968 | Hazelnut Cream
$ 967 | Frozen chestnut paste
$ 966 | Mézespuszedli
$ 965 | Liquorice
$ 964 | Marzipan
$ 963 | Marshmallow
$ 962 | Linzer
$ 961 | Halva
$ 960 | Cooking Chocolate
$ 959 | White Chocolate
$ 958 | extruded corn flakes
$ 957 | Dark chocolate (70-85% cocoa)
$ 956 | Dark chocolate (60-69% cocoa)
$ 955 | Dark chocolate (45-59% cocoa)
$ 954 | Sweet Biscuits
$ 953 | Sweet biscuits
$ 952 | Pastry
$ 951 | Candy
$ 950 | Chips (fries)
$ 949 | pork kidney
$ 948 | pork marrow
$ 947 | Pig lungs
$ 946 | Pig heart
$ 945 | pork liver
$ 944 | Pig spleen
$ 943 | Pork Stomach
$ 942 | pork bacon
$ 941 | Pork chop
$ 940 | Pigs Ear
$ 939 | Pig Tail
$ 938 | pork leg
$ 937 | Pork chops
$ 936 | Curd bundle
$ 935 | cake (butter)
$ 934 | cake (crackling)
$ 933 | Pita (whole wheat)
$ 932 | Pita (white flour)
$ 931 | Sponge Roll
$ 930 | Pancakes
$ 929 | Muffin
$ 928 | jam tart
$ 927 | bundt
$ 926 | Cake
$ 925 | Waffles
$ 924 | Donut
$ 923 | Walnut snail
$ 922 | Brioche
$ 921 | Milk-wheat bread
$ 920 | Milk-wheat croissant
$ 919 | wholemeal bread
$ 918 | wholemeal rolls
$ 917 | Zabkorpás bread
$ 916 | pumpkin seed bread
$ 915 | wholemeal bread
$ 914 | Italian bread
$ 913 | Raisin Bread
$ 912 | Magvas brown bread
$ 911 | Core bread
$ 910 | linseed brown bread
$ 909 | Corn bread
$ 908 | French bread
$ 907 | White bread
$ 906 | Elizabeth bread
$ 905 | Dabas rye bread
$ 904 | bread Pollard
$ 903 | Búzacsírás bread
$ 902 | Potato Bread
$ 901 | Beef kidney
$ 900 | Beef marrow
$ 899 | beef lung
$ 898 | Beef heart
$ 897 | beef brisket
$ 896 | Beef tongue
$ 895 | Beef May
$ 894 | Beef force
$ 893 | Beef top sirloin
$ 892 | Beef thigh
$ 891 | Beef rib
$ 890 | Beef tenderloin
$ 889 | beef bottom sirloin
$ 888 | lean)
$ 887 | moderate-fat)
$ 886 | Oily)
$ 885 | saveloy
$ 884 | pork sausage
$ 883 | Spam
$ 882 | crinoline
$ 881 | patty
$ 880 | bacon
$ 879 | Tourist Salami
$ 878 | paprika salami
$ 877 | Summer salami
$ 876 | Boar Sausage
$ 875 | Dry Sausage
$ 874 | frying sausage
$ 873 | Turkey Sausage
$ 872 | Gyulai sausage
$ 871 | Cooking Sausage
$ 870 | Chorizo ​​Sausage
$ 869 | Zala cold
$ 868 | cut Verona
$ 867 | Spring cold
$ 866 | Swine Paris
$ 865 | turkey ham
$ 864 | parma ham
$ 863 | Farmhouse Ham
$ 862 | Beef Paris
$ 861 | Poultry Paris (cheese)
$ 860 | Poultry Paris
$ 859 | Blue crab
$ 858 | Lobster
$ 857 | Dungeness crab
$ 856 | Octopus
$ 855 | Oysters
$ 854 | whelk
$ 853 | Mussels
$ 852 | Scallops
$ 851 | Abalone shells
$ 850 | Redfish
$ 849 | Butterfish
$ 848 | Sturgeon
$ 847 | Tilapia
$ 846 | tomato)
$ 845 | oily)
$ 844 | Carp
$ 843 | Pompano fish
$ 842 | turbot
$ 841 | halibut
$ 840 | High whitefish
$ 839 | Fish Heaven
$ 838 | mackerel
$ 837 | Salmon
$ 836 | Prawns
$ 835 | red)
$ 834 | Swordfish
$ 833 | Herring
$ 832 | Spotted weakfish
$ 831 | Wolf Fish
$ 830 | snapper
$ 829 | Shark
$ 828 | croaker
$ 827 | American shad
$ 826 | Anchovies
$ 825 | plum jam
$ 824 | blackberry jam
$ 823 | Apricot jam
$ 822 | currant jam
$ 821 | peach jam
$ 820 | cherry jam
$ 819 | raspberry jam
$ 818 | Strawberry jam
$ 817 | Rosehip jam
$ 816 | Cherry jam
$ 815 | Quince jam
$ 814 | blueberry jam
$ 813 | plum compote
$ 812 | apricot compote
$ 811 | cherry compote
$ 810 | pear compote
$ 809 | Strawberry compote
$ 808 | cherry compote
$ 807 | Quince compote
$ 806 | pineapple compote
$ 805 | apple compote
$ 804 | Dried grapes
$ 803 | Prunes
$ 802 | Dried apricots
$ 801 | Dried papaya
$ 800 | Dried peaches
$ 799 | Dried mango
$ 798 | dried lychees
$ 797 | Dried pears
$ 796 | dried figs
$ 795 | dried sultanas
$ 794 | Dried cherries
$ 793 | Dried apples
$ 792 | Dried cranberries
$ 791 | Apricot juice
$ 790 | Peach juice
$ 789 | Coconut Milk
$ 788 | Grapefruit juice
$ 787 | Cranberries
$ 786 | Strawberries
$ 785 | Som
$ 784 | Greengage plum
$ 783 | Fruits
$ 782 | Red currants
$ 781 | Passion Fruit
$ 780 | Papaya
$ 779 | Nectarines
$ 778 | Lime
$ 777 | Lychee
$ 776 | Kumquat
$ 775 | Clementines
$ 774 | Apricots
$ 773 | Guava
$ 772 | Pomegranate
$ 771 | Blackcurrants
$ 770 | Bilberry
$ 769 | Star Fruit
$ 768 | Sugar Melons
$ 767 | elderberries
$ 766 | plum Besztercei
$ 765 | Avocado
$ 764 | Porcini mushrooms
$ 763 | Shiitake mushrooms
$ 762 | portabella mushrooms
$ 761 | Big Parasol
$ 760 | Maitake mushrooms
$ 759 | Morel
$ 758 | White mushrooms
$ 757 | Enoki mushrooms
$ 756 | mushroom
$ 755 | mushroom Brown
$ 754 | Tulgur
$ 753 | tapioca pearls
$ 752 | rye flakes
$ 751 | Rice starch
$ 750 | Puffed Millet
$ 749 | Puffed wheat wind
$ 748 | Puffed Wheat
$ 747 | Muesli
$ 746 | corn starch
$ 745 | Sorghum
$ 744 | Wheat Flakes
$ 743 | Wheat starch
$ 742 | Potato starch
$ 741 | Barley Flakes
$ 740 | Barley Groats
$ 739 | Amarántpehely
$ 738 | Amaranth
$ 737 | Wild Rice (cooked)
$ 736 | Wild Rice (dry)
$ 735 | jasmine rice (cooked)
$ 734 | jasmine rice (dry)
$ 733 | White rice (cooked)
$ 732 | White rice (dry)
$ 731 | Basmati rice (cooked)
$ 730 | Basmati rice (dry)
$ 729 | brown rice (cooked)
$ 728 | Brown rice (dry)
$ 727 | Arborio rice (cooked)
$ 726 | Arborio rice (dry)
$ 725 | oatmeal
$ 724 | wholemeal flour
$ 723 | Tápiókaliszt
$ 722 | Millet flour
$ 721 | Grahamliszt
$ 720 | durum wheat
$ 719 | Cirokliszt
$ 718 | wheat pastry flour
$ 717 | Wheat flour
$ 716 | Barley Flour
$ 715 | Water
$ 713 | Bouillon cubes
$ 712 | Fish cubes
$ 711 | creamers
$ 710 | Chicken soup cubes
$ 709 | Red wine vinegar
$ 708 | Rice Vinegar
$ 707 | Fruit Vinegar
$ 706 | White wine vinegar
$ 705 | Food vinegar
$ 704 | Balsamic Vinegar
$ 703 | apple cider vinegar
$ 702 | Horseradish mayonnaise
$ 701 | Spagettikrém
$ 700 | Goulash Cream
$ 699 | Thousand Island salad dressing
$ 698 | Chilikrém
$ 697 | Chili Sauce
$ 696 | Barbecue sauce
$ 695 | sage (herb)
$ 694 | Celery (spice)
$ 693 | Onions (spice)
$ 692 | Vanilla (spice)
$ 691 | Chervil (spice)
$ 690 | Horseradish (spice)
$ 689 | Tarragon (herb)
$ 688 | Nutmeg (spice)
$ 687 | Cloves (spice)
$ 686 | Allspice (spice)
$ 685 | Salt (Spice)
$ 684 | Saffron (seasoning)
$ 683 | Rosemary (seasoning)
$ 682 | Cumin (spice)
$ 681 | Red pepper (spice)
$ 680 | Parsley (spice)
$ 679 | Oregano (herb)
$ 678 | Mustard seed (condiment)
$ 677 | Marjoram (herb)
$ 676 | Turmeric (spice)
$ 675 | Caraway (spices)
$ 674 | Coriander (spice)
$ 673 | Capers (spice)
$ 672 | Dill (herb)
$ 671 | Thyme (herb)
$ 670 | Ginger (spice)
$ 669 | Fenugreek (spice)
$ 668 | Garlic (spice)
$ 667 | Spearmint (spice)
$ 666 | White Pepper (spice)
$ 665 | Cinnamon (spice)
$ 664 | Fennel (spice)
$ 663 | Chili (Spice)
$ 662 | Curry (spice)
$ 661 | Cayenne pepper (spice)
$ 660 | Peppermint (herb)
$ 659 | savory (herb)
$ 658 | Pepper (spice)
$ 657 | Basil (herb)
$ 656 | Bay leaves (herbs)
$ 655 | Anise (spices)
$ 654 | Rice Syrup
$ 653 | Pectin
$ 652 | Cane
$ 651 | Molasses
$ 650 | malt syrup
$ 649 | corn
$ 648 | Crystal Sugar
$ 647 | Maple syrup
$ 646 | Maple Sugar
$ 645 | syrup Grenadines
$ 644 | glucose (dextrose)
$ 643 | Fructose (fruit sugar)
$ 642 | Cirokszirup
$ 641 | Befőzőcukor
$ 640 | Brown Sugar
$ 639 | Aspartame
$ 638 | butternut squash
$ 637 | pumpkin seeds
$ 636 | Pecans
$ 635 | macadamia nuts
$ 634 | hickory
$ 633 | Cottonseed
$ 632 | Ginkgo nuts
$ 631 | Pine nuts
$ 630 | Brazil Nuts
$ 629 | Hazelnut Bush
$ 628 | Veal kidney
$ 627 | Veal marrow
$ 626 | Veal lung
$ 625 | Veal heart
$ 624 | May Veal
$ 623 | calf spleen
$ 622 | Veal chops
$ 621 | lamb kidney
$ 620 | Sheep marrow
$ 619 | Lamb lung
$ 618 | Sheep heart
$ 617 | Sheep language
$ 616 | Sheep May
$ 615 | Sheep force
$ 614 | lamb chops
$ 613 | lamb loin
$ 612 | Red Wine
$ 611 | Beer
$ 610 | Sütőrum
$ 609 | Brandy
$ 608 | Liqueur
$ 607 | Gin
$ 606 | White Wine
$ 605 | Beer
$ 604 | Cider
$ 603 | Whiskey
$ 602 | Vermouth
$ 601 | Brandy 40 Vol%
$ 600 | Liqueur
$ 599 | Cognac
$ 598 | Cherry Brandy
$ 597 | champagne
$ 596 | Red wine 12 Vol%
$ 595 | White Wine 12.5% ​​Vol
$ 594 | beer (non-alcoholic)
$ 593 | Beer
$ 592 | Alcoholic drinks
$ 591 | grape juice
$ 590 | carbonated soft drinks, light
$ 589 | Carbonated soft drink with sugar
$ 588 | beet juice
$ 587 | Tomato juice
$ 586 | Orange juice
$ 585 | Lipton Ice Tea Lemon
$ 584 | Lemon juice
$ 583 | Céklalé
$ 582 | Mineral Water
$ 581 | apple juice
$ 580 | Eröleves frame 1, 10g
$ 579 | Eröleves dice
$ 578 | Eröleves soup cubes
$ 577 | beans with chili powder, Knorr
$ 576 | Milk Chocolate
$ 575 | Sour candy
$ 574 | Baby Sponge
$ 573 | Sesame
$ 572 | Pistachios
$ 571 | Brazil nuts
$ 570 | Linseed
$ 569 | sunflower seeds
$ 568 | nuts, salted roasted
$ 567 | Coconut
$ 566 | Cashew
$ 565 | Mayo, light
$ 564 | Globus Mustard
$ 563 | Globus mayonnaise
$ 562 | Globus Ketchup
$ 561 | Flora heart-healthy mayonnaise
$ 560 | Soybean oil
$ 559 | Canola Oil
$ 558 | sunflower oil
$ 557 | Linseed
$ 556 | Corn Germ Oil
$ 555 | Groundnut oil
$ 554 | burdock
$ 553 | Harmonia margarine RAMA
$ 552 | rama sütömargarin
$ 551 | RAMA fözömargarin
$ 550 | FLORA heart-healthy margarine
$ 549 | FLORA pro-activ margarine
$ 548 | Delma margarine (multivitamin)
$ 547 | Bertolli margarine (olive oil)
$ 546 | Fat Coconut
$ 545 | Butter
$ 544 | Fried potatoes
$ 543 | boiled potatoes
$ 542 | Potato croquette
$ 541 | Oat bran
$ 540 | Spelt
$ 539 | rye (wholemeal)
$ 538 | Rice (milled, polished)
$ 537 | corn flakes
$ 536 | corn flour
$ 535 | Dining keméníyítö
$ 534 | Wheat flour (whole wheat)
$ 533 | Wheat flour
$ 532 | Crowns
$ 531 | Bread (wet) 1 x 60 g
$ 530 | Bread (water)
$ 529 | dry test (8 eggs)
$ 528 | dry pasta (4 eggs)
$ 527 | Spaghetti (Durilo, durumlisztböl)
$ 526 | Spaghetti
$ 525 | cake, Teper. 6 pieces
$ 524 | cake, cheese 6 pieces
$ 523 | Muesli, Sirius (1pc, 25g)
$ 522 | Biscuits (Good Morning)
$ 521 | Cocoa snail 1 piece (52g)
$ 520 | Cocoa snail
$ 519 | Good morning biscuits (Győr sweet, 4 x 50 g)
$ 518 | Croissant (with milk)
$ 517 |. Telj.kiörl.kenyér 1szel = 25g
$ 516 | White bread (homemade nature)
$ 515 | Rusks
$ 514 | Tofu
$ 513 | Szójagranulátum
$ 512 | Soya beans (dry)
$ 511 | Soybean
$ 510 | Yellow Peas (dry)
$ 509 | Lentils (dry)
$ 508 | Headphones Made beans
$ 507 | Chickpeas (dry)
$ 506 | can of beans
$ 505 | Beans (dry)
$ 504 | Chanterelles
$ 503 | Big mushroom özláb
$ 502 | mushroom (wild)
$ 501 | Green Pea freeze
$ 500 | Celery Root
$ 499 | Celeriac
$ 498 | Pumpkins, cooking
$ 497 | Onions
$ 496 | Bean sprouts
$ 495 | Pumpkins
$ 494 | Radish
$ 493 | ​​parsley
$ 492 | Parsley root
$ 491 | olives
$ 490 | Maize, sweet
$ 489 | Kínaikel
$ 488 | Brussels sprouts
$ 487 | Cabbages
$ 486 | Lettuce
$ 485 | Grapes
$ 484 | Plum (dried)
$ 483 | Plum (Bistrita)
$ 482 | Melons (yellow flesh)
$ 481 | Apricot jam
$ 480 | Currants, black
$ 479 | Currants
$ 478 | peach compote
$ 477 | peaches
$ 476 | Mango
$ 475 | grapefruit
$ 474 | Figs (dried)
$ 473 | figs (fresh)
$ 472 | Strawberry
$ 471 | Dates (dried)
$ 470 | Avocado
$ 469 | Cranberry
$ 468 | Apples (dried)
$ 464 | Tuna, oil
$ 463 | Sardine, oil
$ 462 | Herring, tomatoes.
$ 461 | Herring, oil
$ 460 | Herring, wrapped
$ 459 | Cod
$ 458 | Tuna
$ 457 | Squid
$ 456 | Perch
$ 455 | carp (mirror)
$ 454 | Trout
$ 453 | Sole
$ 452 | Mackerel
$ 451 | Flounder
$ 450 | Salmon (fresh)
$ 449 | Bream
$ 448 | Heck
$ 447 | Catfish
$ 446 | Shrimp
$ 445 | Gear
$ 444 | Black mussels
$ 443 | Pike
$ 442 | Busa
$ 441 | Eels
$ 440 | Greaves
$ 439 | Bacon, Cluj
$ 438 | Bacon, Smoked
$ 437 | Bacon, Chechnya
$ 436 | Bacon, bacon
$ 435 | Combustion. Turkey breast with ham
$ 434 | Machines Ham
$ 433 | Emperor of meat, cooked
Cut Tour | $ 432
$ 431 | Beef liver paste
$ 430 | Pontifical Doubles
$ 429 | Italian cold cuts
$ 428 | Mortadella
$ 427 | Lecsó Sausage
$ 426 | liverwurst
$ 425 | Hurka, bloody
$ 424 | Hurka, liver
$ 423 | Homemade sausage
$ 422 | Smoked Sausage
$ 421 | Smoked, boiled pork
$ 420 | Farmer cold
$ 419 | Sausage Scouts
$ 418 | Csaba sausage
$ 417 | Kidney (calf)
$ 416 | Velo (All)
$ 415 | Tripe
$ 414 | Pork liver
$ 413 | Chicken
$ 412 | Swan
$ 411 | Turkey breast
$ 410 | goose, roast
$ 409 | duck, roast
$ 408 | Duck Breast
$ 407 | Chicken (slices)
$ 406 | Chicken (wine)
$ 405 | Chicken
$ 404 | Wild Rabbit
$ 403 | Boar
$ 402 | Deer
$ 401 | Öz
$ 400 | Beefsteak
$ 399 | lamb
$ 398 | Leg of lamb
$ 397 | veal tongue
$ 396 | Veal breast
$ 395 | calf Farha
$ 394 | knuckle of veal
$ 393 | Veal ribs (slices)
$ 392 | veal tenderloin
$ 391 | Sirloin (slices)
$ 390 | Pork spare ribs
$ 389 | Pork tongue
$ 388 | Pork neck
$ 387 | pork shoulder
$ 386 | Pork bellies
$ 385 | Pork Knuckle
$ 384 | pork leg, pork chop
$ 383 | Pork ribs (slices)
$ 382 | brisket
$ 381 | beef tongue
$ 380 | beef spare ribs
$ 379 | Beef sirloin, soft
$ 378 | Beef Sirloin high
$ 377 | Beef sirloin, flat
$ 376 | Beef Shoulder
$ 375 | Beefsteak
$ 374 | Trappist cheese (semi-hard)
$ 373 | cream and cream cheese (soft)
$ 372 | Parmesan cheese character (hard)
$ 371 | Parenica, smoked ham with cheese (He gets up.)
$ 370 | Marble Cheesecake, creamy mold costing below
$ 369 | Caravan smoked cheese
$ 368 | Göcsej gourmet cheeses (soft)
$ 367 | On my Tali, Pannonia (hard)
$ 366 | Edam cheese (semi-hard)
$ 365 | Camping processed cheese
$ 364 | Camembert cheese mold costing below (Tihany)
$ 363 | Camembert cheese mold costing below (Bakonyerdő)
$ 362 | Balaton cheese (semi-hard)
$ 361 | Aniko cheese (semi-hard)
$ 360 | Fatty milk powder
$ 359 | Cream cottage cheese, raisins, vanilla
$ 358 | cottage cheese, semi-skimmed
$ 357 | Wanted
$ 356 | Milk, goat cheese
$ 355 | Kefir
$ 354 | Caucasian kefir 2.7%
$ 353 | Yoghurt, fruit
$ 352 | Sour cream (12% fat content)
$ 351 | Sour cream (20% fat content)
$ 350 | Coffee Cream
$ 349 | Foam Cream
$ 348 | Milk, skim chocolate
$ 347 | Milk chocolate
$ 346 | sheep's milk
$ 345 | UHT Milk, durable
$ 344 | pasteurized cow's milk (1.5% fat lasts)
$ 343 | pasteurized cow's milk (2.8% fat lasts)
$ 342 | Cattle at top
$ 341 | whipped cream
$ 340 | knuckle
$ 339 | pork
$ 338 | olive oil
$ 337 | coriander
$ 336 | paprika
$ 335 | Oil
$ 334 | szekfüszeg
$ 333 | ground black pepper
$ 332 | white pepper
$ 331 | thyme
$ 330 | Spinach
$ 329 | sage
$ 328 | oregano
$ 327 | marjoram
$ 326 | basil
$ 325 | cinnamon
$ 324 | Pepper
$ 322 | milk
$ 321 | flour
$ 320 | salt
$ 315 | Queen (orange, lemon) light
$ 314 | Pepsi Light, Coca-Cola light
$ 313 | Dietary (light) soft drinks, (Dei Naranca
$ 312 | Garden (mixed, pear, apricot, autumn
$ 311 | Dietary (light) juices (BB, Top Jo
$ 310 | Arola oranges, lemons
$ 309 | Coca-Cola, Pepsi-Cola, 7-Up
$ 308 | Canada Dry
$ 307 | 10,5 B-degree Light
$ 306 | Pilsen, Dreher, Spaten, etc. Gold Fassl.
$ 305 | Nectar beer
$ 304 | Dietary beer
$ 303 | Non-alcoholic beer
$ 302 | Unicum
$ 301 | Tojáslikör
$ 300 | Hubertus
$ 299 | Csokoládéflipp
$ 298 | Pear
$ 297 | Cherry Brandy
$ 296 | Tokay
$ 295 | Sparkling wine (average)
$ 294 | Sweet
$ 293 | Desktop
$ 292 | Butter
$ 291 | Greaves
$ 290 | Bacon (smoked)
$ 289 | Lard
$ 288 | Party spreads
$ 287 | Margarine (Topper, Remia)
$ 286 | Margarine (Rama League, Hera)
$ 285 | Goose Fat
$ 284 | Edible Oil
$ 283 | Delma margarine
$ 282 | Light margarine Delma
$ 281 | bacon
$ 280 | egg yolk
$ 279 | egg
$ 278 | eggs
$ 277 | Rudi
$ 276 | curd cheese (semi-skimmed)
$ 275 | Cream Cheese (raisin, vanilla)
$ 274 | Circular records curd cheese
$ 273 | Milk
$ 272 | Fruit Cream Cheese
$ 271 | blue cheese butter
$ 270 | Cheese Tour
$ 269 | Tolna soványsajt
$ 268 | Tihany Camembert
$ 267 | Sports, Óvári
$ 266 | Tale cheese cubes
$ 265 | Leitha, marble, Pálpusztai
$ 264 | cumin cheese
$ 263 | Snowdrops, Bojtár, Mirage
$ 262 | Göcsej
$ 261 | garlic fat cheese
$ 260 | Emmentaler
$ 259 | Cow (tube)
$ 258 | Bakonyerdő Camembert
$ 257 | Lake Balaton, Edam, Trappist
$ 256 | processed cheese cubes 33g
$ 255 | Cream
$ 254 | Milk concentrate (sweetened)
$ 253 | Powdered milk (skimmed)
$ 252 | Powdered milk (skim)
$ 251 | Sour cream (low-calorie)
$ 250 | 20% cream
$ 249 | Durable milk
$ 248 | Maresi beer with milk
$ 247 | Cocoa (lean)
$ 246 | Writer
$ 245 | Fruit yogurt (mean)
$ 244 | Deity of org. yogurt (frutti)
$ 243 | Danone yoghurt mousse
$ 242 | curdled milk and yoghurt, kefir
$ 241 | 1.5% fat milk
$ 240 | Sausage in brine 140g
$ 239 | Tyúkmájkrém 70g
$ 238 | Spring Luncheon meat 150g
$ 237 | Ham and Egg Cream 65g
$ 236 | Ham and eggs 150 g
$ 235 | Beef liver paste 65g
$ 234 | Oily fish 140g
$ 233 | Summer húsoskrém 65g
$ 232 | Marhamájkrém 65g
$ 231 | Hungarian chopped 150g
$ 230 | Luncheon meat 150g
$ 229 | Special sausage meat 150g
$ 228 | Globus meat 65g cream
$ 227 | Debrecen winged cream 100g
$ 226 | Plains Paté 150g
$ 225 | Zala Meat
$ 224 | Sausage
$ 223 | black pudding
$ 222 | Verona
$ 221 | Minced meat (luncheon)
$ 220 | Hunting
$ 219 | Winter Salami
$ 218 | pork (lean)
$ 217 | pork (fat)
$ 216 | Turkey meat
$ 215 | Paris, crinoline, saveloy
$ 214 | Italian mortadella
$ 213 | liver paté
$ 212 | Májkrémkonzerv
$ 211 | liverwurst
$ 210 | beef liver
$ 209 | Beef (lean)
$ 208 | Horse Meat
$ 207 | Foie gras
$ 206 | goose meat, duck meat
$ 205 | Sausage (dry)
$ 204 | Sausage (ratatouille)
$ 203 | Meat Bread
$ 202 | rabbit meat
$ 201 | Gyulai Doubles
$ 200 | ham, salami
$ 199 | Smoked Ham
$ 198 | Black pudding
$ 197 | brawn
$ 196 | Debrecen sausage
$ 195 | Chicken
$ 194 | Csaba Sausage
$ 193 | Veal
$ 192 | Mutton
$ 191 | Baromfivirsli
$ 190 | Isotonic sports drink
$ 189 | Dietary syrups (mean)
$ 188 | fruit syrups (mean)
$ 187 | peach, apricot juice
$ 186 | Tomato juice (natural)
$ 185 | Garden (light) juice
$ 184 | Orange juice (Olympus)
$ 183 | Lemon juice (Olympus)
$ 182 | Dietary jams (average)
$ 181 | Dietary preserves (mean)
$ 180 | Jams (average)
$ 179 | preserves (mean)
$ 178 | Pumpkin Seeds
$ 177 | Roasted coffee
$ 176 | Nescafe
$ 175 | Hazelnuts
$ 174 | Poppy
$ 173 | Almond
$ 172 | chestnut paste (mélyhötött)
$ 171 | Chestnut
$ 170 | Groundnut
$ 169 | Walnut
$ 168 | tamarillo
$ 167 | Grapes
$ 166 | Plum
$ 165 | Blackberry
$ 164 | Melons
$ 163 | Apricot
$ 162 | Ringló
$ 161 | Currants (red)
$ 160 | Currants (black)
$ 159 | Papa
$ 158 | peaches
$ 157 | Nectarine (bald peach)
$ 156 | Medlar
$ 155 | Orange
$ 154 | Cherry
$ 153 | Raspberries
$ 152 | Raisins
$ 151 | Maracuja
$ 150 | Mandarin
$ 149 | Coconut milk
$ 148 | Coconuts
$ 147 | Pear
$ 146 | Kiwi
$ 145 | Grapefruit
$ 144 | Watermelon
$ 143 | Figs
$ 142 | Strawberries
$ 141 | Mulberries
$ 140 | Gooseberries
$ 139 | Dates
$ 138 | Rosehip
$ 137 | Cherry
$ 136 | Lemons
$ 135 | Quince
$ 134 | Bananas
$ 133 | Pineapple
$ 132 | Apple
$ 131 | Ketchup
$ 130 | Red Gold
$ 129 | Mustard
$ 128 | Mayonnaise
$ 127 | Csiperkekonzerv
$ 126 | Porcini
$ 125 | Szegfögomba
$ 124 | Parasol
$ 123 | Oyster mushroom
$ 122 | Csiperke
$ 121 | chopped pickles
$ 120 | Sauerkraut
$ 119 | Tomato
$ 118 | Olives
$ 117 | Natural ratatouille
$ 116 | pickled cucumber
$ 115 | Csermege cucumber
$ 114 | Green Peppers
$ 113 | Green Peas
$ 112 | Green Beans
$ 111 | Celery
$ 110 | Bulbs
$ 109 | Cucumbers
$ 108 | Pumpkin
$ 107 | Horseradish
$ 106 | dry beans
$ 105 | Pumpkins
$ 104 | Asparagus
$ 103 | Sorrel
$ 102 | Carrots
$ 101 | Yellow Peas
$ 100 | Radishes (Black)
$ 99 | Radishes (red)
$ 98 | Rhubarb
$ 97 | Leeks
$ 96 | parsley
$ 95 | Parsley root
$ 94 | Patissons
$ 93 | Spinach
$ 92 | Tomatoes
$ 91 | Eggplant
$ 90 | Mangold
$ 89 | Lens
$ 88 | corn (popcorn)
$ 87 | Maize (to cook)
$ 86 | Chinese cabbage
$ 85 | Kale
$ 84 | Cabbage (head, red)
$ 83 | Cauliflower
$ 82 | Kohlrabi
$ 81 | garlic
$ 80 | Jerusalem artichokes
$ 79 | Courgettes
$ 78 | Chicory
$ 77 | Beet
$ 76 | Potatoes
$ 75 | broccoli
$ 74 | Brussels Sprout
$ 73 | Artichokes
$ 72 | Gelatin
$ 71 | Naples (mean)
$ 70 | Honey
$ 69 | creamer (Aranka)
$ 68 | cocoa powder
$ 67 | Ice cream (vanilla, chocolate)
$ 66 | gluconate
$ 65 | Fructose
$ 64 | Ice cream (mean)
$ 63 | Yeasts
$ 62 | Pastry (mean)
$ 61 | Diabetic wafers
$ 60 | Chocolate Diet (mean)
$ 59 | Diabetic cookies (avg.)
$ 58 | Desserts (mean)
$ 57 | Candy (mean)
$ 56 | Sugar
$ 55 | Chocolate (mean)
$ 54 | Corvital
$ 53 | Ham-let Biscuits 1
$ 52 | 1 Cracottes
$ 51 | Abonett
$ 50 | Weber crispbread (average) 1
$ 49 | Breadcrumbs
$ 48 | Bread Bread
$ 47 | Rolls
$ 46 | Oatmeal
$ 45 | Soy bread
$ 44 | Soya Flour
$ 43 | Pasta (8 eggs)
$ 42 | Pasta (4 eggs)
$ 41 | Yellow Pea Flour
$ 40 | Flour
$ 39 | Rye
$ 38 | rice flour
$ 37 | Rice (brown)
$ 36 | Rice
$ 35 | strudel pastry (1 Pack)
$ 34 | Puffed rice
$ 33 | pudding (mean)
$ 32 | cake, buttered 1
$ 31 | cake, crackling 1
$ 30 | Pretzel 1
$ 29 | Passover
$ 28 | Levegökenyér
$ 27 | linseed bread
$ 26 | Corn Flakes
$ 25 | Groats of maize flour
$ 24 | Maize Seed
$ 23 | Millet
$ 22 | wholemeal bread 1 pc
$ 21 | Crescent
$ 20 | Snowdrop biscuit
$ 19 | Household biscuits
$ 18 | Buckwheat
$ 17 | Graham flour
$ 16 | Graham bread
$ 15 | braided loaf
$ 14 | Semi-brown bread
$ 13 | White Bread
$ 12 | Dietary bread Pollard
$ 11 | Rye
$ 10 | Chips
$ 9 | Brioche 1
$ 8 | Wheat (kettle)
$ 7 | bun Pollard
$ 6 | Flour
$ 5 | Semolina
$ 4 | Wheat Germ
$ 3 | Wheat (whole flour)
$ 2 | Bakonyi brown bread
$ 1 | Plain bread
";
$cuccos=explode("$",$en);

//létrehozom az extramezőt.
	$queryc = "ALTER TABLE  `alapanyag3` ADD  `nev_en` VARCHAR( 300 ) NOT NULL AFTER  `nev` ;";
	$resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "insert");

//echo $error.'<br>';

foreach ($cuccos as $cucc){
$cu=explode(" | ",$cucc);

$cu[0]=$cu[0]*1;
	$querycx = "UPDATE  `alapanyag3` SET  `nev_en` =  '".$cu[1]."' WHERE  `alapanyag3`.`id` =".$cu[0]." LIMIT 1 ;";
	$resultc =db_Query($querycx, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "insert");

echo $querycx.'<br>';
echo $error.'<br>';
$ret[]=	$cu;
}
//arraylist($ret);*/
?>
