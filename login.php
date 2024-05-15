<?php
	session_start();

	// Check if the user is already logged in
	if (isset($_SESSION["username"])) {
		header("Location: notices.php");
		exit;
	}

	// Check if the form has been submitted
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		// Connect to the database
		$conn = mysqli_connect("localhost", "username", "password", "dbname");

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Check if the username and password are correct
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			// Login successful
			$_SESSION["username"] = $username;
			header("Location: notices.php");
			exit;
		} else {
			// Login failed
			$error = "Invalid username or password.";
		}

		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form method="post">
			<label>Username:</label><br>
			<input type="text" name="username" required><br><br>
			<label>Password:</label><br>
			<input type="password" name="password" required><br><br>
			 <?php if (isset($error)) { ?>
		        <p class="error"><?php echo $error; ?></p>
		    <?php } ?>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>
