<?php
//var_dump($_POST);
$conn = mysqli_connect('localhost', 'root', 'gusdn123','opentutorials');

$sql = "
	INSERT INTO topic
	(title, description, created)
	VALUES(
		'{$_POST['title']}',
		'{$_POST['description']}',
		NOW()
		)
";
$result = mysqli_query($conn, $sql);

echo '성공 !!. <a href = "example.php">돌아가기</a>';

echo $sql;
?>