<?php
require_once 'INewsDB.class.php';

class NewsDB implements INewsDB {
    const DB_NAME = 'news.db';
    private $_db;

    protected function getDb() {
        return $this->_db;
    }

    public function __construct() {
        $dbExists = file_exists(self::DB_NAME);
        $this->_db = new SQLite3(self::DB_NAME);

        if (!$dbExists) {
            $sqlFile = __DIR__ . '/news.txt';
            if (!file_exists($sqlFile)) {
                die("Файл news.txt не найден!");
            }

            // Читаем файл построчно, пропускаем комментарии
            $content = file($sqlFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $queries = [];
            $current = '';

            foreach ($content as $line) {
                $line = trim($line);
                // Пропускаем строки с комментариями (#, ### и т.п.)
                if ($line === '' || $line[0] === '#') continue;

                $current .= $line . "\n";
                if (strpos($line, ';') !== false) {
                    $queries[] = $current;
                    $current = '';
                }
            }

            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    $ok = $this->_db->exec($query);
                    if (!$ok) {
                        echo "<b>Ошибка SQL:</b> " . $this->_db->lastErrorMsg() . "<br>";
                        echo "<pre>$query</pre><hr>";
                    }
                }
            }
        }
    }


    public function __destruct() {
        $this->_db->close();
        unset($this->_db);
    }

    public function saveNews($title, $category, $description, $source) {
        $stmt = $this->_db->prepare('INSERT INTO msgs (title, category, description, source, datetime)
                                     VALUES (:title, :category, :description, :source, :datetime)');
        $stmt->bindValue(':title', $title, SQLITE3_TEXT);
        $stmt->bindValue(':category', $category, SQLITE3_INTEGER);
        $stmt->bindValue(':description', $description, SQLITE3_TEXT);
        $stmt->bindValue(':source', $source, SQLITE3_TEXT);
        $stmt->bindValue(':datetime', time(), SQLITE3_INTEGER);
        return $stmt->execute() ? true : false;
    }

    public function getNews() {
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime
                FROM msgs INNER JOIN category ON msgs.category = category.id
                ORDER BY msgs.id DESC";
        $result = $this->_db->query($sql);
        $news = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $news[] = $row;
        }
        return $news;
    }

    public function deleteNews($id) {
        $stmt = $this->_db->prepare('DELETE FROM msgs WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        return $stmt->execute() ? true : false;
    }
}
$news = new NewsDB();
?>
