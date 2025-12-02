<?php
$originalFile = 'news.db';
$backupFile   = 'news_backup.db';

if (!file_exists($originalFile)) {
    die("Оригинальный файл {$originalFile} не найден.\n");
}

if (copy($originalFile, $backupFile)) {
    echo "Файл успешно скопирован в {$backupFile}.\n";
} else {
    echo "Не удалось создать копию файла {$originalFile}.\n";
}
?>
