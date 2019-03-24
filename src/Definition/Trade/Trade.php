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
use JMS\Serializer\Annotation as Serializer;
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
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $openTime;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("closeTime")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $closeTime;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("initialUnits")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $initialUnits;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("initialMarginRequired")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $initialMarginRequired;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("currentUnits")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $currentUnits;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("realizedPL")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $realizedProfitLoss;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("unrealizedPL")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $unrealizedProfitLoss;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("averageClosePrice")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $averageClosePrice;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("closingTransactionIDs")
     * @Serializer\Type("array<integer>")
     */
    private $closingTransactionIds;

    /**
     * @var TakeProfitOrder|null
     *
     * @Serializer\SerializedName("takeProfitOrder")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Order\TakeProfitOrder")
     */
    private $takeProfitOrder;

    /**
     * @var StopLossOrder|null
     *
     * @Serializer\SerializedName("stopLossOrder")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Order\StopLossOrder")
     */
    private $stopLossOrder;

    /**
     * @var TrailingStopLossOrder|null
     *
     * @Serializer\SerializedName("trailingStopLossOrder")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Order\TrailingStopLossOrder")
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
     * @return BigDecimal|null
     */
    public function getInitialUnits(): ?BigDecimal
    {
        return $this->initialUnits;
    }

    /**
     * @param BigDecimal|null $initialUnits
     *
     * @return Trade
     */
    public function setInitialUnits(?BigDecimal $initialUnits): self
    {
        $this->initialUnits = $initialUnits;

        return $this;
    }

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
     * @return Trade
     */
    public function setInitialMarginRequired(?Money $initialMarginRequired): self
    {
        $this->initialMarginRequired = $initialMarginRequired;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getCurrentUnits(): ?BigDecimal
    {
        return $this->currentUnits;
    }

    /**
     * @param BigDecimal|null $currentUnits
     *
     * @return Trade
     */
    public function setCurrentUnits(?BigDecimal $currentUnits): self
    {
        $this->currentUnits = $currentUnits;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getRealizedProfitLoss(): ?Money
    {
        return $this->realizedProfitLoss;
    }

    /**
     * @param Money|null $realizedProfitLoss
     *
     * @return Trade
     */
    public function setRealizedProfitLoss(?Money $realizedProfitLoss): self
    {
        $this->realizedProfitLoss = $realizedProfitLoss;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getUnrealizedProfitLoss(): ?Money
    {
        return $this->unrealizedProfitLoss;
    }

    /**
     * @param Money|null $unrealizedProfitLoss
     *
     * @return Trade
     */
    public function setUnrealizedProfitLoss(?Money $unrealizedProfitLoss): self
    {
        $this->unrealizedProfitLoss = $unrealizedProfitLoss;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getAverageClosePrice(): ?Money
    {
        return $this->averageClosePrice;
    }

    /**
     * @param Money|null $averageClosePrice
     *
     * @return Trade
     */
    public function setAverageClosePrice(?Money $averageClosePrice): self
    {
        $this->averageClosePrice = $averageClosePrice;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getClosingTransactionIds(): ?Money
    {
        return $this->closingTransactionIds;
    }

    /**
     * @param Money|null $closingTransactionIds
     *
     * @return Trade
     */
    public function setClosingTransactionIds(?Money $closingTransactionIds): self
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
