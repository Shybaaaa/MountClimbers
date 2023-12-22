<?php
require_once __DIR__ . "/../dbIni.php";
global $db;

$chaletName = $_POST["name"];
$chaletDesc = $_POST["description"];
$chaletPrice = $_POST["price"];
$chaletCategory = $_POST["category"]; /* Vérifier si la valeur entré est bien dans la liste des catégories déjà faites. */
$chaletImg = $_POST["img"];


if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["role_level"] > 5) {

    } else {
        header("Location: /public/pages/dashboard/index.php?page=info");
    }

} else {
    header("Location: /index.php");
}