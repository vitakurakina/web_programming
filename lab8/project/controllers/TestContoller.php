<?php
namespace Project\Controllers;

use Core\Controller;

class TestController extends Controller
{
    public function act1()
    {
        $this->title = 'Действие act1 контроллера Test';
        
        return $this->render('test/act1', [
            'message' => 'Это действие act1!',
            'description' => 'Первое тестовое действие контроллера TestController',
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }
    
    public function act2()
    {
        $this->title = 'Действие act2 контроллера Test';
        
        return $this->render('test/act2', [
            'message' => 'Это действие act2!',
            'description' => 'Второе тестовое действие контроллера TestController',
            'items' => ['Элемент 1', 'Элемент 2', 'Элемент 3'],
            'counter' => 42
        ]);
    }
    
    public function act3()
    {
        $this->title = 'Действие act3 контроллера Test';
        
        return $this->render('test/act3', [
            'message' => 'Это действие act3!',
            'description' => 'Третье тестовое действие контроллера TestController',
            'data' => [
                'framework' => 'MVC',
                'language' => 'PHP',
                'version' => '8.0+',
                'features' => ['Роутинг', 'Контроллеры', 'Представления', 'Модели']
            ]
        ]);
    }
}