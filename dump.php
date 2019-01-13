<?php
require('../../../core/database.php');
$result = mysql_query("SELECT * FROM `napcham` where `trangthai` = 1 ");

$date = date("d-m-Y",mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));

$end_date = date("Y-m-d");


while($rows = mysql_fetch_array($result))
	$arr_result[] = $rows;

$amount = array();

while (strtotime($date) <= strtotime($end_date)){

	$thanhcong = 0;

	foreach($arr_result as $row)
	{
	    if(strtotime($row['date']) > strtotime($date) && strtotime($row['date']) < strtotime("+1 day", strtotime($date)) )  
	    $thanhcong = $thanhcong + $row['menhgia'];
	}

	
	$label = date("d-m",strtotime($date));

	$amount[$label] = number_format($thanhcong);

	$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));

}
echo "<pre>";
	print_r($amount);
echo "</pre>";


// unlink("dump.php");

?>