<?php
    require_once("../php/db.php");
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
      <div id="kategori">
                <a href="adminkategori.php">Kategori</a> 
            </div>
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
        <div id="main">
        </div>
    </div>
   
    
    



    <!--<form method="POST">
        <input type="checkbox" id="Kategori" name="Kategori[]" value=""
        <?php
        /*if(!empty($_POST)){
          $edit = "UPDATE * WHERE"  
        }
        */
        ?>
    </form>-->
</body>
</html>