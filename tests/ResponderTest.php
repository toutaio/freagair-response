<?php

declare(strict_types=1);

use Touta\Aria\Runtime\Http\RequestInterface;
use Touta\Aria\Runtime\Http\ResponseInterface;
use Touta\Aria\Runtime\Result;
use Touta\Aria\Runtime\Success;
use Touta\Freagair\Responder;
use Touta\Freagair\Response;

it('defines a responder contract', function (): void {
    $responder = new class implements Responder {
        public function respond(RequestInterface $request): Result
        {
            return Success::of(new Response(200, [], 'ok'));
        }
    };

    expect($responder)->toBeInstanceOf(Responder::class);
});
