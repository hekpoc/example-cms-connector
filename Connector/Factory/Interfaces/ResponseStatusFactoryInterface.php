<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory\Interfaces;

use Psr\Http\Message\ResponseInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory\Interfaces\StatusCodeResponseStatusFactoryInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\Interfaces\PostingConnectorResponseStatusInterface;

/**
 * Interface for factories that generate posting responses.
 */
interface ResponseStatusFactoryInterface
{
    /**
     * Creates and returns posting connector response.
     *
     * @param ResponseInterface $response
     *
     * @return PostingConnectorResponseStatusInterface
     */
    public function create(ResponseInterface $response) : PostingConnectorResponseStatusInterface;

    /**
     * Registers given status code response factory.
     *
     * @param StatusCodeResponseStatusFactoryInterface $statusCodeResponseStatusFactory
     */
    public function addStatusCodeFactory(
        StatusCodeResponseStatusFactoryInterface $statusCodeResponseStatusFactory
    ) : void;
}
