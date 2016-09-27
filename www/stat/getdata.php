<?
require '../dom/base.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$postnom = !empty($_POST['nom']) ? str_replace("\\","\\\\",$_POST['nom']) : "";

$where = isset($_POST['bank']) ? "AND credit.bank IN (".implode(',',$_POST['bank']).") " : "";
$whereU = isset($_POST['ur']) ? " AND credit.YrFiz IN (".implode(',',$_POST['ur']).") " : "";
$countwhereU = isset($_POST['ur']) ? " WHERE credit.YrFiz IN (".implode(',',$_POST['ur']).") " : " WHERE credit.YrFiz IN (1,2,3) ";
$offset = ($page-1)*$rows;


$rs = $pdo->prepare("select count(*) AS co from credit".$countwhereU.$where."AND credit.num LIKE ?  ");
$rs->bindValue(1, "$postnom%", PDO::PARAM_STR);
$rs->execute();
$row = $rs->fetch(PDO::FETCH_ASSOC);
$result["total"] = $row['co'];

$query = "select credit.id, credit.bank, credit.YrFiz, credit.num, credit.allDeb, torgi_mb.name AS name FROM credit, torgi_mb WHERE credit.bank=torgi_mb.id AND credit.num LIKE ? ".$where.$whereU." ";

$q = $pdo->prepare($query." LIMIT ".$offset.",". $rows." ");
$q->bindValue(1, "$postnom%", PDO::PARAM_STR);
$q->execute();
$items = array();
while($row = $q->fetch(PDO::FETCH_ASSOC)){
array_push($items, $row);
}
$result["rows"] = $items;

$foo = $pdo->prepare("SELECT round(SUM(allDeb),2) FROM (".$query.") AS cnt");
$foo->bindValue(1, "$postnom%", PDO::PARAM_STR);
$foo->execute();
$rowF = $foo->fetch(PDO::FETCH_ASSOC);
$foot[] = array('name'=>'Итого','allDeb'=>$rowF['round(SUM(allDeb),2)']);
$result["footer"] = $foot;

header('Content-Type: application/json');
echo json_encode($result);
?>