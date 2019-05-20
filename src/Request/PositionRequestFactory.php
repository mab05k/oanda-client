<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request;

use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Mab05k\OandaClient\Request\Position\ClosePositionRequest;

/**
 * Class PositionRequestFactory.
 */
class PositionRequestFactory
{
    /**
     * @param string               $longUnits
     * @param string               $shortUnits
     * @param ClientExtension|null $longClientExtensions
     * @param ClientExtension|null $shortClientExtensions
     *
     * @return ClosePositionRequest
     */
    public static function closePositionRequest(
        string $longUnits,
        string $shortUnits = null,
        ?ClientExtension $longClientExtensions = null,
        ?ClientExtension $shortClientExtensions = null
    ): ClosePositionRequest {
        return (new ClosePositionRequest())
            ->setLongUnits($longUnits)
            ->setShortUnits($shortUnits)
            ->setLongClientExtensions($longClientExtensions)
            ->setShortClientExtensions($shortClientExtensions);
    }
}
