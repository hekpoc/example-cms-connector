<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory;

use Psr\Http\Message\ResponseInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory\Interfaces\StatusCodeResponseStatusFactoryInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\DeletedPostingConnectorResponseStatus;
use WiseWebExt\Component\Posting\Connector\Response\Status\Interfaces\PostingConnectorResponseStatusInterface;

/**
 * Factory that produces response status for successfully deleted elements.
 */
class DeletedResponseStatusFactory implements StatusCodeResponseStatusFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function matches(int $statusCode) : bool
    {
        return $statusCode === 204;
    }

    /**
     * {@inheritdoc}
     */
    public function create(ResponseInterface $response) : PostingConnectorResponseStatusInterface
    {
        return new DeletedPostingConnectorResponseStatus();
    }
}
