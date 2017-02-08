<?php namespace Nord\Lumen\Rbac;

use Exception;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Nord\Lumen\Rbac\Facades\RbacService as RbacServiceFacade;

class RbacServiceProvider extends ServiceProvider
{

    const CONFIG_KEY = 'rbac';

    /**
     * @inheritdoc
     */
    public function register()
    {
        // If RBAC haven't been configured yet, configure.
        if (!isset($this->app['config'][self::CONFIG_KEY])) {
            $this->app->configure(self::CONFIG_KEY);
        }

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
     * Register the Facade.
     */
    protected function registerFacades()
    {
        if (!class_exists('Rbac')) {
            class_alias(RbacServiceFacade::class, 'Rbac');
        }
    }


    /**
     * Register console commands.
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
