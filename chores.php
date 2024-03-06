<?php
session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/default.css" type="text/css" charset="utf-8">
<title>Chores</title>
<script src="js/jquery.js"></script>
<script src="js/login.js"></script>
</head>
<body onload="addChore()">

<form action="logout.php" method="post"><input class="logout" type='submit' name='submit' value='Logout'></form>

<div class="navpanel" id="navpanel">
    <a href="tasks.php">Rate tasks</a>
    <a href="household.php">Household</a>
  <a href="chores.php">Chores</a>
  <a href="index.php">Home</a>
  </a>
</div>


<div class="main">

<h1>Current active tasks</h1>
<ul class="chores" id="all-chores">When tasks are added they will be displayed here</ul>


<?php
include "database.php";
include "security.php";

$data = new Database();

$id = $_SESSION['id'];

$result = $data->query("SELECT * FROM USERS WHERE ID=$id");
$add = $result->fetchArray();
$html = "";

    $html.="<div class='add'><h1>Add a Chore</h1><br><form id='add' name='add' onsubmit='return false;'><input type='text' id='name' name='name' placeholder='Chore name'></input><h2>Add Description</h2><input style='height: 150px' type='text' id='des' name='des'></input></input><h2>Frequency (how many times a week)</h2><input type='range' min='1' max='7' value='0' class='slider' id='freq'><p><b>Value: <span id='day-number'></span></b></p><input type='submit' name='submit' id='submit' class='button' value='Add' onclick='return addChore()'></input></input></form></div>";
    echo $html;
?>

</div>

<script>
function addChore() {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("all-chores").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "addChore.php?name=" + document.getElementById("name").value + "&des=" + document.getElementById("des").value + "&freq=" + document.getElementById("freq").value, true);
  xhttp.send();
}
</script>

<script>

var slider = document.getElementById("freq");
var output = document.getElementById("day-number");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}


</script>

   
</body>
</html>