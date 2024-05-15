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
			
			<div id="section">
				
				<?php include"sidebar.php";?><br><br><br>
				
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Add Faculty Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into staff(TNAME,TPASS,QUAL,FID,POST) values('{$_POST["sname"]}',1234,'{$_POST["qual"]}','{$_POST["fid"]}','{$_POST["post"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
							
						}
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>Faculty Name</label><br>
					     <input type="text" name="sname" required class="input">
					     <br><br>
					     <label>Qualification</label><br>
					     <input type="text" name="qual" required class="input">
					     <br><br>
					     <label>Faculty Id</label><br>
					     <input type="text" name="fid" required class="input">
					     <br><br>

						 <label>Designation</label><br>
						 <select name="post"  required class="input2">
						<option value="">Select</option>
						<option value="HOD">HOD</option>
						<option value="Professor">Professor</option>
						<option value="Assistant Professor">Assistant Professor</option>
						<option value="Associate Professor">Associate Professor</option>

						</select>
					<br>

					    <button type="submit" class="btn" name="submit">Add Faculty Details</button>
					</form>
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>