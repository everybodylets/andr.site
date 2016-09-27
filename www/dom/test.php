<?
$count=1;
for($i=242; $i<280; $i++) {
    $url1 = "https://capitals-price.com.ua/credits/pravo-vimogi-za-kreditnim-dogovorom-0222-vid-08-11-2006-zastava-mebleve-obladnannja-m-bila-cerkva-" . $i . ".html";
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
    $html1 = curl_exec($ch1);
    curl_close($ch1);

    $dom1 = new DOMDocument();
    @$dom1->loadHTML($html1);
    $xpath1 = new DOMXPath($dom1);
    $chek = $xpath1->query("//title");
    $chek1 = $xpath1->query(".//td");
    if($chek->item(0)->nodeValue!="404") {
        $res = utf8_decode($chek->item(0)->nodeValue);
        $nom1 = '№';
        $str = " - Право вимоги";
        $nom2 = strpos($res, $nom1);
        $nom3 = strpos(substr($res,$nom2), $str);
        echo "<a href=".$url1.">".$count. "</a>) " .substr($res,$nom2, $nom3) ." Стан: <b>".utf8_decode($chek1->item(0)->nodeValue)."</b> цена:  ".utf8_decode($chek1->item(3)->nodeValue)." <br/>";
        $count++;
    }
    }
?>