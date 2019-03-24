<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query\Candle;

use Mab05k\OandaClient\Request\Query\AbstractIntegerQueryParameter;
use Mab05k\OandaClient\Request\Query\QueryParameterInterface;

/**
 * Class DailyAlignment.
 */
class DailyAlignment extends AbstractIntegerQueryParameter implements QueryParameterInterface
{
    public const KEY = 'dailyAlignment';

    public function __construct(int $value = null)
    {
        if (0 > $value || 23 < $value || null === $value) {
            $value = 17;
        }

        parent::__construct($value);
    }
}
