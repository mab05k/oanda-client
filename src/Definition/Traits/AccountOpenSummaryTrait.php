<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Definition\Position\Position;
use Mab05k\OandaClient\Definition\Trade\TradeSummary;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait AccountOpenSummaryTrait.
 */
trait AccountOpenSummaryTrait
{
    /**
     * @var \Mab05k\OandaClient\Definition\Trade\TradeSummary[]
     *
     * @Serializer\SerializedName("trades")
     */
    private $trades = [];

    /**
     * @var \Mab05k\OandaClient\Definition\Position\Position[]
     *
     * @Serializer\SerializedName("positions")
     */
    private $positions = [];

    /**
     * @var \Mab05k\OandaClient\Definition\Order\Order[]
     *
     * @Serializer\SerializedName("orders")
     */
    private $orders = [];

    /**
     * @return TradeSummary[]
     */
    public function getTrades()
    {
        return $this->trades;
    }

    /**
     * @param TradeSummary[] $trades
     *
     * @return AccountOpenSummaryTrait
     */
    public function setTrades($trades)
    {
        $this->trades = $trades;

        return $this;
    }

    /**
     * @return Position[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param Position[] $positions
     *
     * @return AccountOpenSummaryTrait
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * @return Order[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param Order[] $orders
     *
     * @return AccountOpenSummaryTrait
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }
}
