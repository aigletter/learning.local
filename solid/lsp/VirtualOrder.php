<?php

namespace solid\lsp;

class VirtualOrder extends Order
{
    protected $email;

    public function getEmail()
    {
        return $this->email;
    }

    public function calculateSize()
    {
        //throw new \Exception('Этот метод не имеет смысла у виртуального заказа. Не вызывайте его');
        return 0;
    }
}