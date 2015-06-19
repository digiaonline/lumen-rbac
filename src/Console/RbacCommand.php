<?php namespace Nord\Lumen\Rbac\Console;

use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;
use Nord\Lumen\Rbac\Contracts\RbacService;

abstract class RbacCommand extends Command
{

    /**
     * @var RbacService
     */
    private $rbacService;

    /**
     * RbacCommand constructor.
     *
     * @param RbacService $rbacService
     */
    public function __construct(RbacService $rbacService)
    {
        parent::__construct();

        $this->rbacService = $rbacService;
    }

    /**
     * @return RbacService
     */
    protected function getRbacService()
    {
        return $this->rbacService;
    }
}
