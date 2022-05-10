<?php
require_once('db.php');

$name = $_POST['name']; // Kategorinamnet

// Lägger till den nya kategorin
$sql = "INSERT INTO kategorier (namn) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();

HEADER("Location:../sidor/adminkategori.php");
?>