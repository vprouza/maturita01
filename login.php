<?php
require_once("config.php");
    if(isset($_POST["username"])){
        if($_POST["username"] != ""){
            $username = $_POST["username"];
            $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);
            $dotaz = "SELECT * FROM maturita01_uzivatele WHERE username = '" . $username . "'";
            $odpoved = mysqli_query($spojeni, $dotaz);
            echo("Přihlašuji<br>");
            //echo($dotaz);
            $radek = mysqli_fetch_assoc($odpoved);
            //header("location: ok.html");
            if(password_verify($_POST["password"],$radek["password"])){
                echo("ok");
                session_start();
                $_SESSION["user"] = $username;
                header("location: dash.php");
            }else{
                echo("Nesprávné heslo");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Přihlášení</title>
</head>
<body>
<h2>Přihlášení</h2>
    <form action="login.php" method="post">
    <input type="text" name="username" id="" placeholder="username">
    <input type="password" name="password" id="" placeholder="password">
    <input type="submit" value="Přihlásit">
    </form>
</body>
</html>