<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory;

use Psr\Http\Message\ResponseInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory\Interfaces\StatusCodeResponseStatusFactoryInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\CreatedPostingConnectorResponseStatus;
use WiseWebExt\Component\Posting\Connector\Response\Status\Interfaces\PostingConnectorResponseStatusInterface;

/**
 * Factory that produces response status for successfully created elements.
 */
class CreatedResponseStatusFactory implements StatusCodeResponseStatusFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function matches(int $statusCode) : bool
    {
        return in_array($statusCode, [201, 409]);
    }

    /**
     * {@inheritdoc}
     */
    public function create(ResponseInterface $response) : PostingConnectorResponseStatusInterface
    {
        $responseBody = json_decode($response->getBody()->getContents(), true);

        return new CreatedPostingConnectorResponseStatus($responseBody['id'], $response->getHeader('Location'));
    }
}
