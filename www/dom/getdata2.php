<?php
require 'base.php';
$itemid = mysql_real_escape_string($_REQUEST['itemid']);
$q = $pdo->prepare("select cid, tip, addr, srocDeb, prosrocDeb, allDeb, codval from zastava where cid='$itemid'");
$q->execute();
$items = array();
while($row = $q->fetch(PDO::FETCH_ASSOC)){
array_push($items, $row);
}
header('Content-Type: application/json');
echo json_encode($items);
?>