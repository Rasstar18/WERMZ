<?php
    session_start();
    $servername = "localhost";

   //$username = "ntigskov_go4";
   //$password = "$9lZQh!GYPFn";

    $username = "zacke";
    $password = "zackespooper";
    $db = "go_db";

    //koppla till db
    $conn = new mysqli($servername, $username, $password, $db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="goupg.css">
    <title>User</title>
</head>
<body>
  <div id="container">
    <div id="main">
      <div id="information">
        <?php 
        //  if ($conn->connect_error) {
        //   die("Connection failed: " . $conn->connect_error);
        // }
        // echo "Connected successfully";

        $sql = "SELECT * FROM kategorier";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "Kategori: " . $row["namn"]. "<br>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        
        ?>
      
        <?php
        for ($i=0;$i<1;$i++){
        ?>
        <form id="rating">
          <input type="radio" id="spelbarhet1" name="spelbarhet" value=1>
          <label for="spelbarhet">1</label><br>
          <input type="radio" id="spelbarhet2" name="spelbarhet" value=2>
          <label for="spelbarhet">2</label><br>
          <input type="radio" id="spelbarhet3" name="spelbarhet" value=3>
          <label for="spelbarhet">3</label><br>
          <input type="radio" id="spelbarhet4" name="spelbarhet" value=4>
          <label for="spelbarhet">4</label><br>
          <input type="radio" id="spelbarhet5" name="spelbarhet" value=5>
          <label for="spelbarhet">5</label><br>
        </form>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
    

</body>
</html>