<?
require('php-excel-reader/excel_reader2.php');
require('SpreadsheetReader.php');

if (isset($_GET['File'])) {
    $Filepath = $_GET['File'];
}
$count=0;
try
{
$Spreadsheet = new SpreadsheetReader($Filepath);
$Spreadsheet->ChangeSheet(0);

foreach ($Spreadsheet as $Key => $Row){
if($Key) {
    echo $Key . ": " . $row[1] . "<br />";
}
}
}
catch (Exception $E)
{
    echo $E -> getMessage();
}
?>