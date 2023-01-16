<?php 
include_once 'db_conn.php'; 
 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

if(isset($_POST["export"]))
{
 
 
$fileName = "diagnostics-data_" . date('Y-m-d') . ".xls"; 
 

$fields = array('ID', 'SpecialtyID', 'name'); 
 

$excelData = implode("\t", array_values($fields)) . "\n"; 


$query = $conn->query("SELECT * FROM diagnostics ORDER BY ID ASC"); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['ID'], $row['specialtyID'], $row['name']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 

header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 

echo $excelData; 
 }
exit;