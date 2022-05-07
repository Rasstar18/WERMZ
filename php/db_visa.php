<?php
require_once('db.php');

$type = $_GET['type']; // Databasen som ska hämtas från (a/s/k)
$id = $_GET['id']; // Objektet som ska visas

// Bestämmer vilken databas som ska hämtas från
if($type == "a") {
    $table = "anvandare";
} elseif ($type == "s") {
    $table = "spel";
} elseif ($type == "k") {
    $table = "kategorier";
} else {
    echo "ERROR: 'type' har otillåtet värde (får enbart vara 'a', 's', eller 'k')";
    die();
}

// Hämtar och skickar tillbaks datan
$sql = "SELECT * FROM $table WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "ERROR: inget resultat";
}
$conn->close();

?>