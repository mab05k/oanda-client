<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

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
     * @var Order[]
     */
    private $ordersCreated = [];

    /**
     * @var Order[]
     */
    private $ordersCancelled = [];

    /**
     * @var Order[]
     */
    private $ordersFilled = [];

    /**
     * @var Order[]
     */
    private $ordersTriggered = [];

    /**
     * @var Trade[]
     */
    private $tradesOpened = [];

    /**
     * @var Trade[]
     */
    private $tradesReduced = [];

    /**
     * @var Trade[]
     */
    private $tradesClosed = [];

    /**
     * @var Position[]
     */
    private $positions = [];

    /**
     * @var Transaction[]
     */
    private $transactions = [];

    /**
     * @return Order[]
     */
    public function getOrdersCreated()
    {
        return $this->ordersCreated;
    }

    /**
     * @param Order[] $ordersCreated
     *
     * @return AccountChanges
     */
    public function setOrdersCreated($ordersCreated)
    {
        $this->ordersCreated = $ordersCreated;

        return $this;
    }

    /**
     * @return Order[]
     */
    public function getOrdersCancelled()
    {
        return $this->ordersCancelled;
    }

    /**
     * @param Order[] $ordersCancelled
     *
     * @return AccountChanges
     */
    public function setOrdersCancelled($ordersCancelled)
    {
        $this->ordersCancelled = $ordersCancelled;

        return $this;
    }

    /**
     * @return Order[]
     */
    public function getOrdersFilled()
    {
        return $this->ordersFilled;
    }

    /**
     * @param Order[] $ordersFilled
     *
     * @return AccountChanges
     */
    public function setOrdersFilled($ordersFilled)
    {
        $this->ordersFilled = $ordersFilled;

        return $this;
    }

    /**
     * @return Order[]
     */
    public function getOrdersTriggered()
    {
        return $this->ordersTriggered;
    }

    /**
     * @param Order[] $ordersTriggered
     *
     * @return AccountChanges
     */
    public function setOrdersTriggered($ordersTriggered)
    {
        $this->ordersTriggered = $ordersTriggered;

        return $this;
    }

    /**
     * @return Trade[]
     */
    public function getTradesOpened()
    {
        return $this->tradesOpened;
    }

    /**
     * @param Trade[] $tradesOpened
     *
     * @return AccountChanges
     */
    public function setTradesOpened($tradesOpened)
    {
        $this->tradesOpened = $tradesOpened;

        return $this;
    }

    /**
     * @return Trade[]
     */
    public function getTradesReduced()
    {
        return $this->tradesReduced;
    }

    /**
     * @param Trade[] $tradesReduced
     *
     * @return AccountChanges
     */
    public function setTradesReduced($tradesReduced)
    {
        $this->tradesReduced = $tradesReduced;

        return $this;
    }

    /**
     * @return Trade[]
     */
    public function getTradesClosed()
    {
        return $this->tradesClosed;
    }

    /**
     * @param Trade[] $tradesClosed
     *
     * @return AccountChanges
     */
    public function setTradesClosed($tradesClosed)
    {
        $this->tradesClosed = $tradesClosed;

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
     * @return AccountChanges
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param Transaction[] $transactions
     *
     * @return AccountChanges
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;

        return $this;
    }
}
