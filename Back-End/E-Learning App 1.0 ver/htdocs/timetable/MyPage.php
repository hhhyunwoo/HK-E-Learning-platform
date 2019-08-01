<!DOCTYPE html>
<html>
<head>
	<?php include 'database.php';
  $db=new Database();

    $lesson= $db->queryHewleh("
SELECT tt.id, tu.first_name, l.name, tt.time, tt.date FROM users AS tu
INNER JOIN teacher_lesson AS tl ON tu.id = tl.teacher_id
INNER JOIN lesson AS l ON l.id = tl.lesson_id
INNER JOIN timetable AS tt ON tl.id = tt.tl_id
INNER JOIN classroom AS cl ON cl.timetable_id = tt.id
INNER JOIN users AS su ON su.id = cl.student_id
WHERE su.type = 'student' AND su.id = 1
      ");



  ?>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style>
    .pagination{
      margin-top: -23px;
    }
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
				<h1><span class="TITLE">TIME TABLE</span></h1>
			</div>
		</div>
	</div>
	</header>
	<section class="container">
		<div class="content">
		<table class="table table-fixed">
    <thead>
      <tr>
        <th class="col-xs-3">Subject Name</th>
        <th class="col-xs-6">Professor Name</th>
         <th class="col-xs-3">Lesson Name</th>
        <th class="col-xs-3">Time </th>
      </tr>
    </thead>
    <tbody>
        <?php

        $i=1;
        if ($lesson != false) {
      foreach ($lesson as $value) {
      ?>
      <tr>
        <td class="col-xs-3"><?php echo $i++; ?></td>
        <td class="col-xs-6"><?php echo $value['first_name']; ?></td>
        <td class="col-xs-3"><?php echo $value['name']; ?></td>
        <td class="col-xs-3"><?php echo $value['time'];  ?> <?php echo $value['date'];  ?></td>
      </tr>
      <?php } } ?>



    </tbody>
  </table>
  <div class="buttons">
		<div class="Enter">
		<a href="https://124.158.108.146:9001/" target="_blank" id="ENTER">ENTER</a>
	</div>
		<div class="Edit">
		<a href="" id="EDIT">EDIT</a>
		</div>
		</div>


   <!--   <div class="pagination">
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
		</div>
	</section>





</body>
</html>
