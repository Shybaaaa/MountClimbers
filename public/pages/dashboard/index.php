<?php
require __DIR__ . "/../../../private/functions/dbIni.php";
$title = "MountClimbers";
global $db;

if (!isset($_SESSION["user"])) {
    header("Location: ../../../index.php");
}

$sql = "SELECT roles.role_name FROM roles WHERE roles.role_id = :role_level";
$stmt = $db->prepare($sql);
$stmt->execute([
    'role_level' => $_SESSION["user"]["role_level"],
]);
$role = $stmt->fetch();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?> - Tableau bord</title>
    <link rel="stylesheet" href="/public/css/output.css">
</head>
<body class="bg-gray-100 scroll-smooth">
<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="mx-6 px-6 py-4">
            <a href="/index.php" class="flex flex-row items-center justify-center">
                <img src="/public/image/logo/android-chrome-512x512.png" class="rounded h-8 w-auto" alt="logo">
                <span class="text-base font-bold ml-3 text-gray-600">MOUNTCLIMBERS</span>
            </a>
        </div>

        <div class="flex flex-col items-center justify-center mt-5">
            <div class="h-32 w-32 rounded-full bg-gray-500 flex justify-center items-center">
                <?php if ($_SESSION["user"]["photo_profile"] == null): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="h-1/2 w-1/2" viewBox="0 0 448 512">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                    </svg>
                <?php else: ?>
                    <img src="/public/image/profile/<?= $_SESSION["user"]["photo_profile"] ?>"
                         class="rounded-full h-full w-full object-cover" alt="profile">
                <?php endif; ?>
            </div>
            <div class="flex flex-col text-center mt-2 mb-2">
                <span class="mt-4 text-xl font-semibold text-gray-600 lg:blockd"><?= $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?></span>
                <span class="font-bold uppercase text-sm text-gray-400 tracking-tight subpixel-antialiased"><?= $role["role_name"] ?></span>
            </div>
        </div>
        <ul class="space-y-2 tracking-wide mt-8">
            <li>
                <a href="index.php?page=info" class="<?php if (isset($_GET["page"]) and $_GET["page"] == "info") {
                    echo "relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400";
                } else {
                    echo "px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group";
                } ?>">
                    <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                              class="fill-current <?php if (isset($_GET["page"]) and $_GET["page"] == "info") {
                                  echo "text-cyan-500";
                              } else {
                                  echo "text-gray-600";
                              } ?> group-hover:text-cyan-600"></path>
                        <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                              class="fill-current <?php if (isset($_GET["page"]) and $_GET["page"] == "info") {
                                  echo "text-cyan-300";
                              } else {
                                  echo "text-gray-300 group-hover:text-cyan-300";
                              } ?>"></path>
                        <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                              class="fill-current <?php if (isset($_GET["page"]) and $_GET["page"] == "info") {
                                  echo "text-sky-300";
                              } else {
                                  echo "text-gray-600 group-hover:text-sky-300";
                              } ?>"></path>
                    </svg>
                    <span class="-mr-1 font-medium">Informations</span>
                </a>
            </li>
            <li>
                <a href="index.php?page=category"
                   class="<?php if (isset($_GET["page"]) and $_GET["page"] == "category") {
                       echo "relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400";
                   } else {
                       echo "px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group group-hover:text-gray-800";
                   } ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current group-hover:text-cyan-300 <?php if (isset($_GET["page"]) and $_GET["page"] == "category") {
                            echo "text-cyan-300";
                        } else {
                            echo "text-gray-300";
                        } ?> " fill-rule="evenodd"
                              d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                              clip-rule="evenodd"/>
                        <path class="fill-current group-hover:text-cyan-600 <?php if (isset($_GET["page"]) and $_GET["page"] == "category") {
                            echo "text-cyan-500";
                        } else {
                            echo "text-gray-300";
                        } ?> " d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"/>
                    </svg>
                    <span class="group-hover:text-gray-700">Catégories</span>
                </a>
            </li>
            <li>
                <a href="index.php?page=product" class="<?php if (isset($_GET["page"]) and $_GET["page"] == "product") {
                    echo "relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400";
                } else {
                    echo "px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group";
                } ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="h-4 w-4 <?php if (isset($_GET["page"]) and $_GET["page"] == "product") {
                             echo "text-cyan-800";
                         } else {
                             echo "text-gray-700 group-hover:text-cyan-800";
                         } ?>" viewBox="0 0 576 512">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>
                    <span class="group-hover:text-gray-700">Produits</span>
                </a>
            </li>
            <li>
                <a href="index.php?page=logs"
                   class="px-4 py-3 flex items-center space-x-4 rounded-md group <?php if (isset($_GET["page"]) and $_GET["page"] == "logs") {
                       echo "relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400";
                   } else {
                       echo "px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group group-hover:text-gray-700";
                   } ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current <?php if (isset($_GET["page"]) and $_GET["page"] == "logs") {
                            echo "text-cyan-800";
                        } else {
                            echo "text-gray-600 group-hover:text-cyan-600";
                        } ?>" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                        <path class="fill-current <?php if (isset($_GET["page"]) and $_GET["page"] == "logs") {
                            echo "text-cyan-300";
                        } else {
                            echo "text-gray-300 group-hover:text-cyan-300";
                        } ?>" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                    </svg>
                    <span>Logs</span>
                </a>
            </li>
            <li>
                <a href="index.php?page=user"
                   class="px-4 py-3 flex items-center space-x-4 rounded-md group <?php if (isset($_GET["page"]) and $_GET["page"] == "user") {
                       echo "relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400";
                   } else {
                       echo "px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group group-hover:text-gray-700";
                   } ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="h-4 w-4 <?php if (isset($_GET["page"]) and $_GET["page"] == "user") {
                             echo "text-cyan-400";
                         } else {
                             echo "text-gray-300 group-hover:text-cyan-500";
                         } ?>" viewBox="0 0 448 512">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                    </svg>
                    <span>Utilisateur</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
        <a class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group" href="/public/pages/logoat.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600 transition-all" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="group-hover:text-red-600 transition-all cursor-pointer ">Déconnexion</span>
        </a>
    </div>
