# Lumen RBAC

[![Code Climate](https://codeclimate.com/github/nordsoftware/lumen-rbac/badges/gpa.svg)](https://codeclimate.com/github/nordsoftware/lumen-rbac)
[![StyleCI](https://styleci.io/repos/37718430/shield?style=flat)](https://styleci.io/repos/37718430)
[![Latest Stable Version](https://poser.pugx.org/nordsoftware/lumen-rbac/version)](https://packagist.org/packages/nordsoftware/lumen-rbac)
[![Total Downloads](https://poser.pugx.org/nordsoftware/lumen-rbac/downloads)](https://packagist.org/packages/nordsoftware/lumen-rbac)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

RBAC module for the [Lumen PHP framework](http://lumen.laravel.com/) based on [Overseer](http://github.com/crisu83/overseer/).

## Requirements

- PHP 5.6 or newer

## Usage

### Installation

1. Run the following command to install the package through Composer:

```sh
composer require nordsoftware/lumen-rbac
```

2. Copy the configuration template in `config/rbac.php` to your application's `config` directory and modify according 
to your needs.

3. Add the following lines to your `bootstrap/app.php`:

```php
$app->register('Nord\Lumen\Rbac\Doctrine\DoctrineStorageServiceProvider');
$app->register('Nord\Lumen\Rbac\RbacServiceProvider');
```

You should now have a bunch of new Artisan commands available under the `doctrine` namespace. In your code, you can 
either inject `RbacService` or use the `Rbac` facade to access the service.

## Contributing

Please read the [guidelines](.github/CONTRIBUTING.md).

## License

MIT. See [LICENSE](LICENSE).
