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
    public const MARKET = 'MARKET';
    public const LIMIT = 'LIMIT';
    public const STOP = 'STOP';
    public const MARKET_IF_TOUCHED = 'MARKET_IF_TOUCHED';
    public const TAKE_PROFIT = 'TAKE_PROFIT';
    public const STOP_LOSS = 'STOP_LOSS';
    public const TRAILING_STOP_LOSS = 'TRAILING_STOP_LOSS';
    public const ORDER_CANCEL = 'ORDER_CANCEL';
    public const MARKET_ORDER_REJECT = 'MARKET_ORDER_REJECT';
    public const ORDER_FILL = 'ORDER_FILL';
    public const MARKET_ORDER = 'MARKET_ORDER';
}
