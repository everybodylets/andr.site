<?
session_start();

require 'dom/base.php';
$echonumber = $_GET['echo'];
$sth = $pdo->prepare("SELECT main.id, main.nomer, main.title, main.dataStart, main.dataEnd, main.priceStart, main.priceGarant, main.priceStep, stan.name, main.Body, obl.name AS oblname, main.Category, category.name as cat FROM main, stan, obl, category WHERE main.nomer=".$echonumber." AND main.stan=stan.id AND main.obl=obl.id AND main.Category=category.id");
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);


$dir = "dom/photo/".$echonumber;
$files1 = scandir($dir);
$files = array_diff($files1, array('.', '..'));

$page = $_GET['pagi'];
?>

<div class="case-w">
    <div class="inner_case"><a href="javascript:void(0)" onclick="pag(<? echo $page.','.$echonumber; ?>)">
    <i class="fa fa-reply fa-2x" aria-hidden="true" style="color: #0d560d; margin-top: 5px"> Список</i></a></div>

    <span class="case" ><p>Лот №<? echo $echonumber; ?></p></span>

    <div class="inner_byu">
        <a href="javascript:void(0)" onclick="pag(<? echo $page.','.$echonumber; ?>)">
    <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true" style="color: #0d560d"> Купить </i>
    </a>
    </div>

    <div class="clear"></div>
    <div class="foto">
        <div class="fotorama" data-max-width="100%" data-min-height="20px" data-loop="true" data-fit="cover" data-nav="thumbs">
            <?
            foreach($files as $pic){
                echo '<img src="/dom/photo/'.$echonumber.'/'.$pic.'">';
            }?>
        </div>
    </div>

    <ul class="spisok">
        <li><span class="llist"><?php echo $result['name']?></span></li>
        <br />
        <li><span class="llist"><?php echo $result['title'] ?></span></li>
        <br/>
        <li><span class="llist">Дата начала торгов: <?php echo substr($result['dataStart'],0,16) ?></span></li>
        <li><span class="llist">Дата окончания торгов: <?php echo substr($result['dataEnd'],0,16) ?></span></li>
        <br/>
        <li><span class="llist">Начальная цена: <?php echo number_format($result['priceStart'], 2, ",", " ") ?> грн.</span></li>
        <li><span class="llist">Гарантийный платеж: <?php echo number_format($result['priceGarant'], 2, ",", " ") ?> грн.</span></li>
        <li><span class="llist">Шаг ставки: <?php echo number_format($result['priceStep'], 2, ",", " ") ?> грн.</span></li>
        <br/>
        <li><span class="llist">Расположение: <?php echo $result['oblname'] ?></span></li>
        <li><span class="llist">Категория: <?php echo $result['cat'] ?></span></li>
        <br/>
        <br/>
    </ul>
    <div class="clear"></div>
    <span class="llist"><h3>Описание: </h3><?php echo $result['Body'] ?></span>
    <div class="clear"></div>

</div>
