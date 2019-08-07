<?php
 include "../../include/db.php";

if(isset($_SESSION['userid'])){

//$sql1 = mq("insert into send_note(recv_id, send_id, title, content, recv_chk) values('a', 'b', 'park', 'hoho', '150', 0)");
$sql = mq("insert into send_note(recv_id,send_id,title,content,recv_chk,file) values('".$_POST['recv_name']."','".$_SESSION['userid']."','".$_POST['title']."','".$_POST['content']."','0','init')");
$sql2 = mq("insert into recv_note(recv_id,send_id,title,content,file) values('".$_POST['recv_name']."','".$_SESSION['userid']."','".$_POST['title']."','".$_POST['content']."','init')");
echo "<script>alert('쪽지를 보냈습니다.'); location.href='/whitecow-home-folder/page/note_send.php';</script>";
?>
<?php
    }else{
      echo "<script>alert('잘못된 접근입니다.'); location.href='/whitecow-home-folder/index.php'; </script>";
    }
?>
