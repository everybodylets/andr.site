<head>
<meta charset="utf-8">
<title>Факторинг</title>
<link rel="icon" type="image/png" href="fav.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="sky.css" rel="stylesheet" />
<link href="find.css" rel="stylesheet" />
<link href="button.css" rel="stylesheet" />
    <!-- Add jQuery library -->
    <script type="text/javascript" src="jquery-latest.min.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
    <?php
    require'dom/base.php';

    ?>
</head>
<body class="bd">
<header>
<div class="head" align="center"></div>
    <div class="sub-head" align="center">

        <i class="fa fa-paperclip" aria-hidden="true"></i> Сводный реестр продаж ФГВФО
    </div>
</header>

<script>
    function displayFancybox() {
        // Open FancyBox

        $.fancybox(document.getElementById("mail"));
        $mText = "Я выражаю желание выкупить лот № " + arguments[0] + "с первоначальной ценой " + arguments[1] + "грн.";
        document.getElementById("abc").innerHTML = $mText;

    }
</script>
<?php
$text = "Право требования по кредитному договору № ";
$banks = array("Таврика","ФиК","Региональные инвестиции в жизнь и свободу","ПУМБ","Форум","Сбербанк", "Славутич","Хрещатик","Городской","Маковый");
?>
<div id="content" style="position: relative;">

<div class="menu">
<form action="/" class="sky-form">
        <header>Поиск</header>

        <fieldset>
            <section>
                <label class="label">Введите текст</label>
                <label class="input state-success">
                    <input type="text">
                </label>
                <div class="note note-success">Поиск по описанию лота.</div>
            </section>
        </fieldset>

        <fieldset>
        <section>
            <label class="label">Категория</label>
            <label class="select-multiple state-success">
                <select multiple name="category" id="category">
                       <?php

                    foreach($pdo->query('SELECT id, name FROM category WHERE id>7') as $row) {
                        echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
                <i></i>
            </label>
            <div class="note note-success">Удерживайте Ctrl для выбора нескольких значений</div>
        </section>
    </fieldset>
    <fieldset>
        <section>
            <label class="label">Состояние торгов</label>
            <label class="select-multiple state-success">
                <select multiple name="state" id="state">
                           <?php

                    foreach($pdo->query('SELECT id, name FROM stan') as $row) {
                        echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
                <i></i>
            </label>
            <div class="note note-success">Удерживайте Ctrl для выбора нескольких значений</div>
        </section>
// without fieldset
        <section>
            <label class="label">Область</label>
            <label class="select-multiple state-success">
                <select name="obl[]" id="obl" size="7" multiple="multiple">
                    <?php

                    foreach($pdo->query('SELECT id, name FROM obl') as $row) {
                        echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
                <i></i>
            </label>
            <div class="note note-success">Удерживайте Ctrl для выбора нескольких значений</div>
        </section>

        <footer>
            <button type="submit" class="button">Submit</button>
        </footer>
    </form>

</div>

<div class="main">
    <div class="sh-f">
        <span class="list" id="num"><p>#</p></span>

        <span class="inner" id="subj"><p>Описание</p></span>

        <span class="inner" id="cost"><p>Дата торгов</p></span>

        <span class="inner" id="cost" ><p>Стоимость</p></span>
        <span class="inner" id="photo" ><p>Фото</p></span>
    </div>
    <div class="clear"></div>

    <?php // if(isset($_GET)){        $queryget = "SELECT main.id, main.nomer, main.title, main.dataStart, main.dataEnd, main.priceStart, main.priceGarant, main.priceStep, stan.name, obl.name FROM main, stan, obl WHERE (main.obl ) AND main.id<20 AND main.stan=stan.id AND main.obl=obl.id";}
    $getobl = implode(",",$_GET['obl']);
        foreach($pdo->query('SELECT main.id, main.nomer, main.title, main.dataStart, main.dataEnd, main.priceStart, main.priceGarant, main.priceStep, stan.name, obl.name AS oblname FROM main, stan, obl WHERE main.obl IN('.$getobl.') AND  main.id<10 AND main.stan=stan.id AND main.obl=obl.id') as $raw1){
            $nomm = $raw1['nomer'];
            $cena = number_format($raw1["priceStart"], 2, ",", " ");
        echo '<div class="sh">
                    <span class="list" id="num"><p>'.$raw1['nomer'].'</p></span>

                    <span class="inner" id="subj"><p>
                    <a href="#" onClick="displayFancybox(\''.$nomm.'\',\''. $cena. '\')">'.$raw1["title"].'</a></p></span>

                    <span class="inner" id="date"><p><b>'.$raw1["name"].'</b><br />Область: <b>'.$raw1["oblname"].'</b><br />Начало торгов: '. substr($raw1["dataStart"],0, 10).' <br /> Окончание торгов: '. substr($raw1["dataEnd"],0, 10).' </p></span>

                    <span class="inner" id="cost" ><p>Начальная цена: <br /><b>'.number_format($raw1["priceStart"], 2, ",", " ").' грн </b><br />
                                                    Гарантийный платеж: <br /><b>'.number_format($raw1["priceGarant"], 2, ",", " ").' грн</b></p></span>

                    <span class="inner" id="photo" ><img src="/dom/files1/'.$nomm.'/file0.jpg" style="width:100px; height:100px"></span>
                    </div>
                    <div class="clear"></div>'
        ;}?>
</div>

</div>

<div style="display: none">
    <div id="mail">
        <form action="#" method="post" class="sky-form">
            <header>Отправить сообщение</header>

            <fieldset>
                <section>
                    <label class="label">Ваше имя:</label>
                    <label class="input state-success">
                        <input type="text">
                    </label>
                    <label class="label">Ваш контактный номер телефона:</label>
                    <label id="newid" class="input state-success">
                        <input type="text">
                    </label>
                    <label class="label">Сообщение:</label>
                    <label class="input state-success">
                        <span id="lot"></span>
                        <textarea rows="10" cols="45" name="message" id="abc"></textarea>
                    </label>
                    <label class="label">Либо позвоните нам напрямую:</label>

                    <div class="note note-success"><ul><li>тел. +38 050 476 62 66</li><li>тел. +38 044 504 20 19</li></ul></div>
                </section>
            </fieldset>
            <footer>
                <button type="submit" class="button">Отправить</button>
            </footer>
        </form>

    </div> </div>
<?php
    $getobl = implode(",",$_GET['obl']);
    echo $getobl;
?>
</body>
