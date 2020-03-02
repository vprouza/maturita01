<?php
session_start();
if($_SESSION["user"] != ""){
    echo("<a href='logout.php'>Odhlásit</a><br>");
    echo("<a href='addnote.php'>Přidat poznámku</a><br>");
    echo("Jsi: " . $_SESSION["user"] . "<br>");
    echo($_SESSION["user_id"]);
}else{
    header("location: index.php");
}