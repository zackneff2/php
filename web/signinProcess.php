<?php
$hostname = "";   // eg. mysql.yourdomain.com (unique)
$myusername = "";   // the username specified when setting-up the database
$dbpassword = "";   // the password specified when setting-up the database
$database = ""; 

$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

$username = mysqli_real_escape_string($conn, $username);

$query = "SELECT * FROM memberConfirmed WHERE username = '$username'";

$result = mysqli_query($conn, $sql);

if (!$result) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$hash = hash('sha256', $password);

$salt = $row["salt"];
$password = hash('sha256', $salt . $hash);


if ($username == $row["username"]) {
	if ($password == $row["password"]) {
		session_start();
    	$_SESSION["loggedIn"] = true;
    	$_SESSION["username"] = $username;
    	header('Location: myschedule.php'); //Redirects to the supplied url from the DB
	}
	else {
		echo "Your password is incorrect!";
	}
}
else if (empty($row['username'])) {
	echo "Our records do not show an account with the given username and password. Please register here!";
}