<?php
	include"database.php";
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
			<h1 class="heading">Faculty's Login</h1>
			<div class="log">
				<?php
					if(isset($_POST["login"]))
					{
						$sql="select * from staff where FID='{$_POST["fid"]}'and TPASS='{$_POST["pass"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["TID"]=$ro["TID"];
							$_SESSION["FID"]=$ro["FID"];
							echo "<script>window.open('teacher_home.php','_self');</script>";
						}
						else
						{
							echo "<div class='error'>Invalid Username Or Password</div>";
						}
					}
				
				
				
				?>
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="fid" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="pass" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
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