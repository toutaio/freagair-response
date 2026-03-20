<?php

declare(strict_types=1);

use Touta\Freagair\ResponseError;

// Scenario: create a ResponseError with code and message
it('creates an error with code and message', function (): void {
    $error = new ResponseError(ResponseError::ENCODE_FAILED, 'json_encode failed');

    expect($error->code)->toBe('RESPONSE.ENCODE_FAILED')
        ->and($error->message)->toBe('json_encode failed')
        ->and($error->context)->toBe([]);
});

// Scenario: create a ResponseError with context
it('creates an error with context', function (): void {
    $error = new ResponseError(
        ResponseError::INVALID_STATUS,
        'Invalid status code',
        ['status' => 999],
    );

    expect($error->code)->toBe('RESPONSE.INVALID_STATUS')
        ->and($error->context)->toBe(['status' => 999]);
});

// Scenario: derive a new error with a different message
it('derives a new error with withMessage', function (): void {
    $original = new ResponseError(ResponseError::ENCODE_FAILED, 'original');
    $derived = $original->withMessage('updated');

    expect($derived->message)->toBe('updated')
        ->and($derived->code)->toBe($original->code)
        ->and($original->message)->toBe('original');
});

// Scenario: derive a new error with merged context
it('derives a new error with withContext', function (): void {
    $original = new ResponseError(ResponseError::INVALID_BODY, 'bad body', ['key' => 'a']);
    $derived = $original->withContext(['extra' => 'b']);

    expect($derived->context)->toBe(['key' => 'a', 'extra' => 'b'])
        ->and($original->context)->toBe(['key' => 'a']);
});

// Scenario: error constants match expected codes
it('has correct error code constants', function (): void {
    expect(ResponseError::ENCODE_FAILED)->toBe('RESPONSE.ENCODE_FAILED')
        ->and(ResponseError::INVALID_STATUS)->toBe('RESPONSE.INVALID_STATUS')
        ->and(ResponseError::INVALID_BODY)->toBe('RESPONSE.INVALID_BODY');
});
