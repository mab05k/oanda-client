<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\MarketOrder;

use Brick\Math\BigDecimal;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class MarketOrderPositionCloseout.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class MarketOrderPositionCloseout
{
    use InstrumentTrait;

    /**
     * @var string|BigDecimal|null
     *
     * @Serializer\SerializedName("units")
     */
    private $units;

    /**
     * @return \Brick\Math\BigDecimal|string|null
     */
    public function getUnits()
    {
        if (is_numeric($this->units)) {
            return BigDecimal::of($this->units);
        }

        return $this->units;
    }

    /**
     * @param \Brick\Math\BigDecimal|string|null $units
     *
     * @return MarketOrderPositionCloseout
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }
}
