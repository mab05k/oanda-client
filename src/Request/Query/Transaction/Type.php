<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query\Transaction;

use Mab05k\OandaClient\Request\Query\AbstractCsvQueryParameter;
use Mab05k\OandaClient\Request\Query\QueryParameterInterface;

/**
 * Class Type.
 */
class Type extends AbstractCsvQueryParameter implements QueryParameterInterface
{
    public const KEY = 'type';

    public const ORDER = 'ORDER';
    public const FUNDING = 'FUNDING';
    public const ADMIN = 'ADMIN';
    public const CREATE = 'CREATE';
    public const CLOSE = 'CLOSE';
    public const REOPEN = 'REOPEN';
    public const CLIENT_CONFIGURE = 'CLIENT_CONFIGURE';
    public const CLIENT_CONFIGURE_REJECT = 'CLIENT_CONFIGURE_REJECT';
    public const TRANSFER_FUNDS = 'TRANSFER_FUNDS';
    public const TRANSFER_FUNDS_REJECT = 'TRANSFER_FUNDS_REJECT';
    public const MARKET_ORDER = 'MARKET_ORDER';
    public const MARKET_ORDER_REJECT = 'MARKET_ORDER_REJECT';
    public const LIMIT_ORDER = 'LIMIT_ORDER';
    public const LIMIT_ORDER_REJECT = 'LIMIT_ORDER_REJECT';
    public const STOP_ORDER = 'STOP_ORDER';
    public const STOP_ORDER_REJECT = 'STOP_ORDER_REJECT';
    public const MARKET_IF_TOUCHED_ORDER = 'MARKET_IF_TOUCHED_ORDER';
    public const MARKET_IF_TOUCHED_ORDER_REJECT = 'MARKET_IF_TOUCHED_ORDER_REJECT';
    public const TAKE_PROFIT_ORDER = 'TAKE_PROFIT_ORDER';
    public const TAKE_PROFIT_ORDER_REJECT = 'TAKE_PROFIT_ORDER_REJECT';
    public const STOP_LOSS_ORDER = 'STOP_LOSS_ORDER';
    public const STOP_LOSS_ORDER_REJECT = 'STOP_LOSS_ORDER_REJECT';
    public const TRAILING_STOP_LOSS_ORDER = 'TRAILING_STOP_LOSS_ORDER';
    public const TRAILING_STOP_LOSS_ORDER_REJECT = 'TRAILING_STOP_LOSS_ORDER_REJECT';
    public const ONE_CANCELS_ALL_ORDER = 'ONE_CANCELS_ALL_ORDER';
    public const ONE_CANCELS_ALL_ORDER_REJECT = 'ONE_CANCELS_ALL_ORDER_REJECT';
    public const ONE_CANCELS_ALL_ORDER_TRIGGERED = 'ONE_CANCELS_ALL_ORDER_TRIGGERED';
    public const ORDER_FILL = 'ORDER_FILL';
    public const ORDER_CANCEL = 'ORDER_CANCEL';
    public const ORDER_CANCEL_REJECT = 'ORDER_CANCEL_REJECT';
    public const ORDER_CLIENT_EXTENSIONS_MODIFY = 'ORDER_CLIENT_EXTENSIONS_MODIFY';
    public const ORDER_CLIENT_EXTENSIONS_MODIFY_REJECT = 'ORDER_CLIENT_EXTENSIONS_MODIFY_REJECT';
    public const TRADE_CLIENT_EXTENSIONS_MODIFY = 'TRADE_CLIENT_EXTENSIONS_MODIFY';
    public const TRADE_CLIENT_EXTENSIONS_MODIFY_REJECT = 'TRADE_CLIENT_EXTENSIONS_MODIFY_REJECT';
    public const MARGIN_CALL_ENTER = 'MARGIN_CALL_ENTER';
    public const MARGIN_CALL_EXTEND = 'MARGIN_CALL_EXTEND';
    public const MARGIN_CALL_EXIT = 'MARGIN_CALL_EXIT';
    public const DELAYED_TRADE_CLOSURE = 'DELAYED_TRADE_CLOSURE';
    public const DAILY_FINANCING = 'DAILY_FINANCING';
    public const RESET_RESETTABLE_PL = 'RESET_RESETTABLE_PL';
}
