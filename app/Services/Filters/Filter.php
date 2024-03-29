<?php

namespace App\Services\Filters;

abstract class Filter
{
    protected $next;

    public function setNext(Filter $next): void
    {
        $this->next = $next;
    }

    abstract public function apply($query, $value);
}

