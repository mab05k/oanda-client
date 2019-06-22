<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Trade;

use Brick\Math\BigDecimal;
use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Order\StopLossOrder;
use Mab05k\OandaClient\Definition\Order\TakeProfitOrder;
use Mab05k\OandaClient\Definition\Order\TrailingStopLossOrder;
use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\MarginUsedTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Trade.
 */
class Trade
{
    use IdTrait;
    use InstrumentTrait;
    use PriceTrait;
    use StateTrait;
    use MarginUsedTrait;
    use FinancingTrait;
    use ClientExtensionsTrait;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("openTime")
     */
    private $openTime;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("closeTime")
     */
    private $closeTime;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("initialUnits")
     */
    private $initialUnits;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("initialMarginRequired")
     */
    private $initialMarginRequired;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("currentUnits")
     */
    private $currentUnits;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("realizedPL")
     */
    private $realizedPl;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("unrealizedPL")
     */
    private $unrealizedPl;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("averageClosePrice")
     */
    private $averageClosePrice;

    /**
     * @var array|null
     *
     * @Serializer\SerializedName("closingTransactionIDs")
     */
    private $closingTransactionIds;

    /**
     * @var TakeProfitOrder|null
     *
     * @Serializer\SerializedName("takeProfitOrder")
     */
    private $takeProfitOrder;

    /**
     * @var StopLossOrder|null
     *
     * @Serializer\SerializedName("stopLossOrder")
     */
    private $stopLossOrder;

    /**
     * @var TrailingStopLossOrder|null
     *
     * @Serializer\SerializedName("trailingStopLossOrder")
     */
    private $trailingStopLossOrder;

    /**
     * @return \DateTime|null
     */
    public function getOpenTime(): ?\DateTime
    {
        return $this->openTime;
    }

    /**
     * @param \DateTime|null $openTime
     *
     * @return Trade
     */
    public function setOpenTime(?\DateTime $openTime): self
    {
        $this->openTime = $openTime;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCloseTime(): ?\DateTime
    {
        return $this->closeTime;
    }

    /**
     * @param \DateTime|null $closeTime
     *
     * @return Trade
     */
    public function setCloseTime(?\DateTime $closeTime): self
    {
        $this->closeTime = $closeTime;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getInitialUnits(): ?BigDecimal
    {
        return $this->initialUnits;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $initialUnits
     *
     * @return Trade
     */
    public function setInitialUnits(?BigDecimal $initialUnits): self
    {
        $this->initialUnits = $initialUnits;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getInitialMarginRequired(): ?Money
    {
        return $this->initialMarginRequired;
    }

    /**
     * @param \Brick\Money\Money|null $initialMarginRequired
     *
     * @return Trade
     */
    public function setInitialMarginRequired(?Money $initialMarginRequired): self
    {
        $this->initialMarginRequired = $initialMarginRequired;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getCurrentUnits(): ?BigDecimal
    {
        return $this->currentUnits;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $currentUnits
     *
     * @return Trade
     */
    public function setCurrentUnits(?BigDecimal $currentUnits): self
    {
        $this->currentUnits = $currentUnits;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getRealizedPl(): ?Money
    {
        return $this->realizedPl;
    }

    /**
     * @param \Brick\Money\Money|null $realizedPl
     *
     * @return Trade
     */
    public function setRealizedPl(?Money $realizedPl): self
    {
        $this->realizedPl = $realizedPl;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getUnrealizedPl(): ?Money
    {
        return $this->unrealizedPl;
    }

    /**
     * @param \Brick\Money\Money|null $unrealizedPl
     *
     * @return Trade
     */
    public function setUnrealizedPl(?Money $unrealizedPl): self
    {
        $this->unrealizedPl = $unrealizedPl;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getAverageClosePrice(): ?Money
    {
        return $this->averageClosePrice;
    }

    /**
     * @param \Brick\Money\Money|null $averageClosePrice
     *
     * @return Trade
     */
    public function setAverageClosePrice(?Money $averageClosePrice): self
    {
        $this->averageClosePrice = $averageClosePrice;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getClosingTransactionIds(): ?array
    {
        return $this->closingTransactionIds;
    }

    /**
     * @param array|null $closingTransactionIds
     *
     * @return Trade
     */
    public function setClosingTransactionIds(?array $closingTransactionIds): self
    {
        $this->closingTransactionIds = $closingTransactionIds;

        return $this;
    }

    /**
     * @return TakeProfitOrder|null
     */
    public function getTakeProfitOrder(): ?TakeProfitOrder
    {
        return $this->takeProfitOrder;
    }

    /**
     * @param TakeProfitOrder|null $takeProfitOrder
     *
     * @return Trade
     */
    public function setTakeProfitOrder(?TakeProfitOrder $takeProfitOrder): self
    {
        $this->takeProfitOrder = $takeProfitOrder;

        return $this;
    }

    /**
     * @return StopLossOrder|null
     */
    public function getStopLossOrder(): ?StopLossOrder
    {
        return $this->stopLossOrder;
    }

    /**
     * @param StopLossOrder|null $stopLossOrder
     *
     * @return Trade
     */
    public function setStopLossOrder(?StopLossOrder $stopLossOrder): self
    {
        $this->stopLossOrder = $stopLossOrder;

        return $this;
    }

    /**
     * @return TrailingStopLossOrder|null
     */
    public function getTrailingStopLossOrder(): ?TrailingStopLossOrder
    {
        return $this->trailingStopLossOrder;
    }

    /**
     * @param TrailingStopLossOrder|null $trailingStopLossOrder
     *
     * @return Trade
     */
    public function setTrailingStopLossOrder(?TrailingStopLossOrder $trailingStopLossOrder): self
    {
        $this->trailingStopLossOrder = $trailingStopLossOrder;

        return $this;
    }
}
