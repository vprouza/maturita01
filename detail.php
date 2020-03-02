<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    
<a href="dash.php">Zpět</a>

<?php
session_start();
if($_SESSION["user_id"] != ""){
    require_once("config.php");
    $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $user_id = $_SESSION["user_id"];
        $dotaz = "SELECT * FROM maturita01_poznamky WHERE user_id = '" . $user_id . "' AND id = '" . $id . "'";
        //echo($dotaz);
        $odpoved = mysqli_query($spojeni, $dotaz);
        $radek = mysqli_fetch_assoc($odpoved);
        echo("<h1>" . $radek["title"] . "</h1>");
        echo("<h3>" . $radek["datetime"] . "</h3>");
        echo("<p>" . $radek["text"] . "</p>");
        
    }else{
        echo("No ID");
    }

}else{
    header("location: index.php");
}?>


</body>
</html>