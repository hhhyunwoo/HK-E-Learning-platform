<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-Learning</title>
</head>
<body>
	<h2><?php echo $_SESSION['email']; ?></h2>
	<a href="logout.php">Logout</a>
</body>
</html>