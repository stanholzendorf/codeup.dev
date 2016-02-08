<?php
var_dump($_GET);
var_dump($_POST);
?>

<!DOCTYPE html>

<html>
<head>
 <meta charset="utf-8">
 <title>My First HTML Form</title>
 <link rel="stylesheet" href="/css/site.css">
 
</head>
<body>
 <a id="top"></a>
 
 <main>
  <header>
    <h2>"User Login"</h2>
  </header>
  
  
  <section class="user_login">
    <form method="POST" action="/my_first_form.php">
     <p>
       <label for="username">Username</label>
       <input id="username" name="username" type="text" placeholder="Enter your username">
     </p>
     <p>
       <label for="password">Password</label>
       <input id="password" name="test" type="password" placeholder="Enter your password">
     </p>
     <p>
       <input type="submit" name="Login" value="Login">
       <!-- <button type="submit">Login</button> -->
     </p>
   </form>
 </section>

 <hr>
 <header>
  <h2>"Compose an Email"</h2>
</header> 

<section class="compose email">
  <form method="POST" action="/my_first_form.php">
    <p>Get in touch</p>
    
    <p>
     <label for="To">To</label>
     <input id="Recipient" name="Recipient" type="text">
   </p>

   <p>
     <label for="From">From</label>
     <input id="sender" name="sender" type+"text">
   </p>

   <p>
    <label for="Subject">Subject</label>
    <input id="Subject" name="Subject" type="text">
  </p>
  <p>
   <label for+"Message">Message</label>
   <textarea id="email_body" name="email_body" rows="8" cols="40" placeholder="Enter Text"></textarea>
 </p>
 <p><button type="submit">Send</button></p>

 <p>
  <!-- <label for="sent_copy">Do you want a copy of this email?</label> -->
  <!-- <input type="checkbox" id="sent_copy" name="sent_copy" value="yes" checked> -->


  <label>Do you want a copy of this email?<input type="checkbox" name="checkbox" value="yes" checked></label>
</p>
</form>
</section>

<hr>

<header>
  <h2>"Multiple Choice Test"</h2>
</header>

<section class="Multiple Choice Test">
  <form>

   <p>Do you like cookies?</p>
   <label><input type="radio" name="first" value="Yes">Yes</label>
   <label><input type="radio" name="first" value="No">No</label>

   <p>Do you utilize public transportation?</p>
   <label><input type="radio" name="second" value="Yes">Yes</label>
   <label><input type="radio" name="second" value="No">No</label>

   <p>Have you ever danced with the devil in the pale moonlight?</p>
   <label><input type="radio" name="third" value="Yes">Hell yeah</label>
   <label><input type="radio" name="third" value="No">I don't dance</label>

   <p>Did you ever have cardiac issues?</p>
   <label><input type="radio" name="fourth" value="Yes">Yes</label>
   <label><input type="radio" name="fourth" value="No">I don't get strokes ########## I give'em!!</label>

   
   <p>Please select all the continents you have visited:</p>
   <label><input type="checkbox" id="co1" name="co[]" value="Africa"> Africa</label>
   <label><input type="checkbox" id="co2" name="co[]" value="Antartica"> Antarctica</label>
   <label><input type="checkbox" id="co3" name="co[]" value="Asia"> Asia</label>
   <label><input type="checkbox" id="co4" name="co[]" value="Australia"> Australia</label>
   <label><input type="checkbox" id="co5" name="co[]" value="Europe"> Europe</label>
   <label><input type="checkbox" id="co6" name="co[]" value="North America"> North America</label>
   <label><input type="checkbox" id="co7" name="co[]" value="South America"> South America</label>

   <p>Please select all oceans you have traveled on by ship:</p>
   <label><input type="checkbox" id="oc1" name="oc[]" value="Atlantic Ocean"> Atlantic Ocean</label>
   <label><input type="checkbox" id="oc2" name="oc[]" value="Arctic Ocean"> Arctic Ocean</label>
   <label><input type="checkbox" id="oc3" name="oc[]" value="Indian Ocean"> Indian Ocean</label>
   <label><input type="checkbox" id="oc4" name="oc[]" value="Pacific Ocean"> Pacific Ocean</label>
   <label><input type="checkbox" id="oc5" name="oc[]" value="Southern Ocean"> Southern Ocean</label>


   <br>
   <br>
   <br><label for="color">What is your favorite color(s)?</label>
   <select id="color" name="color[]" multiple>
     <option>Blue</option>
     <option>Green</option>
     <option>Red</option>
     <option>I don't like colors</option>
   </select>





   <p><button type="submit">Send</button></p>


 </form>
</section>

<hr>
<header>
  <h2>"Select Testing"</h2>
</header>
<section class="Testing">
  <form>
    <label for="sane"> Are You Sane?</label>
    <select id="sane" name="sane">
     <option selected disabled> Declare how sane you are!</option>
     <option value="1">Completely sane, my mom had me tested!</option>
     <option value="0">Fruit-loop</option>
     <option value="3">Not Sure</option>
   </select>
   <br> <p><button type="submit">Confess</button></p>
 </form>
</section>

</main>


<hr><a href="#top">Back to top of the page!</a>


</body>	

</html>