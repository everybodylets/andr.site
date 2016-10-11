<?
//session_start();
require'dom/base.php';
?>

<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <title>Факторинг</title>
    <link rel="icon" type="image/png" href="fav.png" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="sky.css" rel="stylesheet" />
    <link href="find.css" rel="stylesheet" />
    <link href="button.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery-latest.min.js"></script>
    <script type="text/javascript" src="myscript.js"></script>
    <link href="fotorama.css" type="text/css" rel="stylesheet">
    <script src="fotorama.js" type="text/javascript"></script>

    <link rel="stylesheet" href="pagination/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="pagination/css/style.css"> <!-- Resource style -->


</head>

<body>
<ul class="reg">
    <li class="reg"><a id="myBtn" onclick="reg()">Вход</a></li>
</ul class="reg">
<div class="clear_r"></div>
<header>
    <div class="head" align="center">

        <ul class="m">
            <li class="m"><a class="activetab" href="/" title="Сводный реестр продаж ФГВФО"><i class="fa fa-paperclip"> Торги </i></a></li>
            <li class="m"><a href="/stat" title="Кредитные портфели банков ФГВФО"><i class="fa fa-list-ol" aria-hidden="true"> Кредиты </i></a></li>
            <li class="m"><a href="/stat1" title="Графики распределения кредитных портфелей ФГВФО"><i class="fa fa-pie-chart" aria-hidden="true"> Графики </i></a></li>
        </ul>
        <a href="#" class="sideTrigger"><img class="sideTriggerImg" src="menu11.png" /></a>
    </div>
    <div class="sub-head" align="center">
        <i class="fa fa-paperclip" aria-hidden="true"></i> Сводный реестр продаж ФГВФО

    </div>
</header>


<div id="content" style="position: relative;">

    <div class="menu">
        <form class="sky-form">
            <header>Поиск</header>

            <fieldset>
                <section>
                    <label class="label">Введите текст</label>
                    <label class="input state-success">
                        <input type="text" name="find" >
                    </label>
                    <div class="note note-success">Поиск по описанию лота.</div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <label class="label">Стоимость</label>
                    <label class="input state-success">
                        <input type="text" name="ot" placeholder="больше ... грн" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
                    <label class="input state-success">
                    </label>
                        <input type="text" name="do" placeholder="меньше ... грн" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
                    </label>
                    <div class="note note-success">Поиск по стоимости лота.</div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <label class="label">Категория</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxesCat()">
                            <label class="select state-success">
                                <select>
                                    <option id="OptCat">Выберите категорию</option>
                                </select>
                            </label>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxesCat" class="checkboxes">
                            <?php foreach($pdo->query('SELECT id, name FROM category WHERE id>8') as $rowcat) {
                                echo '<label><input type="checkbox" name="categ[]" value="'.$rowcat['id'].'"';
                                echo '/>'.$rowcat['name'];
                                echo '</label>';}?>
                        </div>
                        </label>
                        <div class="note note-success"><span id="CountCat">Выбрано: 0</span><a onclick="clearCat('categ[]','CountCat')" href="javascript:void(0)" style="position: relative; left: 10px">Стереть</a></div>
                    </div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <label class="label">Состояние торгов</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxesStan()">
                            <label class="select state-success">
                                <select>
                                    <option id="OptStan">Состояние торгов</option>
                                </select>
                            </label>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxesStan" class="checkboxes">
                            <?php foreach($pdo->query('SELECT id, name FROM stan') as $rowstan) {
                                echo '<label><input type="checkbox" name="stan[]" value="'.$rowstan['id'].'"';
                                echo '/>'.$rowstan['name'];
                                echo '</label>';}?>
                        </div>
                        </label>
                        <div class="note note-success"><span id="CountStan">Выбрано: 0</span><a href="javascript:void(0)" onclick="clearCat('stan[]','CountStan')" style="position: relative; left: 10px;">Стереть</a></div>
                    </div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <label class="label">Область</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxesObl()">
                            <label class="select state-success">
                                <select>
                                    <option id="OptObl">Выберите область</option>
                                </select>
                            </label>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxesObl" class="checkboxes">
                            <?php foreach($pdo->query('SELECT id, name FROM obl') as $rowobl) {
                                echo '<label><input type="checkbox" name="obl[]" value="'.$rowobl['id'].'"';
                                echo ' />'.$rowobl['name'];
                                echo '</label>';}
                            ?>
                        </div>
                        </label>
                        <div class="note note-success"><span id="CountObl">Выбрано: 0</span><a onclick="clearCat('obl[]','CountObl')" href="javascript:void(0)" style="position: relative; left: 10px">Стереть</a></div>
                    </div>
                </section>
            </fieldset>
            <footer>
                <input type="button" class="button" value="Фильтровать" onclick="pag('1')" </input>
            </footer>
        </form>
    </div>

    <div id="main" class="main"></div>


</div>

</body>
<div id="openModal" class="modalDialog"></div>

<script type="text/javascript">
    $(function() {
        $('#main').load('window.php');
//        $('#fotorama').fotorama();
    });
    function llo(res, pagi) {
        $('#main').load('mailform.php?echo='+res+'&pagi='+pagi, function() {
            $('html, body').animate({scrollTop: 0}, 500);
            $('.fotorama').fotorama();
        });

    };

    function pag(res) {
        var formData = $('.sky-form').serializeArray();
        $('#main').load('window.php?page='+res, formData, function() {
            $('html, body').animate({scrollTop: $('#anchor').offset().top}, 500);
        });
    };
    // Side Menu Trigger Function
    $('a.sideTrigger').click(function() {
        $('body').toggleClass('sideOpen');
        return false;
    });

    // Close Menu Trigger Function
    $('a.closeTrigger').click(function() {
        $('body').removeClass('sideOpen');
        return false;
    });

    var modal = document.getElementById('openModal');
    function reg(res) {
        $('#openModal').show();
        if(res=="reg"){
            $('#openModal').load('reg.php');
        } else {
            $('#openModal').load('enter.php');
        }
    }
    function cl(){
        $('#openModal').hide();
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>


