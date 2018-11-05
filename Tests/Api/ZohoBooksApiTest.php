<?php

namespace  Chaplean\Bundle\ZohoBooksClientBundle\Tests\Api;

use Chaplean\Bundle\ZohoBooksClientBundle\Api\ZohoBooksApi;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Symfony\Component\EventDispatcher\EventDispatcher;
/**
 * ZohoBooksApiTest.php.
 *
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2018 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ZohoBooksApiTest extends TestCase
{
    /**
     * @var ZohoBooksApi
     */
    private $api;

    /**
     * @var array
     */
    private $routes;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->api = new ZohoBooksApi(new Client(), new EventDispatcher(), 'http://test.com');
        $reflector = new \ReflectionClass(ZohoBooksApi::class);
        $property = $reflector->getProperty('routes');
        $property->setAccessible(true);
        $this->routes = $property->getValue($this->api);
    }

    /**
     * @covers  \Chaplean\Bundle\ZohoBooksClientBundle\Api\ZohoBooksApi::__construct()
     *
     * @return void
     */
    public function testConstruct()
    {
        $api = new ZohoBooksApi(new Client(), new EventDispatcher(), 'http://test.com');
        $this->assertInstanceOf(ZohoBooksApi::class, $api);
    }

    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\Api\ZohoBooksApi::buildApi()
     *
     * @return void
     */
    public function testGetRoutes()
    {
        $methods = ['invoices','invoice', 'estimates', 'estimate', 'items', 'item'];

        $this->assertArrayHasKey('get', $this->routes);
        $this->assertCount(8, $this->routes['get']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['get']);
        }
    }

    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\Api\ZohoBooksApi::buildApi()
     *
     * @return void
     */
    public function testPostRoutes()
    {
        $methods = ['item','itemActive', 'itemInactive', 'estimate', 'estimateAsDeclined', 'estimateAsAccepted', 'invoice'];

        $this->assertArrayHasKey('post', $this->routes);
        $this->assertCount(7, $this->routes['post']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey(strtolower($method), $this->routes['post']);
        }
    }

    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\Api\ZohoBooksApi::buildApi()
     *
     * @return void
     */
    public function testPutRoutes()
    {
        $methods = ['item', 'estimate', 'invoice'];

        $this->assertArrayHasKey('put', $this->routes);
        $this->assertCount(3, $this->routes['put']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['put']);
        }
    }

    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\Api\ZohoBooksApi::buildApi()
     *
     * @return void
     */
    public function testDeleteRoutes()
    {
        $methods = ['item', 'estimate', 'invoice'];

        $this->assertArrayHasKey('delete', $this->routes);
        $this->assertCount(3, $this->routes['delete']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['delete']);
        }
    }
}
