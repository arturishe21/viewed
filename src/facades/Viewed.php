<?php namespace Vis\Viewed\Facades;

use Illuminate\Support\Facades\Facade;

class Viewed extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'viewed'; }

}