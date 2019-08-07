<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Sidebar Menu</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.sidebarBtn').click(function(){
					$('.sidebar').toggleClass('active');
					$('.sidebarBtn').toggleClass('toggle');
				})
			})
		</script>

</head>
<body>
	<div class="sidebar">
		<ul>
		<li><a class="active" href="professor.php">Home</a></li>
		<li><a class="active" href="mypagepr.php">TIME TABLE</a></li>
		<li><a href="addcategory.php">Категори</a></li>
		<li><a href="Catecory.php">Категори Edit</a></li>
		<li><a href="news.php">Мэдээ</a></li>
			<li><a class="logout" href="logout.php">Logout</a></li>

<!-- 		<li><a href="">News</a></li>
 -->	</ul>
		<button class="sidebarBtn">
			<span></span>
		</button>
	</div>



</body>
</html>

