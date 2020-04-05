<?
namespace App\Interfaces;

use App\Models\Items\Item;

interface ItemContainer
{
    public function give(
        Item $item,
        int $quantity = 1
    ): void;

    public function take(
        Item $item,
        int $quantity = 1
    ): void;

    public function giveTo(
        Item $item,
        ItemContainer $container,
        int $quantity = 1
    ): void;

    public function takeFrom(
        Item $item,
        ItemContainer $container,
        int $quantity = 1
    ): void;

    public function takeAll(
        Item $item
    ): void;
}
