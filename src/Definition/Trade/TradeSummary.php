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
use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\ClosingTransactionIdsTrait;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\MarginUsedTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class TradeSummary.
 */
class TradeSummary
{
    use IdTrait;
    use InstrumentTrait;
    use PriceTrait;
    use StateTrait;
    use ProfitLossTrait;
    use MarginUsedTrait;
    use ClosingTransactionIdsTrait;
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
     * @var \Brick\Math\BigDecimal|null
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
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("averageClosePrice")
     */
    private $averageClosePrice;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("takeProfitOrderId")
     */
    private $takeProfitOrderId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("stopLossOrderId")
     */
    private $stopLossOrderId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("trailingStopLossOrderId")
     */
    private $trailingStopLossOrderId;

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
     * @return TradeSummary
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
     * @return TradeSummary
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
     * @return TradeSummary
     */
    public function setInitialUnits(?BigDecimal $initialUnits): self
    {
        $this->initialUnits = $initialUnits;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getInitialMarginRequired(): ?BigDecimal
    {
        return $this->initialMarginRequired;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $initialMarginRequired
     *
     * @return TradeSummary
     */
    public function setInitialMarginRequired(?BigDecimal $initialMarginRequired): self
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
     * @return TradeSummary
     */
    public function setCurrentUnits(?BigDecimal $currentUnits): self
    {
        $this->currentUnits = $currentUnits;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getAverageClosePrice(): ?BigDecimal
    {
        return $this->averageClosePrice;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $averageClosePrice
     *
     * @return TradeSummary
     */
    public function setAverageClosePrice(?BigDecimal $averageClosePrice): self
    {
        $this->averageClosePrice = $averageClosePrice;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTakeProfitOrderId(): ?int
    {
        return $this->takeProfitOrderId;
    }

    /**
     * @param int|null $takeProfitOrderId
     *
     * @return TradeSummary
     */
    public function setTakeProfitOrderId(?int $takeProfitOrderId): self
    {
        $this->takeProfitOrderId = $takeProfitOrderId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStopLossOrderId(): ?int
    {
        return $this->stopLossOrderId;
    }

    /**
     * @param int|null $stopLossOrderId
     *
     * @return TradeSummary
     */
    public function setStopLossOrderId(?int $stopLossOrderId): self
    {
        $this->stopLossOrderId = $stopLossOrderId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrailingStopLossOrderId(): ?int
    {
        return $this->trailingStopLossOrderId;
    }

    /**
     * @param int|null $trailingStopLossOrderId
     *
     * @return TradeSummary
     */
    public function setTrailingStopLossOrderId(?int $trailingStopLossOrderId): self
    {
        $this->trailingStopLossOrderId = $trailingStopLossOrderId;

        return $this;
    }
}
