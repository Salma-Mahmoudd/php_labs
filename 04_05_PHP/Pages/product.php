<?php
require_once '../vendor/autoload.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid product ID.");
}
$id = (int)$_GET['id'];

$db = new MYSQLHandler();
$db->connect();

$product = $db->get_record_by_id($id, 'id');

$db->disconnect();

if (!$product) {
    die("Product not found.");
}
$imagePath = '../assets/images/' . htmlspecialchars($product['Photo']);
$imageToShow = (file_exists($imagePath) && !empty($product['Photo'])) ? $imagePath : '../assets/images/default_SG.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['product_name']) ?> - Details</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/png">
</head>

<body>

    <?php include_once '../includes/header.php'; ?>

    <main class="container">
        <?php include '../includes/product_details.php'; ?>
    </main>

</body>

</html>