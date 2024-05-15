<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["AID"]))
	{
		echo'
			<li class="li"><a href="admin_home.php">College</a></li>
			<li class="li"><a href="add_class.php"> Class</a></li>
			<li class="li"><a href="add_sub.php"> Course</a></li>
			<li class="li"><a href="add_notice.php">Add Notices</a></li>
			<li class="li"><a href="notices.php">View Notices</a></li>
			<li class="li"><a href="add_staff.php"> Faculty</a></li>
			<li class="li"><a href="view_staff.php">View Faculty</a></li>
			<li class="li"><a href="student.php"target="_blank"> View Student</a></li>
			<li class="li"><a href="logout.php">Logout</a></li>
		
		';
	
	
	}
	elseif(isset($_SESSION["ID"]))
	{
		echo'
		<li class="li"><a href="student_home.php">Profile</a></li>
		<li class="li"><a href="notices.php">View Notices</a></li>
		<li class="li"><a href="stud_view_result.php">Result</a></li>
		<li class="li"><a href="stud_view_examTimeTable.php">Exam Time Table</a></li>
		<li class="li"><a href="student_change_pass.php">Change Password</a></li>
		<li class="li"><a href="logout.php">Logout</a></li>

			
		';
	}
	else{
		echo'
			<li class="li"><a href="teacher_home.php">Profile</a></li>
			<li class="li"><a href="handle_class.php"> Handled Class</a></li>
			<li class="li"><a href="add_stud.php"> Students</a></li>
			
			<li class="li"><a href="add_stud_csv.php"> Students through csv</a></li>
			<li class="li"><a href="view_stud_teach.php" target="_blank"> View Student</a></li>
			<li class="li"><a href="notices.php">View Notices</a></li>
			<li class="li"><a href="logout.php">Logout</a></li>

		
		';
	}


?>
	

</ul>

</div>