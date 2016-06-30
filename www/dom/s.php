<?php
ini_set("max_execution_time", "600");
# Use the Curl extension to query Google and get back a page of results

    $url1 = "setam.net.ua/auction/158848/";

    $classname0 = "condition-row";
    $classname1 = "start-price-row";
    $classname2 = "date-end-row";
    $classname3 = "payment-row";
    $opisclass = "tab-content";
    $classname4 = "additional-nformation";

    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
    $html1 = curl_exec($ch1);
    curl_close($ch1);
    $lis1 = array();
    $dom1 = new DOMDocument();
    @$dom1->loadHTML($html1);
    $xpath1 = new DOMXPath($dom1);
    $results = $xpath1->query("//div[@class='". $classname0 ."']/span|//div[@class='" . $classname2 . "']/span|//div[@class='" . $classname1 . "']/span/span|//div[@class='" . $classname3 . "']/span|//div[@class='" . $opisclass . "']/div/p|//div[@class='" . $classname3 . "']/span");
    $notfound = "Сторінка не знайдена";
echo "Стан аукціону";       echo $results->item(0)->nodeValue;
echo "<br />";
echo "Номер лоту:";        echo $results->item(1)->nodeValue;
echo "<br />";
echo "Дата проведення аукціону:";        echo ddate($results->item(2)->nodeValue);
echo "<br />";
echo "Дата закінчення торгів:";        echo ddate($results->item(3)->nodeValue);
echo "<br />";
echo "Дата закінчення подання заявок:";        echo ddate($results->item(4)->nodeValue);
echo "<br />";
echo "Стартова ціна:";        echo $results->item(5)->nodeValue;

echo "<br />";
echo "Гарантійний внесок:";        echo $results->item(6)->nodeValue;
echo "<br />";
echo "Крок аукціону:";        echo $results->item(7)->nodeValue;
echo "<br />";
echo "Область:";        echo obl($results->item(8)->nodeValue);
echo "<br />";
echo "Місцезнаходження майна:";        echo $results->item(9)->nodeValue;
echo "<br />";
echo "Дата публікації:";        echo ddate($results->item(10)->nodeValue);
echo "<br />";
echo "<br />";
echo "Описание:";        echo $results->item(11)->nodeValue; //empty
echo "<br />";
echo $results->item(12)->nodeValue; //opis
echo "<br />";
echo $results->item(13)->nodeValue; //opis
echo "<br />";
echo $results->item(14)->nodeValue; //opis
echo "<br />";
echo "_________________";
echo "<br />";


function ddate($stroka)
{
    $day = substr($stroka, 0, 2);
    $month = substr($stroka, 3, -11);
    switch (substr($stroka, 3, -11)) {
        case "Січня":
            $month = "01";
            break;
        case "Лютого":
            $month = "02";
            break;
        case "Березня":
            $month = "03";
            break;
        case "Квітня":
            $month = "04";
            break;
        case "Травня":
            $month = "05";
            break;
        case "Червня":
            $month = "06";
            break;
        case "Липня":
            $month = "07";
            break;
        case "Серпня":
            $month = "08";
            break;
        case "Вересня":
            $month = "09";
            break;
        case "Жовтня":
            $month = "10";
            break;
        case "Листопада":
            $month = "11";
            break;
        case "Грудня":
            $month = "12";
            break;
    }
    $year = substr($stroka, -10, 4);
    $tti = substr($stroka, -5);
    $dnow = strtotime($day . "." . $month . "." . $year . " " . $tti);
    return date('d/m/Y H:i', $dnow);
}
function obl($oblname){
    switch ($oblname) {
    case "Автономна Республіка Крим":
        $obl = "1";
        break;
    case "Вінницька обл.":
        $obl = "2";
        break;
    case "Волинська обл.":
        $obl = "3";
        break;
    case "Дніпропетровська обл.":
        $obl = "4";
        break;
    case "Донецька обл.":
        $obl = "5";
        break;
    case "Житомирська обл.":
        $obl = "6";
        break;
    case "Закарпатська обл.":
        $obl = "7";
        break;
    case "Запорізька обл.":
        $obl = "8";
        break;
    case "Івано-Франківська обл.":
        $obl = "9";
        break;
    case "Київська обл.":
        $obl = "10";
        break;
    case "Кіровоградська обл.":
        $obl = "11";
        break;
    case "Луганська обл.":
        $obl = "12";
        break;
    case "Львівська обл.":
        $obl = "13";
        break;
    case "Миколаївська обл.":
        $obl = "14";
        break;
    case "Одеська обл.":
        $obl = "15";
        break;
    case "Полтавська обл.":
        $obl = "16";
        break;
    case "Рівненська обл.":
        $obl = "17";
        break;
    case "Сумська обл.":
        $obl = "18";
        break;
    case "Тернопільська обл.":
        $obl = "19";
        break;
    case "Харківська обл.":
        $obl = "20";
        break;
    case "Херсонська обл.":
        $obl = "21";
        break;
    case "Хмельницька обл.":
        $obl = "22";
        break;
    case "Черкаська обл.":
        $obl = "23";
        break;
    case "Чернівецька обл.":
        $obl = "24";
        break;
    case "Чернігівська обл.":
        $obl = "25";
        break;
    case "м.Київ":
            $obl = "26";
            break;
    }
    return $obl;
}

?>

