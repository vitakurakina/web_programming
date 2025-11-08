<?php
declare(strict_types=1);

namespace lab1\Classes;

class SuperUser extends User implements SuperUserInterface {
    public $role;
    public static $superUserCount = 0;

    public function __construct(string $name, string $login, string $password, string $role)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this ->role = $role;
        self::$superUserCount++;
    }

    public function showInfo():string
    {
        return parent::showInfo() . "User's role: {$this->role}<br>";
    }

    public function getInfo(): array
    {
        return get_object_vars($this);
    }
}

?>