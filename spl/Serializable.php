<?php

function getOrders(string $name)
{
    return [
        new Order(1, 'First'),
        new Order(2, 'Second')
    ];
}

class Order
{
    public function __construct(protected int $id, protected string $name)
    {
    }
}

class User implements Serializable
{
    protected $name;

    protected $age;

    protected $password;

    protected $orders;

    public function __construct(string $name, int $age, string $password)
    {
        $this->name = $name;
        $this->age = $age;
        $this->password = $password;

        $this->orders = getOrders($this->name);
    }

    /*public function __construct(protected string $name, protected int $age, protected string $password)
    {
    }*/

    public function serialize()
    {
        return serialize([
            'name' => $this->name,
            'age' => $this->age,
            'password' => $this->password
        ]);
    }

    public function unserialize(string $data)
    {
        $unserialized = unserialize($data);
        $this->name = $unserialized['name'];
        $this->age = $unserialized['age'];
        $this->password = $unserialized['password'];

        $this->orders = getOrders($this->name);
    }
}

$user = new User('John', 22, '1234');

$serialized = serialize($user);

$unserialized = unserialize($serialized);

exit();