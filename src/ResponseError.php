<?php

declare(strict_types=1);

namespace Touta\Freagair;

final readonly class ResponseError
{
    public const ENCODE_FAILED = 'RESPONSE.ENCODE_FAILED';
    public const INVALID_STATUS = 'RESPONSE.INVALID_STATUS';
    public const INVALID_BODY = 'RESPONSE.INVALID_BODY';

    /**
     * @param array<string, mixed> $context
     */
    public function __construct(
        public string $code,
        public string $message,
        public array $context = [],
    ) {}

    public function withMessage(string $message): self
    {
        return new self($this->code, $message, $this->context);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function withContext(array $context): self
    {
        return new self($this->code, $this->message, array_merge($this->context, $context));
    }
}
