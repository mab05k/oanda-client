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
use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\HalfSpreadCostTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;

/**
 * Class TradeOpened.
 */
class TradeOpened
{
    use PriceTrait;
    use TradeIdTrait;
    use UnitTrait;
    use HalfSpreadCostTrait;
    use ClientExtensionsTrait;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("initialMarginRequired")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $initialMarginRequired;

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
    public function getInitialMarginRequired(): ?Money
    {
        return $this->initialMarginRequired;
    }

    /**
     * @param Money|null $initialMarginRequired
     *
     * @return TradeOpened
     */
    public function setInitialMarginRequired(?Money $initialMarginRequired): self
    {
        $this->initialMarginRequired = $initialMarginRequired;

        return $this;
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
     *
     * @return TradeOpened
     */
    public function setGuaranteedExecutionFee(?Money $guaranteedExecutionFee): self
    {
        $this->guaranteedExecutionFee = $guaranteedExecutionFee;

        return $this;
    }
}
