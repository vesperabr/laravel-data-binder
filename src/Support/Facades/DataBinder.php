<?php

namespace Vespera\DataBinder\Support\Facades;

use Illuminate\Support\Facades\Facade;

class DataBinder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Vespera\DataBinder\DataBinder::class;
    }
}
