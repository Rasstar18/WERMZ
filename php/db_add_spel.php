<?php
require_once('db.php');

$name = $_GET['name']; // Spelnamnet
$group = $_GET['group']; // Spelgruppen

// Lägger till det nya spelet
$sql = "INSERT INTO spel (namn,grupp) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name,$group);
$stmt->execute();

if ($stmt->get_result() === TRUE) {
    echo "Spel har lagts till";
} else {
    echo "ERROR";
}
?>