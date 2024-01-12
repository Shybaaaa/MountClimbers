<div class="min-w-full w-full min-h-screen flex align-middle justify-center mt-5 mb-5">
    <div class="bg-white w-11/12">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Tous nos chalets en location :</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

                <?php
                $sql = "SELECT reference, name, price, image FROM products WHERE visible = 1 order by name asc";
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