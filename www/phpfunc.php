<?php
session_start();
function updateSession(){
    if(isset($_SESSION['obl'])) {
        $getobl = implode(",", $_SESSION['obl']);
        $querytext = "main.obl IN (" . $getobl . ") AND";

    }
    if (isset($_SESSION['stan'])){
        $getstan = implode(",", $_SESSION['stan']);
        $querytext .= " main.stan IN (".$getstan.") AND";

    }
    if(isset($_SESSION['categ'])){
        $getcateg = implode(",", $_SESSION['categ']);
        $querytext .= " main.category IN (".$getcateg.") AND";

    }
    if(isset($_SESSION['find'])){
        $getfind = $_SESSION['find'];
        $querytext .= " main.title LIKE '%".$getfind."%' AND";
        $_SESSION['querytext'] = $getfind;
    }
    $_SESSION['querytext'] = $querytext;
}


?>