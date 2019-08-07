<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/config/Database.php');

$db = new Database();
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/hmtl; charset utf-8/">
	<title>Untitled Document</title>
	<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="signin">
		<?php
		session_start();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = mysqli_real_escape_string($db->con, $_POST['email']);
			$password = mysqli_real_escape_string($db->con, $_POST['password']);

			$query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
			$result = $db->select($query);
			if ($result != false) {
				$row = $result->fetch_assoc();
				$_SESSION['userId'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['type'] = $row['type'];
				header('Location: index.php');
			} else {
				echo 'Wrong Email or Password!';
			}
		}
		?>
		<form action="" method="post">
			<h2 style="color: white ">Log Ig</h2>
			<input type="text" name="email" placeholder="Email"><br><br>
			<input type="password" name="password" placeholder="Password"> <br><br>
			<input type="submit" value="Log In"><br><br>
				<div id="container">
					<a href="reset.php" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;"> Reset password</a><br><br>
					<a href="forget.php" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;"> Forgot password</a>
				</div><br><br><br><br>
				Don't have accaunt? <a href="register.php"> &nbsp;Sign Up</a>
			</form>
		</div>
	</body>
	</html>