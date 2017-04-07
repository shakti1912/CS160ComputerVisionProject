<?php

//change for connecting to database
//$connection = mysqli_connect("localhost", "", "password", "videoDB");

$config = require("../config.php");


if(isset($_POST['submit'])) {
	$name = $_FILES['file']['name'];
	echo $name;

	$temp = $_FILES['file']['tmp_name'];
	echo $temp;

	// moves the uploaded video to the directory of upload
	move_uploaded_file($_FILES['file']['tmp_name'], "upload/" . $_FILES["file"]["name"]);
	$url = "http://localhost/CS160ComputerVisionProject/video/upload/$name";
	//$connection->query("INSERT INTO videos (name, url) VALUES ('" . $name . "', '" . $url . "')");
	$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
	$stmt = mysqli_prepare($con,'INSERT INTO videos (name, url) VALUES ("' . $name . '", "' . $url . '")');
		
		mysqli_stmt_execute($stmt);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Watch Videos</title>
	</head>
	<body>
		<!-- link to the videos -->
		<a href="videos.php">Videos</a>

		<!-- refresh the page when submitted -->
		<form action="video/index.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file" />
		    <input type="submit" name="submit" value="Upload!" />
		</form>

		<?php

		// when something is posted
		if(isset($_POST['submit'])) {
			echo "<br />".$name." has been uploaded";
		}

		?>
	</body>

</html>
