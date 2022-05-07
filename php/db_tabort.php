<?php
require_once('db.php');

$type = $_GET['type']; // Databasen som skall ändras
$id = $_GET['id']; // Objektet som ska tas bort

// Bestämmer vilken databas som skall ändras
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

// Tar bort från databasen
$sql = "DELETE FROM $table WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->get_result() === TRUE) {
    echo "Objektet togs bort";
} else {
    echo "ERROR: Kunde inte ta bort objektet";
}
  
$conn->close();
?>