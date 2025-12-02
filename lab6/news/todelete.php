<?php
$originalFile = 'news.db';

if (!file_exists($originalFile)) {
    die("Оригинальный файл {$originalFile} не найден.\n");
}

if (unlink($originalFile)) {
    echo "Оригинальный файл {$originalFile} удалён.\n";
} else {
    echo "Не удалось удалить оригинальный файл {$originalFile}.\n";
}
?>
