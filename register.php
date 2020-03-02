<?php
require_once("config.php");
    if(isset($_POST["username"])){
        if($_POST["username"] != ""){
            $username = $_POST["username"];
            $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);
            $dotaz = "SELECT * FROM maturita01_uzivatele WHERE username = '" . $username . "'";
            $odpoved = mysqli_query($spojeni, $dotaz);
            echo("Registruji<br>");
            //echo($dotaz);
            $radek = mysqli_fetch_assoc($odpoved);
            //header("location: ok.html");
            if($odpoved && $username == $radek["username"]){
                echo("Uživatel již existuje");
            }else{
                if(($_POST["password"] != $_POST["password2"]) || ($_POST["password"] == "")){
                    echo("Hesla se neshodují nebo jsou prázdná");
                }else{
                    if(($_POST["email"] == "")){
                        echo("Nebyl zadán email");
                    }
                    else{
                        $email = $_POST["email"];
                        $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
                        $dotaz = "INSERT INTO maturita01_uzivatele (username, password, email) VALUES ('$username','$hash','$email')";
                        mysqli_query($spojeni, $dotaz);
                        $dotaz = $dotaz = "SELECT * FROM maturita01_uzivatele WHERE username = '" . $username . "'";
                        $odpoved = mysqli_query($spojeni, $dotaz);
                        $radek = mysqli_fetch_assoc($odpoved);
                        mysqli_close($spojeni);
                        //echo($dotaz);
                        session_start();
                        $_SESSION["user"] = $username;
                        $_SESSION["user_id"] = $radek["id"];
                        header("location: dash.php");
                        echo("Ok");
                    }
                }
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
    <title>Registrace</title>
</head>
<body>
<h2>Registrace</h2>
    <form action="register.php" method="post">
    <input type="text" name="username" id="" placeholder="username">
    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <input type="password" name="password2" id="" placeholder="password2">
    <input type="submit" value="Registrovat">
    </form>
</body>
</html>