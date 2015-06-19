<?php namespace Nord\Lumen\Rbac\Console;

use Exception;
use Symfony\Component\Console\Input\InputOption;

class ConfigureCommand extends RbacCommand
{

    /**
     * @var string
     */
    protected $name = 'rbac:configure';

    /**
     * @var string
     */
    protected $description = 'Configures the RBAC service from a file.';

    /**
     * @inheritdoc
     */
    public function fire()
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

        $this->getRbacService()->configure($config);
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['config', null, InputOption::VALUE_REQUIRED, 'Configuration file path', null],
        ];
    }
}
