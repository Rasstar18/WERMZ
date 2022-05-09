<?php
require_once('db.php');

//Hämtar 'type'-värdet (vilken databas som ska ändras)
if(isset($_GET['type'])) {
    $type = $_GET['type'];
}
else {
    echo "ERROR: 'type' är inte satt";
    die();
}

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

$sql = "SELECT * FROM $table";
$result = mysqli_query($conn,$sql);

$output = [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($output,$row);
    }
    echo json_encode($output);
} else {
    echo "ERROR: 0 resultat";
}
$conn->close();
?>