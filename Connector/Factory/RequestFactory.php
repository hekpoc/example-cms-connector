<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory;

use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use WiseWeb\CmsConnectorBundle\Connector\Factory\Interfaces\RequestFactoryInterface;
use WiseWebExt\Component\Posting\DTO\PostingRequestDTO;

/**
 * Factory for creating CMS requests.
 */
class RequestFactory implements RequestFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(PostingRequestDTO $postingRequestDTO) : ServerRequestInterface
    {
        $data = [
            'title' => $postingRequestDTO->getH1(),
            'name' => $postingRequestDTO->getName(),
            'slug' => $postingRequestDTO->getUri(),
            'image' => reset($postingRequestDTO->getImages()),
            'parent_id' => $postingRequestDTO->getParentId(),
        ];

        return (new ServerRequest(
            $postingRequestDTO->getId() === null ? 'POST' : 'PATCH',
            '/api/posting',
            ['Content-Type' => 'application/json']
        ))->withAttribute('json', json_encode($data));
    }
}
