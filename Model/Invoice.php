<?php

class Invoice
{
    private array $listOfItemsToPay = [];
    public function __construct() {}

    public function add(Payable $payable): array
    {
        $this->listOfItemsToPay[] = $payable;

        return $this->listOfItemsToPay;
    }
}
