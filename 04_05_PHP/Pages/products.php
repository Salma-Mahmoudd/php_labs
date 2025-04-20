<?php

require_once '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunglasses Shop</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/products.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/pagination.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/png">
</head>

<body>
    <?php include_once '../includes/header.php'; ?>

    <div class="container">
        <div class="products">
            <?php foreach ($products as $product) {
                include '../includes/product_card.php';
            } ?>
        </div>

        <?php include_once '../includes/pagination.php'; ?>
    </div>

</body>

</html>