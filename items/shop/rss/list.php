<?php
//arraylist($hirekelemek);
foreach ($elemek as $elem){
?>
    <item>
        <g:id><?= $elem["id"] ?></g:id>
        <g:title><![CDATA[<?php echo ( $TextClass->tageketcsupaszit(  $TextClass->htmlfromchars($elem["title"] ) ) );?>]]></g:title>
        <g:description><![CDATA[<?php echo ( $TextClass->tageketcsupaszit(  $TextClass->htmlfromchars($elem["leadtext"] ) ) );?>]]></g:description>
        <g:link><![CDATA[<?= $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>]]></g:link>
        <g:image_link><![CDATA[<?php echo $ShopClass->getimg($elem["id"],1280,1024);?>]]></g:image_link>
        <g:brand><![CDATA[Okosfűző]]></g:brand>
        <g:condition>new</g:condition>
        <g:availability>in stock</g:availability>
        <g:price><?php echo priece_format($elem["priece"],0);?> HUF</g:price>
        <g:shipping>
            <g:country>HU</g:country>
            <g:service>Standard</g:service>
            <g:price>600 HUF</g:price>
        </g:shipping>
        <g:google_product_category><?= $_GET["q"]?></g:google_product_category>
        <g:override>HU</g:override>
        <g:gender>unisex</g:gender>
        <g:age_group>all ages</g:age_group>
        <g:color>color</g:color>
        <g:size>1</g:size>
        <g:custom_label_0>https://okosfuzo.hu</g:custom_label_0>
    </item>
<?php }?>