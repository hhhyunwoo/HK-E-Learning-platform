<?php
//데이터베이스 연결하기
include "db_info.php";

$result = mysql_query("select pass from noticeboard where id=$id", $conn);
$row = mysql_fetch_array($result);

if ($pass == $row[pass])
{
    $conndel = "delete from noticeboard where id=$id";
    $result = mysql_query($conndel, $conn);
}
else
{
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1)
    </script>
    exit;
}
?>
<center>
<meta http-equiv='Refresh" content='0; URL=list.php'>
<font size=2> 삭제되었습니다.</font>
