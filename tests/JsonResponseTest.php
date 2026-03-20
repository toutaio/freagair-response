<?php

declare(strict_types=1);

use Touta\Aria\Runtime\Failure;
use Touta\Aria\Runtime\Success;
use Touta\Freagair\JsonResponse;
use Touta\Freagair\Response;
use Touta\Freagair\ResponseError;

// Scenario: encode valid data and return Success<Response>
it('creates a JSON response with encoded body', function (): void {
    $result = JsonResponse::from(['key' => 'value']);

    expect($result)->toBeInstanceOf(Success::class);

    /** @var Success<Response> $result */
    $response = $result->value();

    expect($response->statusCode())->toBe(200)
        ->and($response->body())->toBe('{"key":"value"}')
        ->and($response->headers())->toBe(['Content-Type' => ['application/json']]);
});

// Scenario: encode valid data with custom status code and return Success<Response>
it('creates a JSON response with custom status code', function (): void {
    $result = JsonResponse::from(['error' => 'not found'], 404);

    expect($result)->toBeInstanceOf(Success::class);

    /** @var Success<Response> $result */
    expect($result->value()->statusCode())->toBe(404);
});

// Scenario: return Failure<ResponseError> when json_encode fails
it('returns Failure with ResponseError when encoding fails', function (): void {
    $resource = fopen('php://memory', 'r');
    /** @var array<string, mixed> $data */
    $data = ['bad' => $resource];

    $result = JsonResponse::from($data);
    fclose($resource);

    expect($result)->toBeInstanceOf(Failure::class);

    /** @var Failure<ResponseError> $result */
    $error = $result->error();

    expect($error)->toBeInstanceOf(ResponseError::class)
        ->and($error->code)->toBe(ResponseError::ENCODE_FAILED);
});
