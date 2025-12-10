<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php else: ?>
            <?= ucfirst($key) ?> пользователя <?= htmlspecialchars($user['name']) ?>

            <p class="formula"><strong><?= htmlspecialchars($value) ?></strong></p>

    </div>
<?php endif; ?>
