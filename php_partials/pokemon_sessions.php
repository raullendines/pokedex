<?php
session_start();

if (isset($_SESSION["pokemon"])) {
    $pokemon = $_SESSION["pokemon"];
}

if (isset($_SESSION["error"])) {
    echo $_SESSION["error"];
    unset($_SESSION["error"]);
}

if (isset($_SESSION["correcto"])) {
    echo $_SESSION["correcto"];
    unset($_SESSION["correcto"]);
}
?>