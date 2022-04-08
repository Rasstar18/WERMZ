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

    if ($result->num_rows > 0){
        $userdata = $result->fetch_assoc();
        if ($userdata->$admin == 1){
            HEADER("Location:adminsidan.php");
            exit; 
        }
        else{
            HEADER("Location:user.php");
            exit;
        }
    }
    else{
        echo "0 results";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlogg</title>
</head>
<body>
    <form method="POST">
        <input type="text" id="namn" name="namn" placeholder="Användarnamn">
        <input type="password" id="losenord" name="losenord" placeholder="Lösenord">
        <input type="submit" value="Logga in">
    </form>
</body>
</html>