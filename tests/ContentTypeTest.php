<?php

declare(strict_types=1);

use Touta\Freagair\ContentType;

// Scenario: create a ContentType from a valid MIME string
it('wraps a content type string', function (): void {
    $ct = new ContentType('application/json');

    expect($ct->value)->toBe('application/json');
});

// Scenario: two ContentType instances with same value are equal
it('is a value object with equality by value', function (): void {
    $a = new ContentType('text/html');
    $b = new ContentType('text/html');

    expect($a)->toEqual($b);
});

// Scenario: cast ContentType to string
it('casts to string', function (): void {
    $ct = new ContentType('text/plain');

    expect((string) $ct)->toBe('text/plain');
});
