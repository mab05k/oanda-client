<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Order;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\CancelledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\CreateTimeTrait;
use Mab05k\OandaClient\Definition\Traits\FilledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderDelayedTradeClose;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderMarginCloseout;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderPositionCloseout;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderTradeClose;
use Mab05k\OandaClient\Request\Order\MarketOrderRequest;

/**
 * Class MarketOrder.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class MarketOrder extends MarketOrderRequest
{
    use IdTrait;
    use CreateTimeTrait;
    use StateTrait;
    use FilledOrderTrait;
    use TradeStatusIdTrait;
    use CancelledOrderTrait;

    /**
     * @var MarketOrderTradeClose|null
     *
     * @Serializer\SerializedName("tradeClose")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderTradeClose")
     */
    private $tradeClose;

    /**
     * @var MarketOrderPositionCloseout|null
     *
     * @Serializer\SerializedName("longPositionCloseout")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderPositionCloseout")
     */
    private $longPositionCloseout;

    /**
     * @var MarketOrderPositionCloseout|null
     *
     * @Serializer\SerializedName("shortPositionCloseout")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderPositionCloseout")
     */
    private $shortPositionCloseout;

    /**
     * @var MarketOrderMarginCloseout|null
     *
     * @Serializer\SerializedName("marginCloseout")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderMarginCloseout")
     */
    private $marginCloseout;

    /**
     * @var MarketOrderDelayedTradeClose|null
     *
     * @Serializer\SerializedName("delayedTradeClose")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderDelayedTradeClose")
     */
    private $delayedTradeClose;

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
     * @return MarketOrder
     */
    public function setTradeClose(?MarketOrderTradeClose $tradeClose): self
    {
        $this->tradeClose = $tradeClose;

        return $this;
    }

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
     * @return MarketOrder
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
     * @return MarketOrder
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
     * @return MarketOrder
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
     * @return MarketOrder
     */
    public function setDelayedTradeClose(?MarketOrderDelayedTradeClose $delayedTradeClose): self
    {
        $this->delayedTradeClose = $delayedTradeClose;

        return $this;
    }
}
