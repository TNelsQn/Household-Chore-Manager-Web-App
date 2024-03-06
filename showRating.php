<?php
include "database.php";
include "security.php";

session_start();
if (!isset($_SESSION['id']))
{
  header("location: login.php");
}

$data = new Database();
$task_id = "";


$task_rows = $data->query("SELECT * FROM TASKS");
$id = "";

while ($task = $task_rows->fetchArray()) {
    
    if ($task['complete'] == 1) {
        if ($id != $task['USERS_ID']) {
            echo "<h2>". $task['USERS_ID'] ."</h2>";
        }
        $rating = array("<a onclick='changeRating(5, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(4, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(3, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(2, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(1, ". $task['ID'] .")'>&#9734;</a>", "<a onclick='changeRating(5, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(4, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(3, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(2, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(1, ". $task['ID'] .")'>&#9733;</a>", "<a onclick='changeRating(5, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(4, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(3, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(2, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(1, ". $task['ID'] .")'>&#9733;</a>", "<a onclick='changeRating(5, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(4, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(3, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(2, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(1, ". $task['ID'] .")'>&#9733;</a>", "<a onclick='changeRating(5, ". $task['ID'] .")'>&#9734;</a><a onclick='changeRating(4, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(3, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(2, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(1, ". $task['ID'] .")'>&#9733;</a>", "<a onclick='changeRating(5, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(4, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(3, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(2, ". $task['ID'] .")'>&#9733;</a><a onclick='changeRating(1, ". $task['ID'] .")'>&#9733;</a>");

        echo "<ul><li>" . $task['task_name']. "". $rating[$task['rating']] ."</li></ul>";
        
        $id = $task['USERS_ID'];
    }
    
}


?>