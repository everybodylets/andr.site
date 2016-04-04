<?php
require 'banklist.php';
for($r=0;$r<count($lis1); $r++) {
    $dark = "<div style='background-color: darkgray'>";
    $light = "<div style='background-color: lightgrey'>";
    ($r%2 ? $temp =$dark : $temp=$light);
    echo $temp;
    $url = "http://www.prostobank.ua".$lis1[$r];
    //"http://www.prostobank.ua/spravochniki/banki/(name)/avtokrazbank";
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $html = curl_exec($ch);
    curl_close($ch);

    $dom = new DOMDocument();
    $classname = 'panel panel-about';
    $classname2 = 'content';

    @$dom->loadHTML($html);
    $xpathname = new DOMXPath($dom);
    $xpath = new DOMXPath($dom);

    $results = $xpath->query("//div[@class='" . $classname . "']/text()|//div[@class='" . $classname . "']/p");
    $name = $xpathname->query("//*[@class='" . $classname2 . "']/h1|//*[@class='warning']/text()");

    echo $name->item(0)->nodeValue; // Название банка
    echo " - ";
    echo $name->item(1)->nodeValue; // Банкрот?
    echo "<br />";
    echo "<br />";

    if ($results->length > 0) {
        for ($i = 1; $i <= $results->length; $i++) {

            echo $review = $results->item($i)->nodeValue; // о банке и акционеры.
            echo "<br />";
            echo "<br />";
        }
    }
//    echo $results->length;

    echo "------------------------------------------------------------------- <br />";
echo "</div>";
}
?>