</aside>
<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
        <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">
                <?php
                if (isset($_GET["page"])) {
                    switch ($_GET["page"]) {
                        case "info":
                            echo "Informations";
                            break;
                        case "category":
                            echo "Catégories";
                            break;
                        case "product":
                            echo "Produits";
                            break;
                        case "logs":
                            echo "Logs";
                            break;
                        case "user":
                            echo "Utilisateurs";
                            break;
                        default:
                            echo "Informations";
                            break;
                    }
                } else {
                    echo "Informations";
                }
                ?>
            </h5>
            <?php if (isset($_GET["page"])) {
                switch ($_GET["page"]) {
                    case "category":
                        echo '<div class="flex space-x-4"><button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-gray-600 font-medium text-sm px-5 py-2.5 text-center" type="button"><svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button></div>';
                        break;
                }
            } ?>
        </div>
    </div>
    <div class="px-6 pt-6 2xl:container">
        <?php
        if (isset($_GET["page"])) {
            switch ($_GET["page"]) {
                case "info":
                    require_once __DIR__ . "/info.php";
                    break;
                case "category":
                    require_once __DIR__ . "/category.php";
                    break;
                case "product":
                    require_once __DIR__ . "/product.php";
                    break;
                case "logs":
                    require_once __DIR__ . "/logs.php";
                    break;
                case "user":
                    require_once __DIR__ . "/user.php";
                    break;
                default:
                    require_once __DIR__ . "/info.php";
                    break;
            }
        } else {
            require_once __DIR__ . "/info.php";
        }
        ?>
    </div>
</div>
</body>
</html>