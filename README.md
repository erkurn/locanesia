# Locanesia

- [About](#about)
- [Requirements](#requirements)
- [Installation Instructions](#installation-instructions)
- [Basic Usage](#basic-usage)
- [License](#license)

### About

Laravel Package to populate and searching indonesia locations. From Provinces To Villages. Data Scraped from http://www.nomor.net/

### Requirements
* [Laravel 5.5+](https://laravel.com/docs/installation)
* MySQL 5.6+ if using InnoDB

### Installation Instructions
1. From your projects root folder in terminal run:

    ```bash
        composer require rezzakurniawan/locanesia
    ```

2. Register the package

    * Laravel 5.5 and up
    Uses package auto discovery feature, no need to edit the `config/app.php` file.

    * Laravel 5.4 and below
    Register the package with laravel in `config/app.php` under `providers` and `aliases` with the following:

    ```php
        'providers' => [
        ...
            rezzakurniawan\Locanesia\LocanesiaServiceProvider::class,
        ];

        'aliases' => [
        ...
           'Locanesia' => rezzakurniawan\Locanesia\LocanesiaFacade::class,
        ];
    ```

3. Migrate Database & Seed Database
    ```bash
        php artisan migrate && php artisan db:seed --class=rezzakurniawan\\Locanesia\\Database\\Seed\\LocationSeeder
    ```

### Basic Usage
variable term can part of full address, like "Buah Batu Bandung".

```php
    use rezzakurniawan\Locanesia\Locanesia;

    Locanesia::search($term);
```

### License
Laravel Locanesia is Licensed under GPLV3. Enjoy!