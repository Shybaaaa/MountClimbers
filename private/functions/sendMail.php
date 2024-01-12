<?php

require __DIR__ . "/dbIni.php";

$name = $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"];
$expediteur = $_SESSION["user"]["email"];
$message = htmlspecialchars($_POST["message"]);


$destinataire = "shybadev@proton.me";
$objet = "MountClimbers - $name ($expediteur)";
$headers = 'From:' . $expediteur . "\r\n" .
    'Reply-To:' . $expediteur . "\r\n" .
    'Bcc:' . $expediteur . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (filter_var($expediteur, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($message)) {
    try {
        mail(
            $destinataire,
            $objet,
            $message,
            $headers
        );
    } catch (Exception $e) {
        LogsRegister("Mail ERROR", $e->getMessage());
        header("Location: /index.php?page=contact&success=false");
    }
    header("Location: /index.php?page=contact&success=true");
    LogsRegister("Mail", "Mail envoyé à $destinataire par $expediteur");
} else {
    header("Location: /index.php?page=contact&success=false");
    LogsRegister("Mail ERROR", "Mail non envoyé à $destinataire par $expediteur");
}

?>