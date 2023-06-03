<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Brick\Money\Money;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Transaction\Order\FullPrice;

/**
 * Trait FullPriceTrait.
 */
trait FullPriceTrait
{
    /**
     * @var \Mab05k\OandaClient\Definition\Transaction\Order\FullPrice|null
     *
     * @Serializer\SerializedName("fullPrice")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\FullPrice")
     */
    private $fullPrice;

    /**
     * @return \Mab05k\OandaClient\Definition\Transaction\Order\FullPrice|null
     */
    public function getFullPrice(): ?FullPrice
    {
        return $this->fullPrice;
    }

    /**
     * @param \Mab05k\OandaClient\Definition\Transaction\Order\FullPrice|null $fullPrice
     *
     * @return $this
     */
    public function setFullPrice(?FullPrice $fullPrice)
    {
        $this->fullPrice = $fullPrice;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getSpread(): ?Money
    {
        $fullPrice = $this->getFullPrice();
        if (null === $fullPrice) {
            return null;
        }

        $askBucket = $fullPrice->getFirstAsk();
        $bidBucket = $fullPrice->getFirstBid();
        if (null === $askBucket || null === $bidBucket) {
            return null;
        }
        $ask = $askBucket->getPrice();
        $bid = $bidBucket->getPrice();

        return $ask->minus($bid);
    }
}
