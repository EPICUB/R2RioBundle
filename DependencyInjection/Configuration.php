<?php

namespace Epic\R2RioBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('epic_r2_rio');

        $rootNode
            ->children()
                ->scalarNode('api_key')->cannotBeEmpty()->isRequired()->end()
                ->scalarNode('api_server')->defaultValue('http://free.rome2rio.com/api/1.2/json/')->cannotBeEmpty()->end()
                ->arrayNode('search')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('flag')->defaultValue(0)->cannotBeEmpty()->end()
                        ->booleanNode('cache')->defaultFalse()->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
