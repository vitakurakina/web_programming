<?php
$items = $news->getNews();

if ($items === false) {
    $errMsg = "Произошла ошибка при выводе новостной ленты";
    return;
}

$count = count($items);
echo "<p>Новостей в ленте: $count</p>";

foreach ($items as $n) {
    echo "<div class='news-item'>";
    echo "<h3>{$n['title']}</h3>";
    echo "<div class='news-meta'>";
    echo "<p><b>Категория:</b> {$n['category']}</p>";
    echo "<p>".date("d.m.Y H:i", $n['datetime'])."</p>";
    echo "</div>";
    echo "<p>{$n['description']}</p>";
    echo "<p><i>Источник: {$n['source']}</i></p>";
    echo "<a class='news-delete' href='news.php?del={$n['id']}'>Удалить</a>";
    echo "</div>";
}
?>
