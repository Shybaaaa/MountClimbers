<?php
    session_start();
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
<div class="fixed top-2 left-2">
    <a href="/index.php" class="flex items-center h-5 p-4 text-gray-900 rounded-md hover:text-indigo-500 font-semibold  sm:w-fit sm:max-w-fit transition duration-200" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" class="flex-shrink-0 w-4 h-4 fill" viewBox="0 0 448 512">
            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
        </svg>
        <div class="ms-2 text-sm font-medium">
            Retour
        </div>
    </a>
</div>
<div class="flex flex-col h-screen justify-center items-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
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
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
            </svg>
            <span class="sr-only">Error</span>
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