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
					
						<h3 > Add Course Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sub(CID,SNAME) values ('{$_POST["cid"]}','{$_POST["sname"]}')";
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
						   <label>Course Id</label><br>
						   <input type="text" name="cid" required class="input">
						   
					
						   <label>Course Name</label><br>
						   <input type="text" name="sname" required class="input">
						   <button type="submit" class="btn" name="submit">Add Course Details</button>
						</form>

						
				
					</div>
				
				
				<div class="tbox" >
					<h3 style="margin-top:30px;"> Course Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							
							<th>Course Id</th>
							<th>Course Name</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from sub";
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
										<td>{$r["CID"]}</td>
										<td>{$r["SNAME"]}</td>
										
										<td><a href='sub_delete.php?id={$r["SID"]}' class='btnr'>Delete</a></td>
										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
							}
						?>
						
					</table>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>