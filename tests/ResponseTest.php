<?php

declare(strict_types=1);

use Touta\Aria\Runtime\Http\ResponseInterface;
use Touta\Freagair\Response;

it('creates a response with status, headers, and body', function (): void {
    $response = new Response(200, ['Content-Type' => ['text/html']], '<h1>Hello</h1>');

    expect($response->statusCode())->toBe(200)
        ->and($response->headers())->toBe(['Content-Type' => ['text/html']])
        ->and($response->body())->toBe('<h1>Hello</h1>');
});

it('implements ResponseInterface', function (): void {
    $response = new Response(200, [], '');

    expect($response)->toBeInstanceOf(ResponseInterface::class);
});

it('creates a default empty response', function (): void {
    $response = new Response();

    expect($response->statusCode())->toBe(200)
        ->and($response->headers())->toBe([])
        ->and($response->body())->toBe('');
});
