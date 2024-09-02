<?php
include_once "../db.php";
$m = new monogd();
$str = file_get_contents('../json/popularDestination.json');
$json = json_decode($str, true);
$collectionName = 'popularDestination'; 
$test = $m->popularDestination($json, 3); 
echo "Inserted " . count($json) . " documents into the collection.";
echo "Inserted " . $test . " documents into the /" . $collectionName . "/ collection.";
?>