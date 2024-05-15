<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	

	if(isset($_POST["submit"]))
	{
		if($_FILES['file']['name'])
		{
			$filename=explode(".",$_FILES['file']['name']);
			if($filename[1]=="csv")
			{
				$handel=fopen($_FILES['file']['tmp_name'],"r");
				while($data=fgetcsv($handel))
				{
					$item1=mysqli_real_escape_string($db,$data[0]);
					$item2=mysqli_real_escape_string($db,$data[1]);
					$item3=mysqli_real_escape_string($db,$data[2]);
					$item4=mysqli_real_escape_string($db,$data[3]);
					$item5=mysqli_real_escape_string($db,$data[4]);
					$item6=mysqli_real_escape_string($db,$data[5]);
					$item7=mysqli_real_escape_string($db,$data[6]);
					$item8=mysqli_real_escape_string($db,$data[7]);
					$item9=mysqli_real_escape_string($db,$data[8]);
					$item10=mysqli_real_escape_string($db,$data[9]);
					$item11=mysqli_real_escape_string($db,$data[10]);
					$sql="INSERT INTO student(RNO,NAME,FNAME,DOB,GEN,PHO,MAIL,ADDR,SCLASS,SSEC,TID)VALUES('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11')";
					mysqli_query($db,$sql);
				}
				fclose($handel);
				print"Successful...";
			}
		}
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
		
			<div id="section">
				<?php include"sidebar.php";?><br><br><br>
				<h3 class="text">Welcome <?php echo $_SESSION["FID"]; ?></h3><br><hr><br>
				
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div align="center">
						<br><br>
						<p><b>Upload CSV File:&nbsp;&nbsp;&nbsp;</b><input type="file" name="file"></p>
						<br><br>
					</div>
					<div align="center"
					<style>
					<br>
						<p><b>Click here to import&nbsp;&nbsp;<input type="submit" name="submit" value="Upload"></b></p>
					</style>
					</div>
				</form>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>