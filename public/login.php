<?php
var_dump($_POST);
session_start();



$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';



$loggedInUser = session_id();

function session_valid_id($loggedInUser)
{
    header("Location: //codeup.dev/authorized.php");
    die();
}

if (isset($_SESSION['logged_in_user'])) {
    session_valid_id($loggedInUser);
}

else if ($username == 'guest' && $password == 'password') {
    $_SESSION['logged_in_user'] = $username;
    session_valid_id($loggedInUser);
	// header("Location: //codeup.dev/authorized.php");
	// die();

} else if ($password != '' || $username != ''){
	echo "login Info incorrect!!";
    die();
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN EXERCISE</title>
</head>
<body>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
</body>
</html>