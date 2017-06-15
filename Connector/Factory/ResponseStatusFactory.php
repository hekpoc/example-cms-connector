<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory;

use Psr\Http\Message\ResponseInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\Interfaces\ResponseStatusFactoryInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory\Interfaces\StatusCodeResponseStatusFactoryInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\FailedPostingConnectorResponseStatus;
use WiseWebExt\Component\Posting\Connector\Response\Status\Interfaces\PostingConnectorResponseStatusInterface;

/**
 * A simple factory for generating posting response statuses.
 */
class ResponseStatusFactory implements ResponseStatusFactoryInterface
{
    /**
     * @var StatusCodeResponseStatusFactoryInterface[]
     */
    private $statusCodeFactories = [];

    /**
     * {@inheritdoc}
     */
    public function create(ResponseInterface $response) : PostingConnectorResponseStatusInterface
    {
        foreach ($this->statusCodeFactories as $statusCodeFactory) {
            if ($statusCodeFactory->matches($response->getStatusCode())) {
                return $statusCodeFactory->create($response);
            }
        }

        return new FailedPostingConnectorResponseStatus(
            'No handler found for status code ' . $response->getStatusCode()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function addStatusCodeFactory(
        StatusCodeResponseStatusFactoryInterface $statusCodeResponseStatusFactory
    ) : void
    {
        $this->statusCodeFactories[] = $statusCodeResponseStatusFactory;
    }
}
