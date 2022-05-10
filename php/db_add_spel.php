<?php
require_once('db.php');

$name = $_POST['name']; // Spelnamnet
$group = $_POST['group']; // Spelgruppen

// Lägger till det nya spelet
$sql = "INSERT INTO spel (namn,grupp) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name,$group);
$stmt->execute();

HEADER("Location:../sidor/adminspel.php");
?>