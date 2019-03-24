<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Exception;

use Throwable;

/**
 * Class InvalidStatusCodeException.
 */
class InvalidStatusCodeException extends \Exception
{
    /**
     * @var int
     */
    private $expectedStatusCode;

    /**
     * @var int
     */
    private $receivedStatusCode;

    /**
     * InvalidStatusCodeException constructor.
     *
     * @param int            $expectedStatusCode
     * @param int            $receivedStatusCode
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(
        int $expectedStatusCode,
        int $receivedStatusCode,
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        $this->expectedStatusCode = $expectedStatusCode;
        $this->receivedStatusCode = $receivedStatusCode;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getExpectedStatusCode(): int
    {
        return $this->expectedStatusCode;
    }

    /**
     * @return int
     */
    public function getReceivedStatusCode(): int
    {
        return $this->receivedStatusCode;
    }
}
