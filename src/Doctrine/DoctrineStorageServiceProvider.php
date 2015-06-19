<?php namespace Nord\Lumen\Rbac\Doctrine;

use Crisu83\Overseer\Doctrine\Storage\AssignmentStorage;
use Crisu83\Overseer\Doctrine\Storage\PermissionStorage;
use Crisu83\Overseer\Doctrine\Storage\RoleStorage;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class DoctrineStorageServiceProvider extends ServiceProvider
{

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->registerContainerBindings($this->app);
    }


    /**
     * @param Container $container
     */
    protected function registerContainerBindings(Container $container)
    {
        $entityManager = $container->make('Doctrine\ORM\EntityManagerInterface');

        $container->bind('Crisu83\Overseer\Storage\RoleStorage', function () use ($entityManager) {
            return new RoleStorage($entityManager);
        });

        $container->bind('Crisu83\Overseer\Storage\PermissionStorage', function () use ($entityManager) {
            return new PermissionStorage($entityManager);
        });

        $container->bind('Crisu83\Overseer\Storage\AssignmentStorage', function () use ($entityManager) {
            return new AssignmentStorage($entityManager);
        });
    }
}
