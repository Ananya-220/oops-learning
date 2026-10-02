<?php 
include ('database.php');

$obj =  new query();
$condition_arr = array('name' => 'Nikhil');
// $result = $obj -> getData('user' , '*' , '' , 'id' , 'asc' , 7);

// $result = $obj -> insertData('user' , $condition_arr);

// $result = $obj -> deleteData('user' , $condition_arr);

$result = $obj -> updateData('user' , $condition_arr , 'id' , 3);
echo '<pre>';
print_r($result);
?>