<?php
    session_start();
    require_once ("../php/db.php");
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
         HEADER("Location:inlogg.php");
      }
    }
    // Inloggningsuppgifter är felaktiga
    else{
      HEADER("Location:inlogg.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/goupg.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <title>User</title>
</head>
<body>
  <div class="header">
    <h1>Game On</h1>
  </div>
  <div id="container">
    <img id="profilbild" src="../img/avatar.png" alt="profilbild">
    <div id="main">
      <article id="information">
        <p id="kategorier">
          <?php 
          $sql = "SELECT * FROM kategorier";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              //Visar kategorier
              while($row = $result->fetch_assoc()) {
                echo "Kategori: " . $row["namn"]. "<br>";
              }
            } else {
              echo "Inga kategorier har blivit kopplade";
            }
          ?>
        </p>

        <p id="spel">
          <?php
          $sql = "SELECT * FROM spel";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            //Visar alla spel
            while($row = $result->fetch_assoc()){
              echo $row["namn"]. "<br>";
            }
          } else{
            echo "Inga spel finns". "<br>";
          }
          ?>
        </p>

        <p id="anvandarnamn">
          <?php
          $sql = "SELECT namn FROM anvandare";
          if ($result->num_rows > 0){
            //Använarnamn
            while($row = $result->fetch_assoc()){
              echo $row["namn"]. "<br>";
            }
          } else{
            echo "Hittar inte namn". "<br>";
          }
            $conn->close();
          
          ?>
        </p>
        <?php
        //For loop som skapar radio buttons för en kategori,
          $knapp = 1;
          for ($i=0;$i<1;$i++){
          ?>
          <?php 
          //Skapar fem radio buttons
            for ($i=0;$i<5;$i++){
              ?>
              <form id="rating">
                <input type="radio" id="spelbarhet1" name="spelbarhet" value=1>
                <label for="spelbarhet"><?php echo $knapp++ ?></label>
              <?php
            }
          ?>
        </form>
        <?php
        }
        ?>
      </article>
    </div>
  </div>
    

</body>
</html>