<?php

class Ticket extends Payable
{
    private int $price;
    private string $reference;

    public function __construct(string $reference, int $price)
    {
        parent::__construct(25, $price);
        $this->reference = $reference;
        $this->price = $price;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
