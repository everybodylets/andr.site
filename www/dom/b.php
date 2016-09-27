<?php
require 'base.php';
//ini_set("max_execution_time", "600");
# Use the Curl extension to query Google and get back a page of results
$addr = array();
//$s_addr = array("http://torgi.fg.gov.ua/catalog/nerukhom-st/zhitlova/index.php?show=100","http://torgi.fg.gov.ua/catalog/nerukhom-st/zhitlova/index.php?show=100&PAGEN_1=2");
$stm = $pdo->prepare('INSERT INTO torgi_mb (name, url) VALUES (:name, :url)');
//foreach($s_addr as $s) {
    $url1 = "torgi.fg.gov.ua/";
    //$count = 0;
    $classname1 = "child_wrapp";

    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
    $html1 = curl_exec($ch1);
    curl_close($ch1);
    $lis1 = array();
    $dom1 = new DOMDocument();
    @$dom1->loadHTML($html1);
    $xpath1 = new DOMXPath($dom1);
    $results1 = $xpath1->query("//div[@class='" . $classname1 . "']/a/@href[contains(.,'mayno_bankiv')] ");
    $results2 = $xpath1->query("//div[@class='" . $classname1 . "']/a[contains(@href, 'mayno_bankiv')]");
//    $notfound = "Сторінка не знайдена";
//    Foreach ($results1 as $key => $res) {
        for($r=0; $r<$results1->length; $r++ ){
//        //array_push($addr, $results1->item($key)->nodeValue);
            $name = $results2->item($r)->nodeValue;
            $url = substr($results1->item($r)->nodeValue, 22);
        echo ++$count . ") ". $url." && ".$name. "<br />";

            $stm->bindParam(":name", $name);
            $stm->bindParam(":url", $url);
            $stm->execute();
    }
//}


//foreach($addr as $a){
//    echo "'".substr($a,32). "', ";
//}