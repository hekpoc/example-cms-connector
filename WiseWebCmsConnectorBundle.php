<?php

namespace WiseWeb\CmsConnectorBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WiseWeb\CmsConnectorBundle\DependencyInjection\Compiler\StatusCodeFactoryCompilerPass;

/**
 * CMS connector integration with Symfony.
 */
class WiseWebCmsConnectorBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new StatusCodeFactoryCompilerPass());
    }
}
