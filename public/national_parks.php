<?php

DEFINE('DB_PASS', 'parksuser');
DEFINE('DB_USER', 'parks_user');
DEFINE('DB_NAME', 'dbname=parks_db');
DEFINE('DB_HOST', 'mysql:host=127.0.0.1;');

require '../db_connect.php';
require '../Input.php';

$page = Input::get('page', 1);
$limit = 4;
$offset = ($page * $limit) - $limit;

if(Input::has('name') && Input::get('name') !=''
  && Input::has('location') && Input::get('location') !=''
  && Input::has('date_established') && Input::get('date_established') !=''
  && Input::has('area_in_acres') && Input::get('area_in_acres') !=''
  && Input::has('description') && Input::get('description') !=''  
){
  $parkname = Input::get('name');
  $parklocation = Input::get('location');
  $parkdate = Input::get('date_established');
  $parksize = Input::get('area_in_acres');
  $parkdescr = Input::get('description');
  $insert = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
  $stmt = $dbc->prepare($insert);
  $stmt->bindValue(':name', $parkname, PDO::PARAM_STR);
  $stmt->bindValue(':location', $parklocation, PDO::PARAM_STR);
  $stmt->bindValue(':date_established', $parkdate, PDO::PARAM_STR);
  $stmt->bindValue(':area_in_acres', $parksize, PDO::PARAM_INT);
  $stmt->bindValue(':description', $parkdescr, PDO::PARAM_STR);
  $stmt->execute();

}

$query = "SELECT * FROM national_parks LIMIT :limit OFFSET :offset";
$stmt = $dbc->prepare($query);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();


$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalnumberOfParks = $dbc->query("SELECT COUNT(*) FROM national_parks")->fetchColumn();
$totalnumberOfPages = ceil($totalnumberOfParks / $limit);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>National_Parks!</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
  <style type="text/css">
    /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

  </style>
</head>
<body>
  <h1>National Parks</h1>
  <?php foreach ($parks as $park): ?>
  	
  	<h2><?= $park['name']?></h2>
  	<ul>
  	<li><h4><?= 'Location - ' . ' ' .  $park['location']?></h4></li>
  	<li><h4><?= 'Date established - ' . ' ' . $park['date_established']?></h4></li>
  	<li><h4><?= 'Acres in km2 - ' . ' ' . $park['area_in_acres']?></h4></li>
    <li><p><?= 'Describtion - ' . ' ' . $park['description']?></p></li>
	</ul> 
 <?php endforeach; ?>

 <?php if($page > 1): ?>
 	<a href="?page=<?= $page - 1 ?>">Previous Page</a>
 <?php endif; ?>
 <?php if($page < $totalnumberOfPages): ?>
  <a href="?page=<?= $page +1 ?>">Next Page</a> 
 <?php endif; ?>


 <!-- Trigger/Open The Modal -->
<button id="myBtn">Add a new Park!</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">x</span>
    <form method="POST" action="national_parks.php">
        <h5>To add new parks fill out form below:</h5>
        <input type="text" id="park_name" name="name" placeholder="Enter_Name">
        <input type="text" id="park_location" name="location" placeholder="Enter_Location">
        <input type="date" id="park_established" name="date_established" placeholder="Enter when it was established">
        <input type="text" id="park_acres" name="area_in_acres" placeholder="Enter_acres in km2">
        <textarea type="text" name="description" rows="4" cols="50">Enter Describtion!</textarea>
        <input type="submit" value="add">
  </form>
  </div>
  </div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
<script>
'use strict';
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>