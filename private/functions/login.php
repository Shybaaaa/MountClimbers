<?php
require_once __DIR__ . "/dbIni.php";
global $db;

if (isset($_SESSION["user"])) {
    header("Location: ../../../index.php");
}

$email = '';
$mdpUser = "";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = htmlspecialchars($_POST["email"]);
    $mdpUser = htmlspecialchars($_POST["password"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT users.email, users.firstname, users.lastname, users.role_level, users.photo_profile  FROM users WHERE users.email = :emailConnection AND users.password = :mdpConnection AND users.isDelete = 0";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'emailConnection' => $email,
            'mdpConnection' => md5($mdpUser),
        ]);

        $infoUser = $stmt->fetch();

        if ($infoUser) {
            $_SESSION["user"] = [
                "email" => $infoUser["email"],
                "firstname" => $infoUser["firstname"],
                "lastname" => $infoUser["lastname"],
                "role_level" => $infoUser["role_level"],
                "photo_profile" => $infoUser["photo_profile"],
            ];
            LogsRegister("LOGIN SUCCESS", "Connection au compte : $email");
            header("Location: ../../../index.php");
        } else {
            LogsRegister("LOGIN ERROR", "Erreur : Identifiants incorrect");
            header("Location: ./index.php?error=1");
        }
    } else {
        LogsRegister("LOGIN ERROR", "Erreur : Mauvaise adresse email");
        header("Location: ./index.php?error=2");
    }
}