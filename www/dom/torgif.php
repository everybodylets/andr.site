<?
//require
$far = array('/catalog/mayno_bankiv/at_-brokbiznesbank/111705/', '/catalog/mayno_bankiv/ab_-ukoopspilka/111754/', '/catalog/mayno_bankiv/at_-bank_-natsional%60ni_investytsiyi/111736/', '/catalog/mayno_bankiv/at_-bank_-tavryka/111749/', '/catalog/mayno_bankiv/at_-bank_-finansy_ta_kredyt/111759/', '/catalog/mayno_bankiv/at_-bank_zoloti_vorota/111719/', '/catalog/mayno_bankiv/at_-del%60ta_bank/111711/', '/catalog/mayno_bankiv/at_-evrogazbank_/111713/', '/catalog/mayno_bankiv/at_-kb_-ekspobank/111714/', '/catalog/mayno_bankiv/at_-finrostbank/111760/', '/catalog/mayno_bankiv/at-erde_bank/111716/', '/catalog/mayno_bankiv/bank_-demark/111712/', '/catalog/mayno_bankiv/pat_-interbank/111722/', '/catalog/mayno_bankiv/pat_-unikombank/111756/', '/catalog/mayno_bankiv/pat_-akb_-kyyiv/111725/', '/catalog/mayno_bankiv/pat_-akb_bank_/111694/', '/catalog/mayno_bankiv/pat_-aktabank_/111702/', '/catalog/mayno_bankiv/pat_-bank_kambio/111724/', '/catalog/mayno_bankiv/pat_-bank_forum_/111761/', '/catalog/mayno_bankiv/pat_-bg_bank_/111704/', '/catalog/mayno_bankiv/pat_-vbr/111706/', '/catalog/mayno_bankiv/pat_-vieybi_bank_/111708/', '/catalog/mayno_bankiv/pat_-grin_bank/111709/', '/catalog/mayno_bankiv/pat_-energobank_/111715/', '/catalog/mayno_bankiv/pat_-zakhidinkombank/111717/', '/catalog/mayno_bankiv/pat_-zlatobank_/111718/', '/catalog/mayno_bankiv/pat_-integral-bank/111723/', '/catalog/mayno_bankiv/pat_-interkredytbank/111721/', '/catalog/mayno_bankiv/pat_-kb_-aksioma/111695/', '/catalog/mayno_bankiv/pat_-kb_-aktyv-bank/111703/', '/catalog/mayno_bankiv/pat_-kb_-nadra_/111734/', '/catalog/mayno_bankiv/pat_-kb_-pivdenkombank/111739/', '/catalog/mayno_bankiv/pat_-kb_-premium/111742/', '/catalog/mayno_bankiv/pat_-kb_-ufs/111758/', '/catalog/mayno_bankiv/pat_-komertsiynyy_bank_-daniel/111710/', '/catalog/mayno_bankiv/pat_-kredytprombank/111728/', '/catalog/mayno_bankiv/pat_-legbank_/111729/', '/catalog/mayno_bankiv/pat_-melior_bank/111731/', '/catalog/mayno_bankiv/pat_-miskyy_komertsiynyy_bank/111733/', '/catalog/mayno_bankiv/pat_-omega_bank/111737/', '/catalog/mayno_bankiv/pat_-praym-bank_/111741/', '/catalog/mayno_bankiv/pat_-profin_bank/111743/', '/catalog/mayno_bankiv/pat_-radykal_bank/111744/', '/catalog/mayno_bankiv/pat_-real_bank/111745/', '/catalog/mayno_bankiv/pat_-starokyyivs%60kyy_bank/111747/', '/catalog/mayno_bankiv/pat_-terra_bank_/111750/', '/catalog/mayno_bankiv/pat_-ukrbiznesbank_/111752/', '/catalog/mayno_bankiv/pat_-ukrgazprombank_/111755/', '/catalog/mayno_bankiv/pat_-upb_/111757/', '/catalog/mayno_bankiv/pat_-yusb_bank/111762/', '/catalog/mayno_bankiv/pat_ab_-stolychnyy_/111748/', '/catalog/mayno_bankiv/pat_bank_-kontrakt_/111727/', '/catalog/mayno_bankiv/pat_kb_-standart_/111746/', '/catalog/mayno_bankiv/pat-kb_-promekonombank/111738/');
header('Content-type: text/html; charset=utf-8');
$count=1;
foreach($far as $f) {
    $url1 = "torgi.fg.gov.ua".$f;
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
    $name = $xpath1->query("//h1");
    $varname = substr($name->item(0)->nodeValue, 35);
    $chek = $xpath1->query("//div[@class='description']/a/@href[contains(., 'xls')]");
    for ($i = 0; $i < $chek->length; $i++) {
        echo $count.") ".$varname . ": " . $chek->item($i)->nodeValue . "<br />";
//        $url = 'http://torgi.fg.gov.ua' . $chek->item($i)->nodeValue;
//        $local = 'files1/' . iconv("UTF-8", "cp1251", $varname) . $i . '.xls';
//        file_put_contents($local, file_get_contents($url));
    }
}
?>

