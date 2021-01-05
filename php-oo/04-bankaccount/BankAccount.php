<?php

class BankAccount
{

    //private static $id=1;
    private $number;
    private $owner;
    private $balance;
    private $overdraft;

    private static $accountNumbers = [];

    /* génération des comptes bancaires distincts

public function __construct($owner, $balance=0, $overdraft=0) {
    $this->number = self::$id;
    self::$id++;
    $this->owner=$owner;
    $this->balance=$balance;
    $this->overdraft=$overdraft;
}

*/

    public function __construct($owner, $balance = 0, $overdraft = 0)
    {

        $this->number = mt_rand(100000, 999999);

        while (in_array($this->number, self::$accountNumbers)) {
            $this->number = mt_rand(100000, 999999);
        }
        
        self::$accountNumbers[] = $this->number;

        $this->owner = $owner;
        $this->balance = $balance;
        $this->overdraft = $overdraft;

    }



    public function getNumber()
    {
        return $this->number;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getBalance()
    {
        return $this->balance;
    }
    public function depositMoney($credit)
    {

        if ($credit < 0) {
            echo 'You must deposit positive amount of money<br>';
            return;
        }

        $this->balance += $credit;

        return $this;
    }

    public function withdrawMoney($debit)
    {

        if ($debit <= 0) {
            echo 'You must withdraw positive amount of money<br>';
            return;
        }
        if ($this->balance - $debit < 0 - $this->overdraft) {
            echo 'You don\'t have enough money for this transaction<br>';
            return;
        }

        $this->balance -= $debit;

        return $this;
    }

    public function applyFees()
    {

        if ($this->balance < 0) {
            $this->balance = -$this->balance;
            $this->balance += 0.1 * $this->balance;
            $this->balance = -$this->balance;
        }

        return $this;
    }
}
