<?php
require 'base.php';
foreach($pdo->query('SELECT id, name FROM category WHERE id>8') as $row) {
    echo "case '" . $row['name'] . "':";
    echo "<br />";
    echo "$";
    echo "catb='" . $row['id'] . "';";
    echo "<br />" . "break;";
    echo "<br />";
}
?>