<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php else: ?>
    <p><?= htmlspecialchars($page['text']) ?></p>
<?php endif; ?>