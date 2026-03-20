<?php

declare(strict_types=1);

use Touta\Freagair\ResponseBody;

// Scenario: create a ResponseBody from a string
it('wraps a response body string', function (): void {
    $body = new ResponseBody('Hello, World!');

    expect($body->value)->toBe('Hello, World!');
});

// Scenario: two ResponseBody instances with same value are equal
it('is a value object with equality by value', function (): void {
    $a = new ResponseBody('content');
    $b = new ResponseBody('content');

    expect($a)->toEqual($b);
});

// Scenario: create an empty ResponseBody
it('supports empty body', function (): void {
    $body = new ResponseBody('');

    expect($body->value)->toBe('');
});

// Scenario: cast ResponseBody to string
it('casts to string', function (): void {
    $body = new ResponseBody('<h1>Hi</h1>');

    expect((string) $body)->toBe('<h1>Hi</h1>');
});
