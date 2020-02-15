<?
namespace App\Traits;

trait FilterableTrait
{
    /**
     * to use this trait, define a public property
     * $filterable_fields = [
     *  'alignment' => 'code',
     *  'size' => 'name',
     * ];
     *
     * when given a filter option with the key 'alignment' this will search
     * for records where 'alignment.code' = $value
     */

    public function scopeFilter($query, $filter_options)
    {
        foreach ($filter_options as $relation => $value) {
            if (isset($this->filterable_fields[$relation])) {
                $filter_field = $this->filterable_fields[$relation];

                $query->whereHas(
                    $relation,
                    function ($query) use ($filter_field, $value) {
                        $query->where(
                            $filter_field,
                            $value
                        );
                    }
                );

            }
        }
        return $query;
    }

}