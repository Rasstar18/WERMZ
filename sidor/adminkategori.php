<?php
require_once("../php/db.php");
session_start();
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

    // Om användare inte är admin redirecta till inlogg
    if ($userdata["admin"] == 0){
        HEADER("Location:../sidor/inlogg.php");
    }
}
// Om inloggningsuppgifter är felaktiga redirecta till inlogg
else{
    HEADER("Location:../sidor/inlogg.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/goupg.css">
</head>
<body>
    <div id="container">
            <div id="spel">
                <a href="adminspel.php">Spel</a> 
            </div>
            <div id="anvandare">
                <a href="adminanvandare.php">Användare</a>  
            </div>
            <div id="poang">
                <a href="adminpoang.php">Poäng</a>
            </div>
            <div id="resultat">
                <a href="adminresultat.php">Resultat</a>
            </div>
            <div id="admin">
                <a href="adminsidan.php">Tillbaka till huvudsidan</a>
            </div>   
        <div id="main">
            <div id="array">
                <?php
                    $kategorier = ["action", "puzzle", "fps", "tps", "strategy", "rts", "rpg"]; 
                    foreach($kategorier as $rad){
                        
                        echo "<div class = 'category'>";
                        echo "<div class = 'categorybox'>".$rad."</div>"; 
                        echo "<div class = 'categoryremove'>Ta bort</div>"; 
                        echo "<div class = 'categoryedit'>Redigera</div><br>"; 
                        echo "</div>";
                    }
                ?>
            </div>   
        </div>
    </div>
</body>
</html>