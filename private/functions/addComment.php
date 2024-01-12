<?php
    require __DIR__ . "/dbIni.php";
    global $db;

    $ref = $_GET["ref"];

    $sql = "SELECT * FROM products WHERE visible = 1 and reference = :ref LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ":ref" => $ref
    ]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header("Location: /index.php?pages=product");
        exit;
    }

    $title = htmlspecialchars($_POST["title"]);
    $message = htmlspecialchars($_POST["comment"]);
    $name = htmlspecialchars($_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]);

    if (isset($title) and isset($message)) {
        $sql = "INSER T INTO comments (product_id,title, description, name) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $ref,
            $title,
            $message,
            $name,
        ]);

        LogsRegister("COMMENT ADD", "Commentaire ajouté par $name sur le produit $ref");

        header("Location: /public/pages/product/items.php?ref=$ref");
        exit;
    }