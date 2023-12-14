<?php
session_start();

require __DIR__ . "/../../../private/functions/dbIni.php";
require __DIR__ . "/../../../private/functions/register.php";

$title = "Connexion"
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?> - Création</title>
    <link rel="stylesheet" href="../../css/output.css">
</head>
<body>
<!-- Alert Example a modifier et rendre a rendre automatique avec les erreurs de Création de compte -->
<div class="flex flex-col h-screen justify-center items-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto rounded" src="../../image/logo/android-chrome-512x512.png" alt="Galery">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Création de compte</h2>
    </div>

    <?php if(isset($_GET["error"])): ?>
        <?php
        $messageError = "";

        switch ($_GET["error"]){
            case 1:
                $messageError = "Vous n'avez pas bien écrit votre mots de passe.";
                break;
            case 2:
                $messageError = "Veuillez entrer un email correcte.";
                break;
            case 3:
                $messageError = "Veuillez remplir les champs textes.";
                break;
        }?>
        <div id="alert" class="flex mt-5 items-center p-4 text-red-800 rounded-lg bg-red-100 sm:mx-auto sm:w-full sm:max-w-sm " role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                <?= $messageError?>
            </div>
        </div>
    <?php endif; ?>

    <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
            <div class="flex flex-row justify-between">
                <div>
                    <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                    <div class="mt-2">
                        <input id="firstname" name="firstname" type="text" placeholder="Ex: Mathis" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset p-4 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Nom de famille</label>
                    <div class="mt-2">
                        <input id="lastname" name="lastname" type="text" placeholder="Ex: Dupont" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset p-4 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" placeholder="Ex: Jean@mail.com" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset p-4 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="flex flex-row justify-between">
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mots de passe</label>
                    <div class="mt-2">
                        <input id="password" name="password" placeholder="********" onpaste="return false;" oncopy="return false;" type="password" autocomplete="current-password" minlength="8" required class="block w-full rounded-md border-0 p-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Ré-entrer à nouveau</label>
                    <div class="mt-2">
                        <input id="password2" name="password2" onpaste="return false;" oncopy="return false;" placeholder="********" type="password" minlength="8" required class="block w-full rounded-md border-0 p-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full align-middle justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-300">Créer</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Vous avez déjà un compte?
            <a href="/public/pages/login/index.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Connectez-vous</a>
        </p>
    </div>
</div>

</body>
</html>