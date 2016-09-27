<?
// Поиск ссылок на лот содержащий кредитный портфель или майно
ini_set("max_execution_time", "6000");
require "base.php";
$class = "item-title";
$url = "/catalog/krediti/pat_-vieybi_bank/";
//$torgimb = array();
$stm = $pdo->prepare('SELECT name, url FROM torgi_mbc WHERE id=17');
$stm->execute();

while($row = $stm->fetch(PDO::FETCH_ASSOC)) {

    $url1 = "torgi.fg.gov.ua".$row['url']."index.php?show=100&PAGEN_1=2";
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
    $chek = $xpath1->query("//div[@class='catalog_block']/div/div/div/div/a[contains(., 'Прав') or contains(., 'Дебіт')]");
    for($i=0; $i<$chek->length; $i++){
    echo $i.") ".$row['name'].": ".$chek->item($i)->nodeValue."', <br />";
        if($i==99) {
            // Продолжение на вторую страницу
            $url1 = "torgi.fg.gov.ua".$row['url']."index.php?show=100&PAGEN_1=3";
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
            $chek = $xpath1->query("//div[@class='catalog_block']/div/div/div/a[contains(., 'Прав')]");
            for($i=0; $i<$chek->length; $i++) {
                $nom=$i+100;
                echo $nom . ") " . $row['name'] . ": " . $chek->item($i)->nodeValue . "', <br />";
            }
        }

    }
}
?>