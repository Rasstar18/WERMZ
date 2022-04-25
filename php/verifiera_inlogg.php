<?php
session_start();
if(!empty($_POST)){
    $varden = $_POST;

    $name = $varden['namn'];
    $pass = $varden['losenord'];

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="go_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="SELECT * FROM anvandare WHERE namn = '$name' AND losenord = '$pass'";
    $result = $conn->query($sql);

    // Inloggningsuppgifter är korrekta
    if ($result->num_rows > 0){
        $userdata = $result->fetch_assoc();

        // Om användare är admin returnera "ADMIN"
        if ($userdata["admin"] == 1){
            $loginstatus = "ADMIN";
        }
        // Om användare inte är admin returnera "USER"
        else{
            $loginstatus = "USER";
        }
    }
    // Inloggningsuppgifter är felaktiga
    else{
        $loginstatus = false;
    }

    $_SESSION["loginStatus"] = $loginstatus;

    $conn->close();
}
?>