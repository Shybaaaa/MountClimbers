<nav class="flex w-full items-center justify-between p-4 lg:px-8 bg-white/95 sticky top-0 z-50 backdrop-blur duration-500 supports-backdrop-blur:bg-white/60 dark:bg-transparent" aria-label="Global">
    <!-- Conteneur de gauche (icon) -->
    <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5 bg-repeat-round rounded-sm">
            <span class="sr-only"><?= $title ?></span>
            <img class="h-16 w-auto rounded" src="/public/image/logo/android-chrome-512x512.png" alt="#">
        </a>
    </div>

    <!-- Conteneur du milieu -->
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="" class="text-sm font-semibold leading-6 duration-500 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Accueil</a>
        <a href="" class="text-sm font-semibold leading-6 duration-500 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Produits</a>
        <a href="" class="text-sm font-semibold leading-6 duration-500 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Contactez-nous</a>
    </div>

    <!-- Conteneur de droite login / register -->
    <!-- Fait en sorte d'afficher le bouton de connexion quand l'utilisateur n'est pas connecter -->
    <?php if (isset($_SESSION["user"])): ?>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900 hover:text-emerald-500 hover:scale-105 transition">Mon compte <span aria-hidden="true">&rarr;</span></a>
        </div>
    <?php else: ?>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="/public/pages/login/index.php" class="text-sm font-semibold leading-6 text-gray-900 hover:text-emerald-500 hover:scale-105 transition">Connexion <span aria-hidden="true">&rarr;</span></a>
        </div>
    <?php endif; ?>
</nav>