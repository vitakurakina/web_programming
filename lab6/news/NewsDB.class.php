<?php
require_once 'INewsDB.class.php';

class NewsDB implements INewsDB, IteratorAggregate
{
    const DB_NAME = 'news.db';
    private $_db;
    private $items = [];

    public function __construct()
{
    $dbExists = file_exists(self::DB_NAME) && filesize(self::DB_NAME) > 0;

    try {
        $this->_db = new PDO('sqlite:' . self::DB_NAME);
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (!$dbExists) {
            $this->_db->beginTransaction();

            $this->_db->exec("
                CREATE TABLE msgs(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT,
                    category INTEGER,
                    description TEXT,
                    source TEXT,
                    datetime INTEGER
                )
            ");
            $this->_db->exec("
                CREATE TABLE category(
                    id INTEGER PRIMARY KEY,
                    name TEXT
                )
            ");

                $this->_db->exec("INSERT INTO category(id, name) VALUES (1, 'Политика')");
                $this->_db->exec("INSERT INTO category(id, name) VALUES (2, 'Культура')");
                $this->_db->exec("INSERT INTO category(id, name) VALUES (3, 'Спорт')");

            $this->_db->commit();
        }

        $this->getCategories();

    } catch (PDOException $e) {

        if ($this->_db && $this->_db->inTransaction()) {
            $this->_db->rollBack();
        }
        die("Ошибка создания базы данных: " . $e->getMessage());
    }
}

    public function __destruct(){
        $this->_db = null;
    }

    protected function getDb(){
        return $this->_db;
    }
    
    private function getCategories(): void{
        try {
            $stmt = $this->_db->query("SELECT idx, name FROM category");
            $this->items = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->items[$row['id']] = $row['name'];
            }
        } catch (PDOException $e) {
            $this->items = [];
        }
    }

    public function saveNews($title, $category, $description, $source){
        try {
            $stmt = $this->_db->prepare("
                INSERT INTO msgs (title, category, description, source, datetime) 
                VALUES (:title, :category, :description, :source, :datetime)
            ");
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':category', (int)$category, PDO::PARAM_INT);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':source', $source, PDO::PARAM_STR);
            $stmt->bindValue(':datetime', time(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getNews(){
        try {
            $query = "
                SELECT msgs.id as id, title, category.name as category, description, source, datetime
                FROM msgs 
                LEFT JOIN category ON category.id = msgs.category
                ORDER BY msgs.id DESC
            ";
            $stmt = $this->_db->query($query);
            $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $news ?: [];
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteNews($id)
    {
        try {
            $stmtCheck = $this->_db->prepare("SELECT COUNT(*) as count FROM msgs WHERE id = :id");
            $stmtCheck->bindValue(':id', (int)$id, PDO::PARAM_INT);
            $stmtCheck->execute();
            $row = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if ($row['count'] == 0) {
                return false;
            }

            $stmtDelete = $this->_db->prepare("DELETE FROM msgs WHERE id = :id");
            $stmtDelete->bindValue(':id', (int)$id, PDO::PARAM_INT);
            $stmtDelete->execute();

            return $stmtDelete->rowCount() === 1;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}
