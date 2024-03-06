<?php
include "database.php";
include "security.php";

session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}


$rating = h($_GET['rating']);
$task_id = h($_GET['id']);

$data = new Database();

$sql = $data->prepare("UPDATE TASKS SET  rating=$rating WHERE ID=$task_id");
$ans = $sql->execute();

?>