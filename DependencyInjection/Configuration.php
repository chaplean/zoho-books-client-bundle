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

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('chaplean_zoho_books_client');

        $this->addApiConfiguration($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     *
     * @return void
     */
    private function addApiConfiguration(ArrayNodeDefinition $node)
    {
        $node->children()
                ->arrayNode('api')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('organization_id')->cannotBeEmpty()->end()
                        ->scalarNode('access_token')->cannotBeEmpty()->end()
                        ->scalarNode('url')->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end();
    }
}
