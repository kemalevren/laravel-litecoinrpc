<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Litecoind JSON-RPC Scheme
    |--------------------------------------------------------------------------
    | URI scheme of Litecoin Core's JSON-RPC server.
    |
    | Use https to enable SSL connections with Core,
    | but this is strongly discouraged by developers.
    |
    */

    'scheme' => env('LITECOIND_SCHEME', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Litecoind JSON-RPC Host
    |--------------------------------------------------------------------------
    | Tells service provider which hostname or IP address
    | Litecoin Core is running at.
    |
    | If Litecoin Core is running on the same PC as
    | laravel project use localhost or 127.0.0.1.
    |
    | If you're running Litecoin Core on the different PC,
    | you may also need to add rpcallowip=<server-ip-here> to your litecoin.conf
    | file to allow connections from your laravel client.
    |
    */

    'host' => env('LITECOIND_HOST', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Litecoind JSON-RPC Port
    |--------------------------------------------------------------------------
    | The port at which Litecoin Core is listening for JSON-RPC connections.
    | Default is 8332 for mainnet and 18332 for testnet.
    | You can also directly specify port by adding rpcport=<port>
    | to litecoin.conf file.
    |
    */

    'port' => env('LITECOIND_PORT', 9332),

    /*
    |--------------------------------------------------------------------------
    | Litecoind JSON-RPC User
    |--------------------------------------------------------------------------
    | Username needs to be set exactly as in litecoin.conf file
    | rpcuser=<username>.
    |
    */

    'user' => env('LITECOIND_USER', ''),

    /*
    |--------------------------------------------------------------------------
    | Litecoind JSON-RPC Password
    |--------------------------------------------------------------------------
    | Password needs to be set exactly as in litecoin.conf file
    | rpcpassword=<password>.
    |
    */

    'password' => env('LITECOIND_PASSWORD', ''),

    /*
    |--------------------------------------------------------------------------
    | Litecoind JSON-RPC Server CA
    |--------------------------------------------------------------------------
    | If you're using SSL (https) to connect to your Litecoin Core
    | you can specify custom ca package to verify against.
    | Note that using Litecoin JSON-RPC over SSL is strongly discouraged.
    |
    */

    'ca' => null,
];
