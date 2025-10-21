<?php
namespace MVC\Models;

class Users
{
    public $collection;

    public function __construct(public ?array $users = null)
    {
        $users ??= [
            new User(
                 'dmitry.koterov@gmail.com',
                 'password',
                 'Дмитрий',
                 'Котеров'),
            new User(
                 'igorsimdyanov@gmail.com',
                 'password',
                 'Игорь',
                 'Симдянов'),
            new User(
                 'mehsfpaa@gmail.com',
                 'notpassword',
                 'Пётр',
                 'Петров'),
            new User(
                 'ivanivanov@gmail.com',
                 'ivanooov',
                 'Иван',
                 'Иванов'),
            new User(
                 'iamasinger@gmail.com',
                 'naturalblondie',
                 'Николай',
                 'Басков')
        ];
        $this->collection = $users;
    }
}
