<?php

DEFINE('DB_PASS', 'parksuser');
DEFINE('DB_USER', 'parks_user');
DEFINE('DB_NAME', 'dbname=parks_db');
DEFINE('DB_HOST', 'mysql:host=127.0.0.1;');

require '../db_connect.php';
require '../Input.php';

$page = Input::get('page', 1);
$offset = $page ;

// page | offset
//   1  |    0
//   2  |    4
//   3  |    12

$stmt = $dbc->query("SELECT * FROM national_parks limit 4 offset $offset");
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($parks);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>National_Parks!</title>
</head>
<body>
  <h1>National Parks</h1>
  <?php foreach ($parks as $park): ?>
  	
  	<h2><?= $park['name']?></h2>
  	<ul>
  	<li><h4><?= 'Location - ' . ' ' .  $park['location']?></h4></li>
  	<li><h4><?= 'Date established - ' . ' ' . $park['date_established']?></h4></li>
  	<li><h4><?= 'Acres in km2 - ' . ' ' . $park['area_in_acres']?></h4></li>
	</ul> 
 <?php endforeach; ?>

 <?php if($page > 1): ?>
 	<a href="?page=<? $page - 1 ?>">Previous Page</a>
 <?php endif; ?>	
 
 <a href="?page=<? $page +1 ?>">Next Page</a>

</body>
</html>