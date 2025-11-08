<?php
declare(strict_types=1);

namespace lab1\Classes;

class User extends AbstractUser{
    public static int $userCount = 0;
    
    public function __construct(string $name, string $login, string $password)
    {
        parent::__construct($name, $login, $password);
        echo "User {$this->login} has been created.<br>";
        self::$userCount++;
    }

    public function showInfo():string
    {
        return "User's name: {$this->name}<br>"
             . "User's login: {$this->login}<br>"
             . "User's password: {$this->password}<br>";
    }

    public function setPassword(string $password):void
    {
        $this->password = $password;
    }

        public function __destruct()
    {
        echo "User ", $this->login, " has been deleted.<br>";
    }
}

?>