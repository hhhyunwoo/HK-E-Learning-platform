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
					
					<h1><span class="TITLE"> ADMIN </span></h1>
					
				</div>

		</div>

		</header>
		
		<div class="content">

		<div class="UserList">
			<a href="UserList.php"	id ="Button1">UserList</a>

			<a href="NewUser.php" id="Button2">NewUser</a>

			
		</div>
		</div>
		
	</div>





</body>
</html>
