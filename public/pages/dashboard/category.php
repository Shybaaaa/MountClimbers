<?php
require_once __DIR__ . "/../../../private/functions/dbIni.php";
global $db;


$sql = "SELECT * FROM category";
$stmt = $db->prepare($sql);
$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SESSION["user"]["role_level"] < 5) {
    exit;
}

?>

<div class="flex items-center justify-center table-auto">
    <div class="mt-6 bg-white w-11/12 rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase border-b bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Nom de catégorie</th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $id => $categorie): ?>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                        <?= $categorie["category_id"] ?>
                    </th>
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?= $categorie["category_name"] ?>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="create-modal" tabindex="-1" aria-hidden="true"
     class="hidden fixed top-0 right-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-1/2 max-w-1/2 max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Créer une nouvelle catégorie
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="create-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermé</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="/private/functions/category/addCategory.php" method="post"
                  class="flex justify-center items-center flex-col p-4 md:p-5">
                <div class="">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de la
                            catégorie</label>
                        <input type="text" name="name" id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               placeholder="Nom" required="">
                    </div>
                </div>
                <button type="submit"
                        class="cursor-pointer mt-6 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Créer
                </button>
            </form>
        </div>
    </div>
</div>


