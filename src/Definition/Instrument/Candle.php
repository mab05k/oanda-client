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
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;

/**
 * Class Candle.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class Candle
{
    use InstrumentTrait;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("granularity")
     * @Serializer\Type("string")
     */
    private $granularity;

    /**
     * @var array|Candlestick[]|null
     *
     * @Serializer\SerializedName("candles")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Instrument\Candlestick>")
     */
    private $candlesticks;

    /**
     * @return string|null
     */
    public function getGranularity(): ?string
    {
        return $this->granularity;
    }

    /**
     * @param string|null $granularity
     *
     * @return Candle
     */
    public function setGranularity(?string $granularity): self
    {
        $this->granularity = $granularity;

        return $this;
    }

    /**
     * @return Candlestick[]|array|null
     */
    public function getCandlesticks()
    {
        return $this->candlesticks;
    }

    /**
     * @param $candlesticks
     *
     * @return Candle
     */
    public function setCandlesticks(array $candlesticks): self
    {
        $this->candlesticks = $candlesticks;

        return $this;
    }

    /**
     * @param Candlestick $candle
     *
     * @return Candle
     */
    public function addCandle(Candlestick $candle): self
    {
        $this->candlesticks[] = $candle;

        return $this;
    }
}
