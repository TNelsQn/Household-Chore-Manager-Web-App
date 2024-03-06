<?php
include "database.php";
include "security.php";

if (!isset($_POST["password"]))
{
header("location:login.php");
}

$password = h($_POST["password"]);
$code = h($_POST["code"]);
$encrypt = password_hash($password, PASSWORD_DEFAULT);
$data = new Database();

$sq = $data->prepare("SELECT * FROM USERS WHERE code=$code");
$an = $sq->execute();

if (!is_bool($an)) {

$sql = $data->prepare("UPDATE USERS SET passwd= :pass WHERE code=$code");
$sql->bindValue(':pass', $encrypt, SQLITE3_TEXT);
$ans = $sql->execute();
}

header("location: login.php");
?>