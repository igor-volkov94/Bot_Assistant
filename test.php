<?php
class User
{
    public $name;
    public $age;

    public function show()
    {
        return $this->name; // вернем имя из свойства
    }
}

$user = new User; // создаем объект класса
$user->name = 'john'; // записываем имя
$user->age = 25; // записываем возраст

// Вызываем наш метод:
echo $user->show(); // выведет 'john'