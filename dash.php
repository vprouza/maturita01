<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash</title>
</head>
<body>
    
<?php
session_start();
if($_SESSION["user"] != ""){
    echo("<a href='logout.php'>Odhlásit</a><br>");
    echo("<a href='addnote.php'>Přidat poznámku</a><br>");
    echo("Jsi: " . $_SESSION["user"] . "<br>");
    //echo($_SESSION["user_id"]);
    echo("<br>");
    require_once("config.php");
    $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);

    $user_id = $_SESSION["user_id"];
    $dotaz = "SELECT * FROM maturita01_poznamky WHERE user_id = '" . $user_id . "'";
    //echo($dotaz);
    $odpoved = mysqli_query($spojeni, $dotaz);
    foreach($odpoved as $radek){
        $title = $radek["title"];
        $mark = $radek["mark"];
        $id = $radek["id"];
        echo("<h1>" . $title . "</h1>");
        echo("<br>");
    }
}else{
    header("location: index.php");
}
?>


</body>
</html>