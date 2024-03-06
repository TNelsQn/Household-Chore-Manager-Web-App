<?php
include "security.php";
include "database.php";

session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}

$id = h($_GET['id']);

$data = new Database();

$sql = $data->prepare("SELECT * FROM TASKS WHERE ID=$id");
$ans = $sql->execute();
$result = $ans->fetchArray();

echo "<h2>Description</h2>";
echo $result["descr"];
?>

