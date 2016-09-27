<?php
require "../dom/base.php";
$row_num = 0;
echo '
{
    "cols": [
        {"id":"","label":"","pattern":"","type":"string"},
        {"id":"","label":"","pattern":"","type":"number"}
    ],
    "rows": [
';

if(isset($_GET['id'])){
    $query = "SELECT torgi_mb.name AS name, credit.YrFiz AS Ur, count(*) AS con, ROUND(SUM(allDeb), 2) AS al FROM credit, torgi_mb WHERE credit.bank=torgi_mb.id AND credit.bank =".$_GET['id']." GROUP BY credit.YrFiz";
    $querycount = "select COUNT(*) FROM (select COUNT(bank) from credit WHERE bank=".$_GET['id']." GROUP BY YrFiz) as nomer";
    $count = $pdo->query($querycount);
    $id = $count->fetchColumn();
    foreach ($pds->query($query) as $su) {
        $row_num++;
        if ($row_num == $id) {
            $text .= "{\"c\":[{\"v\":\"";
            $text .=$su['Ur'];
            $text.= "\",\"f\":null},{\"v\":" . $su['al'] . ",\"f\":null}]}";
        } else {
            $text .= "{\"c\":[{\"v\":\"";
            $text .=$su['Ur'];
            $text.="\",\"f\":null},{\"v\":" . $su['al'] . ",\"f\":null}]}, ";
        }
    }
}
else {
    $query = "SELECT torgi_mb.name AS name, count(*) AS con, ROUND(SUM(allDeb), 2) AS al FROM credit, torgi_mb WHERE credit.bank=torgi_mb.id GROUP BY credit.bank HAVING SUM(allDeb)>0";
    $querycount = "select COUNT(*) FROM (select COUNT(distinct bank) from credit GROUP BY bank HAVING SUM(allDeb>0)) as nomer";
    $count = $pdo->query($querycount);
    $id = $count->fetchColumn();
    foreach ($pds->query($query) as $su) {
        $row_num++;
        if ($row_num == $id) {
            $text .= "{\"c\":[{\"v\":\"" . $su['name'] . "\",\"f\":null},{\"v\":" . $su['al'] . ",\"f\":null}]}";
        } else {
            $text .= "{\"c\":[{\"v\":\"" . $su['name'] . "\",\"f\":null},{\"v\":" . $su['al'] . ",\"f\":null}]}, ";
        }
    }
}

$text.= " ] }";
echo $text;


?>