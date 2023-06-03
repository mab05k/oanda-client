<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Instrument;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Pricing\Price\AbstractPrice;
use Mab05k\OandaClient\Definition\Pricing\Price\Ask;
use Mab05k\OandaClient\Definition\Pricing\Price\Bid;
use Mab05k\OandaClient\Definition\Pricing\Price\Mid;
use Mab05k\OandaClient\Definition\Traits\TimeTrait;
use Mab05k\OandaClient\Exception\CandlePriceException;

/**
 * Class Candle.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class Candlestick
{
    use TimeTrait;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("complete")
     *
     * @Serializer\Type("boolean")
     */
    private $complete;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("volume")
     *
     * @Serializer\Type("integer")
     */
    private $volume;

    /**
     * @var Bid|null
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\Bid")
     *
     * @Serializer\SerializedName("bid")
     *
     * @Serializer\Groups("bid")
     */
    private $bid;

    /**
     * @var Ask|null
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\Ask")
     *
     * @Serializer\SerializedName("ask")
     *
     * @Serializer\Groups("ask")
     */
    private $ask;

    /**
     * @var Mid|null
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\Mid")
     *
     * @Serializer\SerializedName("mid")
     *
     * @Serializer\Groups("mid")
     */
    private $mid;

    /**
     * @var AbstractPrice|Ask|Mid|Bid|null
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\AbstractPrice")
     */
    private $price;

    /**
     * @return bool|null
     */
    public function getComplete(): ?bool
    {
        return $this->complete;
    }

    /**
     * @param bool|null $complete
     *
     * @return Candlestick
     */
    public function setComplete(?bool $complete): self
    {
        $this->complete = $complete;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVolume(): ?int
    {
        return $this->volume;
    }

    /**
     * @param int|null $volume
     *
     * @return Candlestick
     */
    public function setVolume(?int $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @throws CandlePriceException
     *
     * @return AbstractPrice|null
     */
    public function getPrice(): ?AbstractPrice
    {
        if (null !== $this->ask) {
            return $this->ask;
        }

        if (null !== $this->bid) {
            return $this->bid;
        }

        if (null !== $this->mid) {
            return $this->mid;
        }

        throw new CandlePriceException('No price provided for candle', 4001);
    }

    /**
     * @return Bid|null
     */
    public function getBid(): ?Bid
    {
        return $this->bid;
    }

    /**
     * @param Bid|null $bid
     *
     * @return Candlestick
     */
    public function setBid(?Bid $bid): self
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * @return Ask|null
     */
    public function getAsk(): ?Ask
    {
        return $this->ask;
    }

    /**
     * @param Ask|null $ask
     *
     * @return Candlestick
     */
    public function setAsk(?Ask $ask): self
    {
        $this->ask = $ask;

        return $this;
    }

    /**
     * @return Mid|null
     */
    public function getMid(): ?Mid
    {
        return $this->mid;
    }

    /**
     * @param Mid|null $mid
     *
     * @return Candlestick
     */
    public function setMid(?Mid $mid): self
    {
        $this->mid = $mid;

        return $this;
    }
}
