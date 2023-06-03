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
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Pricing\Price\UnitsAvailable;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\TimeTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Exception\PriceBucketNotFoundException;

/**
 * Class Price.
 */
class Price
{
    use InstrumentTrait;
    use TimeTrait;
    use TypeTrait;

    /**
     * @var array|PriceBucket[]|null
     *
     * @Serializer\SerializedName("bids")
     *
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Pricing\PriceBucket>")
     */
    private $bids;

    /**
     * @var array|PriceBucket[]|null
     *
     * @Serializer\SerializedName("asks")
     *
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Pricing\PriceBucket>")
     */
    private $asks;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("closeoutBid")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $closeoutBid;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("closeoutAsk")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $closeoutAsk;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("tradeable")
     *
     * @Serializer\Type("boolean")
     */
    private $tradeable;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("status")
     *
     * @Serializer\Type("string")
     */
    private $status;

    /**
     * @var UnitsAvailable|null
     *
     * @Serializer\SerializedName("unitsAvailable")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\UnitsAvailable")
     */
    private $unitsAvailable;

    /**
     * @return PriceBucket[]|array|null
     */
    public function getBids()
    {
        return $this->bids;
    }

    /**
     * @param PriceBucket[]|array|null $bids
     *
     * @return Price
     */
    public function setBids($bids)
    {
        $this->bids = $bids;

        return $this;
    }

    /**
     * @return PriceBucket[]|array|null
     */
    public function getAsks()
    {
        return $this->asks;
    }

    /**
     * @param PriceBucket[]|array|null $asks
     *
     * @return Price
     */
    public function setAsks($asks)
    {
        $this->asks = $asks;

        return $this;
    }

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
     * @return Price
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
