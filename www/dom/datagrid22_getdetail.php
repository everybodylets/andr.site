<?
include 'base.php';

$q = $pdo->prepare("select * from torgi_banks");
$q->execute();
$items = array();
while($row = $q->fetch(PDO::FETCH_ASSOC)){
    array_push($items, $row);
}

echo json_encode($items);
?>