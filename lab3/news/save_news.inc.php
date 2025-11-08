<?php
if (
    empty($_POST['title']) ||
    empty($_POST['description']) ||
    empty($_POST['source'])
) {
    $errMsg = "Заполните все поля формы!";
} else {
    $title = trim($_POST['title']);
    $category = (int)$_POST['category'];
    $description = trim($_POST['description']);
    $source = trim($_POST['source']);

    if (!$news->saveNews($title, $category, $description, $source)) {
        $errMsg = "Ошибка при добавлении новости!";
    } else {
        header("Location: news.php");
        exit;
    }
}
?>
