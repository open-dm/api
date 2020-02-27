<?
namespace App\Traits;

use App\Models\Items\Item;

trait ItemsTrait
{
    public static function addItem(
        Item $item,
        int $quantity = 1
    ) {
        dd('Add Item', $item, $quantity);
    }

    public static function removeItem(
        Item $item,
        int $quantity = 1
    ) {
        dd('Remove Item', $item, $quantity);
    }
}
