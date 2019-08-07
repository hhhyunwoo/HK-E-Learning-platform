<!DOCTYPE html>
<html>
<head>

	<?php include 'database.php'; 
 
	$db = new Database();
	$lesson= $db->queryHewleh("
            SELECT tt.id, u.first_name, l.name, tt.date, tt.time FROM users AS u 
            INNER JOIN timetable AS tt  ON tt.teacher_id = u.id  
            INNER JOIN lesson AS l ON l.id = tt.lesson_id  ORDER BY tt.id DESC
            ");
	

/*	if ($result = $db->conn->query('SELECT * FROM lesson')) {
    // 레코드 출력
    while ($row = $result->fetch_object()) {
        echo $row->name.' / '.$row->id.'<br />';
    }
     
    // 메모리 정리
    $result->free();
	}

*/
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
		<p id="firstname">
    <?php
      session_start();
      echo $_SESSION['fn'];
    ?></p>
		<div class="container">
		<div class="header">
			<div id="brand">
				
				<h1><span class="TITLE">LESSON</span></h1>
				
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
				<th class="col-xs-3">Subject Name</th>
				<th class="col-xs-6">Professor Name</th>
				 <th class="col-xs-3">Lesson Name</th>
				<th class="col-xs-3">Time </th>
				<th class="col-xs-6">Check</th>
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
	<!-- <div class="pagination">
		 <nav aria-label="...">
	<ul class="pagination">
		<li class="page-item disabled">
			<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item active" aria-current="page">
			<a class="page-link" href="#">2 <span class="sr-only"></span></a>
		</li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item">
			<a class="page-link" href="#">Next</a>
		</li>
	</ul>
</nav>
</div> -->


		<div class="Ection" >
			<td><input class="input" type="submit" name="register" value="upload"></td>
			</div>
	<!-- 	<a href="" class="Register" name="register">Register</a>
	 -->	
		</div>
		</form>
	</section>
</body>
</html>
