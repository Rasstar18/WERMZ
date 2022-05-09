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

//Hämtar 'id'-värdet (vilket objekt i databasen som ska tas bort)
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    echo "ERROR: 'id' är inte satt";
    die();
}

// Bestämmer vilken databas som skall ändras
if($type == "a") {
    $table = "anvandare";
    $location = "adminuser.php";
} elseif ($type == "s") {
    $table = "spel";
    $location = "adminspel.php";
} elseif ($type == "k") {
    $table = "kategorier";
    $location = "adminkategori.php";
} else {
    echo "ERROR: 'type' har otillåtet värde (får enbart vara 'a', 's', eller 'k')";
    die();
}

//DELETE FROM $table WHERE some_column = some_value
$sql = "DELETE FROM $table WHERE id = $id";
$result = mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
    echo "Objektet togs bort";
    HEADER("Location:../sidor/".$location);
} else {
    echo "ERROR: Kunde inte ta bort objektet - " . $conn->error;
}
  
$conn->close();

?>