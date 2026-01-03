# Nano ID Composer Plugin



A [Composer](https://getcomposer.org) plugin for the [dllobell/nanoid](https://github.com/dllobell/php-nanoid) package that automatically generates an `Alphabets` string-backed enum.

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