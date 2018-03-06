<?php

namespace Majestic\Litecoin\Traits;

trait Litecoind
{
    public function litecoind()
    {
        return app('litecoind');
    }
}
