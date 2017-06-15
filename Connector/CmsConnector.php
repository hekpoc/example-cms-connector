<?php

namespace WiseWeb\CmsConnectorBundle\Connector;

use Psr\Http\Message\ResponseInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\Interfaces\RequestFactoryInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\Interfaces\ResponseStatusFactoryInterface;
use WiseWebExt\Component\Posting\Connector\Interfaces\PostingConnectorInterface;
use WiseWebExt\Component\Posting\Connector\Response\Interfaces\PostingConnectorResponseInterface;
use WiseWebExt\Component\Posting\Connector\Response\PostingConnectorResponse;
use WiseWebExt\Component\Posting\Connector\Response\Status\ReadyPostingConnectorResponseStatus;
use WiseWebExt\Component\Posting\DTO\PostingRequestDTO;

/**
 * An example of a CMS connector.
 */
class CmsConnector implements PostingConnectorInterface
{
    /**
     * @var ResponseStatusFactoryInterface
     */
    private $responseStatusFactory;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @param ResponseStatusFactoryInterface $responseStatusFactory
     * @param RequestFactoryInterface        $requestFactory
     */
    public function __construct(
        ResponseStatusFactoryInterface $responseStatusFactory,
        RequestFactoryInterface $requestFactory
    )
    {
        $this->responseStatusFactory = $responseStatusFactory;
        $this->requestFactory = $requestFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function processRequest(PostingRequestDTO $postingRequestDTO) : PostingConnectorResponseInterface
    {
        return new PostingConnectorResponse(
            new ReadyPostingConnectorResponseStatus(),
            $this->requestFactory->create($postingRequestDTO)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function processResponse(
        ResponseInterface $response,
        PostingRequestDTO $postingRequestDTO
    ) : PostingConnectorResponseInterface
    {
        $status = $this->responseStatusFactory->create($response);
        $serverRequest = $status instanceof ReadyPostingConnectorResponseStatus
            ? $this->requestFactory->create($postingRequestDTO)
            : null;

        return new PostingConnectorResponse(
            $this->responseStatusFactory->create($response),
            $serverRequest
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getConnectorType() : string
    {
        return 'cms_name';
    }
}
