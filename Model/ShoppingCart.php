<?php

use JetBrains\PhpStorm\Pure;

require_once 'Item.php';
require_once 'FreshItem.php';

class ShoppingCart
{
    private int $id;
    private array $cart = [];
    private int $cartWeight = 0;

    #[Pure]
    public function __construct() {
        if (!isset($GLOBALS['idShoppingCart'])) {
            $GLOBALS['idShoppingCart'] = 1 ;
        }else {
            ++$GLOBALS['idShoppingCart'];
        }

        $this->id = $GLOBALS['idShoppingCart'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @throws Exception
     */
    public function addItem(string $name, int $price, int $weight, string $bestBeforeDate = null): void
    {
        if (10000 !== $this->cartWeight) {
            if ($bestBeforeDate) {
                $this->cart[] = new FreshItem($name, $price, $weight, $bestBeforeDate);
            } else {
                $this->cart[] = new Item($name, $price, $weight);
            }

            $this->cartWeight += $weight;
        } else {
            throw new \RuntimeException("Cannot add more items in this cart.");
        }
    }

    public function deleteItem(int $key): bool
    {
        if (empty($this->cart[$key])) {
            return false;
        }

        array_splice($this->cart, $key, 1);

        return true;
    }

    public function getWeight(): int
    {
        return $this->cartWeight;
    }

    public function itemCount(): int
    {
        $count = 0;

        foreach ($this->cart as $item) {
           ++$count;
        }

        return $count;
    }

    /*
     * 0(n) -> Linear
     * We are just looping inside a single array of objects
     * So we just multiply by the number of items inside the array
     */
    public function totalPrice(): int
    {
        $total = 0;

        foreach ($this->cart as $item) {
            /** @var Item $item */
            $total += $item->getPrice();
        }

        return $total;
    }

    public function toString(): string {
        $items = '';
        $totalItems = $this->itemCount();
        foreach ($this->cart as $item) {
            $items .= $item->toString() . "\n";
        }

        return "Your cart contains $totalItems items:\n" . $items;
    }
}
