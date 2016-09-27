<? require'../dom/base.php';
ini_set("max_execution_time", "60000");
foreach($pdo->query('SELECT id FROM credit') as $rowcat ) {


    $arr = $pds->prepare("SELECT cid, ROUND(SUM(srocDeb), 2) AS sroc, ROUND(SUM(prosrocDeb), 2) AS prosroc, ROUND(SUM(allDeb), 2) AS al FROM zastava WHERE cid=".$rowcat['id']." ");
    $arr->execute();
    $arr1 = $arr->fetch(PDO::FETCH_ASSOC);
    $nw = $pde->prepare("UPDATE credit SET srocDeb=".$arr1['sroc'].", prosrocDeb=".$arr1['prosroc'].",allDeb=".$arr1['al']." WHERE id=".$rowcat['id']." ");
    $nw->execute();
    //echo $rowcat['id'].") sroc: ".$arr1['sroc']." | prosroc: ".$arr1['prosroc']." | all: ".$arr1['al']."<br />";


}

?>
