<?
namespace App\Traits;

trait SearchableTrait
{
    public $search_field = 'name';

    public function scopeSearch($query, $search_term)
    {
        return $query->where(
            $this->search_field,
            'like',
            "%$search_term%"
        );
    }

}