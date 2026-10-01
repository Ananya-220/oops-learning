<?php 
include ('database.php');

$obj =  new query();
$result = $obj -> getData('emp');
echo '<pre>';
print_r($result);
?>