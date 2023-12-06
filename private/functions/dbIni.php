<?php

try {
    $db = new PDO("mysql:galery=;host=localhost", "root", "12345678");
} catch (ErrorException) {
    echo "Erreur de connexion à la base de données.";
}
