<?php
session_start();
require_once('db.php');

// Tar emot namn från inlogg
if(isset($_GET['name'])) {
    $user = $_GET['name'];
} else {
    $user = "";
}
// Tar emot lösenord från inlogg
if(isset($_GET['pass'])) {
    $pass = $_GET['pass'];
} else {
    $pass = "";
}

$sql="SELECT * FROM anvandare WHERE namn = '$user' AND losenord = '$pass'";
$result = $conn->query($sql);

// Inloggningsuppgifter är korrekta
if ($result->num_rows > 0){
    $userdata = $result->fetch_assoc();

    // Om användare är admin returnera "ADMIN"
    if ($userdata["admin"] == 1){
        HEADER("Location:adminsidan.php");
    }
    // Om användare inte är admin returnera "USER"
    else{
        HEADER("Location:user.php");
    }
}
// Inloggningsuppgifter är felaktiga
else{
    HEADER("Location:inlogg.php");
}
?>