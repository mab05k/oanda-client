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
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class AbstractPrice.
 *
 * @Serializer\DiscriminatorMap(
 *     typeProperty="type",
 *     mapping={
 *         "ask"="Mab05k\OandaClient\Definition\Pricing\Price\Ask",
 *         "mid"="Mab05k\OandaClient\Definition\Pricing\Price\Mid",
 *         "bid"="Mab05k\OandaClient\Definition\Pricing\Price\Bid",
 *     }
 * )
 */
abstract class AbstractPrice
{
    /**
     * @var \Brick\Money\Money
     *
     * @Serializer\SerializedName("o")
     */
    private $open;

    /**
     * @var \Brick\Money\Money
     *
     * @Serializer\SerializedName("h")
     */
    private $high;

    /**
     * @var \Brick\Money\Money
     *
     * @Serializer\SerializedName("l")
     */
    private $low;

    /**
     * @var \Brick\Money\Money
     *
     * @Serializer\SerializedName("c")
     */
    private $close;

    /**
     * @return string
     *
     * @Serializer\SerializedName("objectType")
     */
    abstract public function getType(): string;

    /**
     * @return \Brick\Money\Money
     */
    public function getOpen(): Money
    {
        return $this->open;
    }

    /**
     * @param \Brick\Money\Money $open
     *
     * @return AbstractPrice
     */
    public function setOpen(Money $open): self
    {
        $this->open = $open;

        return $this;
    }

    /**
     * @return \Brick\Money\Money
     */
    public function getHigh(): Money
    {
        return $this->high;
    }

    /**
     * @param \Brick\Money\Money $high
     *
     * @return AbstractPrice
     */
    public function setHigh(Money $high): self
    {
        $this->high = $high;

        return $this;
    }

    /**
     * @return \Brick\Money\Money
     */
    public function getLow(): Money
    {
        return $this->low;
    }

    /**
     * @param \Brick\Money\Money $low
     *
     * @return AbstractPrice
     */
    public function setLow(Money $low): self
    {
        $this->low = $low;

        return $this;
    }

    /**
     * @return \Brick\Money\Money
     */
    public function getClose(): Money
    {
        return $this->close;
    }

    /**
     * @param \Brick\Money\Money $close
     *
     * @return AbstractPrice
     */
    public function setClose(Money $close): self
    {
        $this->close = $close;

        return $this;
    }
}
