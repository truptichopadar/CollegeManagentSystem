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
				<?php include"sidebar.php";?><br>
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Add Class Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into class(CNAME,CSEC) values('{$_POST["year"]}','{$_POST["branch"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert failed..</div>";
							}
							
							
						}
					
					?>
						
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Year</label><br>
				<select name="year"  required class="input2">
						<option value="">Select</option>
						<option value="FY">FY</option>
						<option value="SY">SY</option>
						<option value="TY">TY</option>
						<option value="BTECH">BTECH</option>
				
						
					</select><br><br>
					<label>Branch </label><br>
					<select name="branch"  required class="input2">
						<option value="">Select</option>
						<option value="Civil">Civil</option>
						<option value="CSE">CSE</option>
						<option value="Electrical">Electrical</option>
						<option value="Electronics">Electronics</option>
						<option value="IT">IT</option>
						<option value="Mechanical">Mechanical</option>
						
					
					</select>
					<br>
					<button type="submit" class="btn" name="submit">Add Class Details</button>
				</form>
				
				
				</div>
				
				
				<div class="tbox">
					<h3 style="margin-top:30px;"> Class Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Year</th>
							<th>Branch</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from class";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["CNAME"]}</td>
											<td>{$r["CSEC"]}</td>
											<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
										</tr>
										";
									
								}
								
							}
						?>
					
					</table>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>