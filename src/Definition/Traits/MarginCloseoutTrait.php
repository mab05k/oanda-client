<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Brick\Math\BigDecimal;
use Brick\Money\Money;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait MarginCloseoutTrait.
 */
trait MarginCloseoutTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginCloseoutUnrealizedPL")
     */
    private $marginCloseoutUnrealizedPl;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginCloseoutNAV")
     */
    private $marginCloseoutNav;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginCloseoutMarginUsed")
     */
    private $marginCloseoutMarginUsed;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginCloseoutPositionValue")
     */
    private $marginCloseoutPositionValue;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("marginCloseoutPercent")
     */
    private $marginCloseoutPercent;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginCallMarginUsed")
     */
    private $marginCallMarginUsed;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("marginCallPercent")
     */
    private $marginCallPercent;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginCloseoutUnrealizedPl(): ?Money
    {
        return $this->marginCloseoutUnrealizedPl;
    }

    /**
     * @param \Brick\Money\Money|null $marginCloseoutUnrealizedPl
     *
     * @return $this
     */
    public function setMarginCloseoutUnrealizedPl(?Money $marginCloseoutUnrealizedPl)
    {
        $this->marginCloseoutUnrealizedPl = $marginCloseoutUnrealizedPl;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginCloseoutNav(): ?Money
    {
        return $this->marginCloseoutNav;
    }

    /**
     * @param \Brick\Money\Money|null $marginCloseoutNav
     *
     * @return $this
     */
    public function setMarginCloseoutNav(?Money $marginCloseoutNav)
    {
        $this->marginCloseoutNav = $marginCloseoutNav;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginCloseoutMarginUsed(): ?Money
    {
        return $this->marginCloseoutMarginUsed;
    }

    /**
     * @param \Brick\Money\Money|null $marginCloseoutMarginUsed
     *
     * @return $this
     */
    public function setMarginCloseoutMarginUsed(?Money $marginCloseoutMarginUsed)
    {
        $this->marginCloseoutMarginUsed = $marginCloseoutMarginUsed;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginCloseoutPositionValue(): ?Money
    {
        return $this->marginCloseoutPositionValue;
    }

    /**
     * @param \Brick\Money\Money|null $marginCloseoutPositionValue
     *
     * @return $this
     */
    public function setMarginCloseoutPositionValue(?Money $marginCloseoutPositionValue)
    {
        $this->marginCloseoutPositionValue = $marginCloseoutPositionValue;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getMarginCloseoutPercent(): ?BigDecimal
    {
        return $this->marginCloseoutPercent;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $marginCloseoutPercent
     *
     * @return $this
     */
    public function setMarginCloseoutPercent(?BigDecimal $marginCloseoutPercent)
    {
        $this->marginCloseoutPercent = $marginCloseoutPercent;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginCallMarginUsed(): ?Money
    {
        return $this->marginCallMarginUsed;
    }

    /**
     * @param \Brick\Money\Money|null $marginCallMarginUsed
     *
     * @return $this
     */
    public function setMarginCallMarginUsed(?Money $marginCallMarginUsed)
    {
        $this->marginCallMarginUsed = $marginCallMarginUsed;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getMarginCallPercent(): ?BigDecimal
    {
        return $this->marginCallPercent;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $marginCallPercent
     *
     * @return $this
     */
    public function setMarginCallPercent(?BigDecimal $marginCallPercent)
    {
        $this->marginCallPercent = $marginCallPercent;

        return $this;
    }
}
