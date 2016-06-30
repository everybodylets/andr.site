<?php
# Use the Curl extension to query Google and get back a page of results
//for($nom=500; $nom<550; $nom++){
$url1 = "torgi.fg.gov.ua/209501";

$classname1 = "container";

$ch1 = curl_init();
$timeout1 = 55;
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST,  2);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, $timeout1);
$html1 = curl_exec($ch1);
curl_close($ch1);
$lis1 = array();
$dom1 = new DOMDocument();
@$dom1->loadHTML($html1);
$xpath1 = new DOMXPath($dom1);
$results1 = $xpath1->query("//div[@class='".$classname1."']/h1|//div[@class='price']");

//query("//div[@class='" . $classname1 . "']/text()|//div[@class='".$classname1."']/span");
echo "1). ";
//if ($results1->length > 0){

    for($ii=0; $ii<=$results1->length; $ii++) {
        //    $ur1 =
//            echo $results1->item(0)->nodeValue;
            echo $results1->item($ii)->nodeValue;
//            echo $results1->getAttribute('alt');

        //    $lis1[$ii] = $ur1; // Все URL в массиве lis1.
    }
Echo "<br />";
//}
?>