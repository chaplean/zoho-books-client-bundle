<?php
/*
 *
 * This file is part of the ZohoBooksClientBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection;

use Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\ChapleanZohoBooksClientExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ConfigurationTest.
 *
 * @package   Tests\Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2018 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ConfigurationTest extends TestCase
{
    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\Configuration::getConfigTreeBuilder()
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\Configuration::addApiConfiguration()
     *
     * @return void
     */
    public function testFullyDefinedConfig()
    {
        $container = new ContainerBuilder();
        $loader = new ChapleanZohoBooksClientExtension();
        $loader->load([['api' => ['url' => 'url', 'access_token' => 'token', 'organization_id' => 42]]], $container);

        $this->assertEquals('url', $container->getParameter('chaplean_zoho_books_client.api.url'));
        $this->assertEquals('token', $container->getParameter('chaplean_zoho_books_client.api.access_token'));
        $this->assertEquals(42, $container->getParameter('chaplean_zoho_books_client.api.organization_id'));
    }

    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\Configuration::getConfigTreeBuilder()
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\Configuration::addApiConfiguration()
     *
     * @return void
     */
    public function testDefaultConfig()
    {
        $container = new ContainerBuilder();
        $loader = new ChapleanZohoBooksClientExtension();
        $loader->load([[]], $container);

        $this->assertEquals('https://books.zoho.com/api/v3/', $container->getParameter('chaplean_zoho_books_client.api.url'));
        $this->assertEquals('%chaplean_zoho_books.access_token%', $container->getParameter('chaplean_zoho_books_client.api.access_token'));
        $this->assertEquals('%chaplean_zoho_books.organization_id%', $container->getParameter('chaplean_zoho_books_client.api.organization_id'));
    }
}
