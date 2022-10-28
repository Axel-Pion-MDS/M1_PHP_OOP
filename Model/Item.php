<?php

require_once 'Payable.php';

use JetBrains\PhpStorm\Pure;

Class Item extends Payable
{
    private string $name;
    private int $price;
    private int | null $weight;

    #[Pure]
    public function __construct(string $name, int $price, int $weight = null, int $tax = 25) {
        parent::__construct($tax, $price);
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function formatPrice(): string
    {
        $regex = '/\d*(?:\.)\d*/';
        if (preg_match($regex, $this->price / 100)) {
            return $this->price / 100;
        }

        return $this->price / 100 . '.00';
    }

    public function toString(): string
    {
        if ($this->weight) {
            return $this->name . ': ' . $this->formatPrice() . " €, " . $this->getWeight() . " grams";
        }
        return $this->name . ': ' . $this->formatPrice() . " €";
    }
}
