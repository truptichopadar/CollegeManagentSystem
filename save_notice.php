<?php
	include"database.php";
	session_start();
	
?>

<?php
	// Connect to the database
	//$conn = mysqli_connect("localhost", "username", "password", "dbname");

	// Check connection
	//if (!$conn) {
	//    die("Connection failed: " . mysqli_connect_error());
	//}

	// Get the data from the form
	$title = $_POST["title"];
	$description = $_POST["description"];
	$created_by = $_SESSION["username"];

    //$res=$db->query($sql);
	// Insert the data into the database
    //$result = mysqli_query($conn, $sql);
	$sql = "INSERT INTO notices (title, description, created_by, created_at) VALUES ('$title', '$description', '$created_by', NOW())";
	if ($db->query($sql)) {
	    header("Location: notices.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error($sql);
	}

	//mysqli_close($conn);
?>
