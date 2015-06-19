<?php namespace Nord\Lumen\Rbac\Contracts;

use Crisu83\Overseer\Entity\Resource;

interface RbacService
{

    /**
     * @param array $config
     *
     * @return mixed
     */
    public function configure(array $config);


    /**
     * @param Resource|null $resource
     * @param array         $params
     *
     * @return array
     */
    public function getPermissions(Resource $resource = null, array $params = []);

    /**
     * @param string        $permissionName
     * @param Resource|null $resource
     * @param array         $params
     *
     * @return bool
     */
    public function hasPermissions($permissionName, Resource $resource = null, array $params = []);
}
