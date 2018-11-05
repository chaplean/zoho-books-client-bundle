<?php

namespace Tests\Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection;

use Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\ChapleanZohoBooksClientExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ChapleanZohoBooksClientExtensionTest.
 *
 * @package   Tests\Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2018 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ChapleanZohoBooksClientExtensionTest extends TestCase
{
    /**
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\ChapleanZohoBooksClientExtension::load()
     * @covers \Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection\ChapleanZohoBooksClientExtension::setParameters()
     *
     * @return void
     */
    public function testConfigIsLoadedInParameters()
    {
        $container = new ContainerBuilder();
        $loader = new ChapleanZohoBooksClientExtension();
        $loader->load([['api' => ['url' => 'url', 'access_token' => 'token', 'organization_id' => 42]]], $container);

        $this->assertEquals('url', $container->getParameter('chaplean_zoho_books_client.api.url'));
        $this->assertEquals('token', $container->getParameter('chaplean_zoho_books_client.api.access_token'));
        $this->assertEquals(42, $container->getParameter('chaplean_zoho_books_client.api.organization_id'));
    }
}
