<?php
session_start();



if (! isset($_SESSION['logged_in_user'])) {

	header("Location: //codeup.dev/login.php");
    die();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Authorized</title>
</head>
<body>

<h1>"Authorized"</h1>
<p><? echo $username; ?> </p>
<br>
<a href="//codeup.dev/log-out.php">LogOut!</a>



</body>
</html>