<?php
namespace Project\Models;
use Core\Model;

class Product extends Model
{
    public function getById($id)
    {
        return $this->findOne("SELECT * FROM products WHERE id=$id");
    }
 
    public function getAll()
    {
        return $this->findMany("SELECT * FROM products ORDER BY id");
    }
  
    public function getCount()
    {
        $result = $this->findOne("SELECT COUNT(*) as count FROM products");
        return $result ? (int)$result['count'] : 0;
    }
    
    public function getTotalValue()
    {
        $result = $this->findOne(
            "SELECT SUM(price) as total FROM products"
        );
        return $result ? (float)$result['total'] : 0.0;
    }
}