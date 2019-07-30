<!DOCTYPE html>
<html>
<head>
	<?php include 'database.php'; 
	$db=new Database();
	$db->connectionDb();


	?>


	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

	<div class="container">
		<header>
			<div class="header">
				<div id="brand">
					
					<h1><span class="TITLE"> STUDENT </span></h1>
					
				</div>

		</div>

		</header>
		
		<div class="content">

		<div class="RegMypage">
			<a href="Register.php"	id ="Button1">Register</a>

			<a href="MyPage.php" id="Button2">My Page</a>

			
		</div>
		</div>
		
	</div>





</body>
</html>
