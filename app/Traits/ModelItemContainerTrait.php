<?
namespace App\Traits;

use App\Interfaces\ItemContainer;
use App\Models\Items\Item;

trait ModelItemContainerTrait
{
    public function items()
    {
        return $this
            ->morphToMany(
                Item::class,
                'item_container'
            )
            ->withPivot(
                [
                    'equipped',
                    'quantity',
                    'name',
                ]
            );
    }

    public function give(
        Item $item,
        int $quantity = 1
    ): void {
        $existing_item = $this
            ->items()
            ->where('code', $item->code)
            ->first();

        if ($existing_item) {
            $this
                ->items()
                ->updateExistingPivot(
                    $existing_item,
                    [
                        'quantity' => $existing_item->quantity + $quantity,
                    ]
                );
        } else {
            $this
                ->items()
                ->attach(
                    $item,
                    [
                        'quantity' => $quantity,
                    ]
                );
        }
    }

    public function take(
        Item $item,
        int $quantity = 1
    ): void {
        $existing_item = $this
            ->items()
            ->findByCodeFail($item->code);

        $new_quantity = $existing_item->quantity - $quantity;

        if ($new_quantity > 1) {
            $this
                ->items()
                ->updateExistingPivot(
                    $existing_item,
                    [
                        'quantity' => $new_quantity,
                    ]
                );
        } else {
            $this
                ->items()
                ->detach($existing_item);
        }
    }

    public function giveTo(
        Item $item,
        ItemContainer $container,
        int $quantity = 1
    ): void {
        $this->take(
            $item,
            $quantity
        );

        $container->give(
            $item,
            $quantity
        );
    }

    public function takeFrom(
        Item $item,
        ItemContainer $container,
        int $quantity = 1
    ): void {
        $container->take(
            $item,
            $quantity
        );

        $this->give(
            $item,
            $quantity
        );
    }

    public function takeAll(
        Item $item
    ): void {
        $this->take(
            $item,
            $item->quantity
        );
    }
}
