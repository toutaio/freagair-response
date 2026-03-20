<?php

declare(strict_types=1);

namespace Touta\Freagair;

final readonly class ContentType implements \Stringable
{
    public function __construct(
        public string $value,
    ) {}

    public function __toString(): string
    {
        return $this->value;
    }
}
