<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance; // todo ja šeit lietoju number_format($this->balance, 2), tad met error non well formed numberic value
    }

    public function reportAccountData(): string
    {
        return "{$this->name} balance is {$this->getBalance()}." . PHP_EOL;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function transfer(float $amount, Account $to): void
    {
        $this->withdraw($amount);
        $to->deposit($amount);
    }
}

$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartosAccount->reportAccountData();
echo $bartosSwissAccount->reportAccountData();
echo "----------------------------------------------" . PHP_EOL;

$bartosAccount->withdraw(20.00);
echo "Barto's account balance is now: " . $bartosAccount->getBalance() . PHP_EOL;
$bartosSwissAccount->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartosSwissAccount->getBalance() . PHP_EOL;
echo "----------------------------------------------" . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartosAccount->reportAccountData();
echo $bartosSwissAccount->reportAccountData();
echo "----------------------------------------------" . PHP_EOL;

$mattAccount = new Account("Matt's account", 1000.00);
$myAccount = new Account("My account", 0);
$mattAccount->withdraw(100);
$myAccount->deposit(100);
echo $mattAccount->reportAccountData();
echo $myAccount->reportAccountData();
echo "----------------------------------------------" . PHP_EOL;

$accountA = new Account("Account A", 100);
$accountB = new Account("Account B", 0);
$accountC = new Account("Account C", 0);

$accountA->transfer(50, $accountB);
$accountB->transfer(25, $accountC);

echo $accountA->reportAccountData();
echo $accountB->reportAccountData();
echo $accountC->reportAccountData();