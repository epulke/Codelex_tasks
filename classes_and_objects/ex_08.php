<?php

class SavingsAccount {
    private float $balance;
    private int $interestRate;
    private ?float $interestEarned = 0;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance; // todo kāpēc šeit izmantojot number_format rādās non well formed numeric values
    }

    public function setInterestRate(int $interestRate): void
    {
        $this->interestRate = $interestRate;
    }


    public function withdrawal(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function calculatedInterestEarned(): void
    {
        $this->interestEarned += $this->balance * $this->interestRate/100/12;
    }


    public function getInterestEarned(): float
    {
        return number_format($this->interestEarned, 2);   // todo kāpēc šeit izmantojot number_format rādās non well formed numeric values
    }

    public function interestMonthlyAdded(): void
    {
        $this->balance += $this->balance * $this->interestRate/100/12;
    }
}

$accountBalance = (float) readline("How much money is in the account? ");
$interest = (int) readline("Enter the annual interest rate in percentage: ");
$period = (int) readline("How many months was the account opened? ");

$account = new SavingsAccount($accountBalance);
$account->setInterestRate($interest);

$totalDeposited = 0;
$totalWithdrawn = 0;

for ($i = 1; $i <= $period; $i++)
{
    $deposit = (int) readline("Enter amount deposited for month $i: ");
    $account->deposit($deposit);
    $totalDeposited += $deposit;
    $withdrawal = (int) readline("Enter amount withdrawn for month $i: ");
    $account->withdrawal($withdrawal);
    $totalWithdrawn += $withdrawal;
    $account->calculatedInterestEarned();
    $account->interestMonthlyAdded();
}

echo "Total deposited: $" . number_format($totalDeposited, 2) . PHP_EOL;
echo "Total withdrawn: $" . number_format($totalWithdrawn, 2) . PHP_EOL;
echo "Interest earned: $" . $account->getInterestEarned() . PHP_EOL;
echo "Ending balance: $" . $account->getBalance();