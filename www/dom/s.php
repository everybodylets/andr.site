<?php
ini_set("max_execution_time", "60000");
require 'func.php';
require 'base.php';
$classstate = "condition-row";
$classprice = "start-price-row";
$classdate = "date-end-row";
$classpay = "payment-row";
$classname4 = "additional-nformation";
$classOpis = "Feature-lot";
$newarr = array(159078,158389,157648,157220,159798,160360,160362,159396,158688,158590,158690,158685,158694,158687,158695,159439);

$stm = $pdo->prepare('INSERT INTO main (title, stan, nomer, dataStart, dataEnd, dataEndZ, priceStart, priceGarant, priceStep, obl, oblMaino, dataPub, Category, Ucenka, Body, URLSetam)
                                VALUES (:title, :stan, :nomer, :dataStart, :dataEnd, :dataEndZ, :priceStart, :priceGarant, :priceStep, :obl, :oblMaino, :dataPub, :Category, :Ucenka, :Body, :URLSetam)');
for($ma=167000; $ma<174513; $ma++) {
//foreach($newarr as $key){
$body = "";
# Use the Curl extension to query Google and get back a page of results

    $url1 = "https://setam.net.ua/auction/".$ma;
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
    $html1 = curl_exec($ch1);
    curl_close($ch1);

    $lis1 = array();
    $dom1 = new DOMDocument();
    @$dom1->loadHTML($html1);
    $xpath1 = new DOMXPath($dom1);
    $chek = $xpath1->query("//h1");
    $chek2 = $xpath1->query("//div[@class='panel-heading font-bold']/text()");
    $notfound = "404";
    $pomilka = "Помилка";
    $err1 = trim($chek->item(0)->nodeValue);
    $err2 = trim($chek2->item(0)->nodeValue);
    if(($err1==$notfound) or ($err2==$pomilka)) {
        echo $ma . " + error <br />";
        continue;
    }else

        $mtitle = $xpath1->query("//title");
        $results = $xpath1->query("//div[@class='" . $classstate . "']/span|
                                //div[@class='" . $classdate . "']/span|
                                //div[@class='" . $classprice . "']/span/span|
                                //div[@class='" . $classpay . "']/span");
        $results1 = $xpath1->query("//div[@id='" . $classname4 . "']/text()");
        $results3 = $xpath1->query("//div[@id='" . $classname4 . "']/a/@href");
        $resultsPay = $xpath1->query("//div[@class='" . $classpay . "']/span/span");
        $resultsOpis = $xpath1->query("//div[@id='" . $classOpis . "']/p");
        $photo = $xpath1->query("//div[@class='fotorama']/img");
        $stana = stan($results->item(0)->nodeValue);
        if (!$stana){continue;}
        $stm->bindParam(":stan", $stana);

        $tittle = substr($mtitle->item(0)->nodeValue, 0, -15);
        $stm->bindParam(":title", $tittle);

        $nom = $results->item(1)->nodeValue;
        $stm->bindParam(":nomer", $nom);
        $datestart = ddate($results->item(2)->nodeValue);
        $stm->bindParam(":dataStart", $datestart);
        $datee = ddate($results->item(3)->nodeValue);
        $stm->bindParam(":dataEnd", $datee);

        $dateez = ddate($results->item(4)->nodeValue);
        $stm->bindParam(":dataEndZ", $dateez);

        $prst = str_replace(" ", "", $results->item(5)->nodeValue);
        $stm->bindParam(":priceStart", $prst);

        $prgar = str_replace(" ", "", $resultsPay->item(0)->nodeValue);
        $stm->bindParam(":priceGarant", $prgar);

        $prstep = str_replace(" ", "", $resultsPay->item(1)->nodeValue);
        $stm->bindParam(":priceStep", $prstep);

        $oobl = obl($results->item(8)->nodeValue);
        $stm->bindParam(":obl", $oobl);

        $oblma = $results->item(9)->nodeValue;
        $stm->bindParam(":oblMaino", $oblma);

        $datepub = ddate($results->item(10)->nodeValue);
        $stm->bindParam(":dataPub", $datepub);

        $ycen = $results3->item(0)->nodeValue;

        if ($ycen) {


            $stm->bindParam(":Ucenka", $ycen);
            $categ = cat(trim($results1->item(3)->nodeValue));
            $stm->bindParam(":Category", $categ);
            echo $ycen;
        } else {
            $ycen = "NO";
            $stm->bindParam(":Ucenka", $ycen);
            $categ = cat(trim($results1->item(2)->nodeValue));
            $stm->bindParam(":Category", $categ);
        }
    // Проверка на стан аукциона и на правильные категории.
    if(($stana == "102" || $stana == "108")&&($categ == "55"||$categ == "9"||$categ=="10"||$categ=="11"||$categ=="12"||$categ=="13"||$categ=="14"||$categ=="15")) {
        if($photo->length) {
            mkdir('photo/'.$nom, 0777);
            for ($t = 0; $t < $photo->length; $t++) {
            $url = 'https://setam.net.ua' . $photo->item($t)->getAttribute('src');
            $local = 'photo/'.$nom . '/file' . $t . '.jpg';
            file_put_contents($local, file_get_contents($url));
            }
        }
            for ($o = 0; $o < $resultsOpis->length; $o++) {
            $body .= trim($resultsOpis->item($o)->nodeValue) . "<br />";
            };
        $stm->bindParam(":Body", $body);
        $stm->bindParam(":URLSetam", $url1);
        $stm->execute();
        echo $nom."<br />";
    }
    }
echo $ma;
?>

