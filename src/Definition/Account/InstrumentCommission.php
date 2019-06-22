<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

use Brick\Math\BigDecimal;
use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\CommissionTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class InstrumentCommission.
 */
class InstrumentCommission
{
    use CommissionTrait;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("unitsTraded")
     */
    private $unitsTraded;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("minimumCommission")
     */
    private $minimumCommission;

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getUnitsTraded(): ?BigDecimal
    {
        return $this->unitsTraded;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $unitsTraded
     *
     * @return InstrumentCommission
     */
    public function setUnitsTraded(?BigDecimal $unitsTraded): self
    {
        $this->unitsTraded = $unitsTraded;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMinimumCommission(): ?Money
    {
        return $this->minimumCommission;
    }

    /**
     * @param \Brick\Money\Money|null $minimumCommission
     *
     * @return InstrumentCommission
     */
    public function setMinimumCommission(?Money $minimumCommission): self
    {
        $this->minimumCommission = $minimumCommission;

        return $this;
    }
}
