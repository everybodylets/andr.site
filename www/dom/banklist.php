<?php
# Use the Curl extension to query Google and get back a page of results
$url1 = "http://www.prostobank.ua/spravochniki/banki";
$classname1 = "vocabulary-index_body";
$ch1 = curl_init();
$timeout1 = 5;
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, $timeout1);
$html1 = curl_exec($ch1);
curl_close($ch1);
$lis1 = array();
$dom1 = new DOMDocument();
@$dom1->loadHTML($html1);
$xpath1 = new DOMXPath($dom1);
    $results1 = $xpath1->query("//div[@class='" . $classname1 . "']/ul/li/a/@href");

    if ($results1->length > 0){
        for($ii=0; $ii<=$results1->length; $ii++){
        $ur1 = $results1->item($ii)->nodeValue;
        $lis1[$ii] = $ur1; // Все URL в массиве lis1.
        }
    }
?>