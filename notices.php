<?php
	include"database.php";
	session_start();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Notices</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Notices</h1>
		<?php
			
			// Select all notices from the database
			$sql = "SELECT * FROM notices ORDER BY created_at DESC";
            $res=$db->query($sql);
			//$result = mysqli_query($conn, $sql);

			// Display the notices
			if (mysqli_num_rows($res) > 0) {
			    while($row = mysqli_fetch_assoc($res)) {
			        echo "<div class='notice'>";
			        echo "<h2>" . $row["title"] . "</h2>";
			        echo "<p>" . $row["description"] . "</p>";
			        echo "<p class='created-by'>Created by " . $row["created_by"] . " on " . $row["created_at"] . "</p>";
			        echo "</div>";
			    }
			} else {
			    echo "No notices found.";
			}

			//mysqli_close($conn);
		?>
	</div>
</body>
</html>
