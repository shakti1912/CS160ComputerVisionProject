<!-- watching the certain video -->
<?php

$connection = mysqli_connect("localhost", "VictorLi", "password", "videoDB");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Watch Videos</title>
	</head>
	<body>
		<?php

		if(isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$query = "SELECT * FROM videos WHERE vid = " . $id;
			$result = $connection->query($query);

			$row = mysqli_fetch_assoc($result);

			$name = $row['name'];
			$url = $row['url'];

			echo "You are watching " . $name . "<br />";
			echo "<embed src='" . $url . "' width='560' height='315'></embed>";

		}
		else {
			echo "Error!";
		}

		?>
	</body>
</html>
