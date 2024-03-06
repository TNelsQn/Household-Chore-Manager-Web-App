<?php
header('Content-Type: text/css');
include "security.php";
include "database.php";

session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}

$id = h($_GET['id']);

$data = new Database();

$sql = $data->prepare("UPDATE TASKS SET numComps=numComps+1 WHERE ID = '$id'");
$ans = $sql->execute();

$sq = $data->prepare("SELECT * FROM TASKS WHERE ID = '$id'");
$ans = $sq->execute();
$result = $ans->fetchArray();

if ($result['frequency'] <= $result['numComps']) {
    $s = $data->prepare("UPDATE TASKS SET complete=1, numComps=frequency WHERE ID = '$id'");
    $a = $s->execute();
}
?>

