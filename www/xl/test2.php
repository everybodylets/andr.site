<?php
//ini_set("max_execution_time", "60000");
require '../dom/base.php';
$stm = $pdo->prepare('SELECT id, num, COUNT( * )
FROM credit
GROUP BY num
HAVING COUNT( * ) >1');
$stm->execute();
while($row = $stm->fetch(PDO::FETCH_ASSOC)){
    echo $row['id'].",<br />";
}
?>
