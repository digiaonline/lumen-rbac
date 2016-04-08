# Lumen RBAC

[![Code Climate](https://codeclimate.com/github/nordsoftware/lumen-rbac/badges/gpa.svg)](https://codeclimate.com/github/nordsoftware/lumen-rbac)

RBAC module for the [Lumen PHP framework](http://lumen.laravel.com/) based on [Overseer](http://github.com/crisu83/overseer/).

**Please note that this module is still under active development.**

## Requirements

- PHP 5.5.9 or newer
- [Composer](http://getcomposer.org)

## Usage

### Installation

Run the following command to install the package through Composer:

```sh
composer require nordsoftware/lumen-rbac
```

### Configure

Copy the configuration template in `config/rbac.php` to your application's `config` directory and modifying according to your needs. For more information see the [Configuration Files](http://lumen.laravel.com/docs/configuration#configuration-files) section in the Lumen documentation.

The available configurations are:

**TODO:** Write this

### Run Artisan

Run ```php artisan``` and you should see the new commands in the doctrine:* namespace section.

### Bootstrapping

Add the following lines to ```bootstrap/app.php```:

```php
$app->configure('rbac');
```

**Please note that we only support Doctrine for now, but we plan to add support for storing permissions also in memory and using Eloquent.**

```php
$app->register('Nord\Lumen\Rbac\Doctrine\DoctrineStorageServiceProvider');
$app->register('Nord\Lumen\Rbac\RbacServiceProvider');
```

You can now use the ```Rbac``` facade or inject the ```RbacService``` where needed.

## Contributing

Please read the [guidelines](.github/CONTRIBUTING.md).

## License

See [LICENSE](LICENSE).
