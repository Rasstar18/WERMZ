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
    <title>User</title>
</head>
<body>
  <div id="container">
    <div id="main">
      <div id="information">
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
        $sql = "SELECT * FROM spel";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
          //Visar alla spel
          while($row = $result->fetch_assoc()){
            echo $row["namn"]. "<br>";
          }
        } else{
          echo "Inga spel finns";
        }
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
                <label for="spelbarhet"><?php echo $knapp++ ?></label><br>
              <?php
            }
          ?>
        </form>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
    

</body>
</html>