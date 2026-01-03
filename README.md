# Nano ID Composer Plugin

<p>
<a href="https://packagist.org/packages/dllobell/nanoid-plugin"><img src="https://img.shields.io/packagist/dt/dllobell/nanoid-plugin" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/dllobell/nanoid-plugin"><img src="https://img.shields.io/packagist/v/dllobell/nanoid-plugin" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/dllobell/nanoid-plugin"><img src="https://img.shields.io/packagist/l/dllobell/nanoid-plugin" alt="License"></a>
<a href="https://php.net"><img src="https://img.shields.io/badge/PHP-8.4+-777BB4?logo=php" alt="PHP Minimum Version"></a>
</p>

A [Composer](https://getcomposer.org) plugin for the [dllobell/nanoid](https://github.com/dllobell/php-nanoid) package that automatically generates an `Alphabets` enum implementing the `AlphabetValue` interface.

## Installation

Install via Composer:

```bash
composer require dllobell/nanoid-plugin
```

## Usage

This plugin automatically generates an `Alphabets` enum whenever you run `composer install`, `update`, or `dump-autoload`.

For detailed information on how to use the generated alphabets and how to define your own custom sets in `composer.json`, please refer to the [Automatic generation](https://github.com/dllobell/php-nanoid#automatic-generation) section in the main package documentation.

### Manual Generation

You can also trigger the generation manually using the following command:

```bash
composer nanoid:generate-alphabets
```

## License

The MIT License (MIT). See the [license file](LICENSE) for more information.
