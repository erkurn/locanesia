# Locanesia

- [About](#about)
- [Demo](#demo)
- [Requirements](#requirements)
- [Installation Instructions](#installation-instructions)
- [Basic Usage](#basic-usage)
- [License](#license)

### About

Laravel Package to populate and searching indonesia locations. From Provinces To Villages. Data Scraped from http://www.nomor.net/

### Demo
[![IMAGE ALT TEXT HERE](https://img.youtube.com/vi/OzA9Hh5EYWk/0.jpg)](https://www.youtube.com/watch?v=OzA9Hh5EYWk)

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

always call locanesia, use it : 
``` php
    use rezzakurniawan\Locanesia\Locanesia;
```

1. For Full Text Search
```php
    /**
     * Full Text Search Location
     *
     * @param String $term Village, Postcode, Province, City Or combine
     * @param String $response json|array
     * @return void
     */
    Locanesia::search($term, $response);
```
2. Get All Province
```php
    /**
     * Get All Provinces
     *
     * @param String $response json|array
     * @return void
     */
    Locanesia::getProvinces($response);
```
3. Get All Cities By Provinces
```php
    /**
     * Get All Provinces
     *
     * @param String $provinces Province Name
     * @param String $response json|array
     * @return void
     */
    Locanesia::getCities($provinces, $response);
```
4. Get Detail Location By Postcode
```php
    /**
     * Get Detail Location By Postcode
     *
     * @param String $term postcode
     * @param String $response json|array
     * @return void
     */
    Locanesia::getLocationByPostCode($term, $type);
```

### License
Laravel Locanesia is Licensed under GPLV3. Enjoy!
