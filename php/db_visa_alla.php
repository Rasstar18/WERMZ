<?php
require_once('db.php');

$type = $_GET['type']; // Databasen som ska hämtas

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

// Hämtar och skickar tillbaks datan
$sql = "SELECT * FROM $table";
$result = mysqli_query($conn,$sql);

$output = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($output,$row);
    }
    echo json_encode($output);
} else {
    echo "ERROR: 0 resultat";
}
$conn->close();
?>