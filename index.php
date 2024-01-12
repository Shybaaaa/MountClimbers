<?php
require "private/functions/dbIni.php";
$title = "MountClimbers";

global $db;
?>

<!doctype html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="/public/image/logo/favicon.ico" type="image/x-icon" class="ico">
    <link rel="stylesheet" href="/public/css/output.css">
</head>
<?php include "./public/include/navbar.php" ?>

<?php
if (isset($_GET["page"])){
    switch ($_GET["page"]){
        case "contact":
            include __DIR__ . "/public/pages/contact.php";
            break;
        case "product":
            include __DIR__ . "/public/pages/product/index.php";
            break;
        default:
            include __DIR__ . "/public/pages/home.php";
            break;
    }
} else {
    include __DIR__ . "/public/pages/home.php";
}
?>

<?php include "./public/include/footer.php" ?>
</body>
</html>
