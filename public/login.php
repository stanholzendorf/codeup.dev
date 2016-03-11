<?php

// require_once 'functions.php';
require_once '../Input.php';
require_once '../Auth.php';
// $inputs = [];
// foreach($_POST as $key => $input) {
//     $inputs($key) = escape($input);
// }

// var_dump($_POST);

session_start();

// require_once 'functions.php';

// $_POST = escape('username');
$username = Input::get('username');
$password = Input::get('password');

// $username = inputget('username');
// $password = inputget('password');



// $loggedInUser = session_id();

// function session_valid_id($loggedInUser)
// {
//     header("Location: //codeup.dev/authorized.php");
//     die();
// }

// if (isset($_SESSION['logged_in_user'])) {
//     session_valid_id($loggedInUser);
// }

// else if ($username == ('guest') && $password == 'password') {
//     $_SESSION['logged_in_user'] = $username;
//     session_valid_id($loggedInUser);

// } else if ($password != '' || ($username) != ''){
// 	echo "login Info incorrect!!";
//     die();
// }

Auth::attempt($username, $password);

if (Auth::check() == true)
{
    header("Location: //codeup.dev/authorized.php");
    die();
}




?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN EXERCISE</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <?php include_once 'navbar.php';?>
    
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
    <?php include_once 'footer.php';?>
</body>
</html>
