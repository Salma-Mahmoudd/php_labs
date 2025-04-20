<div class="product-details">
    <h1><?= htmlspecialchars($product['product_name']) ?></h1>
    <img src="<?= $imageToShow ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">

    <div class="info-grid">
        <div><strong>Price:</strong> $<?= htmlspecialchars($product['list_price']) ?></div>
        <div><strong>Category:</strong> <?= htmlspecialchars($product['category']) ?></div>
        <div><strong>Country:</strong> <?= htmlspecialchars($product['CouNtry']) ?></div>
        <div><strong>Stock:</strong> <?= htmlspecialchars($product['Units_In_Stock']) ?></div>
        <div><strong>Reorder Level:</strong> <?= htmlspecialchars($product['reorder_level']) ?></div>
        <div><strong>Rating:</strong> <?= htmlspecialchars($product['Rating']) ?></div>
        <div><strong>Product Code:</strong> <?= htmlspecialchars($product['PRODUCT_code']) ?></div>
        <div><strong>Date Added:</strong> <?= htmlspecialchars($product['date']) ?></div>
        <div><strong>Status:</strong> <?= $product['discontinued'] ? 'Discontinued' : 'Available' ?></div>
    </div>
</div>