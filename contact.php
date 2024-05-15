<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>College Management System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include"navbar.php";?>
		<center>
		<img src="img/i3.jpg" width="650">
		
		<div class="login">
			<h1 class="heading">Contact Us</h1>
			<div class="cont">
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					Miniproject Group: 04<BR>
					Team members:<BR>
					Trupti Chopadar 2020BTEIT00023<BR>
					Mansi Patil     2020BTEIT00068<BR>
					Dhanashri Maske 2020BTEIT00071<br>
				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>WCE &copy; Sangli </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>