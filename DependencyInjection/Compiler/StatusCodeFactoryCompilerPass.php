<?php

namespace WiseWeb\CmsConnectorBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Compiler pass for registering status code response status factories.
 */
class StatusCodeFactoryCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('wiseweb_cms_connector.factory.response_status_factory')) {
            return;
        }

        $responseStatusFactory = $container->getDefinition('wiseweb_cms_connector.factory.response_status_factory');

        $statusCodeFactories = $container->findTaggedServiceIds('wiseweb_cms_connector.status_code_factory');
        foreach ($statusCodeFactories as $serviceId => $attributes) {
            $responseStatusFactory->addMethodCall('addStatusCodeFactory', [new Reference($serviceId)]);
        }
    }
}
