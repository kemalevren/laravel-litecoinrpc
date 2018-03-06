# Litecoin JSON-RPC Service Provider for Laravel

## About
This package allows you to make JSON-RPC calls to Litecoin Core JSON-RPC server from your laravel project.
It's based on [php-litecoinrpc](https://github.com/majestic84/php-litecoinrpc) project - fully unit-tested Litecoin JSON-RPC client powered by GuzzleHttp.

## Installation
Run ```php composer.phar require majestic/laravel-litecoinrpc``` in your project directory or add following lines to composer.json
```json
"require": {
    "majestic/laravel-litecoinrpc": "^1.1"
}
```
and run ```php composer.phar update```.

Add `Majestic\Litecoin\Providers\ServiceProvider::class,` line to the providers list somewhere near the bottom of your /config/app.php file.
```php
'providers' => [
    ...
    Majestic\Litecoin\Providers\ServiceProvider::class,
];
```

Publish config file by running
`php artisan vendor:publish --provider="Majestic\Litecoin\ServiceProvider"` in your project directory.

You might also want to add facade to $aliases array in /config/app.php.
```php
'aliases' => [
    ...
    'Litecoind' => Majestic\Litecoin\Facades\Litecoind::class,
];
```

I recommend you to use .env file to configure client.
To connect to Litecoin Core you'll need to add at least following parameters
```
LITECOIND_USER=(rpcuser from litecoin.conf)
LITECOIND_PASSWORD=(rpcpassword from litecoin.conf)
```

## Requirements
* PHP 7.0 or higher (should also work on 5.6, but this is unsupported)
* Laravel 5.1 or higher

## Usage
You can perform request to Litecoin Core using any of methods listed below:
### Helper Function
```php
<?php

namespace App\Http\Controllers;

class LitecoinController extends Controller
{
  /**
   * Get block info.
   *
   * @return object
   */
   public function blockInfo()
   {
      $blockHash = '9d4d9fd2f4dee46d5918861b7bbff81f52c581c3b935ad186fe4c5b6dc58d2f8';
      $blockInfo = litecoind()->getBlock($blockHash);
      return response()->json($blockInfo->get());
   }
}
```

### Facade
```php
<?php

namespace App\Http\Controllers;

use Litecoind;

class LitecoinController extends Controller
{
  /**
   * Get block info.
   *
   * @return object
   */
   public function blockInfo()
   {
      $blockHash = '9d4d9fd2f4dee46d5918861b7bbff81f52c581c3b935ad186fe4c5b6dc58d2f8';
      $blockInfo = Litecoind::getBlock($blockHash);
      return response()->json($blockInfo->get());
   }
}
```

### Automatic Injection
```php
<?php

namespace App\Http\Controllers;

use Majestic\Litecoin\Client as LitecoinClient;

class LitecoinController extends Controller
{
  /**
   * Get block info.
   *
   * @param  LitecoinClient  $litecoind
   * @return \Illuminate\Http\JsonResponse
   */
   public function blockInfo(LitecoinClient $litecoind)
   {
      $blockHash = '9d4d9fd2f4dee46d5918861b7bbff81f52c581c3b935ad186fe4c5b6dc58d2f8';
      $blockInfo = $litecoind->getBlock($blockHash);
      return response()->json($blockInfo->get());
   }
}
```

## License

This product is distributed under MIT license.

## Donations

If you like this project,
you can donate Litecoins to LKdsQGCwBbgJNdXSQtAvVbFMpwgwThtsSY.

Thanks for your support!❤
