<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= htmlspecialchars($title ?? 'MVC Фреймворк') ?></title>
    
    <link rel="stylesheet" href="<?= BASE_PATH ?>/project/webroot/css/styles4.css">

</head>
<body>
    <header class="site-header">
        <h3><a href="<?= BASE_PATH ?>/">MVC Фреймворк</a></h3>
    </header>
    
    <div class="layout-wrapper">
        <aside class="sidebar-left">
            <ul class="sidebar-menu">
                <li><h3>Test Controller:</h3></li>
                <li><a href="<?= BASE_PATH ?>/test/act1/">Тест 1</a></li>
                <li><a href="<?= BASE_PATH ?>/test/act2/">Тест 2</a></li>
                <li><a href="<?= BASE_PATH ?>/test/act3/">Тест 3</a></li>
                        
                <li><h3>Num Controller:</h3></li>
                <li><a href="<?= BASE_PATH ?>/nums/5/10/15/">Сумма чисел</a></li>
                        
                <li><h3>User Controller:</h3></li>
                <li><a href="<?= BASE_PATH ?>/user/all/">Все пользователи</a></li>
                <li><a href="<?= BASE_PATH ?>/user/1/">Первый пользователь</a></li>
                <li><a href="<?= BASE_PATH ?>/user/first/3/">Первые три пользователя</a></li>
                        
                <li><h3>Product:</h3></li>
                <li><a href="<?= BASE_PATH ?>/products/all/">Каталог</a></li>
                        
                <li><h3>Pages (БД):</h3></li>
                <li><a href="<?= BASE_PATH ?>/pages/">Список страниц</a></li>
            </ul>
        </aside>
            
        <main class="main-content">
            <?php if (isset($title)): ?>
                <h1 class="page-title"><?= htmlspecialchars($title) ?></h1>
            <?php endif; ?>
            <?= $content ?>
        </main>
    </div>
    
    <footer class="site-footer">
        <h3>Footer</h3>
    </footer>
</body>
</html>