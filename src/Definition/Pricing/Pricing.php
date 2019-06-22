<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing;

use Mab05k\OandaClient\Definition\Traits\TimeTrait;
use Mab05k\OandaClient\Exception\InvalidPriceException;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Pricing.
 */
class Pricing
{
    use TimeTrait;

    /**
     * @var Price[]|null
     *
     * @Serializer\SerializedName("prices")
     */
    private $prices;

    /**
     * @param string $instrument
     *
     * @throws InvalidPriceException
     *
     * @return Price
     */
    public function getPrice(string $instrument): Price
    {
        foreach ($this->getPrices() as $price) {
            if ($price->getInstrument() === $instrument) {
                return $price;
            }
        }

        throw new InvalidPriceException(sprintf('No price found for Instrument: %s', $instrument), 4004);
    }

    /**
     * @return Price[]|null
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param Price[]|null $prices
     *
     * @return Pricing
     */
    public function setPrices(?array $prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @param string $instrument
     *
     * @throws InvalidPriceException
     * @throws \Mab05k\OandaClient\Exception\PriceBucketNotFoundException
     *
     * @return PriceBucket|null
     */
    public function getMinAskForInstrument(string $instrument): ?PriceBucket
    {
        foreach ($this->getPrices() as $price) {
            if ($price->getInstrument() !== $instrument) {
                continue;
            }

            return $price->getMinAsk();
        }

        throw new InvalidPriceException(sprintf('No price found for Instrument: %s', $instrument), 4002);
    }

    /**
     * @param string $instrument
     *
     * @throws InvalidPriceException
     * @throws \Mab05k\OandaClient\Exception\PriceBucketNotFoundException
     *
     * @return PriceBucket|null
     */
    public function getMaxBidForInstrument(string $instrument): ?PriceBucket
    {
        foreach ($this->getPrices() as $price) {
            if ($price->getInstrument() !== $instrument) {
                continue;
            }

            return $price->getMaxBid();
        }

        throw new InvalidPriceException(sprintf('No price found for Instrument: %s', $instrument), 4003);
    }
}
