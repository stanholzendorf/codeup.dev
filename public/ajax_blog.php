<?php
var_dump($_GET);
var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Ajax Blog</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

<style type="text/css">
	
	#posts {

		background-color: blue;
		position: relative;
		width: 500px;
		left: 300px;
	}

</style>	

</head>
<body>

<h1>My (not really 'mine' actually)  Ajax Blog</h1>
<div id="posts"></div>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Submit New Entry</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter your new ramblings below!</h4>
      </div>
      <div class="modal-body">
        <input type="submit"></input>
         <form method="POST" action="/ajax_blog.php">
          <textarea id="ramblings" name="new_stuff" rows="15" cols="40" placeholder="Enter Text"></textarea>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
<script>
'use strict';
(function() {

function submitAll() {
var getContent = $.get('/data/blog.json');

getContent.done(function(content){
	console.log(content);

	$('#posts').html("");
	content.forEach(function(content){
		var contentString = "";
		contentString += "<div>";
		 contentString += "<h3>" + content.title + "</h3>";
		 contentString += "<p>" + content.content + "</p>";
		 contentString += "<ui>";
		  contentString += "<li>" + content.categories.join(', ') + "</li>";
		 contentString += "</ul>";
		 contentString += "<p>" + content.date + "</p>";
		contentString += "</div>"
		
		$('#posts').append(contentString);  
	});


});

}

submitAll();
	

})();

</script>

</body>
</html>