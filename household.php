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
<body onload="seeUsers()">

<form action="logout.php" method="post"><input class="logout" type='submit' name='submit' value='Logout'></form>

<div class="navpanel" id="navpanel">
    <a href="tasks.php">Rate tasks</a>
    <a href="household.php">Household</a>
  <a href="chores.php">Chores</a>
  <a href="index.php">Home</a>
  </a>
</div>


<div class="main">

<h1>Users</h1>
<?php
include "database.php";
include "security.php";

$data = new Database();

$user_rows = $data->query("SELECT * FROM USERS");

echo "<table id='household'>";
echo "<tr>";
echo "<th>Users</th>";
echo "<th>Email address</th>";
echo "</tr>";
while ($users = $user_rows->fetchArray()) {

  echo "<tr>";
  echo "<td>". $users['username'] ."</td>";
  echo "<td>". $users['email']. "</td>";
  echo "</tr>";
}
echo "</table>";


?>

</div>
   
</body>
</html>