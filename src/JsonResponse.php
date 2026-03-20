<?php

declare(strict_types=1);

namespace Touta\Freagair;

final class JsonResponse
{
    /**
     * @param array<string, mixed>|list<mixed> $data
     */
    public static function from(array $data, int $statusCode = 200): Response
    {
        $body = json_encode($data, JSON_THROW_ON_ERROR);

        return new Response(
            $statusCode,
            ['Content-Type' => ['application/json']],
            $body,
        );
    }
}
