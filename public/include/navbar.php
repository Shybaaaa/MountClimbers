<nav class="mx-auto flex max-w-full items-center justify-between p-4 lg:px-8 bg-neutral-100 sticky" aria-label="Global">
    <!-- Conteneur de gauche (icon) -->
    <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5 bg-repeat-round rounded-sm">
            <span class="sr-only"><?= $title ?></span>
            <img class="h-16 w-auto rounded" src="/public/image/logo/android-chrome-512x512.png" alt="#">
        </a>
    </div>

    <!-- Conteneur du milieu -->
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Accueil</a>
        <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Produits</a>
        <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 hover:scale-105 transition">Contacte</a>
    </div>

    <!-- Conteneur de droite login / register -->
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Connexion <span aria-hidden="true">&rarr;</span></a>
    </div>
</nav>