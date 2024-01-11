<?php
require __DIR__ . "/../../../private/functions/dbIni.php";
global $db;

$ref = $_GET["ref"];
echo $ref;

$sql = "SELECT * FROM products WHERE visible = 1 and reference = :ref LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute([
    ":ref" => $ref
]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$product) {
    header("Location: /public/pages/product/index.php");
    exit;
}

/*$sql = "SELECT * FROM comments WHERE product = :ref";
$stmt = $db->prepare($sql);
$stmt->execute([
    ":ref" => $ref
]);*/


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MountClimbers - <?= $product["name"] ?></title>
    <link rel="shortcut icon" href="../../image/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/output.css">
</head>
<body>
    <div class="bg-white">
        <?php require __DIR__ . "/../../include/navbar.php"; ?>
        <div class="pt-6 mt-8">
            <!-- Image gallery -->
            <div class="mx-auto flex align-middle justify-center mt-6 max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="hidden rounded-lg lg:block">
                    <img src="<?= $product["image"] ?>" alt="#" class="max-w-7xl h-auto rounded-lg lg:block">
                </div>
            </div>

            <!-- Product info -->
            <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"><?= $product["name"] ?></h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Informations du produits</h2>
                    <p class="text-3xl tracking-tight text-gray-900"><?= $product["price"] . "€" ?></p>

                    <form class="mt-10">
                        <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Louer</button>
                    </form>
                </div>

                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                    <!-- Description and details -->
                    <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-gray-900"><?= $product["description"] ?></p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">Garantie</h3>

                        <div class="mt-4">
                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                <li class="text-gray-400"><span class="text-gray-600">Annulable  à tout moments</span></li>
                                <li class="text-gray-400"><span class="text-gray-600">Service client 24h/24 6J/7</span></li>
                                <li class="text-gray-400"><span class="text-gray-600">Réception accueillante</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Commentaires :</h2>

                        <!-- Affiche les commentaires -->
                        <div class="mt-3 mb-5">
                            <?php
                                $sql = "SELECT * FROM comments WHERE product_id = :ref";
                                $stmt = $db->prepare($sql);
                                $stmt->execute([
                                    ":ref" => $ref
                                ]);
                                $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if (!$comments) {
                                    echo "<span class='italic text-gray-400 text-center'>Aucun commentaire.</span>";
                                } else {
                                    echo "Creation en cours !";
                                }

                            ?>
                        </div>



                        <form action="/private/functions/addComment.php?ref=<?= $ref ?>" method="post" >
                            <div class="mt-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                                <div class="mt-1">
                                    <input id="title" name="title" type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></input>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Votre message</label>
                                <div class="mt-1">
                                    <textarea id="comment" name="comment" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">Envoyer</button>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require __DIR__ . "/../../include/footer.php"; ?>
</body>
</html>

