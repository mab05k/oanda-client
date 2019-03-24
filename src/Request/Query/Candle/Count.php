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
 * Class Count.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class Count extends AbstractIntegerQueryParameter implements QueryParameterInterface
{
    public const KEY = 'count';

    /**
     * Count constructor.
     *
     * @param int $value
     */
    public function __construct(int $value = null)
    {
        if ($value <= 0 || $value > 5000 || null === $value) {
            $value = 500;
        }

        parent::__construct($value);
    }
}
