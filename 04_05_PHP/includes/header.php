<?php

include_once '../functions/products_fetcher.php';

?>

<header class="page-header">
    <div class="logo">
        <a href="../index.php">
            <img src="../assets/images/logo.png" alt="Logo" class="logo-img">
        </a>
    </div>
    <form method="GET" action="../Pages/products.php" class="search-form">
        <div class="search-box">
            <input type="text" name="search" class="search-input" placeholder="Search for a product..." value="<?= htmlspecialchars($search) ?>">
            <select name="column" class="search-select">
                <option value="product_name" <?= $column === 'product_name' ? 'selected' : '' ?>>Name</option>
                <option value="category" <?= $column === 'category' ? 'selected' : '' ?>>Category</option>
                <option value="CouNtry" <?= $column === 'CouNtry' ? 'selected' : '' ?>>Country</option>
            </select>
            <button type="submit" class="search-button">Search</button>
        </div>
    </form>
</header>