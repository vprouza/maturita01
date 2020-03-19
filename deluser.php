<?php
require_once("config.php");
if(isset($_POST["password"])){
    session_start();
    if($_SESSION["user_id"] != ""){
        $user_id = $_SESSION["user_id"];
    }else{
        header("location: index.php");
    }
    $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);
    $dotaz = "SELECT * FROM maturita01_uzivatele WHERE id = '" . $user_id . "'";
    $odpoved = mysqli_query($spojeni, $dotaz);
    $radek = mysqli_fetch_assoc($odpoved);
    if(password_verify($_POST["password"], $radek["password"])){
        echo("Mazu ucet");
        $dotaz = "DELETE FROM maturita01_poznamky WHERE user_id = '$user_id'";
        mysqli_query($spojeni, $dotaz);
        $dotaz = "DELETE FROM maturita01_uzivatele WHERE id = '$user_id'";
        mysqli_query($spojeni, $dotaz);
        $_SESSION["user"] = "";
        $_SESSION["user_id"] = "";
        session_destroy();
        header("location: index.php");
    }else{
        echo("Spatne heslo");
    }

}

?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadej heslo</title>
</head>
<body>
<h2>Smazání účtu</h2>
    <form action="deluser.php" method="post">
    <input type="password" name="password" id="" placeholder="password">
    <input type="submit" value="Smazat">
    </form>
</body>
</html>