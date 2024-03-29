<?php
session_start();
require_once __DIR__ . "/logsRegister.php";

try {
    $db = new PDO("mysql:host=localhost;dbname=gallery;charset=utf8", "root", "12345678");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    LogsRegister("LOGS", "Connection à la base de données");
} catch (Exception $e) {
    LogsRegister("ERREUR", "Pas de connection a la BDD ({$e})");
}
