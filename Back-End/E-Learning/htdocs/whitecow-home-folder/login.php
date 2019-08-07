<?php
	include './timetable/database.php';
	$db=new Database();

	// $lesson= $db->queryHewleh("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

include "./include/header.php";

//세션 userid가 있으면 경고창과 뒤로 이동
// if(isset($_SESSION['userid'])){
// 	echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
// }else{

	session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
	$password =  $_POST['password'];

	$lesson= $db->queryHewleh("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	if ($lesson==true) {
		$row = $lesson->fetch_assoc();

			$_SESSION['id']=$row['id'];
			$_SESSION['fn']=$row['first_name'];
		header('Location: ../index.php');
	}

	// $result = mysqli_query($db, $query);

	// if (mysqli_num_rows($result) > 0) {
	// 	$row = mysqli_fetch_assoc($result);
	// 	$userid = $row['id'];
	// 	$useremail = $row['email'];
	// 	$_SESSION['userid'] = $userid;
	// 	$_SESSION['useremail'] = $useremail;
	// 	header('Location: index.php');
	// } else {
	// 	echo 'Wrong Email or Password!';
	// }
}
?>
<div id="wrap">
	<div id="wrap_in">
		<div id="mem_t">Member Login</div>
		<!--- MemberLogin 텍스트와 input태그 사이 줄 긋기 -->
		<div id="mem_li"></div>
		<!-- ./page/member/login_ok.php -->
		<form action="" method="post">
		<div id="in_box" class="idpw_box">
			<input type="email" name="email" maxlength="20" placeholder="사용자 아이디" required />
			<input type="password" name="password" maxlength="20" placeholder="사용자 비밀번호" required/>
		</div>
		<span id="idpw_find"><a href="#">아이디나 비밀번호를 잊어버리셨나요?</a></span>
		<span id="join_mem"><a href="./page/member/join_form.php">회원가입</a></span>
		<div id="log_box_bot">
			<button submit="submit">LOGIN</button>
		</div>
	</form>
</div><!--- wrap_in end -->
</div><!--- wrap end -->
<?php include "./include/footer.php"; ?>
