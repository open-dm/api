<?
namespace App\Traits;

trait ModelFindByTrait
{
    public static function findBy(string $field, $value)
    {
        return static::where($field, $value)
            ->first();
    }

    public static function findByOrFail(string $field, $value)
    {
        return static::where($field, $value)
            ->firstOrFail();
    }

    public static function findByCode($value)
    {
        return static::findBy('code', $value);
    }

    public static function findByCodeOrFail($value)
    {
        return static::findByOrFail('code', $value);
    }
}
