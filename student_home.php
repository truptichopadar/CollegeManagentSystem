<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('student_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM student WHERE ID={$_SESSION["ID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["RNO"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Update Profile</h3><br>
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							
								$sql="update student set MAIL='{$_POST["mail"]}',ADDR='{$_POST["addr"]}',PHO='{$_POST["pho"]}' where ID={$_SESSION["ID"]}";
								$db->query($sql);
								echo "<div class='success'>Insert Success</div>";
							
							
						}
					
					
					?>
					
					
					
					
						
					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
							
							<label>  E - Mail</label><br>
							<input type="email"  class="input3" required name="mail"><br><br>
							<label>  Address</label><br>
							<textarea rows="5" name="addr"></textarea><br><br>
                            <label>  Phone No</label><br>
							<input type="text" maxlength="10" required class="input3" name="pho"><br><br>
							
						<button type="submit" class="btn" name="submit">Add Profile Details</button>
						</form>
					</div>
					
					
					
					
					<div class="rbox1">
					<h3> Profile</h3><br>
						<table border="1px">
							
							<tr><th>NAME </th> <td><?php echo $row["NAME"] ?> </td></tr>
							<tr><th>PRN NO </th> <td><?php echo $row["RNO"] ?>  </td></tr>
							<tr><th>FATHER NAME </th> <td> <?php echo $row["FNAME"] ?>  </td></tr>
							<tr><th>PHONE NO </th> <td> <?php echo $row["PHO"] ?> </td></tr>
							<tr><th>E - MAIL </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>ADDRESS </th> <td> <?php echo $row["ADDR"] ?> </td></tr>
                            <tr><th>GENDER </th> <td> <?php echo $row["GEN"] ?> </td></tr>
							<tr><th>DOB </th> <td> <?php echo $row["DOB"] ?> </td></tr>
                            <tr><th>YEAR </th> <td> <?php echo $row["SCLASS"] ?> </td></tr>
                            <tr><th>BRANCH </th> <td> <?php echo $row["SSEC"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>