<?php

require_once __DIR__ . "/../dbIni.php";
global $db;

$productRef = htmlspecialchars($_POST["ref"]);
$nameUpdate = htmlspecialchars($_POST["productName"]);
$descriptionUpdate = htmlspecialchars($_POST["productDescription"]);
$priceUpdate = htmlspecialchars($_POST["productPrice"]);
$categoryUpdate = htmlspecialchars($_POST["category"]);
$homepageUpdate = htmlspecialchars($_POST["productHomePage"]);

if (isset($_POST["productActive"])) {
    $activeUpdate = 1;
} else {
    $activeUpdate = 0;
}

if (isset($_POST["productHomePage"])) {
    $homepageUpdate = 1;
} else {
    $homepageUpdate = 0;
}



if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["role_level"] > 5){
        if (isset($nameUpdate) && isset($descriptionUpdate) && isset($priceUpdate) && isset($categoryUpdate) && isset($activeUpdate) && isset($homepageUpdate)) {
            $sql = "SELECT * FROM category where category_name = :category_name";
            $stmt = $db->prepare($sql);
            $stmt->execute(["category_name" => $categoryUpdate]);
            $category = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($category) {
                $sql = "SELECT * FROM products where reference = :product_ref";
                $stmt = $db->prepare($sql);
                $stmt->execute(["product_ref" => $productRef]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($product) {
                    $sql = "UPDATE products SET name = :product_name, description = :product_description, price = :product_price, product_category = :product_category, visible = :product_active, isHomepage = :product_homepage WHERE reference = :product_ref";
                    $stmt = $db->prepare($sql);
                    $stmt->execute([
                        "product_name" => $nameUpdate,
                        "product_description" => $descriptionUpdate,
                        "product_price" => $priceUpdate,
                        "product_category" => $categoryUpdate,
                        "product_active" => $activeUpdate,
                        "product_homepage" => $homepageUpdate,
                        "product_ref" => $productRef,
                    ]);

                    header("Location: /public/pages/dashboard/index.php?page=product&product=$productRef&edit=success");
                } else {
                    header("Location: /public/pages/dashboard/index.php?page=product&product=$productRef&edit=error1");
                }
            } else {
                header("Location: /public/pages/dashboard/index.php?page=product&product=$productRef&edit=error2");
            }

        } else {
            header("Location: /public/pages/dashboard/index.php?page=product&product=$productRef&edit=error3");
        }

    } else {
        header("Location: /public/pages/dashboard/index.php");
    }
} else {
    header("Location: /public/pages/login.php");
}