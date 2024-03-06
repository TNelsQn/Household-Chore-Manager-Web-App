<?php
include "database.php";
include "security.php";

session_start();

$user = new Database();

$username = h($_POST["uname"]);
$password = h($_POST["pword"]);

$sql = $user->prepare("SELECT * FROM USERS WHERE username=:user");
$sql->bindValue(':user', $username, SQLITE3_TEXT);
$result = $sql->execute();

$passcheck = $result->fetchArray(SQLITE3_ASSOC);

        if (is_bool($passcheck)) {
                header ("location:login.php?error=true");
        }


        if (password_verify($password, $passcheck['passwd']))
        {
           $_SESSION['id'] = $passcheck['ID'];
            header ("location:index.php");
        }
        else 
        {
        header ("location:login.php?error=true");
        }
?>