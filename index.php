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

<!-- Main -->
<main class="bg-[url('/public/image/bg-header.jpg')] bg-blend-darken bg-fixed h-screen min-w-full flex flex-col items-center justify-around">
    <div class="text-center">
        <h1>
            <span class="text-8xl text-transparent font-bold font-outline-2-black">MOUNT</span>
            <span class="text-8xl tracking-tighter font-bold font-outline-2-black">CLIMBERS</span>
        </h1>
        <p>
            <span class="text-lg text-center text-white drop-shadow-xl font-semibold">Vous retrouverez ici les meilleures chalets pour la montagne.</span>
        </p>
    </div>
    <div class="rounded-full bg-indigo-600 p-3 text-white motion-safe:animate-bounce">
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5 flex-shrink-0"
                 viewBox="0 0 384 512">
                <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
            </svg>
        </a>
    </div>
</main>
<!-- End Main -->
<div class="min-w-full w-full">
    <!-- Faire une rebrique avec des chalets haut de gammes.  -->
</div>

<!-- Faire une partie avec les derniers chalets. -->

<!-- Refaire le footer -->

<?php include "./public/include/footer.php" ?>
</body>
</html>
