<?
namespace App\Traits;

trait EnsureModelTrait
{
    public static function ensureId($value, string $code_field = 'code')
    {
        if (is_integer($value)) {
            return $value;
        }
        
        if (is_string($value)) {
            return static::select('id')
                ->firstWhere($code_field, $value)
                ->id;
        }
        
        if ($value instanceof static) {
            return $value->id;
        }
    }
}