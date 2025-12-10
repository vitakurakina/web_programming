<p>Продуктов в каталоге: <strong><?= $total ?></strong></p>

<table class="table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td>$<?= number_format($product['price'], 2) ?></td>
                <td><a href="<?= BASE_PATH ?>/product/db/<?= $product['id'] ?>/" class="btn">Подробнее</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
