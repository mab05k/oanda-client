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
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\CommissionTrait;

/**
 * Class InstrumentCommission.
 */
class InstrumentCommission
{
    use CommissionTrait;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("unitsTraded")
     *
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $unitsTraded;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("minimumCommission")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $minimumCommission;

    /**
     * @return BigDecimal|null
     */
    public function getUnitsTraded(): ?BigDecimal
    {
        return $this->unitsTraded;
    }

    /**
     * @param BigDecimal|null $unitsTraded
     *
     * @return InstrumentCommission
     */
    public function setUnitsTraded(?BigDecimal $unitsTraded): self
    {
        $this->unitsTraded = $unitsTraded;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getMinimumCommission(): ?Money
    {
        return $this->minimumCommission;
    }

    /**
     * @param Money|null $minimumCommission
     *
     * @return InstrumentCommission
     */
    public function setMinimumCommission(?Money $minimumCommission): self
    {
        $this->minimumCommission = $minimumCommission;

        return $this;
    }
}
