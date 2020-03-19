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
    echo("<a href='deluser.php'>Smazat uzivatele</a><br>");
    echo("Jsi: " . $_SESSION["user"] . "<br>");
    //echo($_SESSION["user_id"]);
    echo("<br>");
    echo("<hr>");
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
        $datetime = $radek["datetime"];
        if($mark){
            echo("<h3 style='color: red;'>" . $title . "</h3>");
        }
        else{
            echo("<h4>" . $title . "</h4>");
        }
        echo("<h6>" . $datetime . "</h6>");
        echo('<a href="delnote.php?id=' . $id . '">' . 'Smazat</a>');
        echo("<br>");
        echo('<a href="marknote.php?id=' . $id . '">' . 'Hvezdicka</a>');
        echo("<hr>");
    }
}else{
    header("location: index.php");
}
?>

<a href="delnote.php?id="></a>
</body>
</html>