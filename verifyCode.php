<?php
include "database.php";
include "security.php";

if (!isset($_POST["code"]))
{
header("location:login.php");
}

$code = h($_POST["code"]);

$data = new Database();

$user_rows = $data->prepare("SELECT * FROM USERS WHERE code = :code");
$user_rows->bindValue(':code', $code, SQLITE3_TEXT);
$ans = $user_rows->execute();
$users = $ans->fetchArray();

if (!is_bool($code)) {
    header("location: reset.php?code=".$code);
} else {
    header("location: login.php");
}


?>