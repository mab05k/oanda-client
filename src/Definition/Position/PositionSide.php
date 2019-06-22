<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Position;

use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\GuaranteedExecutionFeesTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class PositionSide.
 */
class PositionSide
{
    use ProfitLossTrait;
    use FinancingTrait;
    use GuaranteedExecutionFeesTrait;
    use UnitTrait;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("averagePrice")
     */
    private $averagePrice;

    /**
     * @var null
     *
     * @Serializer\SerializedName("tradeIDs")
     */
    private $tradeIds;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getAveragePrice(): ?Money
    {
        return $this->averagePrice;
    }

    /**
     * @param \Brick\Money\Money|null $averagePrice
     *
     * @return PositionSide
     */
    public function setAveragePrice(?Money $averagePrice): self
    {
        $this->averagePrice = $averagePrice;

        return $this;
    }

    public function getTradeIds(): ?array
    {
        return $this->tradeIds;
    }

    /**
     * @param null $tradeIds
     *
     * @return PositionSide
     */
    public function setTradeIds(?array $tradeIds): self
    {
        $this->tradeIds = $tradeIds;

        return $this;
    }
}
