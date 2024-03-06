<?
include "database.php";
include "security.php";
session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}
?>
<html>
<head>
<style type="text/css">
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(168, 167, 167);
  color: white;
}
</style>
</head>
<body>

<?php


if (isset($_GET["name"]))
{

    $data = new Database();
    
    $name = h($_GET["name"]);
    $des = h($_GET["des"]);
    $freq = h($_GET['freq']);

    $date = date("Y-m-d");
    $compdate = date('Y-m-d', strtotime($date. '+ 7 days'));

    $s = $data->prepare("SELECT * FROM USERS WHERE balance = (SELECT MIN(balance) FROM USERS)");
    $an = $s->execute();
    $a = $an->fetchArray();

    $user = $a['username']; 
    

    
    $sql = $data->prepare("INSERT INTO TASKS VALUES (NULL, :task_name, :descr, :frequency, 0, :compdate, 0, 0, :id)");
    $sql->bindValue(':task_name', $name, SQLITE3_TEXT);
    $sql->bindValue(':descr', $des, SQLITE3_TEXT);
    $sql->bindValue(':frequency', $freq, SQLITE3_TEXT);
    $sql->bindValue(':compdate', $compdate, SQLITE3_TEXT);
    $sql->bindValue(':id', $user, SQLITE3_TEXT);
    $result = $sql->execute();

    $update = $data->prepare("UPDATE USERS SET balance=balance+:frequency WHERE username = :user;");
    $update->bindValue(':frequency', $freq, SQLITE3_TEXT);
    $update->bindValue(':user', $user, SQLITE3_TEXT);
    $updateComplete = $update->execute();

}
$sq = $data->prepare("SELECT * FROM TASKS");
$ans = $sq->execute();

echo "<table id='customers'>";
echo "<tr>";
echo "<th>Chore name</th>";
echo "<th>User</th>";
echo "<th>Frequency</th>";
echo "<th>Number of times done this week</th>";
echo "<th>Due date</th>";
echo "</tr>";

while ($table = $ans->fetchArray()) {
    if ($table['task_name'] != "" && $table['complete'] != 1) {
    echo "<tr>";
    echo "<td>".$table['task_name']."</td>";
    echo "<td>".$table['USERS_ID']."</td>";
    echo "<td>".$table['frequency']." times per week</td>";
    echo "<td>".$table['numComps']." times this week</td>";
    echo "<td>".$table['completion_d']."</td>";
    echo "</tr>";
    }
}
echo "</table><br>";

?>
</body>
</html>