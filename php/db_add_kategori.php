<?php
require_once('db.php');

$name = $_GET['name']; // Kategorinamnet

// Lägger till den nya kategorin
$sql = "INSERT INTO kategorier (namn) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();

if ($stmt->get_result() === TRUE) {
    echo "Kategori har lagts till";
} else {
    echo "ERROR";
}
?>