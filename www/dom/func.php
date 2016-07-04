<?php
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
    return date('Y-m-d H:i', $dnow);
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

function stan($stanstr)
{
    switch ($stanstr) {
        case "Реєстрація учасників":
            $stanNom = "102";
            break;
        case "Торги":
            $stanNom = "103";
            break;
        case "Підписання протоколу":
            $stanNom = "104";
            break;
        case "Очікується оплата":
            $stanNom = "105";
            break;
        case "Складання акту":
            $stanNom = "106";
            break;
        case "Торги відбулися":
            $stanNom = "107";
            break;
        case "Торги не відбулися":
            $stanNom = "108";
            break;
        case "Торги зупинено":
            $stanNom = "109";
            break;
        case "Торги припинено":
            $stanNom = "110";
            break;
    }
    return $stanNom;
}
function cat($catex){
     switch($catex){
         case 'Комерційна нерухомість':
             $catb ='9';
             break;
         case 'Промислова нерухомість':
             $catb='10';
             break;
         case 'Нежитлове приміщення':
             $catb='11';
             break;
         case 'Недобудована':
             $catb='12';
             break;
         case 'Житлова нерухомість':
             $catb='13';
             break;
         case 'Будівлі':
             $catb='14';
             break;
         case 'Гаражі/стоянки':
             $catb='15';
             break;
         case 'Легкові автомобілі':
             $catb='17';
             break;
         case 'Вантажні автомобілі':
             $catb='18';
             break;
         case 'Автобуси':
             $catb='19';
             break;
         case 'Спецтехніка':
             $catb='20';
             break;
         case 'Мототранспорт':
             $catb='21';
             break;
         case 'Сільгосптехніка':
             $catb='22';
             break;
         case 'Авіатранспорт':
             $catb='23';
             break;
         case 'Водний транспорт':
             $catb='24';
             break;
         case 'Причепи':
             $catb='25';
             break;
         case 'Запчастини/аксесуари':
             $catb='26';
             break;
         case 'Одяг':
             $catb='28';
             break;
         case 'Взуття':
             $catb='29';
             break;
         case 'Аксесуари':
             $catb='30';
             break;
         case 'Будівельні матеріали':
             $catb='32';
             break;
         case 'Сировина':
             $catb='33';
             break;
         case 'Обладнання':
             $catb='34';
             break;
         case 'Інструменти':
             $catb='35';
             break;
         case 'Декор':
             $catb='37';
             break;
         case 'Меблі':
             $catb='38';
             break;
         case 'Господарчі товари':
             $catb='39';
             break;
         case 'Книги':
             $catb='40';
             break;
         case 'Продовольчі товари':
             $catb='41';
             break;
         case 'Сад і дім':
             $catb='42';
             break;
         case 'Брухт':
             $catb='52';
             break;
         case 'Аукціон із різнотипних товарів':
             $catb='53';
             break;
         case 'Права вимоги':
             $catb='55';
             break;
         case "Інше":
             $catb="8";
             break;
     }
return $catb;
}
?>