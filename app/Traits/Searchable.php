<?php

namespace App\Traits;

trait Searchable
{
    public function applySearch($query, array $searchableFields)
    {
        if (request()->has('search')) {
            $search = request('search');

            return $query->where(function ($subquery) use ($searchableFields, $search) {
                foreach ($searchableFields as $field) {
                    $subquery->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        return $query;
    }
}
