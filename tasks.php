<?php
session_start();
if (!isset($_SESSION['id']))
{
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/rating.css" type="text/css" charset="utf-8">
<title>Chores</title>
<script src="js/jquery.js"></script>
<script src="js/login.js"></script>
</head>
<body onload="showRating()">

<form action="logout.php" method="post"><input class="logout" type='submit' name='submit' value='Logout'></form>

<div class="navpanel" id="navpanel">
    <a href="tasks.php">Rate tasks</a>
    <a href="household.php">Household</a>
  <a href="chores.php">Chores</a>
  <a href="index.php">Home</a>
  </a>
</div>


<div class="main">

<h1>Completed tasks this week:</h1>
<p id = "ratings"></p>

</div>

<script>

function changeRating(str, int) {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ratings").innerHTML = showRating();
    }
  };
  xhttp.open("GET", "changeRating.php?rating=" + str + "&id=" + int, true);
  xhttp.send();
}

function showRating() {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ratings").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "showRating.php", true);
  xhttp.send();
}


</script>
   
</body>
</html>