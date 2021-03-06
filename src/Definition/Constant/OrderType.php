<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Constant;

/**
 * Class OrderType.
 */
final class OrderType
{
    const MARKET = 'MARKET';
    const LIMIT = 'LIMIT';
    const STOP = 'STOP';
    const MARKET_IF_TOUCHED = 'MARKET_IF_TOUCHED';
    const TAKE_PROFIT = 'TAKE_PROFIT';
    const STOP_LOSS = 'STOP_LOSS';
    const TRAILING_STOP_LOSS = 'TRAILING_STOP_LOSS';
    const ORDER_CANCEL = 'ORDER_CANCEL';
    const MARKET_ORDER_REJECT = 'MARKET_ORDER_REJECT';
    const ORDER_FILL = 'ORDER_FILL';
    const MARKET_ORDER = 'MARKET_ORDER';
}
