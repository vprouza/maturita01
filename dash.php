<?php
session_start();
if($_SESSION["user"] != ""){
    echo("Jsi: " . $_SESSION["user"]);
}else{
    header("location: index.php");
}
echo("<a href='logout.php'>Odhlásit</a>");