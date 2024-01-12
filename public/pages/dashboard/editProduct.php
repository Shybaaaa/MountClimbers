<?php

require_once __DIR__ . "/../../../private/functions/dbIni.php";
global $db;

if ($_SESSION["user"]["role_level"] < 5) {
    header("Location: index.php");
    exit;
}

$productRef = $_GET['ref'];
$sql = "SELECT * FROM products WHERE reference = '$productRef'";
$stmt = $db->prepare($sql);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM category";
$stmt = $db->prepare($sql);
$stmt->execute();

$category_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
asort($category_list);
?>

<div class="flex items-center justify-center">
    <div class="mt-6 bg-white px-6 py-5 w-11/12 rounded">
        <form action="/private/functions/product/editProduct.php" method="post">
            <input name="ref" type="text" class="sr-only" value="<?= $_GET["ref"]?>">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 justify-center align-middle">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Nom du produit</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input name="productName" type="text" value="<?= $product["name"]?>" class="rounded w-1/2 h-5 py-3 px-2">
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Description</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <textarea name="productDescription" class="w-full rounded" minlength="50" maxlength="512" rows="6" aria-required="true"><?= $product["description"]?></textarea>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Prix (€)</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input name="productPrice" type="number" min="1" max="10000"  value="<?= $product["price"]?>" class="rounded w-1/4 h-5 py-3 px-2">
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Categorie</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <select id="category" name="category" onselect="<?= $product["product_category"] ?>" class="bg-gray-50 border border-gray-300 w-1/4 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                            <?php asort($category_list); foreach ($category_list as $key => $category_name): ?>

                                <option value="<?= $category_name["category_name"]?>"><?= $category_name["category_name"]?></option>

                            <?php endforeach;?>
                        </select>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Page d'accueil ? </dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input name="productHomePage" type="checkbox" <?php if($product["isHomepage"]){ echo "checked";} ?> class="rounded w-5 h-5 py-3 px-3">
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Activé ? </dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input name="productActive" type="checkbox" <?php if($product["visible"]){ echo "checked";} ?> class="rounded w-5 h-5 py-3 px-3">
                    </dd>
                </div>
                <!--<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">

                                        <span class="truncate font-medium"><?php /*$product["image"] */?></span>

                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>-->
            </dl>
            <div class="border-t-2 flex flex-row justify-around items-center">
                <input type="submit" class="mt-4 font-semibold text-indigo-600 hover:text-indigo-500" value="Modifier">
                <a href="index.php?page=product" class="mt-4 font-semibold text-red-600 hover:text-red-500">Annuler</a>
            </div>
        </form>
    </div>
</div>