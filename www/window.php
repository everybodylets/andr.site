<?
//session_start();
require "dom/base.php";
if(isset($_GET['page'])){
$limittext = "LIMIT ".(($_GET['page']-1)*20).", 20";
$page = $_GET['page'];}
else{
$limittext = "LIMIT 0, 20";
$page = 1;
}
if(!empty($_POST)){
    if(isset($_POST['obl'])) {
    $getobl = implode(",", $_POST['obl']);
    $querytext = "main.obl IN (" . $getobl . ") AND";

    }
    if (isset($_POST['stan'])){
    $getstan = implode(",", $_POST['stan']);
    $querytext .= " main.stan IN (".$getstan.") AND";

    }
    if(isset($_POST['categ'])){
    $getcateg = implode(",", $_POST['categ']);
    $querytext .= " main.category IN (".$getcateg.") AND";

    }
    if(isset($_POST['find']) && !empty($_POST['find'])){
    $getfind = $_POST['find'];
    $querytext .= " (main.title LIKE '%".$getfind."%'  OR main.nomer LIKE '%".$getfind."%') AND";
    }
    if(isset($_POST['ot']) && !empty($_POST['ot'])){
        $getot = $_POST['ot'];
        $querytext .= " main.priceStart>=".$getot." AND";
    }
    if(isset($_POST['do']) && !empty($_POST['do'])){
        $getdo = $_POST['do'];
        $querytext .= " main.priceStart <= ".$getdo." AND";
    }
}
$result = $pdo->query('SELECT SQL_CALC_FOUND_ROWS main.id, main.nomer, main.title, main.dataStart,
main.dataEnd, main.priceStart, main.priceGarant, main.priceStep, stan.name, obl.name AS oblname
FROM main, stan, obl WHERE '.$querytext.' main.stan=stan.id AND main.obl=obl.id
ORDER BY dataStart DESC, nomer '.$limittext.' ');
$numrow = $pdo->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN);
$count_pages = ceil($numrow/20);

?>

<div class="sub-page">Страница <? echo $page; ?> из <? echo $count_pages; ?></div>
<div class="sh-f">
    <span class="inner-head" id="num"><p>#<? echo $page; ?></p></span>
    <span class="inner-head" id="subj"><p>Описание</p></span>
    <span class="inner-head" id="date"><p>Дата торгов</p></span>
    <span class="inner-head" id="cost" ><p>Стоимость</p></span>
    <span class="inner-head" id="photo" ><p>Фото</p></span>
</div>
<div class="clear"></div>
    <?php
    foreach($result as $raw1){
        $nomm = $raw1['nomer'];
        $cena = number_format($raw1["priceStart"], 2, ",", " ");
        echo '<div class="sh" id="'.$nomm.'"><span class="inner" id="num">'.$raw1["nomer"].' <br /></span>';

        echo'<span class="inner" id="subj"><p><a href="javascript:void(0)" id="echo" onClick="llo('.$nomm.','.$page.')">'.$raw1["title"].'</a></p></span>
                    <span class="inner" id="date"><p><b>'.$raw1["name"].'</b><br />Область: <b>'.$raw1["oblname"].'</b><br />Начало торгов: <b>'. substr($raw1["dataStart"],0, 10).'</b> <br /> Окончание торгов: <b>'. substr($raw1["dataEnd"],0, 10).'</b> </p></span>
                    <span class="inner" id="cost" ><p>Начальная цена: <br /><b>'.number_format($raw1["priceStart"], 2, ",", " ").' грн </b><br />Гарантийный платеж: <br /><b>'.number_format($raw1["priceGarant"], 2, ",", " ").' грн</b></p></span>
                    <span class="inner" id="photo" ><a href="javascript:void(0)" id="echo" onClick="llo('.$nomm.','.$page.')"><img src="/dom/photo/'.$nomm.'/file0.jpg" style="width:100px; height:100px"></a></span>
        </div>
                    <div class="clear"></div>'
        ;}?>
    <div class="sky-form-padd">
        <button type="submit" class="button" id="anchor">Выбрать</button>
    </div>
<?php
    /* Входные параметры */
    $active = (isset($_GET["page"]))?$_GET["page"]:1;
    $count_show_pages = 7;
    $url = "1";
    if ($count_pages > 1) { // Всё это только если количество страниц больше 1
    /* Дальше идёт вычисление первой выводимой страницы и последней (чтобы текущая страница была где-то посредине, если это возможно, и чтобы общая сумма выводимых страниц была равна count_show_pages, либо меньше, если количество страниц недостаточно) */
    $left = $active - 1;
    $right = $count_pages - $active;
    if ($left < floor($count_show_pages / 2)) $start = 1;
    else $start = $active - floor($count_show_pages / 2);
    $end = $start + $count_show_pages - 1;
    if ($end > $count_pages) {
        $start -= ($end - $count_pages);
        $end = $count_pages;
        if ($start < 1) $start = 1;
    }
?>
<div id="pager">
    <section>
        <nav role="navigation">
            <ul class="cd-pagination no-space move-buttons custom-icons">
        <!-- Дальше идёт вывод Pagination -->
           <div id="pagination">
               <?php if ($active != 1) { ?>
                   <li class="button"><a href="javascript:void(0)" onclick='pag(<?= $url ?>)' title="Первая страница">1...</a></li>
                   <li class="button"><a href="javascript:void(0)" onclick='pag(<?php if ($active == 2) { ?><?= $url ?><?php } else { ?><?= ($active - 1) ?><?php } ?>)' "title="Предыдущая страница">Пред.</a></li>
               <?php } else{ ?><li class="button"><a class="disabled" href="javascript:void(0)" onclick='pag(<?= $url ?>)' title="Первая страница">1...</a></li>

            <?php }?>
            <?php for ($i = $start; $i <= $end; $i++) { ?>
                <?php if ($i == $active) { ?><span class="current"><?=$i?></span><?php } else { ?><a href="javascript:void(0)" onclick='pag(<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$i?><?php } ?>)'><?=$i?></a><?php } ?>
            <?php } ?>
            <?php if ($active != $count_pages) { ?>
            <li class="button"><a href="javascript:void(0)" onclick='pag(<?=($active + 1)?>)' title="Следующая страница">След.</a></li>
            <li class="button"><a href="javascript:void(0)" onclick='pag(<?=$count_pages?>)' title="Последняя страница">...<?php echo $count_pages ?></a></li>
            <?php } ?>
        </div>
        <?php } ?>
            <ul>
        <nav>
    </section>
</div>
