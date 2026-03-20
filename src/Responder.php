<?php

declare(strict_types=1);

namespace Touta\Freagair;

use Touta\Aria\Runtime\Http\RequestInterface;
use Touta\Aria\Runtime\Http\ResponseInterface;
use Touta\Aria\Runtime\Result;

interface Responder
{
    /**
     * @return Result<ResponseInterface, mixed>
     */
    public function respond(RequestInterface $request): Result;
}
