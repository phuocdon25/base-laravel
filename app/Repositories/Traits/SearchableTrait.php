<?php

namespace App\Repositories\Traits;

/**
 * Trait Searchable
 */
trait SearchableTrait
{
    protected $searchableFields = [
        'id' => ['field' => 'id', 'operator' => '='],
        // 'name'    => ['field' => 'name', 'operator' => 'like', ],
        // 'ids'     => ['field' => 'id', 'operator' => 'in', ],
    ];

    /**
     * Search method
     *
     * @param  Builder|BaseRepository  $query
     * @param  Request  $request
     * @return Builder|BaseRepository
     */
    public function search()
    {
        $query = $this->query;
        $searchableFields = $this->getSearchableFields();
        $requestData = request()->all();
        foreach ($requestData as $key => $value) {
            if (array_key_exists($key, $searchableFields)) {
                $operator = $searchableFields[$key]['operator'];
                $field = $searchableFields[$key]['field'];

                $query = $this->apply($query, $field, $value, $operator);
            }
        }

        return $query;
    }

    /**
     * Get result after search
     *
     * @param  Builder|BaseRepository  $query
     * @param  Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchData($query, $request)
    {
        return $this->search($query, $request)->get();
    }

    /**
     * Handle Apply Search Condition
     *
     * @param  Builder|BaseRepository  $query
     * @param  string|array  $key
     * @param  mixed  $value
     * @param  string  $operator
     * @return Builder|BaseRepository
     */
    protected function apply($query, $key, $value, $operator)
    {
        switch ($operator) {
            case 'like':
                return $query->where($key, "%$value%", 'like');
            case '=':
                return $query->where($key, $value);
            case 'in':
                $items = explode(',', $value);

                return $query->whereIn($key, $items);
            default:
                return $query;
        }
    }

    /**
     * Get searchable fields
     *
     * @return array
     */
    protected function getSearchableFields()
    {
        return property_exists($this, 'searchableFields') ? $this->searchableFields : [];
    }
}
