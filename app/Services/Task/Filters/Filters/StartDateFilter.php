<?php

namespace App\Services\Task\Filters\Filters;

use App\Services\Task\Filters\Filter;
use Carbon\Carbon;

class StartDateFilter extends Filter
{
    public function apply($query, $value)
    {
        if ($value) {
            $value = Carbon::parse($value);
            return $query->where('updated_at', '>=', $value);
        }

        return $this->next ? $this->next->apply($query, $value) : $query;
    }
}