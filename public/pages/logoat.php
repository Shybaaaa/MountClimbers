<?php
require_once __DIR__ . "/../../private/functions/dbIni.php";
global $db;
LogsRegister("LOGOAT", "Déconnexion de l'utilisateur : {$_SESSION["user"]["email"]}");
unset($_SESSION["user"]);
session_destroy();
header("Location: ../../index.php");
?>
