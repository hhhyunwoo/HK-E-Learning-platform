<?php
// 데이터베이스 연결하기
include "db_info.php";

$sql  = "
    INSERT INTO noticeboard (
    name,email,pass,title,comment, ip,view) 
    VALUES(
    '$name','$email','$pass','$title','$comment','$REMOTE_ADDR',0
)"; 

$result = mysqli_query($conn, $sql);

//데이터베이스 연결 종료
mysqli_close($conn);

// 새 글 쓰기인 경우 리스트로 돌아가기
echo("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>
