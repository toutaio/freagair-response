<?php

declare(strict_types=1);

namespace Touta\Freagair;

use Touta\Aria\Runtime\Http\ResponseInterface;
use Touta\Aria\Runtime\Type\HeaderMap;
use Touta\Aria\Runtime\Type\HttpBody;
use Touta\Aria\Runtime\Type\StatusCode;

final readonly class Response implements ResponseInterface
{
    private StatusCode $statusCode;
    private HeaderMap $headers;
    private HttpBody $body;

    /**
     * @param array<string, list<string>> $headers
     */
    public function __construct(
        int $statusCode = 200,
        array $headers = [],
        string $body = '',
    ) {
        $this->statusCode = StatusCode::from($statusCode);
        $this->headers = HeaderMap::from($headers);
        $this->body = HttpBody::from($body);
    }

    public function statusCode(): StatusCode
    {
        return $this->statusCode;
    }

    public function headers(): HeaderMap
    {
        return $this->headers;
    }

    public function body(): HttpBody
    {
        return $this->body;
    }
}
