<?php if ($error): ?>
    <?= htmlspecialchars($error) ?>
<?php else: ?>
            <?= htmlspecialchars($product['name']) ?>

            <p><strong>Цена:</strong> $<?= number_format($product['price'], 2) ?></p>
            <p><strong>Количество:</strong> <?= $product['quantity'] ?></p>
            <p><strong>Стоимость:</strong> $<?= number_format($cost, 2) ?></p>
            <hr>
            <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>

<?php endif; ?>
