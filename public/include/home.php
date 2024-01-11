<!-- Main -->
<main class="bg-[url('/public/image/bg-header.jpg')] bg-blend-darken bg-fixed h-screen min-w-full flex flex-col items-center justify-around">
    <div class="text-center">
        <h1>
            <span class="text-8xl text-transparent font-bold font-outline-2-black">MOUNT</span>
            <span class="text-8xl tracking-tighter font-bold font-outline-2-black">CLIMBERS</span>
        </h1>
        <p>
            <span class="text-lg text-center text-white drop-shadow-xl font-semibold">Vous retrouverez ici les meilleures chalets pour la montagne.</span>
        </p>
    </div>
    <div class="rounded-full bg-indigo-600 p-3 text-white motion-safe:animate-bounce">
        <a href="#affiche">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5 flex-shrink-0"
                 viewBox="0 0 384 512">
                <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
            </svg>
        </a>
    </div>
</main>
<!-- End Main -->
<div id="affiche" class="min-w-full w-full h-screen flex align-middle justify-center">
    <div class="bg-white w-11/12">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Chalets les plus populaires :</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

                <?php
                $sql = "SELECT reference, name, price, image FROM products WHERE isHomepage = 1 and visible = 1";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($products as $product):
                    ?>

                    <div class="group relative group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none transition-all group-hover:scale-105 lg:h-80">
                            <img src="<?= $product["image"] ?>" alt="" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="/public/pages/product/items.php?ref=<?= $product["reference"]?>">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        <?= $product["name"] ?>
                                    </a>
                                </h3>
                            </div>
                            <p class="text-sm font-medium text-gray-900"><?= $product["price"] . "€" ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>

</div>