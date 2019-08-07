<?php  include './menu.php'; ?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" type="text/css" href="menu.html">


          <style type="text/css">

            table{
                text-align: center;
                border-collapse: collapse;
            }
                
th{
   
    background-color: #bdc3c7;
}
td{
    background-color:#ecf0f1;
    border: 1px solid black;
    padding: 30px;
}
th,td{
        display: table-cell;
    vertical-align: inherit;
}
.submit{
    background: none;
    background-color: #34495e;
    border:1px solid black;
    color: #ffffff;
        padding: 10px;
        text-align: center;
        }


          </style>

    </head>
    <body>
        <div class="container">
            <header>
                <div clss="header">
                    <div id="brand">
                        <h1><span class="TITLE">PROFESSOR</span></h1>
                    </div>
                </div>
            </header>
            <div class="content">

                <?php
                include 'database.php';
                $db = new Database();
                $lesson = $db->queryHewleh("SELECT * FROM `lesson` ORDER BY `id` DESC");

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $lesson = $_POST['lesson'];
     $professor = $_POST['professor'];
    $date = $_POST['date'];
     $time = $_POST['time'];
$timetable_query = "INSERT INTO `timetable`(`teacher_id`,`lesson_id`, `date`, `time`) VALUES ('2','".$lesson."', '$date', '$time')";
     if ($db->queryinsert($timetable_query)) {
    header('Location: mypagepr.php');
                        } else {
                            echo 'TimeTable Data Not Insert Query';
                        }
                }
                ?>
                <h1>LESSON ADD</h1>
                
                <div class="table" style="margin: 0;">
                    <table style="width: 90%; border:1px solid black; border-collapse: collapse;">
                     
                    <form action="" method="post">
                        <div class="tableN">
                            <hr > 
                            <tr>
                         <th>SUBJECT NAME</th>
                                <th>PROFESSOR</th>
                                <th>TIME</th>
                                <th>DAY</th>
                                <th>SUBMIT</th>

                        </tr>        
                                </div>
                        
                        <div class="box">
                          
                            <td><select name="lesson">
                             <?php
                                if ($lesson != false) {
                                    foreach ($lesson as $l) {
                                    ?>
  <option value="<?php echo $l['id']; ?>"><?php echo $l['name']; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select></td>
                        </div>
                      <br><br>
                      <td>  <input type="text" name="professor" ></td><!-- <br><br> -->
                       <td> <input type="text" name="date" ></td><!-- <br><br> -->
                       <td>
                         <input type="text" name="time" ></td><!-- <br><br> -->
                       <td> <button class="submit" submit="submit" name="submit" onclick="return confirm('Are you sure?');">upload</button></td>
                        </tr>
                    </form>
                    </table>
                    </div>
                 </div>
            </div>
        </div>

    </body>
</html>
