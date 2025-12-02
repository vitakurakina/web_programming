<?php
$file = 'NewsDB.class.php';

$contents = file_get_contents($file);

$contents = str_replace(
    "INSERT INTO category(id, name) VALUES (1, 'Политика'",
    "INSERT INTO category(id, name) VALUES (1, 'Политика')", 
    $contents
);

file_put_contents($file, $contents);

echo "Ошибка в файле NewsDB.class.php исправлена.\n";
?>