<?php
require_once __DIR__ . "/../dbIni.php";
global $db;

$target_dir = "/public/image/upload/";

$chaletName = htmlspecialchars($_POST["product_name"]);
$chaletDesc = htmlspecialchars($_POST["description"]);
$chaletPrice = htmlspecialchars($_POST["price"]);
$chaletCategory = htmlspecialchars($_POST["category"]); /* Vérifier si la valeur entré est bien dans la liste des catégories déjà faites. */


if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["role_level"] > 5) {
        $sql = "SELECT category_name FROM category WHERE category_name = :chaletCategory";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            "chaletCategory" => $chaletCategory,
        ]);

        $isExist = $stmt->fetch();

        if ($isExist) {
            if (!$_FILES["photo"]["error"]) {
                $folder_name = uniqid();
                mkdir(  $_SERVER["DOCUMENT_ROOT"] . $target_dir . $folder_name);
                $target_file = $_SERVER["DOCUMENT_ROOT"] . $target_dir . $folder_name . "/" . basename($_FILES["photo"]["name"]);
                $url_file = $target_dir . $folder_name . "/" . basename($_FILES["photo"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        $reference = uniqid();
                        $sql = "INSERT INTO products (reference, name, description, price, image, product_category) VALUES (?, ?, ?, ?, ?, ?)";
                        $stmt = $db->prepare($sql);
                        $stmt->execute([
                            $reference,
                            $chaletName,
                            $chaletDesc,
                            $chaletPrice,
                            $url_file,
                            $chaletCategory,
                        ]);

                        LogsRegister("PRODUCT_ADD", "Le produit $chaletName a été ajouté par " . $_SESSION["user"]["email"]);
                        
                        header("Location: /public/pages/dashboard/index.php?page=product&success=1");
                    } else {
                        LogsRegister("PRODUCT_ADD", "Le produit $chaletName n'a pas pu être ajouté par " . $_SESSION["user"]["email"]);
                        header("Location: /public/pages/dashboard/index.php?page=product&error=2");
                    }
                } else {
                    LogsRegister("PRODUCT_ADD", "Le produit $chaletName n'a pas pu être ajouté par " . $_SESSION["user"]["email"]);
                    header("Location: /public/pages/dashboard/index.php?page=product&error=3");
                }
            } else {
                LogsRegister("PRODUCT_ADD", "Le produit $chaletName n'a pas pu être ajouté par " . $_SESSION["user"]["email"]);
                header("Location: /public/pages/dashboard/index.php?page=product&error=4");
            }
        } else {
            LogsRegister("PRODUCT_ADD", "Le produit $chaletName n'a pas pu être ajouté par " . $_SESSION["user"]["email"]);
            header("Location: /public/pages/dashboard/index.php?page=product&error=1");
        }
    } else {
        LogsRegister("PERMISSION_ERROR_PRODUCT", "Tentative d'ajout de produit par " . $_SESSION["user"]["email"] . " sans les permissions requises");
        header("Location: /public/pages/dashboard/index.php?page=info");
    }
} else {
    header("Location: /index.php");
}