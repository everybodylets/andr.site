<?
// Поиск ссылок на лот содержащий кредитный портфель или майно
ini_set("max_execution_time", "6000");
require "base.php";

$url = "/catalog/krediti/pat_-bank_forum/";

//$stm = $pdo->prepare('SELECT name, url FROM torgi_mbc WHERE id=17');
//$stm->execute();
$count = 1;
//while($row = $stm->fetch(PDO::FETCH_ASSOC)) {
for($c=1;$c<13; $c++){
    $url1 = "torgi.fg.gov.ua".$url."index.php?show=100&PAGEN_1=".$c;
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
    $chek = $xpath1->query(".//div[@class='catalog_block']/div/div/div/div/a/@href");
//    echo $chek->item(0)->nodeValue;
    for($i=0; $i<$chek->length; $i++){
        echo $count.") ".$row['name'].": ".$chek->item($i)->nodeValue."', <br />";
        $count++;
        }
}
?>