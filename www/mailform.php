<?
//session_start();
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
    <a href="javascript:void(0)" onclick="pag(<? echo $page.','.$echonumber; ?>)">
    <span class="inner_case"><p>К списку</p></span></a>
    <span class="case" ><p>Лот №<? echo $echonumber; ?></p></span>
    <div class="clear"></div>
    <div class="foto">
        <div class="fotorama" data-width="100%" data-max-width="100%" data-min-height="20px" data-loop="true" data-fit="cover" data-nav="thumbs">
            <?
            foreach($files as $pic){
                echo '<img src="/dom/photo/'.$echonumber.'/'.$pic.'">';
            }?>
        </div>
    </div>
        <span class="llist"><?php echo $result['name']?></span>
            <ul class="spisok">
            <li><span class="llist"><?php echo $result['title'] ?></span></li>
            <li><br/></li>
            <li><span class="llist">Дата начала торгов: <?php echo substr($result['dataStart'],0,16) ?></span></li>
            <li><span class="llist">Дата окончания торгов: <?php echo substr($result['dataEnd'],0,16) ?></span></li>
                <li><br/></li>
            <li><span class="llist">Начальная цена: <?php echo number_format($result['priceStart'], 2, ",", " ") ?> грн.</span></li>
            <li><span class="llist">Гарантийный платеж: <?php echo number_format($result['priceGarant'], 2, ",", " ") ?> грн.</span></li>
            <li><span class="llist">Шаг ставки: <?php echo number_format($result['priceStep'], 2, ",", " ") ?> грн.</span></li>
                <li><br/></li>
            <li><span class="llist">Расположение: <?php echo $result['oblname'] ?></span></li>
            <li><span class="llist">Категория: <?php echo $result['cat'] ?></span></li>
                <li><br/></li>
                <li><br/></li>
            <li><h2>Описание:</h2><span class="llist"><?php echo $result['Body'] ?></span></li>
        </ul>

</div>
