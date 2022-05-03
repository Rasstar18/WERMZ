<?php
    session_start();
    require_once ("../php/db.php");
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
          $knapp = 1;
          for ($i=0;$i<1;$i++){
          ?>
          <?php 
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