<script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
<nav class="fixed top-0 flex w-full items-center justify-between px-4 py-3 lg:px-8 z-50 rounded backdrop-blur-lg transition-all"
     aria-label="Global">
    <!-- Conteneur de gauche (icon) -->
    <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5 bg-repeat-round rounded-b-sm">
            <span class="sr-only"><?= $title ?></span>
            <img class="h-16 w-auto rounded" src="/public/image/logo/android-chrome-512x512.png" alt="#">
        </a>
    </div>

    <!-- Conteneur du milieu -->
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Accueil</a>
        <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Produits</a>
        <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Contactez-nous</a>
    </div>

    <!-- Conteneur de droite login / register -->
    <?php if (isset($_SESSION["user"]["email"])): ?>
        <!-- Fait un menu dépliant quand on clique sur le A-->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                    class="text-gray-900 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center hover:text-blue-500 focus:text-blue-500 transition-all duration-150"
                    type="button">
                <?= $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?>
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4"/>
                </svg>
            </button>
        </div>
        <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDividerButton">
                <li>
                    <a href="/public/pages/dashboard/index.php?page=info"
                       class="flex flex-row items-center px-4 py-2 text-sm text-gray-900 hover:font-semibold transition-all duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink h-4 w-4 mr-2" fill="currentColor"
                             viewBox="0 0 448 512">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                        </svg>
                        Tableau Bord
                    </a>
                </li>
            </ul>
            <div class="py-2">
                <a href="/public/pages/logoat.php"
                   class="flex flex-row items-center px-4 py-2 text-sm text-red-700 hover:font-semibold hover:text-red-600 transition-all duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="flex-shrink h-4 w-4 mr-2"
                         viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                    </svg>
                    Déconnexion
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="/public/pages/login/index.php"
               class="text-sm font-semibold leading-6 text-gray-900 hover:text-emerald-400 hover:scale-105 transition">Connexion
                <span aria-hidden="true">&rarr;</span></a>
        </div>
    <?php endif; ?>
</nav>