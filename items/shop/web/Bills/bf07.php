<?php

$filtersxx["id"]=$getparams[2];
$filtersxx["status"]="all";
$datas=$ShopClass->get_shop_order($filtersxx);
$orderdatas=$datas["datas"][0];
$invoiceNumber='XXXXXXXXXXX';
?>

<style>
    invoiceMain,
    invoiceHead,
    invoiceHead supplierBankAccountNumber,
    invoiceHead supplierTaxNumber,
    invoiceHead supplierName,
    invoiceHead supplierAddress,
    invoiceHead customerTaxNumber,
    invoiceHead customerName,
    invoiceHead customerAddress,

    invoiceDetail,
    invoiceLines,

    customerInfo,
    invoiceDetail,
    invoicesummary,
    summaryNormal,
    summaryNormal summaryNormal,
    summaryGrossData

    {
        display: block;
        border: 1px black solid;
        position: relative;
        float: left;
        width: 100%;

    }
    InvoiceData
    {
        display: inline-block;
        max-width: 241mm;
        float: none;
    }
    invoiceissuedate{
        float: right;
    }
    invoicenumber{
        float: left;
    }
    invoiceLines{
        display: inline-table;
    }

    line{
        display: table-row;
    }



    line lineNumber,
    line productCodeCategory,
    line productCodeValue,
    line lineExpressionIndicator,
    line lineNatureIndicator,
    line quantity,
    line unitOfMeasure,
    line unitPrice,
    line lineNetAmount,
    line lineNetAmountHUF,
    line vatPercentage,
    line unitPrice{
        display: table-cell;
        float: inherit;
        padding: 0 2px;
    }









    invoiceHead supplierInfo,
    invoiceHead customerInfo
    {
        width: 49%;
        display: block;
        float: left;
        position: relative;
    }
    invoiceNumber::before {
        content: "Számlaszáma: ";
    }
    invoiceIssueDate::before {
        content: "Kállítás dátuma: ";
    }
    supplierInfo::before {
        content: "Eladó: ";
    }
    customerInfo::before {
        content: "Vevő: ";
    }
    invoiceHead supplierBankAccountNumber::before,
    invoiceHead customerBankAccountNumber::before {
        content: "Bankszámlaszám: ";
    }


    invoiceHead customerAddress::before,
    invoiceHead customerAddress::before {
        content: "Cím: ";
    }
    invoiceHead customerName::before,
    invoiceHead supplierName::before {
        content: "Név: ";
    }
    invoiceHead customerTaxNumber::before,
    invoiceHead supplierTaxNumber::before
    {
        content: "Adóazonosító: ";
    }

    invoiceDetail invoiceCategory::before{
        content: "Számla kategóriája: ";
    }
    invoiceDetail invoiceDeliveryDate::before{
        content: "kiállítás dátuma: ";
    }
    invoiceDetail currencyCode::before{
        content: "Pénznem: ";
    }
    invoiceDetail invoiceDeliveryDate::before{
        content: "kiállítás dátuma: ";
    }
    invoiceDetail invoiceDeliveryDate::before{
        content: "kiállítás dátuma: ";
    }
    invoiceDetail paymentMethod::before{
        content: "Fiz.tipusa: ";
    }
    invoiceDetail paymentDate::before{
        content: "Fiz.ideje: ";
    }
    invoiceDetail invoiceAppearance::before{
        content: "számla tipusa: ";
    }
    invoiceLines::before{
        content: "Tételek: ";
    }
    invoiceSummary::before{
        content: "Összesítés: ";
    }
    invoiceSummary vatRate::before{
        content: "Áfa: ";
    }
    invoiceSummary::before{
        content: "Összesítés: ";
    }
    vatRateNetAmountHUF::before{
        content: " érték(HUF): ";
    }
    vatRateNetData::before{
        content: " Vásárlás";
    }
    vatRateVatData::before{
        content: " ÁFA";
    }
    invoice NetAmountHUF::before{
        content: "Számla végösszege(HUF): ";
    }
    invoice invoiceVatAmountHUF::before,
    summaryGrossData invoiceGrossAmountHUF::before
    {
        content: "Számla végösszege(HUF): ";
    }
    summaryGrossData invoiceGrossAmountHUF{
        font-weight: bold;
    }
    invoiceDetail smallBusinessIndicator,
    invoiceDetail exchangeRate,
    summaryNormal vatRateVatAmount,
    summaryNormal vatratenetamount,
    summaryNormal invoiceNetAmount,
    summaryNormal invoiceGrossAmount,
    summaryGrossData invoiceGrossAmount
    {
        display: none;
    }



</style>

