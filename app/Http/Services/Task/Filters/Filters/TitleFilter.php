<?php

namespace App\Http\Services\Task\Filters\Filters;

use App\Http\Services\Task\Filters\Filter;

class TitleFilter extends Filter
{
    public function apply($query, $value)
    {
        if ($value) {
            $query->where('title', 'like', "%$value%");
        }

        return $this->next ? $this->next->apply($query, $value) : $query;
    }
}
