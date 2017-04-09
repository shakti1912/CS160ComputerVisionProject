
<?php
	

		$username = $_GET['username'];
		$password = $_GET['password'];
		$config = require("config.php");
		 $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);   
		$stmt = mysqli_prepare($con, "select FirstName, LastName from UserLogin where username=? and Password=?");
		  mysqli_stmt_bind_param($stmt, "ss",  $username, $password);
		  mysqli_stmt_execute($stmt);
		  mysqli_stmt_bind_result($stmt, $first, $last );
		  mysqli_stmt_fetch($stmt);
		if(!$first)
		{
			echo "You are not registered yet.";
		}

		else
		{

			//$_SESSION["FName"] = $first;
			//$_SESSION["LName"] = $last;


echo  "Welcome Back ".$first." ".$last." to CS160Project!";
echo '
<form>
 <label> Upload your video</label>
 <button type="submit" class="btn btn-lg btn-primary">Upload</button>

      </form>
      ';
  }

	
	
