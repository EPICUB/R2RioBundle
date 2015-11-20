<?php

namespace Epic\R2RioBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class EpicR2RioExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Global Configuration
        $container->setParameter('epic_r2_rio_api_key', $config['api_key']);
        $container->setParameter('epic_r2_rio_api_server', $config['api_server']);
        // Search Configuration
        $container->setParameter('epic_r2_rio_search_flag', $config['search']['flag']);
        $container->setParameter('epic_r2_rio_search_cache', $config['search']['cache']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('model_services.xml');
        $loader->load('api_services.xml');
    }
}
