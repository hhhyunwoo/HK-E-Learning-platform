<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/config/Database.php');

$db = new Database();
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/hmtl; charset utf-8/">
	<title>Untitled Document</title>
	<link href="css/register.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
	<style>
	#msg{
		visibility: hidden;
		min-width: 250px;
		background-color: yellow;
		color: #000;
		text-align: 200px;
		border-radius: 2px;
		padding: 16px;
		position: fixed;
		z-index: 1;
		right: 580;
		top: 30px;
		font-size: 17px;
		margin-right: 30px;
	}
	#msg.show
	{
		visibility: visible;
		-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
		animation: fadein 0.5s, fadeout 0.5s 2.5s;
	}

	@-webkit-keyframes fadein {
		from {top: 0; opacity: 0;}
		to{top: 30px; opacity: 1;}
	}

	@keyframes fadein {
		from {top: 0; opacity: 0;}
		to{top: 30px; opacity: 1;}
	}

	@-webkit-keyframes fadein {
		from {top: 30; opacity: 1;}
		to{top: 0; opacity: 0;}
	}

	@keyframes fadein {
		from {top: 30; opacity: 1;}
		to{top: 0; opacity: 0;}
	}


</style>
</head>
<body>
	<div class="signup">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$fname = mysqli_real_escape_string($db->con, $_POST['fname']);
			$lname = mysqli_real_escape_string($db->con, $_POST['lname']);
			$email = mysqli_real_escape_string($db->con, $_POST['email']);
			$pass = mysqli_real_escape_string($db->con, $_POST['pass']);
			$cpass = mysqli_real_escape_string($db->con, $_POST['cpass']);
			$gender = mysqli_real_escape_string($db->con, $_POST['gender']);
			$major = mysqli_real_escape_string($db->con, $_POST['major']);

			if ($pass != $cpass) {
				echo 'Please check your password!';
			} else {
				$query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `status`, `type`) VALUES ('$fname', '$lname', '$email', '$password', '1', '$major')";
				$result = $db->insert($query);
				if ($result != false) {
					echo 'Register Successfully';
				} else {
					echo 'Register Not Successfully';
				}
			}
		}
		?>
		<form action="" method="post">
			<h2 style="color: #fff;">Sign Up</h2>
			<input type="text" name="fname" placeholder="First name"><br><br>
			<input type="text" name="lname" placeholder="Last name"><br><br> 
			<p class="gender" style="margin-right: 10px">Gender:</p>
			<p class="gender">Male</p>
			<input class="gender" style="width: 30px; margin-top: 22px;" type="radio" name="gender" value="m">
			<p class="gender">Female</p>
			<input class="gender" style="width: 30px; margin-top: 22px;" type="radio" name="gender" value="f"><br><br>
			<p class="gender" style="margin-right: 10px">Major:</p>
			<p class="gender">Teacher</p>
			<input class="gender" style="width: 30px; margin-top: 22px;" type="radio" name="major" value="professor">
			<p class="gender">Student</p>
			<input class="gender" style="width: 25px; margin-top: 22px;" type="radio" name="major" value="student"><br><br>
			<input type="text" name="email" placeholder="E-mail"><br><br>
			<input type="password" name="pass" placeholder="Password"><br><br>
			<input type="password" name="cpass" placeholder="Confirm Password"><br><br>
			<!-- <input type="phone" name="pnumber" placeholder="Phone number"><br><br><br> -->
			<input type="submit" value="Sign up"><br><br>
		</form>
		Already have accaunt?<a href="login.php" style="text-decoration: none; font-family: 'Play', sans-serif; color: yellow">&nbsp;Log In</a>

	</div>

</body>
</html>