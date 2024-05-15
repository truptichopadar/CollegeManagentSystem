<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>College Management System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
		<?php include"navbar.php";?><br>
		
		<center>
		<img src="img/t2.jpg" style="margin-left:90px;" class="sha" width="1400">			
			<div id="section">
			
				<?php include"sidebar.php";?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>

						<h1 > Walchand College of Engineering, Sangli</h1><br>
						<h2 > College Management System</h2><br>
					
				</div>
				
			</div>
	
		<?php include"footer.php";?>
	</body>
</html>