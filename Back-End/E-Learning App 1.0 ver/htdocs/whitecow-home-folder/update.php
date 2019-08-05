<?php
//데이터베이스 연결
include "db_info.php";

// 글 비밀번호 가져오기
$result = mysqli_query($conn, "SELECT pass from noticeboard where id=$id");
$row = mysqli_fetch_array($result);

//입력된 값과 비교
if ($pass==$row[pass]) {

$query = "UPDATE noticeboard set name='$name',title='$title',email='$email',
          comment='$comment' where id=$id";
$result = mysqli_query($conn,$query);
}
else {
echo ("
<script>
alert('비밀번호가 틀립니다.');
history.go(-1);
</script>
");
exit;
}

//데이터베이스와의 연결 종료
mysqli_close($conn);

//수정하기인 경우 수정된 글로..
echo ("<meta http-equiv='Refresh' content='1; URL=read.php?id=$id'>");

?>
<center>
<font size=2>정상적으로 수정되었습니다.</font>
