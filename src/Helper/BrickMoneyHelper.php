<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Helper;

use Brick\Math\RoundingMode;
use Brick\Money\Context\CustomContext;
use Brick\Money\Money;

/**
 * Class BrickMoneyFactory.
 */
class BrickMoneyHelper
{
    /**
     * @param     $amount
     * @param int $precision
     *
     * @return Money
     */
    public static function create($amount, int $precision = 5): Money
    {
        return Money::of($amount, 'USD', new CustomContext($precision), RoundingMode::HALF_UP);
    }
}
