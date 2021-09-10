<?php

class BankAccount
{
    private string $user;
    private float $balance;

    public function __construct(string $user, float $balance)
    {
        $this->user = $user;
        $this->balance = $balance;
    }

    public function showUserNameAndBalance(): string
    {
        return $this->user . ", $" . number_format($this->balance, 2);
    }
}

$benson = new BankAccount("Benson", 17.5);

echo $benson->showUserNameAndBalance();