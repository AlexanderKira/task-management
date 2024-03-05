<?php

namespace App\Services\Task\Filters;

use App\Services\Task\Filters\Filters\EndDateFilter;
use App\Services\Task\Filters\Filters\StartDateFilter;
use App\Services\Task\Filters\Filters\StatusFilter;
use App\Services\Task\Filters\Filters\TitleFilter;
use Illuminate\Database\Eloquent\Builder;

class FilterManager
{
    protected $filters = [];

    public function __construct()
    {
        $this->filters = [
            'title' => new TitleFilter(),
            'status' => new StatusFilter(),
            'start_date' => new StartDateFilter(),
            'end_date' => new EndDateFilter(),
        ];
    }

    public function apply($query, array $filters): Builder
    {
        foreach ($filters as $filter => $value) {
            if ($value) {
                $this->filters[$filter]->apply($query, $value);
            }
        }

        return $query;
    }
}
