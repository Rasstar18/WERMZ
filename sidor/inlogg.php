<?php
session_start();
if(!empty($_POST)){
    session_start();
    $varden = $_POST;

    $name = $varden['namn'];
    $pass = $varden['losenord'];  

    $_SESSION['go_db_name'] = $name;
    $_SESSION['go_db_pass'] = $pass;

    HEADER("Location:../php/redirect.php");
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