<?php

if (! function_exists('litecoind')) {
    /**
     * Get litecoind client instance.
     *
     * @return \Majestic\Litecoin\Client
     */
    function litecoind()
    {
        return app('litecoind');
    }
}
