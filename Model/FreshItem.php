<?php

class FreshItem extends Item
{
    private string $bestBeforeDate;

    public function __construct(
        string $name,
        int $price,
        int $weight,
        string $bestBeforeDate
    )
    {
        $toKg = $weight / 1000;
        $tax = $toKg > 1 ? $toKg * 0.1 : 0;
        $resultTax = ($price * ($tax) / 100);
        parent::__construct($name, $price, $weight, round($resultTax, 0));
        if ($this->dateVerification($bestBeforeDate) === True) {
            $this->bestBeforeDate = $bestBeforeDate;
        } else {
            throw new Error('Invalid date');
        }
    }

    public function dateVerification(string $date): bool
    {
        $regex = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
        return preg_match($regex, $date);
    }

    public function getBestBeforeDate(): string
    {
        return $this->bestBeforeDate;
    }

    public function toString(): string
    {
        return $this->bestBeforeDate . " - " . parent::toString();
    }
}
