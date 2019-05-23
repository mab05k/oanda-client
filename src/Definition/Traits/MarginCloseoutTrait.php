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
use JMS\Serializer\Annotation as Serializer;

/**
 * Trait MarginCloseoutTrait.
 */
trait MarginCloseoutTrait
{
    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginCloseoutUnrealizedPL")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginCloseoutUnrealizedPl;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginCloseoutNAV")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginCloseoutNav;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginCloseoutMarginUsed")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginCloseoutMarginUsed;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginCloseoutPositionValue")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginCloseoutPositionValue;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("marginCloseoutPercent")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $marginCloseoutPercent;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginCallMarginUsed")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginCallMarginUsed;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("marginCallPercent")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $marginCallPercent;

    /**
     * @return Money|null
     */
    public function getMarginCloseoutUnrealizedPl(): ?Money
    {
        return $this->marginCloseoutUnrealizedPl;
    }

    /**
     * @param Money|null $marginCloseoutUnrealizedPl
     *
     * @return $this
     */
    public function setMarginCloseoutUnrealizedPl(?Money $marginCloseoutUnrealizedPl)
    {
        $this->marginCloseoutUnrealizedPl = $marginCloseoutUnrealizedPl;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getMarginCloseoutNav(): ?Money
    {
        return $this->marginCloseoutNav;
    }

    /**
     * @param Money|null $marginCloseoutNav
     *
     * @return $this
     */
    public function setMarginCloseoutNav(?Money $marginCloseoutNav)
    {
        $this->marginCloseoutNav = $marginCloseoutNav;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getMarginCloseoutMarginUsed(): ?Money
    {
        return $this->marginCloseoutMarginUsed;
    }

    /**
     * @param Money|null $marginCloseoutMarginUsed
     *
     * @return $this
     */
    public function setMarginCloseoutMarginUsed(?Money $marginCloseoutMarginUsed)
    {
        $this->marginCloseoutMarginUsed = $marginCloseoutMarginUsed;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getMarginCloseoutPositionValue(): ?Money
    {
        return $this->marginCloseoutPositionValue;
    }

    /**
     * @param Money|null $marginCloseoutPositionValue
     *
     * @return $this
     */
    public function setMarginCloseoutPositionValue(?Money $marginCloseoutPositionValue)
    {
        $this->marginCloseoutPositionValue = $marginCloseoutPositionValue;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getMarginCloseoutPercent(): ?BigDecimal
    {
        return $this->marginCloseoutPercent;
    }

    /**
     * @param BigDecimal|null $marginCloseoutPercent
     *
     * @return $this
     */
    public function setMarginCloseoutPercent(?BigDecimal $marginCloseoutPercent)
    {
        $this->marginCloseoutPercent = $marginCloseoutPercent;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getMarginCallMarginUsed(): ?Money
    {
        return $this->marginCallMarginUsed;
    }

    /**
     * @param Money|null $marginCallMarginUsed
     *
     * @return $this
     */
    public function setMarginCallMarginUsed(?Money $marginCallMarginUsed)
    {
        $this->marginCallMarginUsed = $marginCallMarginUsed;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getMarginCallPercent(): ?BigDecimal
    {
        return $this->marginCallPercent;
    }

    /**
     * @param BigDecimal|null $marginCallPercent
     *
     * @return $this
     */
    public function setMarginCallPercent(?BigDecimal $marginCallPercent)
    {
        $this->marginCallPercent = $marginCallPercent;

        return $this;
    }
}
