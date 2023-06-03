<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request;

use Brick\Math\BigDecimal;
use Mab05k\OandaClient\Definition\Account\Configuration;

/**
 * Class AccountRequestFactory.
 */
class AccountRequestFactory
{
    /**
     * @param string     $alias
     * @param BigDecimal $marginRate
     *
     * @return Configuration
     */
    public static function configuration(
        string $alias = null,
        BigDecimal $marginRate = null
    ): Configuration {
        return (new Configuration())
            ->setMarginRate($marginRate)
            ->setAlias($alias);
    }
}
