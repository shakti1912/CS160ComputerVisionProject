<!-- watching the certain video -->
<?php

$config = require("../config.php");
$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);


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
			$result = $con->query($query);

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
