<?php namespace Nord\Lumen\Rbac\Console;

use Exception;
use Illuminate\Console\Command;
use Nord\Lumen\Rbac\RbacService;

class ConfigureCommand extends Command
{

    /**
     * @inheritdoc
     */
    protected $signature = 'rbac:configure {--config= : Configuration file path.}';

    /**
     * @inheritdoc
     */
    protected $description = 'Configures the RBAC service from a file.';

    /**
     * Run the command.
     */
    public function handle()
    {
        $config = $this->option('config');

        if (!$config) {
            throw new Exception('Config option is required.');
        }

        $configPath = realpath($config);

        if (!file_exists($configPath)) {
            throw new Exception('Configuration file not found.');
        }

        $config = require($configPath);

        $this->info(sprintf('Configuring with file "%s".', $configPath));
        $this->getRbacService()->configure($config);
        $this->info('Configuration done.');
    }

    /**
     * @return RbacService
     */
    private function getRbacService()
    {
        return app(RbacService::class);
    }
}
