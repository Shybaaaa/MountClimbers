<?php
require_once __DIR__ . "/../dbIni.php";
global $db;

$name_category = htmlspecialchars($_POST["name"]);

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["role_level"] > 5) {
        if (count_chars($name_category) > 2) {
            $sql = 'SELECT * FROM category WHERE category.category_name = :name_category';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                "name_category" => $name_category,
            ]);

            $isExist = $stmt->fetch();

            if (!$isExist) {
                $sql = 'INSERT INTO category (`category_name`) VALUES (?)';
                $stmt = $db->prepare($sql);
                $stmt->execute([$name_category]);

                header("Location: /public/pages/dashboard/index.php?page=category&success=1");
            } else {
                header("Location: /public/pages/dashboard/index.php?page=category&error=1");
            }
        } else {
            header("Location: /public/pages/dashboard/index.php?page=category&error=2");
        }
    } else {
        header("Location: /public/pages/dashboard/index.php?page=category&error=3");
    }
} else {
    header("Location: /index.php");
}