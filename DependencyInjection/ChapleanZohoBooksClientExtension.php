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

namespace Chaplean\Bundle\ZohoBooksClientBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class ChapleanZohoBooksClientExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @return void
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('chaplean_zoho_books_client', $config);
        $this->setParameters($container, 'chaplean_zoho_books_client', $config);
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param array            $config
     *
     * @return void
     */
    public function setParameters($container, $name, $config)
    {
        foreach ($config as $key => $parameter) {
            $container->setParameter($name . '.' . $key, $parameter);

            if (is_array($parameter)) {
                $this->setParameters($container, $name . '.' . $key, $parameter);
            }
        }
    }
}
