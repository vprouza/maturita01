<?php
require_once("config.php");
if(isset($_POST["title"])){
    if($_POST["title"] == ""){
        echo("Název musí být zadán");
    }else{
        $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);
        session_start();
        if($_SESSION["user_id"] != ""){
            $user_id = $_SESSION["user_id"];
        }else{
            header("location: index.php");
        }
        $title = $_POST["title"];
        $text = $_POST["text"];
        $dotaz = "INSERT INTO maturita01_poznamky (user_id, title, text) VALUES ('$user_id','$title','$text')";
        //echo($dotaz);
        mysqli_query($spojeni, $dotaz);
        header("location: dash.php");
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Přidat Poznámku</title>
</head>
<body>
<h2>Přidat Poznámku</h2>
    <form action="addnote.php" method="post">
    <input type="text" name="title" placeholder="title">
    <input type="text" name="text" placeholder="text">
    <input type="submit" value="Přidat">
    </form>
</body>
</html>