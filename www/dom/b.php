<?php
ini_set("max_execution_time", "600");
# Use the Curl extension to query Google and get back a page of results
for($nom=208000; $nom<210000; $nom++) {
    $url1 = "torgi.fg.gov.ua/" . $nom;

    $classname1 = "container";

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
    $results1 = $xpath1->query("//div[@class='" . $classname1 . "']/h1|//div[@class='price']");
    $notfound = "Сторінка не знайдена";
    $res = $results1->item(0)->nodeValue;
   if(strcmp($res, $notfound) !== 0){

           echo $nom . ") - ";
           echo $results1->item(0)->textContent;
           echo " | ";
            echo $results1->item(1)->textContent;
            echo "<br />";

   }
}
