<?php

use Orchestra\Testbench\TestCase;
use Majestic\Litecoin\Traits\Litecoind;
use Majestic\Litecoin\Client as LitecoinClient;

class LitecoindTest extends TestCase
{
    use Litecoind;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Majestic\Litecoin\Providers\ServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Litecoind' => 'Majestic\Litecoin\Facades\Litecoind',
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('litecoind.user', 'testuser');
        $app['config']->set('litecoind.password', 'testpass');
    }

    /**
     * Test service provider.
     *
     * @return void
     */
    public function testServiceIsAvailable()
    {
        $this->assertTrue($this->app->bound('litecoind'));
    }

    /**
     * Test facade.
     *
     * @return void
     */
    public function testFacade()
    {
        $this->assertInstanceOf(LitecoinClient::class, \Litecoind::getFacadeRoot());
    }

    /**
     * Test helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $this->assertInstanceOf(LitecoinClient::class, litecoind());
    }

    /**
     * Test trait.
     *
     * @return void
     */
    public function testTrait()
    {
        $this->assertInstanceOf(LitecoinClient::class, $this->litecoind());
    }

    /**
     * Test litecoin config.
     *
     * @return void
     */
    public function testConfig()
    {
        $config = litecoind()->getConfig();

        $this->assertEquals(
            config('litecoind.scheme'),
            $config['base_uri']->getScheme()
        );

        $this->assertEquals(
            config('litecoind.host'),
            $config['base_uri']->getHost()
        );

        $this->assertEquals(
            config('litecoind.port'),
            $config['base_uri']->getPort()
        );

        $this->assertEquals(config('litecoind.user'), $config['auth'][0]);
        $this->assertEquals(config('litecoind.password'), $config['auth'][1]);
    }
}
