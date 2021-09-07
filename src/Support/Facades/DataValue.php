<?php

namespace Vespera\DataBinder\Support\Facades;

use Illuminate\Support\Facades\Facade;

class DataValue extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Vespera\DataBinder\DataValue::class;
    }
}
