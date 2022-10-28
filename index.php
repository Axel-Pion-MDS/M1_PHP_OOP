<?php

require_once 'Model/Item.php';
require_once 'Model/FreshItem.php';
require_once 'Model/ShoppingCart.php';
require_once 'Model/Payable.php';
require_once 'Model/Ticket.php';
require_once 'Model/Invoice.php';

# EXERCICE 1
$item = new Item("Corn flakes", 500);
//var_dump($item->getPrice());
//var_dump($item->getName());
//var_dump($item->toString());
//
//$chewingGum = new Item("Chewing gum", 403);
//var_dump($chewingGum->toString());

# EXERCICE 2

//$cart = new ShoppingCart();
//$cartId = $cart->getId();
//var_dump($cartId);
//$cart->addItem("SD card", 500, 7000);
//var_dump($cart->getWeight());

# EXERCICE 3
//$cart->addItem("Concombre", 100, 3000, '2022-10-20');
//var_dump($cart->toString());
//var_dump($cart->totalPrice());

//$cart2 = new ShoppingCart();
//var_dump($cart2->getId());


# EXERCICE 4
$ticket = new Ticket("RGBY17032012 - Walles-France", 9000);
//var_dump($ticket->getPrice());
//var_dump($ticket->getReference());

$ticket2 = new Ticket("blbbl", 2000);
$invoice = new Invoice();
$invoice->add($ticket);
$invoice->add($ticket2);
$invoice->add($item);

$item2 = new FreshItem("Concombre", 1000, 3000, '2022-10-20');

var_dump($item2->taxRatePerTenThousand());
