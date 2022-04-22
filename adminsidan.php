<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form method="POST">
        <input type="text" id="id" value="ID">
        <input type="text" id="kategori" value="Kategori">
        <input type="submit" id="verkstall" value="Execute order 67">
        <?php
        if(!empty($_POST)){
            require_once("inlogg.php");
            $worth = $_POST;
            $ID = $worth['id'];
            $category = $worth['kategori'];

            $sql = "SELECT * FROM anvandare WHERE id = $ID"
        }
        ?>
    </form>
</body>
</html>