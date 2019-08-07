
    <?php  include './menu.php'; ?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">
  </head>

 <body>
    
	<div class="container">
            <header>
                <div clss="header">
                    <div id="brand">
                        <h1><span class="TITLE">  PROFESSOR</span></h1>
                    </div>
                </div>
            </header>

            <section class="container">
              <?php
              include 'database.php';
              $db = new Database();

              $teacher_lesson = $db->queryHewleh("
                SELECT tt.id, u.first_name, l.name, tt.date, tt.time FROM users AS u 
                INNER JOIN timetable AS tt  ON tt.teacher_id = u.id  
                INNER JOIN lesson AS l ON l.id = tt.lesson_id  ORDER BY tt.id DESC
                ");
              if(isset($_GET['delete'])){
              $delete_id=$_GET['delete'];
               if ($db->querydelete("DELETE FROM `timetable` WHERE `id` = '$delete_id'")) {
                header('Location: mypagepr.php');
                 } else {
                  echo 'No Data';
                 }
               }

        if (isset($_GET['edit'])) {
          $l=$_POST['check'];
          foreach ($l as $key => $value) {
            



          }
        header('Location: Edit.php');


        }



     ?>
		<div class="content">
		<table class="table table-fixed">
    <thead>
      <h1>TIME TABLE</h1>
      <hr class="hr">
      <tr>

        <th class="col-xs-3">Subject Name</th>
        <th class="col-xs-6">Professor Name</th>
         <th class="col-xs-3">Lesson Name</th>
        <th class="col-xs-3">Time </th>
        <th class="col-xs-6">Edit</th>
        <th class="col-xs-6">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      if ($teacher_lesson != false) {
        foreach ($teacher_lesson as $tl) {
      ?>
      <tr>
   <!--      <td class="col-xs-3"><?php echo $i++; ?></td> -->
        <td class="col-xs-3"><?php echo $tl['name']; ?></td>
        <td class="col-xs-6"><?php echo $tl['first_name']; ?></td>
        <td class="col-xs-3"><?php echo $tl['name']; ?></td>
        <td class="col-xs-3"><?php echo $tl['time'].' ('.$tl['date'].')'; ?></td>
        <td>
          <a href="Edit.php?edit=<?php echo $tl['id'];?>" >Edit</a>
        </td>
        <td>
          <a href="mypagepr.php?delete=<?php echo $tl['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
        </td>

      </tr>
   
    <?php } ?>
    <?php } ?>
     
    </tbody>
  </table>
  <div class="buttons">
		<div class="Enter">
		<a href=""  name="enter" id="ENTER">ENTER</a>
	</div>
		<div class="Edit">

	</div>
		
		</div>
		</div>
	</section>
            
                	

 </body>

</html>