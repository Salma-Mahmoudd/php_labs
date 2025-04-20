<a href="product.php?id=<?= htmlspecialchars($product['id']) ?>" class="product-link">
    <div class="product">
        <?php
        $imagePath = '../assets/images/' . htmlspecialchars($product['Photo']);
        if ($product['Photo'] && file_exists($imagePath)): ?>
            <img src="../assets/images/<?= htmlspecialchars($product['Photo']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
        <?php else: ?>
            <img src="../assets/images/default_SG.png" alt="No Image" class="default-img">
        <?php endif; ?>

        <div class="product-name"><?= htmlspecialchars($product['product_name']) ?></div>
        <div class="cat-name"><?= htmlspecialchars($product['category']) ?></div>
        <div class="price">$<?= htmlspecialchars($product['list_price']) ?></div>
        <div class="stars">
            <?php
            $rating = (int)($product['Rating'] ?: 0);
            for ($i = 1; $i <= 5; $i++) {
                echo $i <= $rating ? '<span class="star filled">&#9733;</span>' : '<span class="star">&#9734;</span>';
            }
            ?>
        </div>
    </div>
</a>