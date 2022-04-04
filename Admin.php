<?php
session_start();

if(!empty($_POST)){
    $varden = $_POST;

    $name = $varden['namn'];
    $pass = $varden['losenord'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "go_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM anvandare WHERE namn = '$name' AND losenord = '$pass'";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
    
