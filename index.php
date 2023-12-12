<?php
    session_start();
    require "private/functions/dbIni.php" ;
    $title = "Galery"
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/public/css/output.css">
</head>
<body class="h-96">
    <?php include "./public/include/navbar.php" ?>

    <!-- Hero -->
    <!--#TicketID:waiting-->

    <?php include "./public/include/footer.php" ?>
</body>
</html>
