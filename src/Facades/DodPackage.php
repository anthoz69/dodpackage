<?php

namespace anthoz69\dodpackage\Facades;

use Illuminate\Support\Facades\Facade;

class DodPackage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dodpackage';
    }
}
