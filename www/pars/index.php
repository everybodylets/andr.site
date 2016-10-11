<?
if(isset($_GET)) {
$j=4;
$test = 5;
    $url1 = $_GET['url'];
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
    $html1 = curl_exec($ch1);
    curl_close($ch1);

    $dom1 = new DOMDocument();
    @$dom1->loadHTML($html1);
    $xpath1 = new DOMXPath($dom1);
    $name = $xpath1->query("//table/tbody/tr[contains(., 'Публічний паспорт активу')]/following-sibling::tr/td|//table/tbody/tr[contains(., 'Публічний паспорт активу')]/following-sibling::tr/td/@rowspan");
        for ($i = 0; $i <=$name->length; $i++) {


            echo $name->item($i)->nodeValue;
            echo "<br /> ---------- <br />";




            //if($i == $j){echo "End lot!!<br />"; $j=$j+5;}
        }
    echo "________________________________________ <br />";
    for($t=1; $t<$test; $t++){
    echo $t."<br />";
    if($t==3){$test=$test+4;}
    }
}
?>
<form action="index.php" method="get">
    <label>URL: </label>
    <input type="text" name="url" value="<? echo $_GET['url']?>">
    <input type="submit">
</form>
