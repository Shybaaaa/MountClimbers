<?php
require_once "private/functions/logsRegister.php";

try {
    $db = new PDO("mysql:host=localhost;dbname=gallery;charset=utf8", "root", "12345678");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    logsRegister("Connexion", "Connection à la base de données");
} catch (ErrorException) {
    echo "Erreur de connexion à la base de données.";
}
