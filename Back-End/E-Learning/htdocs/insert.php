<?php
$conn = mysqli_connect("localhost", "root", "gusdn123","opentutorials");
$sql = "
	INSERT INTO topic(
		title,
		description,
		created
	)VALUES(
		'MySQL',
		'MYSQL is ...',
		NOW()
	)";
$result = mysqli_query($conn, $sql);
if($result === false){
	echo mysqli_error($conn);
}

?>