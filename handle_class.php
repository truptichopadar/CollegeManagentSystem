<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
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
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["FID"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Add Classes</h3><br>
					
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into hclass(TID,YEAR,BRN,SUB,CID) values ('{$_SESSION["TID"]}','{$_POST["year"]}','{$_POST["brn"]}','{$_POST["sub"]}','{$_POST["cid"]}')";
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
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label>Year</label><br>
						
						<select name="year" required class="input3">
							<?php
								$sl="select DISTINCT(CNAME) from class";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
									 }
								 }
							
							
							?>
					
						</select>
						
					<br><br>
					
					<label>Branch</label><br>
					
						<select name="brn" required class="input3">
						<?php
							$sl="select DISTINCT(CSEC) from class";
							$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo "<option value=''>Select</option>";
									while($ro=$r->fetch_assoc())
									{
										echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
									}
								}
						
						
						
						
						?>
						
						
						</select><br></br>
						
						
						
					<label>Course</label><br>
					
						<select name="sub" required class="input3">
						<?php
							$s="select DISTINCT(SNAME) from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						
						
						?>
						</select><br></br>

					<label>Course Id</label><br>
					
						<select name="cid" required class="input3">
						<?php
							$s="select DISTINCT(CID) from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["CID"]}'>{$r["CID"]}</option>";
								}
							}
						
						
						?>
						</select>
						
					<br><br>
					
					<button type="submit" class="btn" name="submit">Add  Details</button>
					</form>
					
					
					
					</div>
					<div class="rbox1">
					<h3> Details</h3><br>
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
							<th>Course</th>
							<th>Course Id</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from hclass";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["YEAR"]}</td>
										<td>{$r["BRN"]}</td>
										<td>{$r["SUB"]}</td>
										<td>{$r["CID"]}</td>
										<td><a href='hclass.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
									</tr>
									
									";
								}
							}
						
						
						
						?>
						
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>