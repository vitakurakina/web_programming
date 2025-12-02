<?php
$backupFile = 'news_backup.db';
$originalFile = 'news.db';

if (!file_exists($backupFile)) {
    die("Резервная копия {$backupFile} не найдена.\n");
}

if (file_exists($originalFile)) {
    if (!unlink($originalFile)) {
        die("Не удалось удалить существующий файл {$originalFile}.\n");
    }
}

if (copy($backupFile, $originalFile)) {
    echo "Файл {$originalFile} успешно восстановлен из {$backupFile}.\n";
} else {
    echo "Не удалось восстановить файл {$originalFile} из {$backupFile}.\n";
}
?>
