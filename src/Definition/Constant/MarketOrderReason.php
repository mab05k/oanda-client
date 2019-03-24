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
 * Class MarketOrderReason.
 */
final class MarketOrderReason
{
    public const CLIENT_ORDER = 'CLIENT_ORDER';
    public const TRADE_CLOSE = 'TRADE_CLOSE';
    public const POSITION_CLOSEOUT = 'POSITION_CLOSEOUT';
    public const MARGIN_CLOSEOUT = 'MARGIN_CLOSEOUT';
    public const DELAYED_TRADE_CLOSE = 'DELAYED_TRADE_CLOSE';
}
