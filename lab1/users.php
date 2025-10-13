<?php
declare(strict_types=1);

use lab1\Classes\User;
use lab1\Classes\SuperUser;

spl_autoload_register(function ($class): void {
    $path = __DIR__ . '/' . str_replace('lab1\\Classes\\', 'Classes/', $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$user1 = new User("Name1", "Login1", "Password1");
$user2 = new User("Name2", "Login2", "Password2");
$user3 = new User("Name3", "Login3", "Password3");

$superUser = new SuperUser("Администратор", "admin", "admin123", "Administrator");

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    
    <h3>Users info</h3>
    
    <?php
    echo $user1->showInfo() ."</br>";
    echo $user2->showInfo() ."</br>";
    echo $user3->showInfo() ."</br>";
    echo $superUser->showInfo() ."</br>";
    print_r($superUser->getInfo()); echo "</br>";

    echo "</br>Total users: " . User::$userCount;
    echo "</br>Total super users: " . SuperUser::$superUserCount;
    ?>
    <h3>The end of users info</h3>
    
</body>
</html>