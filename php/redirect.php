<?php
session_start();
require_once('db.php');

// Tar emot namn från inlogg
if(isset($_SESSION['go_db_name'])) {
    $user = $_SESSION['go_db_name'];
} else {
    $user = "";
}

// Tar emot lösenord från inlogg
if(isset($_SESSION['go_db_pass'])) {
    $pass = $_SESSION['go_db_pass'];
} else {
    $pass = "";
}

$sql="SELECT * FROM anvandare WHERE namn = '$user' AND losenord = '$pass'";
$result = $conn->query($sql);

// Inloggningsuppgifter är korrekta
if ($result->num_rows > 0){
    $userdata = $result->fetch_assoc();

    // Om användare är admin redirecta till adminsidan.php
    if ($userdata["admin"] == 1){
        HEADER("Location:../sidor/adminsidan.php");
    }
    // Om användare inte är admin redirecta till user.php
    else{
        HEADER("Location:../sidor/user.php");
    }
}
// Om inloggningsuppgifter är felaktiga redirecta till inlogg.php
else{
    HEADER("Location:../sidor/inlogg.php");
}
?>