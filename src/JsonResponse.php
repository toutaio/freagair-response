<?php

declare(strict_types=1);

namespace Touta\Freagair;

use Touta\Aria\Runtime\Failure;
use Touta\Aria\Runtime\Result;
use Touta\Aria\Runtime\Success;

final class JsonResponse
{
    /**
     * @param array<string, mixed>|list<mixed> $data
     *
     * @return Result<Response, ResponseError>
     */
    public static function from(array $data, int $statusCode = 200): Result
    {
        try {
            $body = json_encode($data, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            return Failure::from(new ResponseError(
                ResponseError::ENCODE_FAILED,
                $e->getMessage(),
                ['data' => $data],
            ));
        }

        return Success::of(new Response(
            $statusCode,
            ['Content-Type' => ['application/json']],
            $body,
        ));
    }
}
