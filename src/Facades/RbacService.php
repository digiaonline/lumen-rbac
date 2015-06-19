<?php namespace Nord\Lumen\Rbac\Facades;

use Illuminate\Support\Facades\Facade;

class RbacService extends Facade
{

    /**
     * @inheritdoc
     */
    protected static function getFacadeAccessor()
    {
        return 'Nord\Lumen\Rbac\RbacService';
    }
}
