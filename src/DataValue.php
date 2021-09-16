<?php

namespace Vespera\DataBinder;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class DataValue
{
    protected $binder;

    public function __construct(DataBinder $binder)
    {
        $this->binder = $binder;
    }

    public function get(string $name, $bind = null)
    {
        if ($bind === false) {
            return null;
        }

        $bind = $bind ?: $this->binder->last();

        $name = Str::dot($name);
        $value = data_get($bind, $name);

        return ($value instanceof Collection)
            ? $value->modelKeys()
            : $value;
    }
}
