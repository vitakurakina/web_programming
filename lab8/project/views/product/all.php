<table class="table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $id => $product): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td>$<?= $product['price'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
