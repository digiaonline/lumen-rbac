<?php namespace Nord\Lumen\Rbac;

use Crisu83\Overseer\Entity\Assignment;
use Crisu83\Overseer\Entity\Permission;
use Crisu83\Overseer\Entity\Resource;
use Crisu83\Overseer\Entity\Role;
use Crisu83\Overseer\Overseer;
use Nord\Lumen\Rbac\Contracts\RbacService as RbacServiceContract;
use Nord\Lumen\Rbac\Contracts\SubjectProvider;

class RbacService implements RbacServiceContract
{

    /**
     * @var Overseer
     */
    private $overseer;

    /**
     * @var SubjectProvider
     */
    private $subjectProvider;


    /**
     * RbacService constructor.
     *
     * @param Overseer        $overseer
     * @param SubjectProvider $subjectProvider
     */
    public function __construct(Overseer $overseer, SubjectProvider $subjectProvider)
    {
        $this->overseer        = $overseer;
        $this->subjectProvider = $subjectProvider;
    }


    /**
     * @inheritdoc
     */
    public function configure(array $config)
    {
        $this->overseer->configure($config);
    }


    /**
     * @inheritdoc
     */
    public function getPermissions(Resource $resource = null, array $params = [])
    {
        $subject = $this->subjectProvider->getSubject();

        return $this->overseer->getPermissions($subject, $resource, $params);
    }


    /**
     * @inheritdoc
     */
    public function setSubjectProvider($provider)
    {
        $this->subjectProvider = $provider;
    }


    /**
     * @inheritdoc
     */
    public function hasPermissions($permissionName, Resource $resource = null, array $params = [])
    {
        $subject = $this->subjectProvider->getSubject();

        return $this->overseer->hasPermission($permissionName, $subject, $resource, $params);
    }


    /**
     * @inheritdoc
     */
    public function saveRole(Role $role)
    {
        $this->overseer->saveRole($role);
    }


    /**
     * @inheritdoc
     */
    public function savePermission(Permission $permission)
    {
        $this->overseer->savePermission($permission);
    }


    /**
     * @inheritdoc
     */
    public function saveAssignment(Assignment $assignment)
    {
        $this->overseer->saveAssignment($assignment);
    }
}
