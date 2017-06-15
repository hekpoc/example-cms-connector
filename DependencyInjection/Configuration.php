<?php

namespace WiseWeb\CmsConnectorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Bundle configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wise_web_cms_connector');

        $rootNode->children()
            ->scalarNode('version')->defaultValue(1)->end()
            ->end();

        return $treeBuilder;
    }
}
