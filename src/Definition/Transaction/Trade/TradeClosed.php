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
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\HalfSpreadCostTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;

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
     * @var Money|null
     *
     * @Serializer\SerializedName("realizedPL")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $realizedPl;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("guaranteedExecutionFee")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $guaranteedExecutionFee;

    /**
     * @return Money|null
     */
    public function getRealizedPl(): ?Money
    {
        return $this->realizedPl;
    }

    /**
     * @param Money|null $realizedPl
     */
    public function setRealizedPl(?Money $realizedPl): void
    {
        $this->realizedPl = $realizedPl;
    }

    /**
     * @return Money|null
     */
    public function getGuaranteedExecutionFee(): ?Money
    {
        return $this->guaranteedExecutionFee;
    }

    /**
     * @param Money|null $guaranteedExecutionFee
     */
    public function setGuaranteedExecutionFee(?Money $guaranteedExecutionFee): void
    {
        $this->guaranteedExecutionFee = $guaranteedExecutionFee;
    }
}
