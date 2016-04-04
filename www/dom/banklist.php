<?php
# Use the Curl extension to query Google and get back a page of results
$url1 = "http://www.prostobank.ua/spravochniki/banki";
$classname1 = "vocabulary-index_body";
$ch1 = curl_init();
//$timeout1 = 5;
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, $timeout);
$html1 = curl_exec($ch1);
curl_close($ch1);
$lis1 = array();
# Create a DOM parser object
$dom1 = new DOMDocument();
@$dom1->loadHTML($html1);
$xpath1 = new DOMXPath($dom1);
# Iterate over all the <a> tags
    $results1 = $xpath1->query("//div[@class='" . $classname1 . "']/ul/li/a/@href");
//    $results2 = $xpath1->query("//div[@class='" . $classname1 . "']/ul/li/span");

    if ($results1->length > 0){
    for($ii=0; $ii<=$results1->length; $ii++){
    //        foreach($results1->getElementsByTagName('a') as $link1){
    //            echo $dom1->getAttribute('href');
//    echo
    $ur1 = $results1->item($ii)->nodeValue;
//    echo " ---- ";
//    echo
//    $im2 = $results2->item($ii)->nodeValue;
    $lis1[$ii] = $ur1;

    //       echo "<br />";
    //       echo "<br />";


    }
    }
    // -------------------- Вывод урл через массив.
    /*
    for($r=0;$r<count($lis1); $r++){
    echo count($lis1);
    echo $lis1[$r];
    echo "<br />";
    }
    */
?>