<?php
require_once __DIR__ . "/dbIni.php";
global $db;

if (isset($_SESSION["user"])) {
    header("Location: ../../../index.php");
}

$firstname = "";
$lastname = "";
$email = "";
$password = "";
$password2 = "";


if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST["email"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        LogsRegister("CREATE ERROR", "Erreur : L'email est déjà utilisé");
        header("Location: ./index.php?error=1");
    } else {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname = htmlspecialchars($_POST["lastname"]);
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            $password2 = htmlspecialchars($_POST["password2"]);

            if ($password === $password2) {
                $passwordSecure = md5($password);

                $sql = "INSERT INTO users (`firstname`, `lastname`, `email`, `password`) VALUES (?, ?, ?, ?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$firstname, $lastname, $email, $passwordSecure]);

                LogsRegister("CREATE", "Compte créé avec l'email : {$email}");

                header("Location: ../login/index.php?success=1");
            } else {
                LogsRegister("CREATE ERROR", "Erreur : Les mots de passe ne correspondent pas");
                header("Location: ./index.php?error=3");
            }
        } else {
            LogsRegister("CREATE ERROR", "Erreur : Mauvaise adresse email");
            header("Location: ./index.php?error=2");
        }
    }
}
