<?php

declare(strict_types=1);

use Touta\Freagair\JsonResponse;

it('creates a JSON response with encoded body', function (): void {
    $response = JsonResponse::from(['key' => 'value']);

    expect($response->statusCode())->toBe(200)
        ->and($response->body())->toBe('{"key":"value"}')
        ->and($response->headers())->toBe(['Content-Type' => ['application/json']]);
});

it('creates a JSON response with custom status code', function (): void {
    $response = JsonResponse::from(['error' => 'not found'], 404);

    expect($response->statusCode())->toBe(404);
});
