<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use Mab05k\OandaClient\Definition\Traits\StopLossOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TakeProfitOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TradeClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\TrailingStopLossOnFillTrait;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderDelayedTradeClose;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderMarginCloseout;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderPositionCloseout;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class MarketOrderTransaction.
 */
class MarketOrderTransaction extends OrderCreateTransaction
{
    use TakeProfitOnFillTrait;
    use StopLossOnFillTrait;
    use TrailingStopLossOnFillTrait;
    use TradeClientExtensionsTrait;

    /**
     * @var MarketOrderPositionCloseout|null
     *
     * @Serializer\SerializedName("longPositionCloseout")
     */
    private $longPositionCloseout;

    /**
     * @var MarketOrderPositionCloseout|null
     *
     * @Serializer\SerializedName("shortPositionCloseout")
     */
    private $shortPositionCloseout;

    /**
     * @var MarketOrderMarginCloseout|null
     *
     * @Serializer\SerializedName("marginCloseout")
     */
    private $marginCloseout;

    /**
     * @var MarketOrderDelayedTradeClose|null
     *
     * @Serializer\SerializedName("delayedTradeClose")
     */
    private $delayedTradeClose;

    /**
     * @return MarketOrderPositionCloseout|null
     */
    public function getLongPositionCloseout(): ?MarketOrderPositionCloseout
    {
        return $this->longPositionCloseout;
    }

    /**
     * @param MarketOrderPositionCloseout|null $longPositionCloseout
     *
     * @return MarketOrderTransaction
     */
    public function setLongPositionCloseout(?MarketOrderPositionCloseout $longPositionCloseout): self
    {
        $this->longPositionCloseout = $longPositionCloseout;

        return $this;
    }

    /**
     * @return MarketOrderPositionCloseout|null
     */
    public function getShortPositionCloseout(): ?MarketOrderPositionCloseout
    {
        return $this->shortPositionCloseout;
    }

    /**
     * @param MarketOrderPositionCloseout|null $shortPositionCloseout
     *
     * @return MarketOrderTransaction
     */
    public function setShortPositionCloseout(?MarketOrderPositionCloseout $shortPositionCloseout): self
    {
        $this->shortPositionCloseout = $shortPositionCloseout;

        return $this;
    }

    /**
     * @return MarketOrderMarginCloseout|null
     */
    public function getMarginCloseout(): ?MarketOrderMarginCloseout
    {
        return $this->marginCloseout;
    }

    /**
     * @param MarketOrderMarginCloseout|null $marginCloseout
     *
     * @return MarketOrderTransaction
     */
    public function setMarginCloseout(?MarketOrderMarginCloseout $marginCloseout): self
    {
        $this->marginCloseout = $marginCloseout;

        return $this;
    }

    /**
     * @return MarketOrderDelayedTradeClose|null
     */
    public function getDelayedTradeClose(): ?MarketOrderDelayedTradeClose
    {
        return $this->delayedTradeClose;
    }

    /**
     * @param MarketOrderDelayedTradeClose|null $delayedTradeClose
     *
     * @return MarketOrderTransaction
     */
    public function setDelayedTradeClose(?MarketOrderDelayedTradeClose $delayedTradeClose): self
    {
        $this->delayedTradeClose = $delayedTradeClose;

        return $this;
    }
}
