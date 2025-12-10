<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php else: ?>
        <p><strong>Имя:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Возраст:</strong> <?= htmlspecialchars($user['age']) ?></p>
        <p><strong>Зарплата:</strong> $<?= number_format($user['salary'], 0, '', ' ') ?></p>
<?php endif; ?>
