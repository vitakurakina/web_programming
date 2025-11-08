<?php
if (!isset($_GET['del'])) {
    return;
}

$id = intval($_GET['del']);
if ($id <= 0) {
    header("Location: news.php");
    exit;
}

if (!$news->deleteNews($id)) {
    $errMsg = "Произошла ошибка при удалении новости";
} else {
    header("Location: news.php");
    exit;
}
