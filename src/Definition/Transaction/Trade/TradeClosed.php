<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Trade;

use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\HalfSpreadCostTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class TradeClosed.
 */
class TradeClosed
{
    use TradeIdTrait;
    use UnitTrait;
    use PriceTrait;
    use HalfSpreadCostTrait;
    use FinancingTrait;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("realizedPL")
     */
    private $realizedPl;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("guaranteedExecutionFee")
     */
    private $guaranteedExecutionFee;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getRealizedPl(): ?Money
    {
        return $this->realizedPl;
    }

    /**
     * @param \Brick\Money\Money|null $realizedPl
     */
    public function setRealizedPl(?Money $realizedPl): void
    {
        $this->realizedPl = $realizedPl;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getGuaranteedExecutionFee(): ?Money
    {
        return $this->guaranteedExecutionFee;
    }

    /**
     * @param \Brick\Money\Money|null $guaranteedExecutionFee
     */
    public function setGuaranteedExecutionFee(?Money $guaranteedExecutionFee): void
    {
        $this->guaranteedExecutionFee = $guaranteedExecutionFee;
    }
}
