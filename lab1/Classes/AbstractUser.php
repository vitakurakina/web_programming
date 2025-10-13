<?php
declare(strict_types=1);

namespace lab1\Classes;

abstract class AbstractUser {
    public string $name;
    public string $login;
    protected string $password;

    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    abstract public function showInfo(): string;
}