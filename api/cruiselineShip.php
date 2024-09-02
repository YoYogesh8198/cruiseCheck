<?php
include_once "../db.php";
$m = new monogd();
$str = file_get_contents('../json/cruiselineShip.json');
$json = json_decode($str, true);
$collectionName = 'cruiseShipData'; 
$test = $m->cruiseShipData($json, 6); 
echo "Inserted " . count($json) . " documents into the collection.";
echo "Inserted " . $test . " documents into the " . $collectionName . " collection.";
?>