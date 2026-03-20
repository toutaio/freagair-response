<?php

declare(strict_types=1);

use Touta\Aria\Runtime\Http\ResponseInterface;
use Touta\Freagair\Response;

// Scenario: create a response with status, headers, and body
it('creates a response with status, headers, and body', function (): void {
    $response = new Response(200, ['Content-Type' => ['text/html']], '<h1>Hello</h1>');

    expect($response->statusCode()->value)->toBe(200)
        ->and($response->headers()->value)->toBe(['Content-Type' => ['text/html']])
        ->and($response->body()->value)->toBe('<h1>Hello</h1>');
});

// Scenario: Response implements ResponseInterface
it('implements ResponseInterface', function (): void {
    $response = new Response(200, [], '');

    expect($response)->toBeInstanceOf(ResponseInterface::class);
});

// Scenario: create a default empty response
it('creates a default empty response', function (): void {
    $response = new Response();

    expect($response->statusCode()->value)->toBe(200)
        ->and($response->headers()->value)->toBe([])
        ->and($response->body()->value)->toBe('');
});
