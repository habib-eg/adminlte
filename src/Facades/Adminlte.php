<?php

namespace Habib\Adminlte\Facades;

use Illuminate\Support\Facades\Facade;

class Adminlte extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'adminlte';
    }
}
