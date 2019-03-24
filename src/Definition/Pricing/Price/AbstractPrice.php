<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing\Price;

use Brick\Money\Money;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractPrice.
 *
 * @Serializer\Discriminator(
 *     field="objectType",
 *     map={
 *         "ask"="Mab05k\OandaClient\Definition\Pricing\Price\Ask",
 *         "mid"="Mab05k\OandaClient\Definition\Pricing\Price\Mid",
 *         "bid"="Mab05k\OandaClient\Definition\Pricing\Price\Bid",
 *     }
 * )
 */
abstract class AbstractPrice
{
    /**
     * @var Money
     *
     * @Serializer\SerializedName("o")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $open;

    /**
     * @var Money
     *
     * @Serializer\SerializedName("h")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $high;

    /**
     * @var Money
     *
     * @Serializer\SerializedName("l")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $low;

    /**
     * @var Money
     *
     * @Serializer\SerializedName("c")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $close;

    /**
     * @return string
     *
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     */
    abstract public function getType(): string;

    /**
     * @return Money
     */
    public function getOpen(): Money
    {
        return $this->open;
    }

    /**
     * @param Money $open
     *
     * @return AbstractPrice
     */
    public function setOpen(Money $open): self
    {
        $this->open = $open;

        return $this;
    }

    /**
     * @return Money
     */
    public function getHigh(): Money
    {
        return $this->high;
    }

    /**
     * @param Money $high
     *
     * @return AbstractPrice
     */
    public function setHigh(Money $high): self
    {
        $this->high = $high;

        return $this;
    }

    /**
     * @return Money
     */
    public function getLow(): Money
    {
        return $this->low;
    }

    /**
     * @param Money $low
     *
     * @return AbstractPrice
     */
    public function setLow(Money $low): self
    {
        $this->low = $low;

        return $this;
    }

    /**
     * @return Money
     */
    public function getClose(): Money
    {
        return $this->close;
    }

    /**
     * @param Money $close
     *
     * @return AbstractPrice
     */
    public function setClose(Money $close): self
    {
        $this->close = $close;

        return $this;
    }
}
