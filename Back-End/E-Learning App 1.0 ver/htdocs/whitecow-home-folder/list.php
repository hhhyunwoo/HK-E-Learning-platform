<?php
//데이터베이스 연결하기
include "db_info.php";

$page_size = 10;
$page_list_size = 10;

if (!$no || $no < 0) $no=0;

$query = "select id,name,email,title,DATE_FORMAT(wdate,'%Y-%m-%d') as date,view 
          from noticeboard order by id desc limit $no,$page_size";
$result = mysql_query($query,$conn);

// 총 게시물 수 구하기
$result_count = mysql_query("select count(*) from noticeboard", $conn);
$result_row = mysql_fetch_row($result_count);
$total_row = $result_row[0];

// 총 페이지 계산
if ($total_row <= 0) $total_row = 0;    // 총 게시물의 값이 없으면 기본값으로 세팅

$total_page = floor(($total_row - 1) / $page_size);

// 현재 페이지 계산
$current_page = floor($no/$page_size);
?>

<html>
<head>
<title>blackk 게시판</title>
<style>
<!--
    td { font-size : 9pt; }
    A:link { font : 9pt; color : black; text-decoration : none; font-family : 굴림;
             font-size : 9pt; }
    A:visited { text-decoration : none; color : black; font-size : 9pt; }
    A:hover { text-decoration : underline; color : black; font-size : 9pt; }
-->
</style>
</head>

<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<!-- 게시판 타이틀 -->
<font size=2> blackk~~~~~~</a>
<BR>
<BR>

<!-- 게시물 리스트를 보이기 위한 테이블 -->
<table width=580 border=0 cellpadding=2 cellsacing=1 bgcolor=#777777>
<!-- 리스트 타이틀 부분 -->
<tr height=20 bgcolor=#999999>
    <td width=30 align=center>
        <font color=white>번호</font>
    </td>
    <td width=370 align=center>
        <font color=white>제 목</font>
    </td>
    <td width=50 align=center>
        <font color=white>글쓴이</font>
    </td>
    <td width=60 align=center>
        <font color=white>날 짜</font>
    </td>
    <td width=40 align=center>
        <font color=white>조회수</font>
    </td>
</tr>
<!-- 리스트 타이틀 끝 -->

<!-- 리스트 부분 시작 -->
<?php
while($row=mysql_fetch_array($result))
{

?>
<!-- 행 시작 -->
<tr>
    <!-- 번호 -->
    <td height=20 bgcolor=white align=center>
        <a href=read.php?id=<?=$row[id]?>&no=<?=$no?>><?=$row[id]?></a>
    </td>
    <!-- 번호 끝 -->
    <!-- 제목 -->
    <td height=20 bgcolor=white>&nbsp;
        <a href=read.php?id=<?=$row[id]?>&no=<?=$no?>><?=strip_tags($row[title], 
        '<b><i>');?></a>
    </td>
    <!-- 제목 끝 -->
    <!-- 이름 -->
    <td align=center height=20 bgcolor=white>
        <font color=black>
            <a href="mailto:<?=$row[email]?>"><?=$row[name]?></a>
        </font>
    </td>
    <!-- 이름 끝 -->
    <!-- 날짜 -->
    <td align=center height=20 bgcolor=white>
        <font color=black><?=$row[date]?></font>
    </td>
    <!-- 날짜 끝 -->
    <!-- 조회수 -->
    <td align=center height=20 bgcolor=white>
        <font color=black><?=$row[view]?></font>
    </td>
    <!-- 조회수 끝 -->
</tr>
<!-- 행 끝 -->

<?php
}    // end while

mysql_close($conn);
?>
</table>

<table border=0>
<tr>
<td width=600 height=20 align=center rowspan=4>
<font color=gray>
&nbsp;

<?php

// 페이지 리스트
// 페이지 리스트의 첫번째로 표시될 페이지가 몇번째 페이지인지 구하는 부분
$start_page = (int)($current_page / $page_list_size) * $page_list_size;

// 페이지 리스트의 마지막 페이지가 몇번째 페이지인지 구하는 부분
$end_page = $start_page + $page_list_size - 1;
if ($total_page < $end_page) $end_page = $total_page;

// 이전 페이지 리스트 보여주기
if ($start_page >= $page_list_size){
    $prev_list = ($start_page - 1) * $page_size;
    echo ("<a href=\"$PHP_SELF?no=$prev_list\">◀ </a>\n");
}

// 페이지 리스트를 출력
for ($i=$start_page; $i <= $end_page; $i++) {

$page = $page_size * $i;    // 페이지 값을 no 값으로 변환
$page_num = $i + 1;    // 실제 페이지 값이 0부터 시작하므로 표시할때는 1을 더해준다.

    if ($no != $page) {
        echo ("<a href=\"PHP_SELF?no=$page\">");
    }

    echo " $page_num";    //페이지를 표시

    if ($no != $page) {
        echo "</a>";
    }

if ($total_page > $end_page)
{
    // 다음 페이지 리스트는 마지막 리스트 페이지보다 한 페이지 증가하면 된다.
    $next_list = ($end_page + 1) * $page_size;
    echo ("<a href=$PHP_SELF?no=$next_list>▶ </a><p>");
}
?>

</font>
</td>
</tr>
</table>

<a href=write.php>글쓰기</a>
</center>
</body>
</html>
