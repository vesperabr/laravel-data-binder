<?php

namespace Vespera\DataBinder;

use Illuminate\Support\Arr;

class DataBinder
{
    /**
     * Tree of bound data.
     */
    private $bindings = [];

    /**
     * Append some data to the binding tree.
     */
    public function bind($data): void
    {
        $this->bindings[] = $data;
    }

    /**
     * Remove the last binding data.
     *
     * @return void
     */
    public function pop(): void
    {
        array_pop($this->bindings);
    }

    /**
     * Get the latest bound data.
     */
    public function last()
    {
        return Arr::last($this->bindings);
    }
}
