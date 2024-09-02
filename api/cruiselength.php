<?php
include_once "../db.php";
$m = new monogd();
$str = file_get_contents('../json/cruiselength.json');
$json = json_decode($str, true);
$collectionName = 'cruiseLength';
$test = $m->cruiseLength($json, 6); 
echo "Inserted " . $test . " and " . count($json) . " documents into the /" . $collectionName . "/ collection.";
?>