<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query\Order;

use Mab05k\OandaClient\Request\Query\AbstractQueryParameter;
use Mab05k\OandaClient\Request\Query\QueryParameterInterface;

/**
 * Class State.
 */
class State extends AbstractQueryParameter implements QueryParameterInterface
{
    public const KEY = 'state';

    const PENDING = 'PENDING';
    const FILLED = 'FILLED';
    const TRIGGERED = 'TRIGGERED';
    const CANCELLED = 'CANCELLED';
    const ALL = 'ALL';
}
