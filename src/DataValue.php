<?php

namespace Vespera\DataBinder;

use Illuminate\Database\Eloquent\Collection;

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

        $value = data_get($bind, $name);

        return ($value instanceof Collection)
            ? $value->modelKeys()
            : $value;
    }
}
