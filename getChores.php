<?php
include "database.php";
include "security.php";

session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}

$data = new Database();

$uid = $_SESSION['id'];
$date = date("Y-m-d");
$roman = array("0", "I", "II", "III", "IV", "V", "VI", "VII");

$user_rows = $data->query("SELECT * FROM USERS WHERE ID='$uid'");
$users = $user_rows->fetchArray();
$task_rows = $data->query("SELECT * FROM TASKS");

$check = $task_rows->fetchArray();



$html="<table><ul>";
while ( ($row = $task_rows->fetchArray() ))
{
  $mkt_diff   = strtotime($row["completion_d"]) - time();
  $adder =  "  --  " . floor( $mkt_diff/60/60/24 ) + 1 . " days unil deadline";
  $style = "";
  $comp = "";
  if ($row['complete'] == 1) {
    $style = "text-decoration: line-through";
    $adder = "complete";
  }

  if ($date > $row['completion_d'] && $row['complete'] == 0) {
      $style = "color: red";
      $adder = "overdue, please complete";
  }

  if ($date >= $row['completion_d'] && $row['complete'] == 1) {
        $style = "";
        $adder = "";
        $temp_id = $row['ID'];
        $compdate = date('Y-m-d', strtotime($date. '+ 7 days'));
        $sql = $data->prepare("UPDATE TASKS SET numComps=0, complete=0, completion_d= :compdate WHERE ID=$temp_id");
        $sql->bindValue(':compdate', $compdate, SQLITE3_TEXT);
        $ans = $sql->execute();
  }

    if ($row["USERS_ID"] == $users['username'] && $row['task_name'] != "")
    {
    $html.="<li style='$style' onmouseover='getDes(". $row['ID'] .")' onclick='completed(".$row['ID'].")' id=".$row['ID'].">". $row['task_name'] ." - ". $roman[$row['numComps']] . "/" . $roman[$row['frequency']] . "  ". $adder ."</li> ";   
    } 
}
$html.="</ul></table>";

echo $html;
?>