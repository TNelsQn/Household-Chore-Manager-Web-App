<?php
include "database.php";
include "security.php";

if (!isset($_POST["email"]))
{
return false;
}

$email = h($_POST["email"]);

$data = new Database();

$user_rows = $data->prepare("SELECT * FROM USERS WHERE email = :email");
$user_rows->bindValue(':email', $email, SQLITE3_TEXT);
$ans = $user_rows->execute();
$users = $ans->fetchArray();

if (!is_bool($users)) {

    $rand = rand(999, 9999);

    $msg = "Hi " . $users['username'] . "\n\nWe have just recieved a password reset request for your account\nYour code is " . $rand . "\n\nIf this was not you then please ignore this email.\n\nYours the Chorinator team";
    $msg = wordwrap($msg,70);
    mail($email,"Password reset",$msg);

    $sql = $data->prepare("UPDATE USERS SET code= :code WHERE email = :email");
    $sql->bindValue(':code', $rand, SQLITE3_INTEGER);
    $sql->bindValue(':email', $email, SQLITE3_TEXT);
    $ans = $sql->execute();

    header("location: code.php");
} else {
    header("location: login.php");
}


?>