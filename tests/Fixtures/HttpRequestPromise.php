<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Fixtures;

use Http\Client\Exception;
use Http\Client\Promise\HttpRejectedPromise;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class HttpRequestPromise implements Promise
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * HttpRequestPromise constructor.
     *
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null)
    {
        if (null === $onFulfilled) {
            return $this;
        }

        try {
            return new self($onFulfilled($this->request));
        } catch (Exception $e) {
            return new HttpRejectedPromise($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return Promise::FULFILLED;
    }

    /**
     * @param bool $unwrap
     *
     * @return mixed|RequestInterface
     */
    public function wait($unwrap = true)
    {
        if ($unwrap) {
            return $this->request;
        }
    }
}
