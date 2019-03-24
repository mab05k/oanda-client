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
use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Definition\Position\Position;
use Mab05k\OandaClient\Definition\Trade\TradeSummary;

/**
 * Trait AccountOpenSummaryTrait.
 */
trait AccountOpenSummaryTrait
{
    /**
     * @var array|TradeSummary[]
     *
     * @Serializer\SerializedName("trades")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Trade\TradeSummary>")
     */
    private $trades = [];

    /**
     * @var array|Position[]
     *
     * @Serializer\SerializedName("positions")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Position\Position>")
     */
    private $positions = [];

    /**
     * @var array|Order[]
     *
     * @Serializer\SerializedName("orders")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Order\Order>")
     */
    private $orders = [];

    /**
     * @return array|TradeSummary[]
     */
    public function getTrades()
    {
        return $this->trades;
    }

    /**
     * @param array|TradeSummary[] $trades
     *
     * @return AccountOpenSummaryTrait
     */
    public function setTrades($trades)
    {
        $this->trades = $trades;

        return $this;
    }

    /**
     * @return array|Position[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param array|Position[] $positions
     *
     * @return AccountOpenSummaryTrait
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * @return array|Order[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param array|Order[] $orders
     *
     * @return AccountOpenSummaryTrait
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }
}
