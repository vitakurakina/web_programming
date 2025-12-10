<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\Page;

class PageController extends Controller
{
    private $pages;

    public function __construct()
    {
        $this->pages = [
            1 => ['title'=>'страница 1', 'text'=>'текст страницы 1'],
            2 => ['title'=>'страница 2', 'text'=>'текст страницы 2'],
            3 => ['title'=>'страница 3', 'text'=>'текст страницы 3'],
        ];
    }
    
    public function showFromArray($params)
    {
        $id = (int)$params['id'];
        
        if (!isset($this->pages[$id])) {
            $this->title = 'Страница не найдена';
            return $this->render('page/show_array', [
                'error' => 'Страница с ID=' . $id . ' не найдена',
                'page' => null
            ]);
        }
        
        $page = $this->pages[$id];
        $this->title = $page['title'];
        
        return $this->render('page/show_array', [
            'page' => $page,
            'h1' => $this->title,
            'error' => null
        ]);
    }
    

    public function test()
    {
        $this->title = 'Тестирование модели Page';
        
        $page = new Page;
        
        $data1 = $page->getById(3);
        
        $data2 = $page->getById(5);
        
        $data3 = $page->getByRange(2, 5);
        
        return $this->render('page/test', [
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3
        ]);
    }
  
    public function one($params)
    {
        $id = (int)$params['id'];
        
        $page = (new Page)->getById($id);
        
        if (!$page) {
            $this->title = 'Страница не найдена';
            return $this->render('page/one', [
                'error' => 'Страница с ID=' . $id . ' не найдена в базе данных',
                'text' => null,
                'h1' => $this->title
            ]);
        }
        
        $this->title = $page['title'];
        
        return $this->render('page/one', [
            'text' => $page['text'],
            'h1' => $this->title,
            'error' => null
        ]);
    }
    
    public function all()
    {
        $this->title = 'Список всех страниц';
        
        $pages = (new Page)->getAll();
        
        return $this->render('page/all', [
            'pages' => $pages,
            'h1' => $this->title,
            'total' => count($pages)
        ]);
    }
}
