<?php
namespace Project\Models;
use Core\Model;

class Page extends Model
{
    public function getById($id)
    {
        return $this->findOne("SELECT * FROM pages WHERE id=$id");
    }
    
    public function getByRange($from, $to)
    {
        return $this->findMany("SELECT * FROM pages WHERE id>=$from AND id<=$to");
    }
    
    public function getAll()
    {
        return $this->findMany("SELECT id, title FROM pages ORDER BY id");
    }
    
    public function getAllFull()
    {
        return $this->findMany("SELECT * FROM pages ORDER BY id");
    }
    
    public function searchByTitle($search)
    {
        $search = '%' . $search . '%';
        return $this->findMany("SELECT * FROM pages WHERE title LIKE '$search'");
    }
    
    public function getCount()
    {
        $result = $this->findOne("SELECT COUNT(*) as count FROM pages");
        return $result ? (int)$result['count'] : 0;
    }
}