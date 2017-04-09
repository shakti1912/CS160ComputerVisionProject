<!-- shows all the videos and their links -->
<!-- uses vid to distinguish all the videos -->
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

		$result = $connection->query("SELECT * FROM videos");
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row['vid'];
			$name = $row['name'];
			// creating links for each video
			echo "<a href='watch.php?id=" . $id . "'>" . $name . "</a><br />";
		}

		?>
	</body>
</html>
