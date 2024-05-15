<!DOCTYPE html>
<html>
<head>
	<title>Add Notice</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Add Notice</h1>
		<form method="post" action="save_notice.php">
			<label>Title:</label><br>
			<input type="text" name="title" required><br><br>
			<label>Description:</label><br>
			<textarea name="description" required></textarea><br><br>
			<input type="submit" value="Save">
		</form>
	</div>
</body>
</html>
