<?php
session_start();
// include_once 'functions.php';
require_once '../Input.php';
require_once '../Auth.php';

// $username = inputGet('username');
// $password = inputGet('password');

$username = Auth::user();
//$password = Input::get('password');

// if (! isset($_SESSION['logged_in_user'])) {

// 	header("Location: //codeup.dev/login.php");
//     die();
// }

if (! Auth::check() == true)
{
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
<?php include_once 'header.php';?>
<?php include_once 'navbar.php';?>

<h1>"Authorized"</h1>
<br>
<h3>
<?php echo $username . " is logged in!!"; ?> 
</h3>
<br>
<!-- <a href="//codeup.dev/log-out.php">LogOut!</a> -->
<a href="//codeup.dev/log-out.php"><button>LogOut!</button></a>
<?php include_once 'footer.php';?>



</body>
</html>