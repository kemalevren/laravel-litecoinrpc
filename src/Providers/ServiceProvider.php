<?php

namespace Majestic\Litecoin\Providers;

use Majestic\Litecoin\Client as LitecoinClient;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('litecoind.php')], 'config');
        $this->mergeConfigFrom($path, 'litecoind');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();

        $this->registerClient();
    }

    /**
     * Register aliases.
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'litecoind' => 'Majestic\Litecoin\Client',
        ];

        foreach ($aliases as $key => $aliases) {
            foreach ((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }

    /**
     * Register client.
     *
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton('litecoind', function ($app) {
            return new LitecoinClient([
                'scheme' => $app['config']->get('litecoind.scheme', 'http'),
                'host'   => $app['config']->get('litecoind.host', 'localhost'),
                'port'   => $app['config']->get('litecoind.port', 8332),
                'user'   => $app['config']->get('litecoind.user'),
                'pass'   => $app['config']->get('litecoind.password'),
                'ca'     => $app['config']->get('litecoind.ca'),
            ]);
        });
    }
}
