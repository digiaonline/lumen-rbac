<?php namespace Nord\Lumen\Rbac\Contracts;

use Crisu83\Overseer\Entity\Assignment;
use Crisu83\Overseer\Entity\Permission;
use Crisu83\Overseer\Entity\Resource;
use Crisu83\Overseer\Entity\Role;
use Crisu83\Overseer\Entity\Subject;

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


    /**
     * @param string        $permissionName
     * @param Subject       $subject
     * @param Resource|null $resource
     * @param array         $params
     *
     * @return mixed
     */
    public function subjectHasPermissions(
        $permissionName,
        Subject $subject,
        Resource $resource = null,
        array $params = []
    );


    /**
     * @param Role $role
     */
    public function saveRole(Role $role);


    /**
     * @param Permission $permission
     */
    public function savePermission(Permission $permission);


    /**
     * @param Subject $subject
     *
     * @return Role[]
     */
    public function getRolesForSubject(Subject $subject);


    /**
     * @param Subject $subject
     * @param array   $roles
     *
     * @return Assignment
     */
    public function createAssignment(Subject $subject, array $roles = []);


    /**
     * @param Subject $subject
     * @param array   $roles
     *
     * @return Assignment
     */
    public function updateAssignment(Subject $subject, array $roles);


    /**
     * @param Subject $subject
     *
     * @return Assignment
     */
    public function getAssignment(Subject $subject);


    /**
     * @param Subject $subject
     */
    public function deleteAssignment(Subject $subject);


    /**
     * @param SubjectProvider $provider
     */
    public function setSubjectProvider($provider);
}
