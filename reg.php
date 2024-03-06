<?php
include "database.php";
include "security.php";

session_start();

$user = new Database();

$username = h($_POST["uname"]);
$email = h($_POST["email"]);
$password = h($_POST["pword"]);

$encrypt = password_hash($password, PASSWORD_DEFAULT);


$s = $user->prepare("SELECT * FROM USERS WHERE username=:testUser;");
$s->bindValue(':testUser', $username, SQLITE3_TEXT);
$a = $s->execute();

$checker = $a->fetchArray(SQLITE3_ASSOC);

if (is_bool($checker)) {
    
    $sql = $user->prepare("INSERT INTO USERS VALUES (NULL, :username, :email, :encrypt, 0, 0);");
    $sql->bindValue(':username', $username, SQLITE3_TEXT);
    $sql->bindValue(':email', $email, SQLITE3_TEXT);
    $sql->bindValue(':encrypt', $encrypt, SQLITE3_TEXT);
    $result = $sql->execute();
    
    
    $sq = $user->prepare("SELECT * FROM USERS WHERE username=:user;");
    $sq->bindValue(':user', $username, SQLITE3_TEXT);
    $ans = $sq->execute();
    
    $session = $ans->fetchArray(SQLITE3_ASSOC);
    
    $_SESSION['id'] = $session['ID'];
    
    header('location:index.php');

} else {
    header ('location:register.php?error=true');
}



?>