<?
include "database.php";
include "security.php";
session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css" type="text/css" charset="utf-8">
<title>Home</title>
<script src="js/jquery.js"></script>
<script src="js/login.js"></script>
</head>
<body onload="getChore()">

    <div class="header">

    
    <form action="logout.php" method="post"><input class="logout" type='submit' name='submit' value='Logout'></form>
  
    <div class="navpanel" id="navpanel">
    <a href="tasks.php">Rate tasks</a>
    <a href="household.php">Household</a>
  <a href="chores.php">Chores</a>
  <a href="index.php">Home</a>
  </a>
</div>

<div class="main">
        <h1 id="chores" style="text-align: center; text-size: 30px;">This weeks chores</h1>

        <p id="taskOfTheDay"></p>
        <p id="des"></p>
</div>
       
    </div>

    <script>
    function completed(str) {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tasks").innerHTML = getChore();
    }
  };
  xhttp.open("GET", "completeChore.php?id=" + str, true);
  xhttp.send();
}

function onLoading() {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("taskOfTheDay").innerHTML = getChore();
    }
  };
  xhttp.open("GET", "onLoad.php", true);
  xhttp.send();
}

function getChore() {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("taskOfTheDay").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getChores.php", true);
  xhttp.send();
}

function getDes(str) {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("des").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "description.php?id=" + str, true);
  xhttp.send();
}
</script>
   
</body>
</html>