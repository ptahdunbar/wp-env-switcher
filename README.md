# WP Env Switcher

A WordPress plugin that allows you to switch between different environments from the admin bar.

![WP Env Switcher](https://camo.githubusercontent.com/533672dbb6044c494f5dea049452fd4e4ac977b5/68747470733a2f2f726f6f74732e696f2f6170702f75706c6f6164732f706c7567696e2d73746167652d73776974636865722d383030783435302e706e67)

## Requirements

You'll need to have `WP_ENVIRONMENTS` and `WP_ENV` defined in your WordPress config.

The `ENVIRONMENTS` constant must be a serialized array of `'environment' => 'url'` elements:

```php
$envs = array(
  'development' => 'http://example.dev',
  'staging'     => 'http://staging.example.com',
  'production'  => 'http://example.com'
);
define('ENVIRONMENTS', serialize($envs));
```

`WP_ENV` must be defined as the current environment:

```php
define('WP_ENV', 'development');
```

## Installation

If you're using Composer to manage WordPress, add wp-env-switcher to your project's dependencies. Run:

```sh
composer require ptahdunbar/wp-env-switcher 1.0
```

Or manually add it to your `composer.json`:

```json
"require": {
  "php": ">=5.3.0",
  "wordpress": "3.8",
  "ptahdunbar/wp-env-switcher": "1.0"
}
```

## Support

Create a new issue on Github.