<?php
$xml='<InvoiceData xmlns="http://schemas.nav.gov.hu/OSA/2.0/data" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.nav.gov.hu/OSA/2.0/data invoiceData.xsd">
	<invoiceNumber>AAA000568</invoiceNumber>
	<invoiceIssueDate>2020-06-01</invoiceIssueDate>
	<invoiceMain>
		<invoice>
			<invoiceHead>
				<supplierInfo>
					<supplierTaxNumber>
						<taxpayerId>11111111</taxpayerId>
						<vatCode>2</vatCode>
						<countyCode>42</countyCode>
					</supplierTaxNumber>
					<supplierName>Szállító Kft</supplierName>
					<supplierAddress>
						<detailedAddress>
							<countryCode>HU</countryCode>
							<postalCode>1111</postalCode>
							<city>Budapest</city>
							<streetName>Példa</streetName>
							<publicPlaceCategory>utca</publicPlaceCategory>
							<number>777</number>
							<floor>1.</floor>
							<door>3.</door>
						</detailedAddress>
					</supplierAddress>
					<supplierBankAccountNumber>88888888-66666666-12345678</supplierBankAccountNumber>
				</supplierInfo>
				<customerInfo>
					<customerTaxNumber>
						<taxpayerId>33333333</taxpayerId>
						<vatCode>2</vatCode>
						<countyCode>02</countyCode>
					</customerTaxNumber>
					<customerName>Vevő Kft</customerName>
					<customerAddress>
						<detailedAddress>
							<countryCode>HU</countryCode>
							<postalCode>7600</postalCode>
							<city>Pécs</city>
							<streetName>Kitalált</streetName>
							<publicPlaceCategory>köz</publicPlaceCategory>
							<number>8</number>
						</detailedAddress>
					</customerAddress>
				</customerInfo>
				<invoiceDetail>
					<invoiceCategory>NORMAL</invoiceCategory>
					<invoiceDeliveryDate>2020-06-01</invoiceDeliveryDate>
					<smallBusinessIndicator>true</smallBusinessIndicator>
					<currencyCode>HUF</currencyCode>
					<exchangeRate>1</exchangeRate>
					<paymentMethod>TRANSFER</paymentMethod>
					<paymentDate>2020-06-09</paymentDate>
					<invoiceAppearance>PAPER</invoiceAppearance>
				</invoiceDetail>
			</invoiceHead>
			';


//Termékek
/*
 				<line>
					<lineNumber>2</lineNumber>
					<advanceIndicator>true</advanceIndicator>
					<lineExpressionIndicator>false</lineExpressionIndicator>
					<lineDescription>Előleg (AAA000567 számla)</lineDescription>
					<lineAmountsNormal>
						<lineNetAmountData>
							<lineNetAmount>-500000</lineNetAmount>
							<lineNetAmountHUF>-500000</lineNetAmountHUF>
						</lineNetAmountData>
						<lineVatRate>
							<vatPercentage>0.27</vatPercentage>
						</lineVatRate>
					</lineAmountsNormal>
				</line>
			</invoiceLines>
 */


$orderdatas["articles"]=str_replace('
','',$orderdatas["articles"]);
$oder_articlesid=json_decode($orderdatas["articles"],true);
//echo($oder_articlesid);
//var_dump($oder_articlesid);
$xml.='			<invoiceLines>';

for ($i = 0; $i < count($oder_articlesid["articles"]); $i++) {
    if ($oder_articlesid["articles"][$i]["id"]!="post"){

        $xml.='				<line>
					<!-- A számlatétel tartalm természetes mértékegység nélkül -->
					<lineNumber>'.($i+1).'</lineNumber>
					<productCodes>
						<productCode>
							<productCodeCategory>OWN</productCodeCategory>
							<productCodeValue>112166</productCodeValue>
						</productCode>
					</productCodes>
					<lineExpressionIndicator>true</lineExpressionIndicator>
					<lineNatureIndicator>'.$oder_articlesid["articles"][$i]["title"].'</lineNatureIndicator>
					<lineDescription>'.$oder_articlesid["articles"][$i]["title"].'</lineDescription>
					<quantity>'.$oder_articlesid["articles"][$i]["db"].'</quantity>
					<unitOfMeasure>PIECE</unitOfMeasure>
					<unitPrice>'.$oder_articlesid["articles"][$i]["priece"].'</unitPrice>
					<lineAmountsNormal>
						<lineNetAmountData>
							<lineNetAmount>'.$oder_articlesid["articles"][$i]["sum"].'</lineNetAmount>
							<lineNetAmountHUF>'.$oder_articlesid["articles"][$i]["endpriece"].'</lineNetAmountHUF>
						</lineNetAmountData>
						<lineVatRate>
							<vatPercentage>'.$oder_articlesid["articles"][$i]["vat"].'</vatPercentage>
						</lineVatRate>
					</lineAmountsNormal>
				</line>
';
} }
$xml.='			</invoiceLines>';

//számla összesítés
$xml.='			<invoiceSummary>
				<summaryNormal>
					<summaryByVatRate>
						<vatRate>
							<vatPercentage>0.27</vatPercentage>
						</vatRate>
						<vatRateNetData>
							<vatRateNetAmount>100000.00</vatRateNetAmount>
							<vatRateNetAmountHUF>100000.00</vatRateNetAmountHUF>
						</vatRateNetData>
						<vatRateVatData>
							<vatRateVatAmount>27000.00</vatRateVatAmount>
							<vatRateVatAmountHUF>27000.00</vatRateVatAmountHUF>
						</vatRateVatData>
					</summaryByVatRate>
					<invoiceNetAmount>100000</invoiceNetAmount>
					<invoiceNetAmountHUF>100000</invoiceNetAmountHUF>
					<invoiceVatAmount>27000</invoiceVatAmount>
					<invoiceVatAmountHUF>27000</invoiceVatAmountHUF>
				</summaryNormal>
				<summaryGrossData>
					<invoiceGrossAmount>'.$orderdatas["oder_priece"].'</invoiceGrossAmount>
					<invoiceGrossAmountHUF>'.$orderdatas["oder_priece"].'</invoiceGrossAmountHUF>
				</summaryGrossData>
			</invoiceSummary>

';
$xml.='		</invoice>
	</invoiceMain>
</InvoiceData>';


echo $xml;
?>

