<?php

//$date1 = new DateTime();

$date1=date_create(date("Y-m-d"));
$date2=date_create("2018-01-10");
$diff=date_diff($date1,$date2);
//$ans = $diff->format("%R%a days");
//echo $ans;

$ans = $diff->format("%R%a");

echo $ans;

echo "<br>Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

?>
