<?php namespace Nord\Lumen\Rbac;

use Crisu83\Overseer\Entity\Assignment;
use Crisu83\Overseer\Entity\Permission;
use Crisu83\Overseer\Entity\Resource;
use Crisu83\Overseer\Entity\Role;
use Crisu83\Overseer\Entity\Subject;
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
    public function hasPermissions($permissionName, Resource $resource = null, array $params = [])
    {
        $subject = $this->subjectProvider->getSubject();

        return $this->overseer->hasPermission($permissionName, $subject, $resource, $params);
    }


    /**
     * @inheritdoc
     */
    public function subjectHasPermissions(
        $permissionName,
        Subject $subject,
        Resource $resource = null,
        array $params = []
    ) {
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
    public function getRolesForSubject(Subject $subject)
    {
        return $this->overseer->getRolesForSubject($subject);
    }


    /**
     * @inheritdoc
     */
    public function createAssignment(Subject $subject, array $roles = [])
    {
        $assignment = new Assignment($subject->getSubjectId(), $subject->getSubjectName(), $roles);

        $this->overseer->saveAssignment($assignment);

        return $assignment;
    }


    /**
     * @inheritdoc
     */
    public function updateAssignment(Subject $subject, array $roles)
    {
        $assignment = $this->overseer->getAssignment($subject->getSubjectId(), $subject->getSubjectName());

        if ($assignment instanceof Assignment) {
            $assignment->changeRoles($roles);
        } else {
            $assignment = $this->createAssignment($subject, $roles);
        }

        return $assignment;
    }


    /**
     * @inheritdoc
     */
    public function getAssignment(Subject $subject)
    {
        return $this->overseer->getAssignmentForSubject($subject);
    }


    /**
     * @inheritdoc
     */
    public function deleteAssignment(Subject $subject)
    {
        $assignment = $this->overseer->getAssignment($subject->getSubjectId(), $subject->getSubjectName());

        if ($assignment instanceof Assignment) {
            $this->overseer->deleteAssignment($assignment);
        }
    }


    /**
     * @inheritdoc
     */
    public function setSubjectProvider($provider)
    {
        $this->subjectProvider = $provider;
    }
}
