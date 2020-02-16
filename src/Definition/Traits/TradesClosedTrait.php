<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Transaction\Trade\TradeClosed;

/**
 * Trait TradesClosedTrait.
 */
trait TradesClosedTrait
{
    /**
     * @var array|\Mab05k\OandaClient\Definition\Transaction\Trade\TradeClosed[]
     *
     * @Serializer\SerializedName("tradesClosed")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Transaction\Trade\TradeClosed>")
     */
    private $tradesClosed;

    /**
     * @return \Mab05k\OandaClient\Definition\Transaction\Trade\TradeClosed[]|array
     */
    public function getTradesClosed()
    {
        return $this->tradesClosed;
    }

    /**
     * @param \Mab05k\OandaClient\Definition\Transaction\Trade\TradeClosed[]|array $tradesClosed
     *
     * @return TradesClosedTrait
     */
    public function setTradesClosed($tradesClosed)
    {
        $this->tradesClosed = $tradesClosed;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFirstTradeClosedId(): ?int
    {
        $firstTradeClosed = $this->getFirstTradeClosed();
        if (null === $firstTradeClosed) {
            return null;
        }

        return (int) $firstTradeClosed->getTradeId();
    }

    /**
     * @return TradeClosed|null
     */
    public function getFirstTradeClosed(): ?TradeClosed
    {
        return $this->tradesClosed[0] ?? null;
    }
}
