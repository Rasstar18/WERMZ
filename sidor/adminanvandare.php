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

$url1 = 'http://localhost:8080/webbutveckling/github/WERMZ/php/db_visa_alla.php?type=a';
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_URL, $url1);
$userData = curl_exec($ch1);
$array = json_decode($userData);

$url2 = 'http://localhost:8080/webbutveckling/github/WERMZ/php/db_visa_alla.php?type=k';
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_URL, $url2);
$categoryData = curl_exec($ch2);
$categoryArray = json_decode($categoryData);
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
                    foreach($array as $rad){

                        if($rad->namn == "admin") {
                            echo "<div class = 'category'>";
                            echo "<div class = 'categorybox'>".$rad->namn."</div>"; 
                            echo "<p>Ej redigerbar</p>";
                            echo "</div>";
                            continue;
                        }
                        
                        echo "<div class = 'category'>";
                        echo "<div class = 'categorybox'>".$rad->namn."</div>"; 
                        $href = '../php/db_tabort.php?type=a&id='.$rad->id;
                        echo "<a href =".$href."><div class='categoryremove'>TB</div></a>";
                        echo "<div class = 'categoryedit'>R</div><br>"; 
                        echo "</div>";
                    }
                ?>
                <a href = "javascript:addUser()"><div id='categoryadd'>Ny</div></a>
            </div>   
        </div>
    </div>
</body>
<script>
function lineBreak(e) {
    e.appendChild(document.createElement("br"));
}

function addUser() {
    var categories = JSON.parse('<?php echo(json_encode($categoryArray));?>');

    document.getElementById("categoryadd").remove();

    let form = document.createElement("form");
    form.setAttribute("action","GET");
    form.setAttribute("action","../php/db_add_anvandare.php");

    let nameInput = document.createElement("input");
    nameInput.setAttribute("type","text");
    nameInput.setAttribute("name","name");
    nameInput.setAttribute("placeholder","namn");

    let passInput = document.createElement("input");
    passInput.setAttribute("type","text");
    passInput.setAttribute("name","pass");
    passInput.setAttribute("placeholder","lösenord");

    form.appendChild(nameInput);
    lineBreak(form);
    form.appendChild(passInput);

    checkboxes = {};
    for(i=0;i<categories.length;i++) {
        c = categories[i];
        checkboxes[c.namn] = document.createElement("input");
        checkboxes[c.namn].setAttribute("type","checkbox");
        checkboxes[c.namn].setAttribute("name",c.id);
        lineBreak(form);
        let label = document.createElement("label");
        label.innerHTML = c.namn;
        
        form.appendChild(checkboxes[c.namn]);
        form.appendChild(label);
    }

    let submit = document.createElement("input");
    submit.setAttribute("type","submit");
    submit.setAttribute("value","Lägg till");

    document.getElementById("array").appendChild(form);
    lineBreak(form);
    form.appendChild(submit);
}

</script>
</html>