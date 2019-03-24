<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request;

use Mab05k\OandaClient\Request\Trade\CloseTradeRequest;

/**
 * Class TradeRequestFactory.
 */
class TradeRequestFactory
{
    /**
     * @param string $units
     *
     * @return CloseTradeRequest
     */
    public static function closeTradeRequest(string $units = CloseTradeRequest::ALL): CloseTradeRequest
    {
        return (new CloseTradeRequest())
            ->setUnits($units);
    }
}
