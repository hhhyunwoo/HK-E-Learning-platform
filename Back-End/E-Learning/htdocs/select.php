<?php
//var_dump($_POST);
$conn = mysqli_connect('localhost', 'root', 'gusdn123','opentutorials');

$sql = "SELECT * FROM topic WHERE id = 4";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
print_r($row);
echo $row['title'];

//var_dump($result->num_rows);
?>