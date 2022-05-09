<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'go_db';

//Kopplar upp sig till databasen
$conn = mysqli_connect($servername,$username,$password,$db);
if(!$conn){
    echo "ERROR: Uppkoppling mot databasen misslyckad";
    die();
}
?>