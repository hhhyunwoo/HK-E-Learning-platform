<!DOCTYPE html>
<html>
<head>

	<?php include 'database.php'; 

	$db = new Database();
	$lesson= $db->queryHewleh("
		SELECT tt.id, tu.first_name, l.name, tt.time, tt.date FROM users AS tu
		INNER JOIN teacher_lesson AS tl ON tu.id = tl.teacher_id 
		INNER JOIN lesson AS l ON l.id = tl.lesson_id 
		INNER JOIN timetable AS tt ON tl.id = tt.tl_id 
		WHERE tu.type = 'professor'
		");
	




		?>


		<link rel="stylesheet" type="text/css" href="css/index.css">
		<style>
			ul{
				margin: 0;
				padding: 0;
			}
			li{
				float: left;
				display: inline;
				border:1px solid silver;
				padding: 10px;
				text-transform: uppercase;
			}

			nav{
				float: right;

			}

			nav li a{
				background-color: white;

			}

		</style>
	</head>
	<body>

		<header>
			<div class="container">
				<div class="header">
					<div id="brand">

						<h1><span class="TITLE">USER LIST</span></h1>

					</div>

				</div>
			</div>

		</header>
		
		<section class="container">
			<?php
			$student = 1;
			if (isset($_POST['register'])) {
				$l = $_POST['check'];
				foreach ($l as $key => $value) {
					$classroom = $db ->queryinsert("INSERT INTO `classroom`(`timetable_id`, `student_id`) VALUES ('$value', '$student')");
				}

				header('location: MyPage.php');




			}
			?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class ="content">
					<table class="table table-fixed">
						<thead>
							<tr>
								<th class="col-xs-3">ID</th>
								<th class="col-xs-6">Password</th>
								<th class="col-xs-3">Job</th>
								<th class="col-xs-3">Name</th>
								<th class="col-xs-6">User number</th>
								<th class="col-xs-6">Phone number</th>
							</tr>
						</thead>
						<tbody style="height: 100px; overflow-y: scroll;">
							<?php


							foreach ($lesson as $value) {
								?>
								<tr>
									<td class="col-xs-6"><?php echo $value['name']; ?></td>
									<td class="col-xs-3"><?php echo $value['first_name']; ?></td>
									<td class="col-xs-3"><?php echo $value['name']?></td>
									<td class="col-xs-3"><?php echo $value['time'];  ?><?php echo $value['date'];  ?></td>
									<td class="col-xs-6"><input type="checkbox" name="check[]" value="<?php echo $value['id']; ?>"></td>
								</tr>
							<?php } ?>


						</tbody>
					</table>

					<div class="buttons">
						<div class="Delete">
							<a href="" id="Delete" >Delete</a>
						</div>
					</div>
				</div>

			</form>
		</section>
	</body>
	</html>