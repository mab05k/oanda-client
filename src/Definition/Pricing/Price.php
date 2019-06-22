<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing;

use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Pricing\Price\UnitsAvailable;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\TimeTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Exception\PriceBucketNotFoundException;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Price.
 */
class Price
{
    use TypeTrait;
    use InstrumentTrait;
    use TimeTrait;

    /**
     * @var PriceBucket[]|null
     *
     * @Serializer\SerializedName("bids")
     */
    private $bids;

    /**
     * @var PriceBucket[]|null
     *
     * @Serializer\SerializedName("asks")
     */
    private $asks;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("closeoutBid")
     */
    private $closeoutBid;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("closeoutAsk")
     */
    private $closeoutAsk;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("tradeable")
     */
    private $tradeable;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("status")
     */
    private $status;

    /**
     * @var UnitsAvailable|null
     *
     * @Serializer\SerializedName("unitsAvailable")
     */
    private $unitsAvailable;

    /**
     * @return PriceBucket[]|null
     */
    public function getBids()
    {
        return $this->bids;
    }

    /**
     * @param PriceBucket[]|null $bids
     *
     * @return Price
     */
    public function setBids($bids)
    {
        $this->bids = $bids;

        return $this;
    }

    /**
     * @return PriceBucket[]|null
     */
    public function getAsks()
    {
        return $this->asks;
    }

    /**
     * @param PriceBucket[]|null $asks
     *
     * @return Price
     */
    public function setAsks($asks)
    {
        $this->asks = $asks;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getCloseoutBid(): ?Money
    {
        return $this->closeoutBid;
    }

    /**
     * @param \Brick\Money\Money|null $closeoutBid
     *
     * @return Price
     */
    public function setCloseoutBid(?Money $closeoutBid): self
    {
        $this->closeoutBid = $closeoutBid;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getCloseoutAsk(): ?Money
    {
        return $this->closeoutAsk;
    }

    /**
     * @param \Brick\Money\Money|null $closeoutAsk
     *
     * @return Price
     */
    public function setCloseoutAsk(?Money $closeoutAsk): self
    {
        $this->closeoutAsk = $closeoutAsk;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTradeable(): ?bool
    {
        return $this->tradeable;
    }

    /**
     * @param bool|null $tradeable
     *
     * @return Price
     */
    public function setTradeable(?bool $tradeable): self
    {
        $this->tradeable = $tradeable;

        return $this;
    }

    /**
     * @throws PriceBucketNotFoundException
     *
     * @return PriceBucket
     */
    public function getMinAsk(): PriceBucket
    {
        $asks = $this->getAsks();
        if (\count($asks) <= 0) {
            throw new PriceBucketNotFoundException('No Ask Price Bucket found.', 4005);
        }

        $min = $asks[0];
        foreach ($asks as $ask) {
            if ($ask->getPrice() < $min->getPrice()) {
                $min = $ask->getPrice();
            }
        }

        return $min;
    }

    /**
     * @throws PriceBucketNotFoundException
     *
     * @return PriceBucket
     */
    public function getMaxBid(): PriceBucket
    {
        $bids = $this->getBids();
        if (\count($bids) <= 0) {
            throw new PriceBucketNotFoundException('No Bid Price Bucket found.', 4006);
        }

        $max = $bids[0];
        foreach ($bids as $bid) {
            if ($bid->getPrice() > $max->getPrice()) {
                $max = $bid->getPrice();
            }
        }

        return $max;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     *
     * @return Price
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return UnitsAvailable|null
     */
    public function getUnitsAvailable(): ?UnitsAvailable
    {
        return $this->unitsAvailable;
    }

    /**
     * @param UnitsAvailable|null $unitsAvailable
     *
     * @return Price
     */
    public function setUnitsAvailable(?UnitsAvailable $unitsAvailable): self
    {
        $this->unitsAvailable = $unitsAvailable;

        return $this;
    }
}
