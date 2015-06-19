<?php namespace Nord\Lumen\Rbac;

use Exception;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Nord\Lumen\Rbac\Facades\RbacService as RbacServiceFacade;

class RbacServiceProvider extends ServiceProvider
{

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->registerContainerBindings($this->app, $this->app['config']);
        $this->registerFacades();
        $this->registerConsoleCommands();
    }


    /**
     * @param Container        $container
     * @param ConfigRepository $config
     *
     * @throws Exception
     */
    protected function registerContainerBindings(Container $container, ConfigRepository $config)
    {
        if (!isset($config['rbac'])) {
            throw new Exception('RBAC configuration not registered.');
        }

        $rbacConfig = $config['rbac'];

        $container->alias('Nord\Lumen\Rbac\RbacService', 'Nord\Lumen\Rbac\Contracts\RbacService');
        $container->alias($rbacConfig['subjectProvider'], 'Nord\Lumen\Rbac\Contracts\SubjectProvider');

        $container->singleton('Nord\Lumen\Rbac\RbacService', function () use ($container) {
            return $this->createService($container);
        });
    }


    /**
     *
     */
    protected function registerFacades()
    {
        class_alias(RbacServiceFacade::class, 'Rbac');
    }


    /**
     *
     */
    protected function registerConsoleCommands()
    {
        $this->commands([
            'Nord\Lumen\Rbac\Console\ConfigureCommand',
        ]);
    }


    /**
     * @param Container $container
     *
     * @return RbacService
     */
    protected function createService(Container $container)
    {
        $overseer        = $container->make('Crisu83\Overseer\Overseer');
        $subjectProvider = $container->make('Nord\Lumen\Rbac\Contracts\SubjectProvider');

        return new RbacService($overseer, $subjectProvider);
    }
}
