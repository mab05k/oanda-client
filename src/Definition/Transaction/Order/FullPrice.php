<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use Brick\Money\Money;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Pricing\PriceBucket;
use Mab05k\OandaClient\Definition\Traits\IdTrait;

/**
 * Class FullPrice.
 */
class FullPrice
{
    use IdTrait;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("closeoutBid")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $closeoutBid;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("closeoutAsk")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $closeoutAsk;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("timestamp")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $timestamp;

    /**
     * @var array|null
     *
     * @Serializer\SerializedName("bids")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Pricing\PriceBucket>")
     */
    private $bids;

    /**
     * @var array|null
     *
     * @Serializer\SerializedName("asks")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Pricing\PriceBucket>")
     */
    private $asks;

    /**
     * @return Money|null
     */
    public function getCloseoutBid(): ?Money
    {
        return $this->closeoutBid;
    }

    /**
     * @param Money|null $closeoutBid
     *
     * @return FullPrice
     */
    public function setCloseoutBid(?Money $closeoutBid): self
    {
        $this->closeoutBid = $closeoutBid;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getCloseoutAsk(): ?Money
    {
        return $this->closeoutAsk;
    }

    /**
     * @param Money|null $closeoutAsk
     *
     * @return FullPrice
     */
    public function setCloseoutAsk(?Money $closeoutAsk): self
    {
        $this->closeoutAsk = $closeoutAsk;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestamp(): ?\DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime|null $timestamp
     *
     * @return FullPrice
     */
    public function setTimestamp(?\DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return array|PriceBucket[]|null
     */
    public function getBids(): ?array
    {
        return $this->bids;
    }

    /**
     * @param array|null $bids
     *
     * @return FullPrice
     */
    public function setBids(?array $bids): self
    {
        $this->bids = $bids;

        return $this;
    }

    /**
     * @return PriceBucket|null
     */
    public function getFirstBid(): ?PriceBucket
    {
        foreach ($this->bids as $bid) {
            return $bid;
        }

        return null;
    }

    /**
     * @return array|PriceBucket[]|null
     */
    public function getAsks(): ?array
    {
        return $this->asks;
    }

    /**
     * @return PriceBucket|null
     */
    public function getFirstAsk(): ?PriceBucket
    {
        foreach ($this->asks as $ask) {
            return $ask;
        }

        return null;
    }

    /**
     * @param array|null $asks
     *
     * @return FullPrice
     */
    public function setAsks(?array $asks): self
    {
        $this->asks = $asks;

        return $this;
    }
}
