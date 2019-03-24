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
 * Class OrderFillReason.
 */
class OrderFillReason
{
    public const LIMIT_ORDER = 'LIMIT_ORDER';
    public const STOP_ORDER = 'STOP_ORDER';
    public const MARKET_IF_TOUCHED_ORDER = 'MARKET_IF_TOUCHED_ORDER';
    public const TAKE_PROFIT_ORDER = 'TAKE_PROFIT_ORDER';
    public const STOP_LOSS_ORDER = 'STOP_LOSS_ORDER';
    public const TRAILING_STOP_LOSS_ORDER = 'TRAILING_STOP_LOSS_ORDER';
    public const MARKET_ORDER = 'MARKET_ORDER';
    public const MARKET_ORDER_TRADE_CLOSE = 'MARKET_ORDER_TRADE_CLOSE';
    public const MARKET_ORDER_POSITION_CLOSEOUT = 'MARKET_ORDER_POSITION_CLOSEOUT';
    public const MARKET_ORDER_MARGIN_CLOSEOUT = 'MARKET_ORDER_MARGIN_CLOSEOUT';
    public const MARKET_ORDER_DELAYED_TRADE_CLOSE = 'MARKET_ORDER_DELAYED_TRADE_CLOSE';
}
