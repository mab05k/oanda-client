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
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Instrument.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class Instrument
{
    use TypeTrait;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("name")
     */
    private $name;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("displayName")
     */
    private $displayName;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("pipLocation")
     */
    private $pipLocation;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("displayPrecision")
     */
    private $displayPrecision;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("tradeUnitsPrecision")
     */
    private $tradeUnitsPrecision;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("minimumTradeSize")
     */
    private $minimumTradeSize;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("maximumTrailingStopDistance")
     */
    private $maximumTrailingStopDistance;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("minimumTrailingStopDistance")
     */
    private $minimumTrailingStopDistance;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("maximumPositionSize")
     */
    private $maximumPositionSize;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("maximumOrderUnits")
     */
    private $maximumOrderUnits;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginRate")
     */
    private $marginRate;

    /**
     * @var InstrumentCommission|null
     *
     * @Serializer\SerializedName("commission")
     */
    private $commission;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return Instrument
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string|null $displayName
     *
     * @return Instrument
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPipLocation(): ?int
    {
        return $this->pipLocation;
    }

    /**
     * @param int|null $pipLocation
     *
     * @return Instrument
     */
    public function setPipLocation(?int $pipLocation): self
    {
        $this->pipLocation = $pipLocation;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDisplayPrecision(): ?int
    {
        return $this->displayPrecision;
    }

    /**
     * @param int|null $displayPrecision
     *
     * @return Instrument
     */
    public function setDisplayPrecision(?int $displayPrecision): self
    {
        $this->displayPrecision = $displayPrecision;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTradeUnitsPrecision(): ?int
    {
        return $this->tradeUnitsPrecision;
    }

    /**
     * @param int|null $tradeUnitsPrecision
     *
     * @return Instrument
     */
    public function setTradeUnitsPrecision(?int $tradeUnitsPrecision): self
    {
        $this->tradeUnitsPrecision = $tradeUnitsPrecision;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMinimumTradeSize(): ?Money
    {
        return $this->minimumTradeSize;
    }

    /**
     * @param \Brick\Money\Money|null $minimumTradeSize
     *
     * @return Instrument
     */
    public function setMinimumTradeSize(?Money $minimumTradeSize): self
    {
        $this->minimumTradeSize = $minimumTradeSize;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMaximumTrailingStopDistance(): ?Money
    {
        return $this->maximumTrailingStopDistance;
    }

    /**
     * @param \Brick\Money\Money|null $maximumTrailingStopDistance
     *
     * @return Instrument
     */
    public function setMaximumTrailingStopDistance(?Money $maximumTrailingStopDistance): self
    {
        $this->maximumTrailingStopDistance = $maximumTrailingStopDistance;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMinimumTrailingStopDistance(): ?Money
    {
        return $this->minimumTrailingStopDistance;
    }

    /**
     * @param \Brick\Money\Money|null $minimumTrailingStopDistance
     *
     * @return Instrument
     */
    public function setMinimumTrailingStopDistance(?Money $minimumTrailingStopDistance): self
    {
        $this->minimumTrailingStopDistance = $minimumTrailingStopDistance;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMaximumPositionSize(): ?Money
    {
        return $this->maximumPositionSize;
    }

    /**
     * @param \Brick\Money\Money|null $maximumPositionSize
     *
     * @return Instrument
     */
    public function setMaximumPositionSize(?Money $maximumPositionSize): self
    {
        $this->maximumPositionSize = $maximumPositionSize;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getMaximumOrderUnits(): ?BigDecimal
    {
        return $this->maximumOrderUnits;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $maximumOrderUnits
     *
     * @return Instrument
     */
    public function setMaximumOrderUnits(?BigDecimal $maximumOrderUnits): self
    {
        $this->maximumOrderUnits = $maximumOrderUnits;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginRate(): ?Money
    {
        return $this->marginRate;
    }

    /**
     * @param \Brick\Money\Money|null $marginRate
     *
     * @return Instrument
     */
    public function setMarginRate(?Money $marginRate): self
    {
        $this->marginRate = $marginRate;

        return $this;
    }

    /**
     * @return InstrumentCommission|null
     */
    public function getCommission(): ?InstrumentCommission
    {
        return $this->commission;
    }

    /**
     * @param InstrumentCommission|null $commission
     *
     * @return Instrument
     */
    public function setCommission(?InstrumentCommission $commission): self
    {
        $this->commission = $commission;

        return $this;
    }
}
