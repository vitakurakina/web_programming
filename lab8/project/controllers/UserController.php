<?php
namespace Project\Controllers;

use Core\Controller;

class UserController extends Controller
{
    private $users;
    
    public function __construct()
    {
        $this->users = [
            1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
            2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
            3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
            4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
            5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
        ];
    }
    
    public function show($params)
    {
        $id = (int)$params['id'];
        
        if (!isset($this->users[$id])) {
            $this->title = 'Пользователь не найден';
            return $this->render('user/show', [
                'error' => 'Пользователь с ID=' . $id . ' не найден',
                'user' => null
            ]);
        }
        
        $user = $this->users[$id];
        $this->title = 'Информация о пользователе ' . $user['name'];
        
        return $this->render('user/show', [
            'id' => $id,
            'user' => $user,
            'error' => null
        ]);
    }
    
    public function info($params)
    {
        $id = (int)$params['id'];
        $key = $params['key'];
        
        if (!isset($this->users[$id])) {
            $this->title = 'Пользователь не найден';
            return $this->render('user/info', [
                'error' => 'Пользователь с ID=' . $id . ' не найден',
                'value' => null,
                'key' => $key
            ]);
        }
        
        if (!isset($this->users[$id][$key])) {
            $this->title = 'Поле не найдено';
            return $this->render('user/info', [
                'error' => "Поле '$key' не существует. Доступные поля: name, age, salary",
                'value' => null,
                'key' => $key
            ]);
        }
        
        $value = $this->users[$id][$key];
        $this->title = ucfirst($key) . ' пользователя ' . $this->users[$id]['name'];
        
        return $this->render('user/info', [
            'id' => $id,
            'key' => $key,
            'value' => $value,
            'user' => $this->users[$id],
            'error' => null
        ]);
    }
    
    public function all()
    {
        $this->title = 'Список всех пользователей';
        
        return $this->render('user/all', [
            'users' => $this->users,
            'total' => count($this->users)
        ]);
    }
    
    public function first($params)
    {
        $n = (int)$params['n'];
        
        if ($n > count($this->users)) {
            $n = count($this->users);
        }
        
        $firstUsers = array_slice($this->users, 0, $n, true);
        
        $this->title = "Первые $n пользователей";
        
        return $this->render('user/first', [
            'users' => $firstUsers,
            'n' => $n,
            'total' => count($this->users)
        ]);
    }
}