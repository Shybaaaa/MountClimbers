<?php
require_once __DIR__ . "/../dbIni.php";
global $db;

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["role_level"] > 5) {

    } else {
        header("Location: /public/pages/dashboard/index.php?page=info");
    }

} else {
    header("Location: /index.php");
}