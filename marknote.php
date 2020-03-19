<?php
require_once("config.php");
if(isset($_GET["id"])){
    if($_GET["id"] == ""){
        echo("Id nespecifikovano");
    }else{
        $spojeni = mysqli_connect(dbhost,dbuser,dbpass,dbname);
        session_start();
        if($_SESSION["user_id"] != ""){
            $user_id = $_SESSION["user_id"];
        }else{
            header("location: index.php");
        }
        $id = $_GET["id"];
        $dotaz = "UPDATE maturita01_poznamky SET mark = !mark WHERE id = '$id' AND user_id = '$user_id'";
        echo($dotaz);
        mysqli_query($spojeni, $dotaz);
        header("location: dash.php");
    }
}