<?php
    session_start();
    require __DIR__ . "/../../../private/functions/dbIni.php";
    $title = "Connexion"
?>

<!-- Prochaine étape -->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?> - Connexion</title>
    <link rel="stylesheet" href="../../css/output.css">
</head>
<body>
<div class="flex flex-col h-screen justify-center items-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto rounded" src="../../image/logo/android-chrome-512x512.png" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Connectez-vous</h2>
    </div>

    <?php if(isset($_GET["success"]) == 1):?>
        <div id="alert-success" class="flex mt-10 items-center p-4 text-emerald-800 rounded-lg bg-emerald-100 sm:mx-auto sm:w-full sm:max-w-sm " role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                Votre compte a été créé avec succès !
            </div>
        </div>
    <?php endif; ?>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset p-4 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mots de passe</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-red-600 hover:text-red-500">Mots de passe oublié?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full align-middle justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-300">Connexion</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Vous n'avez pas de compte?
            <a href="/public/pages/register/index.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Créer un compte</a>
        </p>
    </div>
</div>

</body>
</html>