<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="style.css">

	 <?php

     include 'database.php';
     $db = new Database();
       $professor = 2;

$lesson_id=0;
$date = '';
$time = '';
$name = '';
$lessons='';

$lesson_id = 0;
$date = '';
$time = '';
$name = '';
$lessons='';
$professor = '';
  if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $lesson = $db->queryHewleh("select * from timetable where id=".$edit_id);
    if ($lesson != false) {
      $row = mysqli_fetch_assoc($lesson);
      $date = $row['date'];
      $time = $row['time'];
      $lessons = $row['lesson_id'];
      // $professor = $row['professor'];
      
    }
  }


if (isset($_POST['edit'])) {

    // $professor = mysqli_real_escape_string($db->conn,$_POST['professor']);
    $date = mysqli_real_escape_string($db->conn,  $_POST['date']);
      $time = mysqli_real_escape_string($db->conn, $_POST['time']);
        $lesson_id = mysqli_real_escape_string($db->conn,$_POST['lesson']);
        
   

      $query = "UPDATE `timetable` SET `lesson_id`='".$lesson_id."'  ,  `date`='".$date."', `time`='".$time."' WHERE `id` ='".$edit_id."'" ;

        $vrdvn =$db->update($query);

        if ($vrdvn) {
          echo "yes";
          header('Location: mypagepr.php');

        }else{
          echo "no";
        }
      
// if ($vrdvn != false) {
//       $row = mysqli_fetch_assoc($vrdvn);
//       $date = $row['date'];
//       $time = $row['time'];
//       // $professor = $row['professor'];
      
//     }
      
}

                $lesson = $db->queryHewleh("SELECT * FROM `lesson` ORDER BY `id` DESC");
?>  
  
</head>
<body>
   <header>
                <div clss="header">
                    <div id="brand">
                        <h1><span class="TITLE">My Page</span></h1>
                    </div>
                </div>
            </header>

<div class="container">
<?php

?>


  <div class="Register">

 <form action="" method="post">
 <div class="box">
   <select name="lesson">
    <?php
      foreach ($lesson as $l ) {
?>
     <option value="<?php echo $l['id']; ?>" ><?php echo $l['name']; ?></option>
<?php }?>
                            </select>
                        </div>
                      <br><br>
                      	<!-- <input type="text" name="professor" placeholder="Professor" value="<?php echo $edit_id; ?>"><br><br> -->
                        <input type="text" name="date" placeholder="Day" value="<?php echo $date; ?>"><br><br>
                        <input type="text" name="time" placeholder="Time" value="<?php echo $time; ?>"><br><br>
                         
                         <button submit="submit" name="edit"  >Update</button>                  
                      
                    </form>
                  </div>
                  </div>
                </body>

</html>