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

</head>
<body class="bd">
<header>
<div class="head" align="center"></div>
    <div class="sub-head" align="center">

        <i class="fa fa-paperclip" aria-hidden="true"></i> Сводный реестр продаж ФГВФО
    </div>
</header>

<script>
    function displayFancybox($param1, $param2) {
        // Open FancyBox
        $.fancybox(document.getElementById("mail"));
        $mText = "Я выражаю желание выкупить лот № " + ($param2+1) +" в банке " + $param1 + " с первоначальной ценой "+ ($param2+1*587.6 + " грн.");
        document.getElementById("abc").innerHTML = $mText;

    }
</script>
<?php
$text = "Право требования по кредитному договору № ";
$banks = array("Таврика","ФиК","Региональные инвестиции в жизнь и свободу","ПУМБ","Форум","Сбербанк", "Славутич","Хрещатик","Городской","Маковый");
?>
<div id="content" style="position: relative;">

<div class="menu">
<form action="" class="sky-form">
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
                <label class="label">Банк</label>
                <label class="select state-success">
                    <select name="bank" id="bankid">
                        <option>Выберите банк</option>
                        <?php
                        foreach($banks as $key=>$bank) {
                            echo '<option value="'.$key.'">' . $bank . '</option>';
                        }
                        ?>
                    </select>
                    <i></i>
                </label>
                <div class="note note-success">Выберите банк</div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <label class="label">Выбор</label>
                <div class="row">
                    <div class="col col-4">
                        <label class="radio state-success"><input type="radio" name="radio"><i></i>Другое</label>
                        <label class="radio state-success"><input type="radio" name="radio"><i></i>Чтото</label>
                    </div>
                </div>
                <div class="note note-success"></div>
            </section>
        </fieldset>
        <fieldset>
            <div class="row">
                <section class="col col">
                    <label class="label">Состояние торгов</label>
                    <label class="toggle state-success"><input type="checkbox" name="checkbox-toggle" checked><i></i>Активные</label>
                    <label class="toggle state-success"><input type="checkbox" name="checkbox-toggle"><i></i>Завершенные</label>
                    <label class="toggle state-success"><input type="checkbox" name="checkbox-toggle"><i></i>Не проданные</label>
                    <div class="note note-success"></div>
                </section>
            </div>
        </fieldset>
        <footer>
            <button type="submit" class="button">Submit</button>
        </footer>
    </form>

</div>

<div class="main">
    <div class="sh-f">
        <span class="list" id="num"><p>#</p></span>
        <span class="inner" id="razd"></span>
        <span class="inner" id="subj"><p>Описание</p></span>
        <span class="inner" id="razd"></span>
        <span class="inner" id="cost"><p>Банк</p></span>
        <span class="inner" id="razd"></span>
        <span class="inner" id="cost" ><p>Стоимость</p></span>
        <span class="inner" id="razd"></span>
        <span class="inner" id="but"></span>
    </div>
    <div class="clear"></div>

    <?php
 //   for($i=15;$i<21;$i++){
        foreach($banks as $key=>$bank){
            $tbank = "$bank";
        echo '<div class="sh">
                    <span class="list" id="num"><p>'.($key+1).'</p></span>
                    <span class="inner" id="razd"></span>
                    <span class="inner" id="subj"><p>'.$text.($key+658.5).'</p></span>
                    <span class="inner" id="razd"></span>
                    <span class="inner" id="cost"><p>'.$bank.'</p></span>
                    <span class="inner" id="razd"></span>
                    <span class="inner" id="cost" ><p>$'.($key+1*587.6).'</p></span>
                    <span class="inner" id="razd"></span>
                    <span class="inner" id="but"><p><a id="inline" class="a_demo_three" href="#" onClick="displayFancybox(\''.$bank.'\', \''.$key.'\')">Выкупить</a></p></span>
                    <span class="inner" id="razd"></span>
                    </div>
                    <div class="clear"></div>';}?>
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

</body>
