<?php

use Illuminate\Support\Facades\Facade;

/**
 * SanitizeFacade
 *
 */ 
class ACLFacade extends Facade {
 
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'acl';
    }
 
}
