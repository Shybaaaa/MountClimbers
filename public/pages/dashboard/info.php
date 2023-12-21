<div class="flex items-center justify-center">
    <div class="mt-6 bg-white px-6 py-5 w-11/12 rounded">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Nom</dt>
            <dd class="flex items-center justify-between mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <?= $_SESSION["user"]["lastname"] ?>
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Changer</a>
            </dd>
        </div>
        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Prénom</dt>
            <dd class="flex items-center justify-between mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <?= $_SESSION["user"]["firstname"] ?>
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Changer</a>
            </dd>

        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Adresse Email</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $_SESSION["user"]["email"] ?></dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Photo de profil</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                        <div class="flex w-0 flex-1 items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                <span class="truncate font-medium">photo-de-profil.png</span>
                            </div>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Changer</a>
                        </div>
                    </li>
                </ul>
            </dd>
        </div>
        <div class="border-t-2 flex flex-row justify-around items-center">
            <a href="#" class="mt-4 font-semibold text-indigo-600 hover:text-indigo-500">Changer le mot de passe</a>
            <a href="#" class="mt-4 font-semibold text-red-600 hover:text-red-500">Supprimer le compte</a>
        </div>
    </div>
</div>
