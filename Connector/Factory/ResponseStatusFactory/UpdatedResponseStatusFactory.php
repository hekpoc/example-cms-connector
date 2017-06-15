<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory;

use Psr\Http\Message\ResponseInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory\Interfaces\StatusCodeResponseStatusFactoryInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\Interfaces\PostingConnectorResponseStatusInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\UpdatedPostingConnectorResponseStatus;

/**
 * Factory that produces response status for successfully updated elements.
 */
class UpdatedResponseStatusFactory implements StatusCodeResponseStatusFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function matches(int $statusCode) : bool
    {
        return $statusCode === 200;
    }

    /**
     * {@inheritdoc}
     */
    public function create(ResponseInterface $response) : PostingConnectorResponseStatusInterface
    {
        return new UpdatedPostingConnectorResponseStatus();
    }
}
