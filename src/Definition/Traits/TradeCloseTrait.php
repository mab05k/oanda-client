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
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderTradeClose;

/**
 * Trait TradeCloseTrait.
 */
trait TradeCloseTrait
{
    /**
     * @var MarketOrderTradeClose|null
     *
     * @Serializer\SerializedName("tradeClose")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderTradeClose")
     */
    private $tradeClose;

    /**
     * @return MarketOrderTradeClose|null
     */
    public function getTradeClose(): ?MarketOrderTradeClose
    {
        return $this->tradeClose;
    }

    /**
     * @param MarketOrderTradeClose|null $tradeClose
     *
     * @return $this
     */
    public function setTradeClose(?MarketOrderTradeClose $tradeClose)
    {
        $this->tradeClose = $tradeClose;

        return $this;
    }
}
