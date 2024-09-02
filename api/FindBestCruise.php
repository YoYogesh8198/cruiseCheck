<?php
include_once "../db.php";
$m = new monogd();
$str = file_get_contents('../json/FindBestCruise.json');
$json = json_decode($str, true);
$collectionName = 'FindBestCruise'; 
$test = $m->FindBestCruise($json, 3); 
echo "Inserted " . count($json) . " documents into the collection.";
echo "Inserted " . $test . " documents into the /" . $collectionName . "/ collection.";
?>