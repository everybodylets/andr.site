<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
echo "test!";
require 'base.php';
$url1 = "setam.net.ua/auctions/";
$clas = "panel categories m-b-lg";
$stm = $pdo->prepare('INSERT INTO category (name, subid, cat_url) VALUES (:name,:subid, :cat_url)');
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST,  2);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
$html1 = curl_exec($ch1);
curl_close($ch1);
$dom1 = new DOMDocument();
@$dom1->loadHTML($html1);
$xpath1 = new DOMXPath($dom1);
$results = $xpath1->query("//div[@class='". $clas ."']/nav/ul/li/a");
for ($i=0; $i<$results->length; $i++){
    $znach = $results->item($i)->nodeValue;
    $caturl = $results->item($i)->attributes->getNamedItem("href")->nodeValue;
echo "I-". $i . $znach;
    $url = "setam.net.ua".$caturl;

    $stm->bindParam(":name", $name);
    $stm->bindParam(":subid", $subid);
    $stm->bindParam(":cat_url", $cat_url, PDO::PARAM_STR);
    $subid = 0;
    $name = trim($znach);
    $cat_url = $caturl;
//    $stm->execute();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $html = curl_exec($ch);
    curl_close($ch);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    $resultsinner = $xpath->query("//div[@class='". $clas ."']/nav/ul/li/a");
    for($ii=0; $ii<$resultsinner->length; $ii++) {
        $znach_inn = $resultsinner->item($ii)->nodeValue;
        $caturl_inn = $resultsinner->item($ii)->attributes->getNamedItem("href")->nodeValue;
        echo "<br />";
        echo "II-- ". $ii . $znach_inn;
        $stm->bindParam(":name", $name);
        $stm->bindParam(":subid", $subid);
        $stm->bindParam(":cat_url", $cat_url,PDO::PARAM_STR);
        $subid = $i+1;
        $name = trim($znach_inn);
        $cat_url = $caturl_inn;
        $stm->execute();
    }

    echo "<br />";
}

?>

