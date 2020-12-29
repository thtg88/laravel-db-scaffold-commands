# Laravel DB Scaffold Commands

Create and drop a MySQL or PostgreSQL DB with the given Laravel Artisan commands.

## Installation

```bash
composer require thtg88/laravel-db-scaffold-commands
```

## Usage

### Create Database

```bash
php artisan db:create database_name
```

This will use the connection details specified in your `.env` file.

### Drop Database

```bash
php artisan db:drop
```

This will use the connection details specified in your `.env` file, including the database name.

## Development

Clone the repo

```bash
# clone the repo
$ git clone https://github.com/thtg88/laravel-db-scaffold-commands.git
```

Add `thhtg88/laravel-db-scaffold-commands` as a dependency of your API project in `composer.json`:
```
{
    ...
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-db-scaffold-commands"
        }
    ],
    "require": {
        ...
        "thtg88/laravel-db-scaffold-commands": "*"
    },
    ...
}
```

Next from your terminal run:

```bash
# Run composer update to bring in Laravel DB Scaffold Commands as dependancy
composer update
```

## Tests

Laravel DB Scaffold Commands uses [PHPUnit](https://github.com/sebastianbergmann/phpunit) for testing.

You can run the whole tests suite using:

```bash
composer run-script test

# or
composer test

# or
./vendor/bin/phpunit
```

## License

Laravel DB Scaffold Commands is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

