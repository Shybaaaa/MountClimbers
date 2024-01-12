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

<div class="bg-indigo-600 text-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                <dt class="leading-7">Location express de chalets : Rapidité garantie !</dt>
                <dd class="mx-auto order-first text-3xl bg-indigo-500 rounded-full shadow-l h-auto p-5 w-fit font-semibold tracking-tight sm:text-5xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="stroke-0 h-16 w-16" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/></svg>
                </dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                <dt class="leading-7 ">Service Client : 6J/7 24h/24</dt>
                <dd class="mx-auto order-first text-3xl bg-indigo-500 rounded-full shadow-l h-auto p-5 w-fit font-semibold tracking-tight sm:text-5xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="stroke-0 h-16 w-16"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"/></svg>
                </dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                <dt class="leading-7">Qualité Chalet Supérieure!</dt>
                <dd class="mx-auto order-first text-3xl bg-indigo-500 rounded-full shadow-l h-auto p-5 w-fit font-semibold tracking-tight sm:text-5xl">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="stroke-0 h-16 w-16" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                </dd>
            </div>
        </dl>
    </div>
</div>