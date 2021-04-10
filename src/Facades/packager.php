<?php

namespace splittlogic\packager\Facades;

use Illuminate\Support\Facades\Facade;

class packager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'packager';
    }
}
