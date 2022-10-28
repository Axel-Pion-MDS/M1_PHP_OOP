<?php

use JetBrains\PhpStorm\Pure;

class Payable
{
    public function __construct(private int $tax, private int $price) {}

    public function label(): string
    {
        return "You have to pay: " .
            round($this->TaxRatePerTenThousand() / 100, 2) .
            " € including taxes";
    }

    #[Pure]
    public function cost(): int
    {
        return $this->taxRatePerTenThousand();
    }

    #[Pure]
    public function taxRatePerTenThousand(): int
    {
        $cost = $this->price;
        return ((($this->tax * $cost) / 100) + $cost);
    }
}
