<?php

namespace WiseWeb\CmsConnectorBundle\Connector\Factory\Interfaces;

use Psr\Http\Message\ServerRequestInterface;
use WiseWebExt\Component\Posting\DTO\PostingRequestDTO;

/**
 * Interface for factories that create CMS requests.
 */
interface RequestFactoryInterface
{
    /**
     * Creates a request to CMS.
     *
     * @param PostingRequestDTO $postingRequestDTO
     *
     * @return ServerRequestInterface
     */
    public function create(PostingRequestDTO $postingRequestDTO) : ServerRequestInterface;
}
