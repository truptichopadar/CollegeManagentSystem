<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>College Management</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
		<center>
		<img src="img/t2.jpg" style="margin-left:90px;" class="sha" width="1400">
		<div class="sidebar">
			<?php include"sidebar.php";?>
		</div>
		<div class="content">
			<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
			<h3 > College Information</h3><br>
			
		</div>
		
<div class="footer">
			<footer><p>Wce &copy; Sangli</p></footer>
</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			
		});
	</script>
	</body>
</html>