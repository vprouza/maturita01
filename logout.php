<?php
session_start();
$_SESSION["user"] = "";
$_SESSION["user_id"] = "";
session_destroy();
header("location: index.php");