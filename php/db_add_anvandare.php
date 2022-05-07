<?php
require_once('db.php');

$name = $_GET['name']; // Användarnamnet
$pass = $_GET['pass']; // Lösenordet

// Lägger till den nya användaren
$sql = "INSERT INTO anvandare (namn,losenord,admin) VALUES (?,?,0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $pass);
$stmt->execute();

if ($conn->query($sql) === TRUE) {
    echo "Användare har lagts till";
} else {
    echo "ERROR";
}
?>