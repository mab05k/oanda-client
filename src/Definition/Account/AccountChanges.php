<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Definition\Position\Position;
use Mab05k\OandaClient\Definition\Trade\Trade;
use Mab05k\OandaClient\Definition\Transaction\Transaction;

/**
 * Class AccountChanges.
 */
class AccountChanges
{
    /**
     * @var array|Order[]
     *
     * @Serializer\SerializedName("ordersCreated")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Order\Order>")
     */
    private $ordersCreated = [];

    /**
     * @var array|Order[]
     *
     * @Serializer\SerializedName("ordersCancelled")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Order\Order>")
     */
    private $ordersCancelled = [];

    /**
     * @var array|Order[]
     *
     * @Serializer\SerializedName("ordersFilled")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Order\Order>")
     */
    private $ordersFilled = [];

    /**
     * @var array|Order[]
     *
     * @Serializer\SerializedName("ordersTriggered")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Order\Order>")
     */
    private $ordersTriggered = [];

    /**
     * @var array|Trade[]
     *
     * @Serializer\SerializedName("tradesOpened")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Trade\Trade>")
     */
    private $tradesOpened = [];

    /**
     * @var array|Trade[]
     *
     * @Serializer\SerializedName("tradesReduced")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Trade\Trade>")
     */
    private $tradesReduced = [];

    /**
     * @var array|Trade[]
     *
     * @Serializer\SerializedName("tradesClosed")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Trade\Trade>")
     */
    private $tradesClosed = [];

    /**
     * @var array|Position[]
     *
     * @Serializer\SerializedName("positions")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Position\Position>")
     */
    private $positions = [];

    /**
     * @var array|Transaction[]
     *
     * @Serializer\SerializedName("transactions")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Transaction\Transaction>")
     */
    private $transactions = [];

    /**
     * @return array|Order[]
     */
    public function getOrdersCreated()
    {
        return $this->ordersCreated;
    }

    /**
     * @param array|Order[] $ordersCreated
     *
     * @return AccountChanges
     */
    public function setOrdersCreated($ordersCreated)
    {
        $this->ordersCreated = $ordersCreated;

        return $this;
    }

    /**
     * @return array|Order[]
     */
    public function getOrdersCancelled()
    {
        return $this->ordersCancelled;
    }

    /**
     * @param array|Order[] $ordersCancelled
     *
     * @return AccountChanges
     */
    public function setOrdersCancelled($ordersCancelled)
    {
        $this->ordersCancelled = $ordersCancelled;

        return $this;
    }

    /**
     * @return array|Order[]
     */
    public function getOrdersFilled()
    {
        return $this->ordersFilled;
    }

    /**
     * @param array|Order[] $ordersFilled
     *
     * @return AccountChanges
     */
    public function setOrdersFilled($ordersFilled)
    {
        $this->ordersFilled = $ordersFilled;

        return $this;
    }

    /**
     * @return array|Order[]
     */
    public function getOrdersTriggered()
    {
        return $this->ordersTriggered;
    }

    /**
     * @param array|Order[] $ordersTriggered
     *
     * @return AccountChanges
     */
    public function setOrdersTriggered($ordersTriggered)
    {
        $this->ordersTriggered = $ordersTriggered;

        return $this;
    }

    /**
     * @return array|Trade[]
     */
    public function getTradesOpened()
    {
        return $this->tradesOpened;
    }

    /**
     * @param array|Trade[] $tradesOpened
     *
     * @return AccountChanges
     */
    public function setTradesOpened($tradesOpened)
    {
        $this->tradesOpened = $tradesOpened;

        return $this;
    }

    /**
     * @return array|Trade[]
     */
    public function getTradesReduced()
    {
        return $this->tradesReduced;
    }

    /**
     * @param array|Trade[] $tradesReduced
     *
     * @return AccountChanges
     */
    public function setTradesReduced($tradesReduced)
    {
        $this->tradesReduced = $tradesReduced;

        return $this;
    }

    /**
     * @return array|Trade[]
     */
    public function getTradesClosed()
    {
        return $this->tradesClosed;
    }

    /**
     * @param array|Trade[] $tradesClosed
     *
     * @return AccountChanges
     */
    public function setTradesClosed($tradesClosed)
    {
        $this->tradesClosed = $tradesClosed;

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
     * @return AccountChanges
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * @return array|Transaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param array|Transaction[] $transactions
     *
     * @return AccountChanges
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;

        return $this;
    }
}
