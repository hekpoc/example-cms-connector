<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory\ResponseStatusFactory\Interfaces;

use Psr\Http\Message\ResponseInterface;
use WiseWebExt\Component\Posting\Connector\Response\Status\Interfaces\PostingConnectorResponseStatusInterface;

/**
 * Interface for factories that create response statuses based on HTTP status codes.
 */
interface StatusCodeResponseStatusFactoryInterface
{
    /**
     * Returns whether factory matches given HTTP status code.
     *
     * @param int $statusCode
     *
     * @return bool
     */
    public function matches(int $statusCode) : bool;

    /**
     * Creates and return response status.
     *
     * @param ResponseInterface $response
     *
     * @return PostingConnectorResponseStatusInterface
     */
    public function create(ResponseInterface $response) : PostingConnectorResponseStatusInterface;
}
